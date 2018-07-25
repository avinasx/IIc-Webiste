<?php
if (!$gCms)
	exit();

if (!$this->CheckPermission('Use Gallery'))
{
  echo $this->ShowErrors(lang('needpermissionto', 'Use Gallery'));
  return;
}

// Make sure file is not cached (as it happens for example on iOS devices)
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// 5 minutes execution time
@set_time_limit(5 * 60);

// Check upload dir
$targetDir = Gallery_utils::CleanFile($_REQUEST['uploaddir']);
if($targetDir === FALSE)
{
	die('{"jsonrpc" : "2.0", "error" : {"code": 9901, "message": "Invalid directory"}, "id" : "id"}');
}

// Get a file name
if (isset($_REQUEST["name"])) {
	$fileName = $_REQUEST["name"];
} elseif (!empty($_FILES)) {
	$fileName = $_FILES["file"]["name"];
} else {
	$fileName = uniqid("file_");
}

$filePath = cms_join_path($targetDir, $fileName);

// Chunking might be enabled
$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;

// Open temp file
if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
	die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
}

if (!empty($_FILES)) {
	if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
	}

	// Read binary input stream and append it to temp file
	if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
	}
} else {	
	if (!$in = @fopen("php://input", "rb")) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
	}
}

while ($buff = fread($in, 4096)) {
	fwrite($out, $buff);
}

@fclose($out);
@fclose($in);

// Check if file has been uploaded
if (!$chunks || $chunk == $chunks - 1) {
	// Strip the temp .part suffix off 
	if (Gallery_utils::CreateThumbnail($targetDir . DIRECTORY_SEPARATOR . IM_PREFIX . $fileName, "{$filePath}.part", get_site_preference('thumbnail_width', 96), get_site_preference('thumbnail_height', 96), 'sc'))
	{
		rename("{$filePath}.part", $filePath);
	}
	else
	{
		//@unlink("{$filePath}.part");
		die('{"jsonrpc" : "2.0", "error" : {"code": 9902, "message": "Corrupt image file."}, "id" : "id"}');
	}
	
}

// Return Success JSON-RPC response
die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');

?>