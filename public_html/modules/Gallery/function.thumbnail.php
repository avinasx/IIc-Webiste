<?php
// This script accepts an ID and converts it to the thumbnail name.
// It then streams the data to the browser from the file

$image_id = isset($_GET['id']) ? $_GET['id'] : false;

if ($image_id === false)
{
	header("HTTP/1.1 500 Internal Server Error");
	echo "No ID";
	exit(0);
}

$thumb = '../../' . base64_decode(urldecode($image_id));

if (!file_exists($thumb))
{
	$thumb = 'images/zerobyte.gif';
}

$pos = strrpos($thumb, '.');
$type = strtolower(substr($thumb, $pos + 1));
switch ($type)
{
	case 'jpg':
		header("Content-type: image/jpeg");
		break;
	case 'png':
		header("Content-type: image/png");
		break;
	case 'gif':
		header("Content-type: image/gif");
		break;
	default:
		header("Content-type: image/gif");
		$thumb = 'images/error.gif';
		break;
}

header("Content-length: " . filesize($thumb));
flush();
readfile($thumb);
exit(0);
?>