<?php
#-------------------------------------------------------------------------
# Module: Gallery
# Version: 2.3, Jos
# Homepage: http://dev.cmsmadesimple.org/projects/gallery/
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------


define('DEFAULT_GALLERY_PATH', "uploads/images/Gallery/");
define('DEFAULT_GALLERYTHUMBS_PATH', "uploads/images/GalleryThumbs/");
define('IM_PREFIX', "thumb_");   // $IMConfig['thumbnail_prefix']
define('IM_THUMBWIDTH', get_site_preference('thumbnail_width', 96));
define('IM_THUMBHEIGHT', get_site_preference('thumbnail_height', 96));
define('TEMPLATE_SEPARATOR', "{*----------");

class Gallery extends CMSModule {

  function GetName() {
    return 'Gallery';
  }

  function GetFriendlyName() {
    return $this->Lang('friendlyname');
  }

  function GetVersion() {
    return '2.3.2';
  }

  function GetHelp() {
    $helptxt = $this->Lang('help2') . '<form action="https://www.paypal.com/cgi-bin/webscr" method="post"><input type="hidden" name="cmd" value="_donations"><input type="hidden" name="business" value="josvd@live.nl"><input type="hidden" name="item_name" value="Jos"><input type="hidden" name="item_number" value="CMSms Gallery Module"><input type="hidden" name="currency_code" value="EUR"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="" border="0" src="https://www.paypalobjects.com/nl_NL/i/scr/pixel.gif" width="1" height="1"></form><br />
<h3>Copyright and License</h3>
<p>Copyright &copy; 2009, Jos &lt;<a href="mailto:josvd@live.nl">josvd@live.nl</a>&gt;. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License v3</a>. However, as a special exception to the GPL, this software is distributed as an addon module to CMS Made Simple. You may only use this software when there is a clear and obvious indication in the admin section that the site was built with CMS Made Simple.</p>
';
    return $helptxt;
  }

  function GetAuthor() {
    return 'Jos';
  }

  function GetAuthorEmail() {
    return 'josvd@live.nl';
  }

  function GetChangeLog() {
    return file_get_contents(dirname(__FILE__) . '/changelog.inc');
  }

  function IsPluginModule() {
    return true;
  }

  function HasAdmin() {
    return true;
  }

  function GetAdminSection() {
    return 'content';
  }

  function GetAdminDescription() {
    return $this->Lang('moddescription');
  }

  function VisibleToAdminUser() {
    return $this->CheckPermission('Use Gallery');
  }

  function GetDependencies() {
    return array();
  }

  function MinimumCMSVersion() {
    return "1.12";
  }

  function InitializeFrontend() {
    $this->RegisterModulePlugin();
    $this->RestrictUnknownParams();

    // Pretty url route for viewing a gallery in all its variations
    $urlprefix = $this->GetPreference('urlprefix', '[gG]allery');
    $this->RegisterRoute('/' . $urlprefix . '\/(?P<dir>.+)\/(?P<start>[0-9]+)-(?P<number>[0-9]+)-(?P<show>[a-zA-Z]+)-(?P<returnid>[0-9]+)$/', array('action' => 'default'));
    $this->RegisterRoute('/' . $urlprefix . '\/(?P<dir>.+)\/(?P<start>[0-9]+)-(?P<number>[0-9]+)-(?P<returnid>[0-9]+)$/', array('action' => 'default'));
    $this->RegisterRoute('/' . $urlprefix . '\/(?P<dir>.+)\/(?P<show>[a-zA-Z]+)-(?P<returnid>[0-9]+)$/', array('action' => 'default'));
    $this->RegisterRoute('/' . $urlprefix . '\/(?P<dir>.+)\/(?P<returnid>[0-9]+)$/', array('action' => 'default'));
    $this->RegisterRoute('/' . $urlprefix . '\/(?P<start>[0-9]+)-(?P<number>[0-9]+)-(?P<show>[a-zA-Z]+)-(?P<returnid>[0-9]+)$/', array('action' => 'default'));
    $this->RegisterRoute('/' . $urlprefix . '\/(?P<start>[0-9]+)-(?P<number>[0-9]+)-(?P<returnid>[0-9]+)$/', array('action' => 'default'));
    $this->RegisterRoute('/' . $urlprefix . '\/(?P<returnid>[0-9]+)$/', array('action' => 'default'));

    $this->SetParameterType('dir', CLEAN_STRING);
    $this->SetParameterType('template', CLEAN_STRING);
    $this->SetParameterType('targetpage', CLEAN_STRING);
    $this->SetParameterType('number', CLEAN_INT);
    $this->SetParameterType('start', CLEAN_INT);
    $this->SetParameterType('show', CLEAN_STRING);
    $this->SetParameterType('action', CLEAN_STRING);
    $this->SetParameterType('img', CLEAN_INT);
    $this->SetParameterType('id', CLEAN_INT);
    $this->SetParameterType('fid', CLEAN_INT);
    $this->SetParameterType('gid', CLEAN_INT);
    $this->SetParameterType('mode', CLEAN_STRING);
    $this->SetParameterType('loadcustomfields', CLEAN_INT);
  }

