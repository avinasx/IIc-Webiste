<?php
if (!$gCms)
	exit();

if (!$this->CheckPermission('Modify Templates') || !$this->CheckPermission('Use Gallery'))
{
	echo $this->ShowErrors(lang('needpermissionto', 'Use Gallery\'/\'Modify Templates'));
	return;
}

if (isset($params['cancel']))
{
	$params = array('active_tab' => 'fielddefs');
	$this->Redirect($id, 'defaultadmin', '', $params);
}

if (!isset($params['mode']))
{
	$params = array('module_error' => lang('missingparams'), 'active_tab' => 'fielddefs');
	$this->Redirect($id, 'defaultadmin', '', $params);
	return;
}

$db = & $this->GetDB();
$params['public'] = empty($params['public']) ? 0 : 1;

switch ($params['mode'])
{
	case 'add':
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if (empty($params['name']))
			{
				$params['module_error'] = lang('missingparams');
				$this->Redirect($id, 'editfielddef', '', $params);
				return;
			}

			$query = "SELECT MAX(sortorder) AS maxsortorder FROM " . cms_db_prefix() . "module_gallery_fielddefs WHERE dirfield = ?";
			//$sortorder = $db->GetOne($query, array($params['dirfield']));
			$result = $db->Execute($query, array($params['dirfield']));
			if ($result)
			{
				$field = $result->FetchRow();
				switch ($params['type'])
				{
					case 'textinput':
						$params['properties'] = ctype_digit($params['properties']) && $params['properties'] <= 255 ? $params['properties'] : 255;
						break;

					case 'dropdown':
					case 'radiobuttons':
						//could have done some cleanup here
						break;

					default:
						$params['properties'] = NULL;
						break;
				}
				$query = "INSERT INTO " . cms_db_prefix() . "module_gallery_fielddefs (name, type, properties, dirfield, sortorder, public) VALUES (?,?,?,?,?,?)";
				$result = $db->Execute($query, array($params['name'], $params['type'], $params['properties'], $params['dirfield'], $field['maxsortorder'] + 1, $params['public']));
			}
			if (isset($result) && $result)
			{
				$params = array('tab_message' => 'fielddefadded', 'active_tab' => 'fielddefs');
			}
			else
			{
				$params = array('module_error' => 'fielddefupdatefailed', 'active_tab' => 'fielddefs');
			}
			$this->Redirect($id, 'defaultadmin', '', $params);
		}
		$field = array('name' => '', 'type' => '', 'properties' => '', 'dirfield' => 1, 'public' => 0);
		$smarty->assign('title', $this->Lang('addfielddef'));
		$smarty->assign('hidden', $this->CreateInputHidden($id, 'mode', 'add'));
		break;


	case 'delete':
		if (!ctype_digit($params['fieldid']))
		{
			$params = array('module_error' => lang('missingparams'), 'active_tab' => 'fielddefs');
			$this->Redirect($id, 'defaultadmin', '', $params);
			return;
		}
		$query = "SELECT sortorder, dirfield FROM " . cms_db_prefix() . "module_gallery_fielddefs WHERE fieldid = ?";
		$result = $db->Execute($query, array($params['fieldid']));
		if (!$result || $result->RecordCount() == 0)
		{
			$params = array('module_error' => 'fielddefupdatefailed', 'active_tab' => 'fielddefs');
			$this->Redirect($id, 'defaultadmin', '', $params);
		}
		$row = $result->FetchRow();

		$query = "DELETE FROM " . cms_db_prefix() . "module_gallery_fielddefs WHERE fieldid = ?";
		$db->Execute($query, array($params['fieldid']));

		// update the sortorder
		$query = "UPDATE " . cms_db_prefix() . "module_gallery_fielddefs SET sortorder = sortorder - 1 WHERE dirfield = ? AND sortorder > ?";
		$result = $db->Execute($query, array($row['dirfield'], $row['sortorder']));

		// delete the fieldvalues
		$query = "DELETE FROM " . cms_db_prefix() . "module_gallery_fieldvals WHERE fieldid = ?";
		$db->Execute($query, array($params['fieldid']));

		$params = array('tab_message' => 'fielddefsupdated', 'active_tab' => 'fielddefs');
		$this->Redirect($id, 'defaultadmin', '', $params);
		break;


	case 'edit':
		if (!ctype_digit($params['fieldid']))
		{
			$params = array('module_error' => lang('missingparams'), 'active_tab' => 'fielddefs');
			$this->Redirect($id, 'defaultadmin', '', $params);
			return;
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if (empty($params['name']))
			{
				$params['module_error'] = lang('missingparams');
				$this->Redirect($id, 'editfielddef', '', $params);
				return;
			}

			switch ($params['type'])
			{
				case 'textinput':
					$params['properties'] = ctype_digit($params['properties']) && $params['properties'] <= 255 ? $params['properties'] : 255;
					break;

				case 'dropdown':
				case 'radiobuttons':
					//could have done some cleanup here
					break;

				default:
					$params['properties'] = NULL;
					break;
			}
			$query = "UPDATE " . cms_db_prefix() . "module_gallery_fielddefs SET name = ?, type = ?, properties = ?, public = ? WHERE fieldid = ?";
			$result = $db->Execute($query, array($params['name'], $params['type'], $params['properties'], $params['public'], $params['fieldid']));

			$params = array('tab_message' => 'fielddefsupdated', 'active_tab' => 'fielddefs');
			$this->Redirect($id, 'defaultadmin', '', $params);
		}
		$query = "SELECT * FROM " . cms_db_prefix() . "module_gallery_fielddefs WHERE fieldid = ?";
		$result = $db->Execute($query, array($params['fieldid']));
		if ($result && $result->RecordCount() > 0)
		{
			$field = $result->FetchRow();
		}

		$smarty->assign('title', $this->Lang('editfielddef'));
		$smarty->assign('hidden', $this->CreateInputHidden($id, 'fieldid', $params['fieldid']) .
				$this->CreateInputHidden($id, 'mode', 'edit'));
		break;


	case 'moveup':
		$query = "SELECT * FROM " . cms_db_prefix() . "module_gallery_fielddefs WHERE fieldid = ?";
		$result = $db->Execute($query, array($params['fieldid']));
		if (!$result || $result->RecordCount() == 0)
		{
			$params = array('module_error' => 'fielddefupdatefailed', 'active_tab' => 'fielddefs');
			$this->Redirect($id, 'defaultadmin', '', $params);
		}
		$row = $result->FetchRow();

		$query = "UPDATE " . cms_db_prefix() . "module_gallery_fielddefs SET sortorder = ? WHERE dirfield = ? AND sortorder = ?";
		$result = $db->Execute($query, array($row['sortorder'], $row['dirfield'], $row['sortorder'] - 1));

		$query = "UPDATE " . cms_db_prefix() . "module_gallery_fielddefs SET sortorder = ? WHERE fieldid = ?";
		$result = $db->Execute($query, array($row['sortorder'] - 1, $params['fieldid']));

		$params = array('active_tab' => 'fielddefs');
		$this->Redirect($id, 'defaultadmin', '', $params);
		break;


	case 'movedown':
		$query = "SELECT * FROM " . cms_db_prefix() . "module_gallery_fielddefs WHERE fieldid = ?";
		$result = $db->Execute($query, array($params['fieldid']));
		if (!$result || $result->RecordCount() == 0)
		{
			$params = array('module_error' => 'fielddefupdatefailed', 'active_tab' => 'fielddefs');
			$this->Redirect($id, 'defaultadmin', '', $params);
		}
		$row = $result->FetchRow();

		$query = "UPDATE " . cms_db_prefix() . "module_gallery_fielddefs SET sortorder = ? WHERE dirfield = ? AND sortorder = ?";
		$result = $db->Execute($query, array($row['sortorder'], $row['dirfield'], $row['sortorder'] + 1));

		$query = "UPDATE " . cms_db_prefix() . "module_gallery_fielddefs SET sortorder = ? WHERE fieldid = ?";
		$result = $db->Execute($query, array($row['sortorder'] + 1, $params['fieldid']));

		$params = array('active_tab' => 'fielddefs');
		$this->Redirect($id, 'defaultadmin', '', $params);
		break;
}


