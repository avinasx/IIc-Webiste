<?php
if (!isset($gCms)) exit;

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

   Code for groupdocs_viewer_dotnet "default" action

   -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
   
   Typically, this will display something from a template
   or do some other task.
   
*/

$this->smarty->assign('params',$params); # тег для закрытия формы

echo $this->ProcessTemplate('display.tpl'); # вызов шаблона 
?>