  function SetParameters() {
    // syntax for creating a parameter is parameter name, default value, description
    $this->CreateParameter('dir', 'sub1/sub2', $this->Lang('help_dir'));
    $this->CreateParameter('template', '', $this->Lang('help_template'));
    $this->CreateParameter('targetpage', '', $this->Lang('help_targetpage'));
    $this->CreateParameter('number', '100', $this->Lang('help_number'));
    $this->CreateParameter('start', '1', $this->Lang('help_start'));
    $this->CreateParameter('show', 'all', $this->Lang('help_show'));
    $this->CreateParameter('action', 'default', $this->Lang('help_action'));
    $this->CreateParameter('loadcustomfields', 1, $this->Lang('help_loadcustomfields'));
    $this->CreateParameter('img', 10, $this->Lang('help_img'));
  }

  function InitializeAdmin() {
    $this->SetParameters();
  }

  function LazyLoadFrontend() {
    return FALSE;
  }

  function GetEventDescription($eventname) {
    return; // $this->Lang('event_info_'.$eventname );
  }

  function GetEventHelp($eventname) {
    return; // $this->Lang('event_help_'.$eventname );
  }

  function InstallPostMessage() {
    return $this->Lang('postinstall');
  }

  /**
   * DoEvent methods
   */
  function DoEvent($originator, $eventname, &$params) {
    if ($originator == 'Core' && $eventname == 'ContentPostRender')
    {
      $pos_top = stripos($params["content"], "</head");
      if ($pos_top !== FALSE && !empty($this->GalleryCSS))
      {
        $params["content"] = substr($params["content"], 0, $pos_top) . $this->GalleryCSS . substr($params["content"], $pos_top);
      }
      $pos_btm = strripos($params["content"], "</body");
      if ($pos_btm !== FALSE && !empty($this->GalleryJS))
      {
        $params["content"] = substr($params["content"], 0, $pos_btm) . $this->GalleryJS . substr($params["content"], $pos_btm);
      }
    }
  }

  /**
   * Search methods
   */
  function SearchResult($returnid, $gid, $attr = '') {
    $result = array();

    if ($attr == 'gallery')
    {
      $galleryinfo = Gallery_utils::Getgalleryinfobyid($gid);
      if ($galleryinfo && $galleryinfo['active'])
      {
        //0 position is the prefix displayed in the list results.
        $result[0] = $this->GetFriendlyName();

        //1 position is the title
        $result[1] = empty($galleryinfo['title']) ? trim($galleryinfo['filename'], "/") : $galleryinfo['title'];

        //2 position is the URL to the title.
        $gdir = $gid == 1 ? '' : str_replace('%2F', '/', rawurlencode((empty($galleryinfo['filepath']) ? '' : $galleryinfo['filepath'] . '/') . $galleryinfo['filename']));
        $prettyurl = $this->GetPreference('urlprefix', 'gallery') . '/' . $gdir . $returnid;
        $result[2] = $this->CreateLink('cntnt01', 'default', $returnid, '', array('dir' => trim($gdir, '/')), '', true, false, '', true, $prettyurl);
      }
    }
    elseif ($attr == 'gallery_image')
    {
      $imginfo = Gallery_utils::Getimagebyid($gid);
      if ($imginfo && $imginfo['active'])
      {
        //0 position is the prefix displayed in the list results.
        $result[0] = $this->GetFriendlyName() . ' ' . $this->Lang('image');

        //1 position is the title
        $result[1] = $imginfo['filename'];

        //2 position is the URL to the title.
        $prettyurl = $this->GetPreference('urlprefix', 'gallery') . '/' . $gid . '/' . $returnid;
        $result[2] = $this->CreateLink('cntnt01', 'default', $returnid, '', array('img' => $gid), '', true, false, '', true, $prettyurl);
      }
    }

    return $result;
  }

