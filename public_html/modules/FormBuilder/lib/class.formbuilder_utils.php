<?php
class formbuilder_utils
{
  private static $_fb;
  
  /****** private methods ******/
  
  private static function _init()
  {
    if( empty(self::$_fb) ) self::$_fb = cmsms()->GetModuleInstance('FormBuilder');
  }
  
  
  /****** public methods ******/
  
  public static function GetFB()
  {
    self::_init();
    return self::$_fb;
  }
  
  
  /**
  * returns true if we are in cmsms 2+ otherwise false
  * @since 8.0
  */
  public static function is_CMS2()
  {
    return version_compare('1.999.999.999', CMS_VERSION, '<');
  }
  
  /**
  * replaces clean_datetime()
  * in Form.class.php
  * which already is, or will be removed
  * 
  * @param string $dt
  */
  public static function clean_datetime($dt)
  {
    return substr($dt,1,strlen($dt)-2);
  }
  
  /**
  * replaces unmy_htmlentities()
  * originaly in Form.class.php
  * which already is, or will be removed
  * 
  * @param mixed $val
  */
  public static function htmlentities($val)
  {
    if ($val == "")
    {
      return "";
    }
    
    $val = html_entity_decode($val);
    $val = str_replace("&amp;","&",$val);
    $val = str_replace("&#60;&#33;--","<!--",$val);
    $val = str_replace("--&#62;","-->",$val);
    $val = str_replace("&gt;",">", $val);
    $val = str_replace("&lt;","<",$val);
    $val = str_replace("&quot;","\"",$val);
    $val = str_replace("&#036;","\$",$val);
    $val = str_replace("&#33;","!",$val);
    $val = str_replace("&#39;","'",$val);

    return $val;
  }
  
  /**
  * replaces createSampleTemplateJavascript()
  * originaly in Form.class.php
  * which already is, or will be removed
  * 
  * @param mixed $fieldName
  * @param mixed $button_text
  * @param mixed $suffix
  */
  public static function createSampleTemplateJavascript($fieldName='opt_email_template', $button_text='', $suffix='')
  {
    $fldAlias = preg_replace('/[^\w\d]/', '_', $fieldName) . $suffix;
    $jsCode = "<script type=\"text/javascript\">\n
/* <![CDATA[ */
function populate".$fldAlias."(formname)
{
  var fname = 'IDfbrp_" . $fieldName . "';
  $(formname[fname]).val(|TEMPLATE|).change();
}
/* ]]> */
</script>";

    $jsCode .= "<input type=\"button\" value=\"" . $button_text
    . "\" onclick=\"javascript:populate" . $fldAlias . "(this.form)\" />";
  
    return $jsCode;
  }
  
  /**
  * replaces updateRefs()
  * originaly in Form.class.php
  * which already is, or will be removed.
  * 
  * @param mixed $text
  * @param mixed $fieldMap
  */
  public static function updateRefs($text, &$fieldMap)
  {
    foreach ($fieldMap as $k=>$v)
    {
      $text = preg_replace('/([\{\b\s])\$fld_'.$k.'([\}\b\s])/','$1\$fld_'.$v.'$2',$text);
    }
    
    return $text;
  }
  
  
  /**
  * replaces inXML()
  * originaly in Form.class.php
  * which already is, or will be removed.
  * 
  * @param mixed $var
  * @return bool
  */
  public static function inXML(&$var)
  {
    return (bool)(isset($var) && strlen($var) > 0);
  }
  
  /***********************************************************/
  /***********************************************************/
  /*** to be deprecated soon, probably in FB 1.0 (Jo Morg) ***/
  /***********************************************************/
  /***********************************************************/
  public static function create_input_text(
                                              $id, $name, $value='', 
                                              $size='10', $maxlength='255', 
                                              $addttext='', $type='text', $required=false, $n=null
                                           )
  {
    $id = cms_htmlentities($id);
    $name = cms_htmlentities($name);
    $cssid = $name;
    
    if(intval($n))
    {
      $cssid .= '_' . intval($n);
    }
    
    $value = htmlspecialchars($value);
    $size = cms_htmlentities($size);
    $maxlength = cms_htmlentities($maxlength);

    $text = '<input type="' . $type . '" class="cms_' . $type
            . '" name="' . $id.$name . '" id="' . $cssid . '" value="' . $value . '" size="' . $size 
            . '" maxlength="'.$maxlength.'"';
            
    if ($addttext != '')
    {
      $text .= ' '.$addttext;
    }
    
    if ($required)
    {
      $text .= ' required="required"';
    }
    
    $text .= " />\n";
    return $text;
  }

  public static function create_input_checkbox($id, $name, $value='', $selectedvalue='', $addttext='', $n=null)
  {
    $id = cms_htmlentities($id);
    $name = cms_htmlentities($name);
  
    $cssid = $name;
    if(intval($n))
    {
      $cssid .= '_' . intval($n);
    }
    $value = cms_htmlentities($value);
    $selectedvalue = cms_htmlentities($selectedvalue);

    $text = '<input type="checkbox" class="cms_checkbox" name="'.$id.$name.'" id="'.$cssid.'" value="'.$value.'"';
    if ($selectedvalue == $value)
    {
      $text .= ' ' . 'checked="checked"';
    }
    if ($addttext != '')
    {
      $text .= ' '.$addttext;
    }
    $text .= " />\n";
    return $text;
  }

  public static function create_label($id, $name, $labeltext='', $addttext='')
  {
    $text = '<label class="cms_label" for="'.$name.'"';
    if ($addttext != '')
    {
      $text .= ' ' . $addttext;
    }
    $text .= '>'.$labeltext.'</label>'."\n";
    return $text;
  }

  public static function create_textarea($enablewysiwyg, $id, $name, $text, $cols='80', $rows='15', $addtext='', $required=false)
  {
    if($required)
    {
      $addtext .= ' required="required"';
    }
    return create_textarea($enablewysiwyg, $text, $id.$name, 'cms_textarea', $name, '', '', $cols, $rows, '', '',$addtext);
  }

  public static function create_input_dropdown($id, $name, $items, $selectedindex, $selectedvalue, $addttext='', $required=false)
  {
    $id = cms_htmlentities($id);
    $name = cms_htmlentities($name);
    $selectedindex = cms_htmlentities($selectedindex);
    $selectedvalue = cms_htmlentities($selectedvalue);

    $text = '<select class="cms_dropdown" name="'.$id.$name.'" id="'.$name.'"';
    if(!empty($addttext))
    {
      $text .= ' ' . $addttext;
    }
    if($required)
    {
      $text .= ' required="required"';
    }
    $text .= '>';
    $count = 0;
    if (is_array($items) && count($items) > 0)
    {
      foreach ($items as $key=>$value)
      {
        $text .= '<option value="'.$value.'"';
        if ($selectedindex == $count || $selectedvalue == $value)
        {
          $text .= ' ' . 'selected="selected"';
        }
        $text .= '>';
        $text .= $key;
        $text .= '</option>';
        $count++;
      }
    }
    $text .= '</select>'."\n";

    return $text;
  }  
}
?>
