<?php
// CreateFormStart sets up a proper form tag that will cause the submit to
// return control to this module for processing.
$smarty->assign('startform', $this->CreateFormStart($id, 'do_updateoptions', $returnid));
$smarty->assign('endform', $this->CreateFormEnd());

$smarty->assign('urlprefix', $this->Lang('urlprefix'));
$smarty->assign('input_urlprefix', $this->CreateInputText($id, 'urlprefix', $this->GetPreference('urlprefix', 'gallery'), 15, 50));
$smarty->assign('urlprefix_help', $this->Lang('urlprefix_help'));

$smarty->assign('allowed_extensions', $this->Lang('allowed_extensions'));
$smarty->assign('input_allowed_extensions', $this->CreateInputText($id, 'allowed_extensions', $this->GetPreference('allowed_extensions', ''), 50, 255));

$this->smarty->assign('prompt_imagesize', $this->Lang('maxsize'));
$this->smarty->assign('imagesize', $this->Lang('width') . ':&nbsp;' .
		$this->CreateInputText($id, 'maximagewidth', $this->GetPreference('maximagewidth', 800), 4, 4) .
		'&nbsp;&nbsp;&nbsp;' . $this->Lang('height') . ':&nbsp;' .
		$this->CreateInputText($id, 'maximageheight', $this->GetPreference('maximageheight', 800), 4, 4)
);

$smarty->assign('imagejpgquality', $this->Lang('imagejpgquality'));
$smarty->assign('input_imagejpgquality', $this->CreateInputText($id, 'imagejpgquality', $this->GetPreference('imagejpgquality', 80), 4, 4));

$smarty->assign('thumbjpgquality', $this->Lang('thumbjpgquality'));
$smarty->assign('input_thumbjpgquality', $this->CreateInputText($id, 'thumbjpgquality', $this->GetPreference('thumbjpgquality', 80), 4, 4));
$smarty->assign('jpgquality_help', $this->Lang('jpgquality_help'));

$smarty->assign('searchimages', $this->Lang('searchimages'));
$smarty->assign('input_searchimages', $this->CreateInputCheckbox($id, 'searchimages', true, $this->GetPreference('searchimages', false)));

$smarty->assign('use_permissions', $this->Lang('use_permissions'));
$smarty->assign('input_use_permissions', $this->CreateInputCheckbox($id, 'use_permissions', true, $this->GetPreference('use_permissions', false)));

$smarty->assign('newgalleries_active', $this->Lang('newgalleries_active'));
$smarty->assign('input_newgalleries_active', $this->CreateInputCheckbox($id, 'newgalleries_active', true, $this->GetPreference('newgalleries_active', true)));

$smarty->assign('use_comment_wysiwyg', $this->Lang('use_comment_wysiwyg'));
$smarty->assign('input_use_comment_wysiwyg', $this->CreateInputCheckbox($id, 'use_comment_wysiwyg', true, $this->GetPreference('use_comment_wysiwyg', true)));

$smarty->assign('editdirdates', $this->Lang('editdirdates'));
$smarty->assign('input_editdirdates', $this->CreateInputCheckbox($id, 'editdirdates', true, $this->GetPreference('editdirdates', true)));

$smarty->assign('editfiledates', $this->Lang('editfiledates'));
$smarty->assign('input_editfiledates', $this->CreateInputCheckbox($id, 'editfiledates', true, $this->GetPreference('editfiledates', true)));

$smarty->assign('fe_folderpath', $this->Lang('fe_folderpath'));
$smarty->assign('input_fe_folderpath', $this->CreateInputText($id, 'fe_folderpath', $this->GetPreference('fe_folderpath', 'modules/Gallery/images/folder.png'), 50, 255));

$smarty->assign('be_folderpath', $this->Lang('be_folderpath'));
$smarty->assign('input_be_folderpath', $this->CreateInputText($id, 'be_folderpath', $this->GetPreference('be_folderpath', 'modules/Gallery/images/foldersmall.png'), 50, 255));

$smarty->assign('updatethumbs', $this->Lang('updatethumbs'));
$smarty->assign('input_updatethumbs', $this->CreateInputCheckbox($id, 'updatethumbs', '1', 0) . ' ' . $this->Lang('thumbsrecreated'));

$smarty->assign('submit', $this->CreateInputSubmit($id, 'optionssubmitbutton', $this->Lang('submit')));

// Display the populated template
echo $this->ProcessTemplate('adminoptions.tpl');
?>