<?php
namespace Elementor;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

class Widget_Advanced_Menu extends Widget_Base
{

    protected $_has_template_content = false;

    public function get_name()
    {
        return 'eael-advanced-menu';
    }

    public function get_title()
    {
        return esc_html__('EA Advanced Menu', 'essential-addons-elementor');
    }

    public function get_icon()
    {
        return 'eicon-menu-bar';
    }

    public function get_categories()
    {
        return ['essential-addons-elementor'];
    }

    protected function _register_skins()
    {
        require_once ESSENTIAL_ADDONS_EL_PATH . 'elements/advanced-menu/skin/default.php';
        require_once ESSENTIAL_ADDONS_EL_PATH . 'elements/advanced-menu/skin/one.php';
        require_once ESSENTIAL_ADDONS_EL_PATH . 'elements/advanced-menu/skin/two.php';
        require_once ESSENTIAL_ADDONS_EL_PATH . 'elements/advanced-menu/skin/three.php';
        require_once ESSENTIAL_ADDONS_EL_PATH . 'elements/advanced-menu/skin/four.php';
        require_once ESSENTIAL_ADDONS_EL_PATH . 'elements/advanced-menu/skin/five.php';
        require_once ESSENTIAL_ADDONS_EL_PATH . 'elements/advanced-menu/skin/six.php';
        require_once ESSENTIAL_ADDONS_EL_PATH . 'elements/advanced-menu/skin/seven.php';

        $this->add_skin(new Skin_Default($this));
        $this->add_skin(new Skin_One($this));
        $this->add_skin(new Skin_Two($this));
        $this->add_skin(new Skin_Three($this));
        $this->add_skin(new Skin_Four($this));
        $this->add_skin(new Skin_Five($this));
        $this->add_skin(new Skin_Six($this));
        $this->add_skin(new Skin_Seven($this));
    }

    protected function _register_controls()
    {
        /**
         * Content: General
         */
        $this->start_controls_section(
            'eael_advanced_menu_section_general',
            [
                'label' => esc_html__('General', 'essential-addons-elementor'),
            ]
        );

        $this->add_control(
            'eael_advanced_menu_menu',
            [
                'label' => esc_html__('Select Menu', 'essential-addons-elementor'),
                'description' => sprintf(__('Go to the <a href="%s" target="_blank">Menu screen</a> to manage your menus.', 'essential-addons-elementor'), admin_url('nav-menus.php')),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options' => eael_get_menus(),
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        /**
         * Style: Main Menu
         */
        $this->start_controls_section(
            'eael_advanced_menu_section_style_menu',
            [
                'label' => __('Main Menu', 'essential-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->end_controls_section();

        /**
         * Style: Dropdown Menu
         */
        $this->start_controls_section(
            'eael_advanced_menu_section_style_dropdown',
            [
                'label' => __('Dropdown Menu', 'essential-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->end_controls_section();
        
        /**
         * Style: Top Level Items
         */
        $this->start_controls_section(
            'eael_advanced_menu_section_style_top_level_item',
            [
                'label' => __('Top Level Item', 'essential-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->end_controls_section();

        /**
         * Style: Main Menu (Hover)
         */
        $this->start_controls_section(
            'eael_advanced_menu_section_style_dropdown_item',
            [
                'label' => __('Dropdown Item', 'essential-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->end_controls_section();
    }

}
Plugin::instance()->widgets_manager->register_widget_type(new Widget_Advanced_Menu());
