<?php
#-------------------------------------------------------------------------
# Module: Widgets
# Author: Chris Taylor
# Copyright: (C) 2016 Chris Taylor, chris@binnovative.co.uk
# Licence: GNU General Public License version 3
#          see /Widgets/doc/LICENCE.txt or <http://www.gnu.org/licenses/>
#-------------------------------------------------------------------------

class widget_tools {

    private $block_name = '';
    private $value = '';
    private $adding = false;
    private $options = array();
    private $alias = '';
    private $txt = '';

    //private $is_datepicker_lib_load = false;

    /**
     *
     * @param stribng $blockName
     * @param string $value
     * @param array $params
     * @param boolean $adding
     */
    public function __construct($blockName, $value, $params, $adding) {

        $this->block_name = $blockName;
        $this->alias = munge_string_to_url($blockName, true);
        $this->value = $value;
        $this->adding = $adding;

        $mod = \cms_utils::get_module('Widgets');

        // set options & all defaults
        $options = array(
            // 'allowduplicates' => false,
            // 'max_selected' => -1,
            'category' => '',
            'description' => '',
            'label_left' => '',
            'label_right' => ''
        );
        if ( !empty($params) ) {
            foreach ($options as $key => $option) {
                if ( isSet($params[$key]) && $params[$key]!='' )
                    $options[$key] = $params[$key];
            }
        }
        $this->options = $options;
    }

    /**
     *  get content block
     * @return string
     */
    public function get_content_block_input() {
        $mod = \cms_utils::get_module('Widgets');
        $description = $this->options['description'];
        $category = $this->options['category'];
        $labelLeft =  $this->options['label_left'];
        $labelRight =  $this->options['label_right'];

        $selectedList = explode(',', $this->value);
        $this->getWidgetList($category);
        $available = $this->widgetList;
        $selected = array();
        foreach ($selectedList as $item) {
            if ( array_key_exists($item, $available) ) {
                $selected[$item] = $available[$item];
                unset($available[$item]);
            }
        }

        $id = '';
        $name = $this->block_name;
        $selected_str = $this->value;
        // $allowduplicates = $this->options["allowduplicates"];
        // $max_selected = $this->options["max_selected"];
        $template = '';

        // smarty processing to display admin page
        $smarty = Smarty_CMS::get_instance();
        $tpl = $smarty->CreateTemplate($mod->GetTemplateResource('sortablelist_template.tpl'), null, null, $smarty);
        $tpl->assign('selectarea_prefix',$id.$name);
        $tpl->assign('selected_str',$selected_str);
        $tpl->assign('selected',$selected);
        $tpl->assign('available', $available);
        $tpl->assign('description', $description);
        $tpl->assign('labelLeft', $labelLeft);
        $tpl->assign('labelRight', $labelRight);
        $tpl->assign('mod',$mod);

        $cbTemplate = $tpl->fetch();

        return $cbTemplate;
    }


    private function getWidgetList($category_alias='') {
        $db = \cms_utils::get_db();
        if ($category_alias=='') {
            $sql = 'SELECT alias,title FROM '.CMS_DB_PREFIX.'module_widgets
                WHERE active=1';
        } else {
            $sql = 'SELECT alias,title FROM '.CMS_DB_PREFIX.'module_widgets W
                JOIN '.CMS_DB_PREFIX.'module_widgets_category WC
                ON W.category_id=WC.category_id
                WHERE W.active=1 AND WC.category_alias="'.$category_alias.'"';
        }

        $res = $db->GetAll($sql);
        $widgets = array();
        foreach ($res as $item) {
            $widgets[$item['alias']] = $item['title'];
        }
        $this->widgetList = $widgets;
    }


    public function get_content_block_js() {
        $js = '
            <script language="javascript" src="../modules/Widgets/lib/js/widget_content_block.js"></script>';

        return $js;
    }


}

?>