  function SearchReindex(&$module) {
    $db = cmsms()->GetDB();
    if ($this->GetPreference('searchimages', false))
    {
      // update search index for images.
      $query = "SELECT g1.fileid, g1.filename, g1.title, g1.comment 
                FROM " . cms_db_prefix() . "module_gallery g1
                JOIN " . cms_db_prefix() . "module_gallery g2 ON g1.galleryid=g2.fileid
                WHERE g1.filename NOT LIKE ? AND g1.active=1 AND g2.active=1";
      $result = $db->Execute($query, array('%/'));
      if ($result && $result->RecordCount() > 0)
      {
        while ($row = $result->FetchRow())
        {
          $searchwords = $row['filename'] . ' ' . $row['title'] . ' ' . $row['comment'] . ' ';
          $fileid = $row['fileid'];
          // add custom fields to search index
          $query2 = "SELECT fv.value FROM " . cms_db_prefix() . "module_gallery_fieldvals fv
                    JOIN " . cms_db_prefix() . "module_gallery_fielddefs fd ON fv.fieldid=fd.fieldid AND fd.public=1
                    WHERE fv.fileid = ?";
          $result2 = $db->Execute($query2, array($fileid));
          if ($result2 && $result2->RecordCount() > 0)
          {
            while ($row2 = $result2->FetchRow())
            {
              $searchwords .= $row2['value'] . ' ';
            }
          }

          $module->AddWords($this->GetName(), $fileid, 'gallery_image', $searchwords);
        }
      }
    }
    else
    {
      // update search index for the complete galleries.
      $galleries = Gallery_utils::GetGalleries();

      foreach ($galleries as $gid => $gallery)
      {
        $searchwords = '';
        $query = "SELECT g1.fileid, g1.title, g1.comment 
                  FROM " . cms_db_prefix() . "module_gallery g1
                  JOIN " . cms_db_prefix() . "module_gallery g2 ON g1.galleryid=g2.fileid
                  WHERE (g1.fileid=? OR (g1.galleryid=? AND g1.filename NOT LIKE '%/' AND g2.active=1)) AND g1.active=1";
        $result = $db->Execute($query, array($gid, $gid));
        if ($result && $result->RecordCount() > 0)
        {
          while ($row = $result->FetchRow())
          {
            $searchwords .= $row['title'] . ' ' . $row['comment'] . ' ';
            $fileid[] = $row['fileid'];
          }

          // add custom fields to search index
          if (!empty($fileid))
          {
            $fids = implode(",", $fileid);
            $query = "SELECT fv.value FROM " . cms_db_prefix() . "module_gallery_fieldvals fv
                      JOIN " . cms_db_prefix() . "module_gallery_fielddefs fd ON fv.fieldid=fd.fieldid AND fd.public=1
                      WHERE fv.fileid IN(" . $fids . ")";
            $result = $db->Execute($query);
            if ($result && $result->RecordCount() > 0)
            {
              while ($row = $result->FetchRow())
              {
                $searchwords .= $row['value'] . ' ';
              }
            }
          }
          $module->AddWords($this->GetName(), $gid, 'gallery', $searchwords);
        }
        else
        {
          debug_to_log('ERROR: ' . __LINE__ . ' >> ' . $db->ErrorMsg());
        }
      }
    }
  }

