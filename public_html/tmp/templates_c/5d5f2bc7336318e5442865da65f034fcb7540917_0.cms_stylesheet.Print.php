<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:32:42
  from "cms_stylesheet:Print" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5118920aa212_83946280',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d5f2bc7336318e5442865da65f034fcb7540917' => 
    array (
      0 => 'cms_stylesheet:Print',
      1 => '1510996286',
      2 => 'cms_stylesheet',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5118920aa212_83946280 (Smarty_Internal_Template $_smarty_tpl) {
?>
/* cmsms stylesheet: Print modified: 11/18/17 14:41:26 */
/*
Sections that are hidden when printing the page. We only want the content printed.
*/


body {
color: #000 !important; /* we want everything in black */
background-color:#fff !important; /* on white background */
font-family:arial; /* arial is nice to read ;) */
border:0 !important; /* no borders thanks */
}

/* This affects every tag */
* {
border:0 !important; /* again no borders on printouts */
}

/* 
no need for accessibility on printout. 
Mark all your elements in content you 
dont want to get printed with class="noprint"
*/
.accessibility,
.noprint
 {
display:none !important; 
}

/* 
remove all width constraints from content area
*/
div#content,
div#main {
display:block !important;
width:100% !important;
border:0 !important;
padding:1em !important;
}

/* hide everything else! */
div#header,
div#header h1 a,
div.breadcrumbs,
div#search,
div#footer,
div#menu_vert,
div#news,
div.noprint,
div.right49,
div.left49,
div#sidebar  {
   display: none !important;
}

img {
float:none; /* this makes images cause a pagebreak if it doesnt fit on the page */
}
<?php }
}