$typelist = array(
	$this->Lang('textinput') => 'textinput',
	$this->Lang('dropdown') => 'dropdown',
	$this->Lang('checkbox') => 'checkbox',
	$this->Lang('radiobuttons') => 'radiobuttons',
	$this->Lang('textarea') => 'textarea',
	$this->Lang('wysiwyg') => 'wysiwyg');

$smarty->assign('prompt_name', $this->Lang('prompt_name'));
$smarty->assign('name', $this->CreateInputText($id, 'name', $field['name'], 40));

$smarty->assign('prompt_type', $this->Lang('type'));
$smarty->assign('type', $this->CreateInputDropdown($id, 'type', $typelist, -1, $field['type']));

$smarty->assign('prompt_properties', $this->Lang('properties'));
$smarty->assign('properties', $this->CreateInputText($id, 'properties', $field['properties'], 80));
$smarty->assign('properties_help', $this->Lang('properties_help'));

$smarty->assign('prompt_dirfield', $this->Lang('dirfield'));
if ($params['mode'] == 'edit')
{
	$smarty->assign('dirfield', $field['dirfield'] == 1 ? ucwords($this->Lang('galleries')) : ucwords($this->Lang('images')) );
}
else
{
	$smarty->assign('dirfield', $this->CreateInputDropdown($id, 'dirfield', array(ucwords($this->Lang('galleries')) => 1, ucwords($this->Lang('images')) => 0), -1, $field['dirfield']));
}

$smarty->assign('prompt_public', $this->Lang('public'));
$smarty->assign('public', $this->CreateInputCheckbox($id, 'public', '1', $field['public']));

$smarty->assign('submit', $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('submit')));
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', $this->Lang('cancel')));

$smarty->assign('formstart', $this->CreateFormStart($id, 'editfielddef', $returnid));
$smarty->assign('formend', $this->CreateFormEnd());

echo $this->ProcessTemplate('editfielddef.tpl');
?>