  /**
   * Register TinyMCE plugin for CMSMS 1.x
   */
  function RegisterTinyMCEPlugin() {
    $gCms = cmsms();
    $db = $this->GetDB();
    $config = $this->GetConfig();

    $plugin1 = "
tinymce.create('tinymce.plugins.picker', {
	createControl: function(n, cm) {
		switch (n) {
			case 'picker':
				var c = cm.createMenuButton('picker', {
					title : '" . $this->Lang('tinymce_button_picker') . "',
					image : '" . $config["root_url"] . "/modules/Gallery/images/icon_TinyMCE.gif',
					icons : false
				});

				c.onRenderMenu.add(function(c, m) {
		";

    $query = "SELECT
								*
							FROM
								" . cms_db_prefix() . "module_gallery
							WHERE
								active = 1 AND (fileid = 1 OR filename LIKE '%/')
							ORDER BY
								" . $db->Concat('filepath', 'filename') . " ASC";
    $result = $db->Execute($query);
    if ($result && $result->RecordCount() > 0)
    {
      while ($gallery = $result->FetchRow())
      {
        $plugin1 .= "
					m.add({title : '" . $gallery['filename'] . "', onclick : function() {
								tinyMCE.activeEditor.execCommand('mceInsertContent', false, '{Gallery" . ($gallery['fileid'] == 1 ? "}" : " dir=\'" . substr($gallery['filepath'] . $gallery['filename'], 0, -1) . "\'}") . "');
					}});
					m.addSeparator();
				";
      }
    }
    $plugin1 .= "
				});
				// Return the new menu button instance
				return c;
		}

		return null;
	}
});
		";

    return array(array('picker', $plugin1, $this->Lang('tinymce_description_picker')));
  }

  /**
   * Register TinyMCE plugin for CMSMS 2.x
   */
  function HasCapability($capability, $params = array()) {
    if ($capability == 'WYSIWYGItems')
      return true;
    return false;
  }

  function GetWYSIWYGBtnName() {
    return 'module_gallery';
  }

  function _buildTree(array $elements, $parentId = 1) {
    $branch = array();
    foreach ($elements as $element)
    {
      $item = array();
      if ($element['galleryid'] == $parentId)
      {
        $children = $this->_buildTree($elements, $element['fileid']);
        if ($children)
        {
          $item['children'] = $children;
        }
        $item['menu_text'] = empty($element['title']) ? $element['filename'] : $element['title'];
        $item['content'] = '{Gallery dir=\'' . trim($element['filepath'] . $element['filename'], '/') . '\'}';
        $branch[] = $item;
      }
    }
    return $branch;
  }

  function GetWYSIWYGBtn($wysiwyg_module) {
    $galleries = Gallery_utils::GetGalleries();
    $items = $this->_buildTree($galleries);
    array_unshift($items, array('menu_text' => empty($galleries[1]['title']) ? GetFriendlyName() : $galleries[1]['title'], 'content' => '{Gallery}'));

    if ($wysiwyg_module == 'TinyMCE')
    {
      $obj = new tinymce_modulemenu;
      $obj->module_name = $this->GetName();
      $obj->button_name = $this->GetWYSIWYGBtnName();
      $obj->title = $this->Lang('tinymce_button_picker');
      $obj->tooltip = $this->Lang('tinymce_description_picker');
      $obj->icon = 'image';
      $obj->image = $this->GetModuleURLPath() . '/images/icon_TinyMCE.gif';
      $obj->menu_entries = $items;
      $obj->menu_section = 'insert';

      return $obj;
    }

    return false;
  }

  function GetHeaderHTML() {
    $tmpl = <<<EOT
<link rel="stylesheet" type="text/css" href="../modules/Gallery/lib/jquery/jquery-ui.smoothness.css" media="screen" /> <!-- smoothness/jquery-ui-1.8.12.custom.css -->
<link rel="stylesheet" type="text/css" href="../modules/Gallery/lib/jquery/jquery.treeTable.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../modules/Gallery/lib/imgareaselect/imgareaselect-animated.css" media="screen" />

<script type="text/javascript">
	$.event.props = $.event.props.join('|').replace('layerX|layerY|', '').split('|');
</script>
<script type="text/javascript" src="../modules/Gallery/lib/jquery/jquery.tablednd.js"></script>
<script type="text/javascript" src="../modules/Gallery/lib/jquery/jquery.treeTable.js"></script>
<script type="text/javascript" src="../modules/Gallery/lib/imgareaselect/jquery.imgareaselect.min.js"></script>
<script type="text/javascript" src="../modules/Gallery/lib/galleryadminscripts.js"></script>
EOT;
    return $tmpl;
  }

}

?>