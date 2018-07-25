<?php
/* Smarty version 3.1.31, created on 2018-07-20 04:33:42
  from "cms_template:IIC News List View Template" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5118cea66599_61753187',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b26ac75fb07523c90769ae3a5bb238fdf1ee0e77' => 
    array (
      0 => 'cms_template:IIC News List View Template',
      1 => '1528335651',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5118cea66599_61753187 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_file_url')) require_once '/data/home/iic/public_html/lib/plugins/function.file_url.php';
if (!is_callable('smarty_function_uploads_url')) require_once '/data/home/iic/public_html/lib/plugins/function.uploads_url.php';
if (!is_callable('smarty_modifier_cms_escape')) require_once '/data/home/iic/public_html/lib/plugins/modifier.cms_escape.php';
if (!is_callable('smarty_modifier_cms_date_format')) require_once '/data/home/iic/public_html/lib/plugins/modifier.cms_date_format.php';
if (!is_callable('smarty_function_repeat')) require_once '/data/home/iic/public_html/lib/plugins/function.repeat.php';
?>
<!-- Breadcrumbs -->
<section class="breadcrumbs">
    <?php if (isset($_smarty_tpl->tpl_vars['newstitle']->value)) {?>
    <?php echo Navigator::function_plugin(array('action'=>'breadcrumbs','start_page'=>'home','template'=>'IIC Breadcrumbs'),$_smarty_tpl);
echo $_smarty_tpl->tpl_vars['newstitle']->value;?>

    <?php } else { ?>
    <?php echo Navigator::function_plugin(array('action'=>'breadcrumbs','start_page'=>'home','template'=>'IIC Breadcrumbs'),$_smarty_tpl);?>

    <?php }?>
</section>

<!-- The main blog Template -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="page-main">
                    <section class="events images" id="events">
                        <header><h2>Articles / News</h2></header><br>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'entry');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
?>
    <article class="event">
    <div class="event-thumbnail">
    <figure class="event-image">
    <div class="image-wrapper">
    <?php if (isset($_smarty_tpl->tpl_vars['entry']->value->fields)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['entry']->value->fields, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
    <?php if ($_smarty_tpl->tpl_vars['field']->value->type == 'file') {?>
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type == 'linkedfile' && $_smarty_tpl->tpl_vars['field']->value->name == 'image_list_view') {?>
        <?php if (!empty($_smarty_tpl->tpl_vars['field']->value->value)) {?>
            <img class="article-img" src="<?php echo smarty_function_file_url(array('file'=>$_smarty_tpl->tpl_vars['field']->value->value),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['entry']->value->image_list_view;?>
"/> <?php
break 1;?>
        <?php }?> 
    <?php } else { ?>
        <img class="article-img" src="<?php echo smarty_function_uploads_url(array(),$_smarty_tpl);?>
/images/Defaults/Delhi_University's_official_logo.png" alt="IIC Default"/>
    <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }?>

                                    </div>
                                </figure>
                            </div>

                            <aside>
    <!-- Begin Template -->
    <header>
    <a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->moreurl;?>
" title="<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['entry']->value->title,'htmlall');?>
"><?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['entry']->value->title);?>
</a>
                                </header>


    <?php if ($_smarty_tpl->tpl_vars['entry']->value->postdate) {?>
    <div class="NewsSummaryPostdate additional-info">
    <span class="fa fa-calendar"></span>
    <?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['entry']->value->postdate);?>

                                </div>
                                <?php }?>



                                <div class="NewsSummaryCategory">
    <!-- <?php echo $_smarty_tpl->tpl_vars['category_label']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['entry']->value->category;?>
 -->
                                </div>

                                <?php if ($_smarty_tpl->tpl_vars['entry']->value->author) {?>
    <div class="NewsSummaryAuthor">
    <?php echo $_smarty_tpl->tpl_vars['author_label']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['entry']->value->author;?>

                                </div>
                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['entry']->value->summary) {?>
    
    <div class="NewsSummarySummary description">
    <?php echo $_smarty_tpl->tpl_vars['entry']->value->summary;?>

                                </div>

                                <?php } elseif ($_smarty_tpl->tpl_vars['entry']->value->content) {?>
    
    <div class="NewsSummaryContent">
    <?php echo $_smarty_tpl->tpl_vars['entry']->value->content;?>

                                </div>
                                <?php }?>

                                <?php if (isset($_smarty_tpl->tpl_vars['entry']->value->extra)) {?>
    <div class="NewsSummaryExtra">
    <?php echo $_smarty_tpl->tpl_vars['entry']->value->extra;?>

    
                                </div>
                                <?php }?>
                                <?php if (isset($_smarty_tpl->tpl_vars['entry']->value->fields)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['entry']->value->fields, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
    <div class="NewsSummaryField">
    <?php if ($_smarty_tpl->tpl_vars['field']->value->type == 'file') {?>
    <?php if (isset($_smarty_tpl->tpl_vars['field']->value->value) && $_smarty_tpl->tpl_vars['field']->value->value) {?>
    <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['entry']->value->file_location;?>
/<?php echo $_smarty_tpl->tpl_vars['field']->value->value;?>
"/> -->
                                    <?php }?>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type == 'linkedfile') {?>
                                    
                                    <?php if (!empty($_smarty_tpl->tpl_vars['field']->value->value)) {?>
    <!-- <img src="<?php echo smarty_function_file_url(array('file'=>$_smarty_tpl->tpl_vars['field']->value->value),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['field']->value->value;?>
"/> -->
                                    <?php }?>
                                    <?php } else { ?>
                                    <?php echo $_smarty_tpl->tpl_vars['field']->value->name;?>
:&nbsp;<?php echo $_smarty_tpl->tpl_vars['field']->value->value;?>

                                    <?php }?>
                                </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                                <?php }?>

                                <a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->moreurl;?>
" title="<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['entry']->value->title,'htmlall');?>
" class="read-more">Read More</a>
                                <!-- End News Display Template -->
                            </aside>
                        </article>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                    </section>
<section>
    <center>
        <!-- news pagination -->
        <?php if ($_smarty_tpl->tpl_vars['pagecount']->value > 1) {?>
            <span class='paginate'>
                <?php if ($_smarty_tpl->tpl_vars['pagenumber']->value > 1) {?>
                    <?php echo $_smarty_tpl->tpl_vars['firstpage']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['prevpage']->value;?>

                <?php }?>
                <?php echo $_smarty_tpl->tpl_vars['pagetext']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['pagenumber']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['oftext']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['pagecount']->value;?>

                <?php if ($_smarty_tpl->tpl_vars['pagenumber']->value < $_smarty_tpl->tpl_vars['pagecount']->value) {?>
                    <?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['lastpage']->value;?>

                <?php }?>
            </span>
        <?php }?>
</ul>
    </center>
    <!-- .news-summary //-->
</section>
                </div>
            </div>

            <div class="col-md-4">
                <div id="sidebar" class="sidebar">
                    <div id="recentpost_widget-2" class="widget widget_recentpost_widget"><h2>Latest News</h2>
                        <div class="section-content news-small">

                            <article>
                                <?php if ($_smarty_tpl->tpl_vars['pagecount']->value > 1) {?>
                                    <!-- <p>
                                         <?php if ($_smarty_tpl->tpl_vars['pagenumber']->value > 1) {?>
                                         <?php echo $_smarty_tpl->tpl_vars['firstpage']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['prevpage']->value;?>
&nbsp;
                                         <?php }?>
                                         <?php echo $_smarty_tpl->tpl_vars['pagetext']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['pagenumber']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['oftext']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['pagecount']->value;?>

                                         <?php if ($_smarty_tpl->tpl_vars['pagenumber']->value < $_smarty_tpl->tpl_vars['pagecount']->value) {?>
                                         &nbsp;<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['lastpage']->value;?>

                                         <?php }?>
                                         </p> -->
                                <?php }?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'entry');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
?>
                                    <div class="NewsSummary">
                                        <?php if ($_smarty_tpl->tpl_vars['entry']->value->postdate) {?>
                                            <figure class="date"><i class="fa fa-file-o"></i>
                                                <?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['entry']->value->postdate);?>

                                            </figure>
                                        <?php }?>
                                        <header><a href="<?php echo $_smarty_tpl->tpl_vars['entry']->value->moreurl;?>
" title="<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['entry']->value->title,'htmlall');?>
"><?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['entry']->value->title);?>
</a></header>


                                        
                                        <?php if ($_smarty_tpl->tpl_vars['entry']->value->summary) {?>
                                            
                                            
                                        <?php } elseif ($_smarty_tpl->tpl_vars['entry']->value->content) {?>
                                            
                                            <div class="NewsSummaryContent">
                                                <?php echo $_smarty_tpl->tpl_vars['entry']->value->content;?>

                                            </div>
                                        <?php }?>

                                        <?php if (isset($_smarty_tpl->tpl_vars['entry']->value->extra)) {?>
                                            <div class="NewsSummaryExtra">
                                                <?php echo $_smarty_tpl->tpl_vars['entry']->value->extra;?>

                                                
                                            </div>
                                        <?php }?>
                                        <?php if (isset($_smarty_tpl->tpl_vars['entry']->value->fields)) {?>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['entry']->value->fields, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>
                                                <!-- <div class="NewsSummaryField">
                                                     <?php if ($_smarty_tpl->tpl_vars['field']->value->type == 'file') {?>
                                                     <?php if (isset($_smarty_tpl->tpl_vars['field']->value->value) && $_smarty_tpl->tpl_vars['field']->value->value) {?>
                                                     <img src="<?php echo $_smarty_tpl->tpl_vars['entry']->value->file_location;?>
/<?php echo $_smarty_tpl->tpl_vars['field']->value->value;?>
"/>
                                                     <?php }?>
                                                     <?php } elseif ($_smarty_tpl->tpl_vars['field']->value->type == 'linkedfile') {?>
                                                     
                                                     <?php if (!empty($_smarty_tpl->tpl_vars['field']->value->value)) {?>
                                                     <img src="<?php echo smarty_function_file_url(array('file'=>$_smarty_tpl->tpl_vars['field']->value->value),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['field']->value->value;?>
"/>
                                                     <?php }?>
                                                     <?php } else { ?>
                                                     <?php echo $_smarty_tpl->tpl_vars['field']->value->name;?>
:&nbsp;<?php echo $_smarty_tpl->tpl_vars['field']->value->value;?>

                                                     <?php }?>
                                                     </div> -->
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                                        <?php }?>

                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                                <!-- End News Display Template -->
                            </article>

                        </div>
                    </div>


                    <div id="archives-2" class="widget widget_archive"><h2>Archives</h2>
                        <?php if ($_smarty_tpl->tpl_vars['count']->value > 0) {?>
                            <ul class="list1">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cats']->value, 'node');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
?>
                                    <?php if ($_smarty_tpl->tpl_vars['node']->value['depth'] > $_smarty_tpl->tpl_vars['node']->value['prevdepth']) {?>
                                        <?php echo smarty_function_repeat(array('string'=>"<ul>",'times'=>$_smarty_tpl->tpl_vars['node']->value['depth']-$_smarty_tpl->tpl_vars['node']->value['prevdepth']),$_smarty_tpl);?>

                                    <?php } elseif ($_smarty_tpl->tpl_vars['node']->value['depth'] < $_smarty_tpl->tpl_vars['node']->value['prevdepth']) {?>
                                        <?php echo smarty_function_repeat(array('string'=>"</li></ul>",'times'=>$_smarty_tpl->tpl_vars['node']->value['prevdepth']-$_smarty_tpl->tpl_vars['node']->value['depth']),$_smarty_tpl);?>

                            </li>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['node']->value['index'] > 0) {?></li>
                                    <?php }?>
                                    <li class="newscategory">
                                        <?php if ($_smarty_tpl->tpl_vars['node']->value['count'] > 0) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['node']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['node']->value['news_category_name'];?>
</a> (<?php echo $_smarty_tpl->tpl_vars['node']->value['count'];?>
)<?php } else { ?><span><?php echo $_smarty_tpl->tpl_vars['node']->value['news_category_name'];?>
 (0)</span><?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                                <?php echo smarty_function_repeat(array('string'=>"</li></ul>",'times'=>$_smarty_tpl->tpl_vars['node']->value['depth']-1),$_smarty_tpl);?>
</li>
                            </ul>
                        <?php }?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
