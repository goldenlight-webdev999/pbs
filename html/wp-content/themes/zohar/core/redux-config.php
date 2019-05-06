<?php
if ( ! class_exists( 'GT3_Core_Elementor' ) || ! class_exists( 'Redux' ) ) {
	return;
}

$theme    = wp_get_theme();
$opt_name = 'zohar';

$args = array(
	'opt_name'             => $opt_name,
	'display_name'         => $theme->get( 'Name' ),
	'display_version'      => $theme->get( 'Version' ),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Theme Options', 'zohar' ),
	'page_title'           => esc_html__( 'Theme Options', 'zohar' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => true,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-admin-generic',
	'admin_bar_priority'   => 50,
	'global_variable'      => '',
	'dev_mode'             => false,
	'update_notice'        => true,
	'customizer'           => false,
	'page_priority'        => null,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => 'dashicons-admin-generic',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => '',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'show_import_export'   => true,
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	'output_tag'           => true,
	'database'             => '',
	'use_cdn'              => true,
);


Redux::setArgs( $opt_name, $args );

// -> START Basic Fields
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'General', 'zohar' ),
	'id'               => 'general',
	'customizer_width' => '400px',
	'icon'             => 'el el-home',
	'fields'           => array(
		array(
			'id'      => 'responsive',
			'type'    => 'switch',
			'title'   => esc_html__( 'Responsive', 'zohar' ),
			'default' => true,
		),
		array(
			'id'      => 'page_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Page Comments', 'zohar' ),
			'default' => true,
		),
		array(
			'id'      => 'back_to_top',
			'type'    => 'switch',
			'title'   => esc_html__( 'Back to Top', 'zohar' ),
			'default' => false,
		),
		array(
			'id'    => 'team_slug',
			'type'  => 'text',
			'title' => esc_html__( 'Team Slug', 'zohar' ),
		),
		array(
			'id'    => 'portfolio_slug',
			'type'  => 'text',
			'title' => esc_html__( 'Portfolio Slug', 'zohar' ),
		),
		array(
			'id'    => 'page_404_bg',
			'type'  => 'media',
			'title' => esc_html__( 'Page 404 Background Image', 'zohar' ),
		),
		array(
			'id'      => 'add_default_typography_sapcing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Add Default Typography Spacings', 'zohar' ),
			'default' => false,
		),
		array(
			'id'      => 'disable_right_click',
			'type'    => 'switch',
			'title'   => esc_html__( 'Disable right click', 'zohar' ),
			'default' => false,
		),
		array(
			'id'       => 'disable_right_click_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Right click alert text', 'zohar' ),
			'default'  => esc_html__( 'The right click is disabled. Your content is protected. You can configure this option in the theme.', 'zohar' ),
			'required' => array( 'disable_right_click', '=', '1' ),
		),
		array(
			'id'       => 'custom_js',
			'type'     => 'ace_editor',
			'title'    => esc_html__( 'Custom JS', 'zohar' ),
			'subtitle' => esc_html__( 'Paste your JS code here.', 'zohar' ),
			'mode'     => 'javascript',
			'theme'    => 'chrome',
			'default'  => "jQuery(document).ready(function(){\n\n});"
		),
		array(
			'id'       => 'header_custom_js',
			'type'     => 'ace_editor',
			'title'    => esc_html__( 'Custom JS', 'zohar' ),
			'subtitle' => esc_html__( 'Code to be added inside HEAD tag', 'zohar' ),
			'mode'     => 'html',
			'theme'    => 'chrome',
			'default'  => "<script type='text/javascript'>\njQuery(document).ready(function(){\n\n});\n</script>"
		),
	),
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Preloader', 'zohar' ),
	'id'               => 'preloader-option',
	'customizer_width' => '400px',
	'icon'             => 'el-icon-graph',
	'fields'           => array(
		array(
			'id'      => 'preloader',
			'type'    => 'switch',
			'title'   => esc_html__( 'Preloader', 'zohar' ),
			'default' => false,
		),
		array(
			'id'       => 'preloader_type',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Preloader type', 'zohar' ),
			'options'  => array(
				'linear' => esc_html__( 'Linear', 'zohar' ),
				'circle' => esc_html__( 'Circle', 'zohar' ),
				'theme'  => esc_html__( 'Theme', 'zohar' ),
			),
			'default'  => 'circle',
			'required' => array( 'preloader', '=', '1' ),
		),
		array(
			'id'          => 'preloader_background',
			'type'        => 'color',
			'title'       => esc_html__( 'Preloader Background', 'zohar' ),
			'subtitle'    => esc_html__( 'Set Preloader Background', 'zohar' ),
			'default'     => '#ffffff',
			'transparent' => false,
			'required'    => array( 'preloader', '=', '1' ),
		),
		array(
			'id'          => 'preloader_item_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Preloader Stroke Background Color', 'zohar' ),
			'subtitle'    => esc_html__( 'Set Preloader Stroke Background Color', 'zohar' ),
			'default'     => '#98a1a9',
			'transparent' => false,
			'required'    => array( 'preloader', '=', '1' ),
		),
		array(
			'id'          => 'preloader_item_color2',
			'type'        => 'color',
			'title'       => esc_html__( 'Preloader Stroke Foreground Color', 'zohar' ),
			'subtitle'    => esc_html__( 'Set Preloader Stroke Foreground Color', 'zohar' ),
			'default'     => '#e94e76',
			'transparent' => false,
			'required'    => array( 'preloader', '=', '1' ),
		),
		array(
			'id'          => 'preloader_item_width',
			'type'        => 'dimensions',
			'title'       => esc_html__( 'Preloader Circle Width', 'zohar' ),
			'subtitle'    => esc_html__( 'Set Preloader Circle Width in px (Diameter)', 'zohar' ),
			'units'       => false,
			'height'      => false,
			'default'     => array(
				'width' => '140',
			),
			'transparent' => false,
			'required'    => array(
				array( 'preloader', '=', '1' ),
				array( 'preloader_type', '=', array( 'circle', 'theme' ) )
			),
		),
		array(
			'id'          => 'preloader_item_stroke',
			'type'        => 'dimensions',
			'title'       => esc_html__( 'Preloader Circle Stroke Width', 'zohar' ),
			'subtitle'    => esc_html__( 'Set Preloader Circle Stroke Width in px', 'zohar' ),
			'units'       => false,
			'height'      => false,
			'default'     => array(
				'width' => '3'
			),
			'transparent' => false,
			'required'    => array(
				array( 'preloader', '=', '1' ),
				array( 'preloader_type', '=', array( 'circle', 'theme' ) )
			),
		),
		array(
			'id'       => 'preloader_item_logo',
			'type'     => 'media',
			'title'    => esc_html__( 'Preloader Logo', 'zohar' ),
			'required' => array( 'preloader', '=', '1' ),
		),
		array(
			'id'          => 'preloader_item_logo_width',
			'type'        => 'dimensions',
			'title'       => esc_html__( 'Preloader Logo Width', 'zohar' ),
			'subtitle'    => esc_html__( 'Set Preloader Logo Width', 'zohar' ),
			'units'       => array( 'px', '%' ),
			'height'      => false,
			'default'     => array(
				'width' => '45',
				'units' => 'px',
			),
			'transparent' => false,
			'required'    => array(
				array( 'preloader', '=', '1' ),
				array( 'preloader_type', '=', array( 'circle', 'theme' ) )
			),
		),
		array(
			'id'       => 'preloader_full',
			'type'     => 'switch',
			'title'    => esc_html__( 'Preloader Fullscreen', 'zohar' ),
			'default'  => true,
			'required' => array( 'preloader', '=', '1' ),
		),
	)
) );


// HEADER
if ( function_exists( 'gt3_header_presets' ) ) {
	$presets         = gt3_header_presets();
	$header_preset_1 = $presets['header_preset_1'];
	$header_preset_2 = $presets['header_preset_2'];
	$header_preset_3 = $presets['header_preset_3'];
	$header_preset_4 = $presets['header_preset_4'];
	$header_preset_5 = $presets['header_preset_5'];
}

function gt3_getMenuList() {
	$menus     = wp_get_nav_menus();
	$menu_list = array();

	foreach ( $menus as $menu => $menu_obj ) {
		$menu_list[ $menu_obj->slug ] = $menu_obj->name;
	}

	return $menu_list;
}


$def_header_option = array(
	'all_item'              => array(
		'title'   => 'All Item',
		'layout'  => 'all',
		'content' => array(
			'search'         => array(
				'title'        => 'Search',
				'has_settings' => false,
			),
			'login'          => array(
				'title'        => 'Login',
				'has_settings' => false,
			),
			'cart'           => array(
				'title'        => 'Cart',
				'has_settings' => false,
			),
			'burger_sidebar' => array(
				'title'        => 'Burger Sidebar',
				'has_settings' => true,
			),
			'text1'          => array(
				'title'        => 'Text/HTML 1',
				'has_settings' => true,
			),
			'text2'          => array(
				'title'        => 'Text/HTML 2',
				'has_settings' => true,
			),

			'text3' => array(
				'title'        => 'Text/HTML 3',
				'has_settings' => true,
			),
			'text4' => array(
				'title'        => 'Text/HTML 4',
				'has_settings' => true,
			),

			'text5'        => array(
				'title'        => 'Text/HTML 5',
				'has_settings' => true,
			),
			'text6'        => array(
				'title'        => 'Text/HTML 6',
				'has_settings' => true,
			),
			'delimiter1'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter2'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter3'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter4'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter5'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter6'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'empty_space1' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
			'empty_space2' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
			'empty_space3' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
			'empty_space4' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
			'empty_space5' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
		),
	),
	'top_left'              => array(
		'title'        => 'Top Left',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'content'      => array(),
	),
	'top_center'            => array(
		'title'        => 'Top Center',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'content'      => array(),
	),
	'top_right'             => array(
		'title'        => 'Top Right',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'content'      => array(),
	),
	'middle_left'           => array(
		'title'        => 'Middle Left',
		'has_settings' => true,
		'layout'       => 'one-thirds clear-item',
		'content'      => array(
			'logo' => array(
				'title'        => 'Logo',
				'has_settings' => true,
			),
		),
	),
	'middle_center'         => array(
		'title'        => 'Middle Center',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'content'      => array(),
	),
	'middle_right'          => array(
		'title'        => 'Middle Right',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'content'      => array(
			'menu' => array(
				'title'        => 'Menu',
				'has_settings' => true,
			),
		),
	),
	'bottom_left'           => array(
		'title'        => 'Bottom Left',
		'has_settings' => true,
		'layout'       => 'one-thirds clear-item',
		'content'      => array(),
	),
	'bottom_center'         => array(
		'title'        => 'Bottom Center',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'content'      => array(),
	),
	'bottom_right'          => array(
		'title'        => 'Bottom Right',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'content'      => array(),
	),

	/// tablet
	'all_item__tablet'      => array(
		'title'       => 'All Item',
		'layout'      => 'all',
		'extra_class' => 'tablet',
		'content'     => array(
			'logo'           => array(
				'title'        => 'Logo',
				'has_settings' => true,
			),
			'menu'           => array(
				'title'        => 'Menu',
				'has_settings' => true,
			),
			'search'         => array(
				'title'        => 'Search',
				'has_settings' => false,
			),
			'login'          => array(
				'title'        => 'Login',
				'has_settings' => false,
			),
			'cart'           => array(
				'title'        => 'Cart',
				'has_settings' => false,
			),
			'burger_sidebar' => array(
				'title'        => 'Burger Sidebar',
				'has_settings' => true,
			),
			'text1'          => array(
				'title'        => 'Text/HTML 1',
				'has_settings' => true,
			),
			'text2'          => array(
				'title'        => 'Text/HTML 2',
				'has_settings' => true,
			),

			'text3' => array(
				'title'        => 'Text/HTML 3',
				'has_settings' => true,
			),
			'text4' => array(
				'title'        => 'Text/HTML 4',
				'has_settings' => true,
			),

			'text5'        => array(
				'title'        => 'Text/HTML 5',
				'has_settings' => true,
			),
			'text6'        => array(
				'title'        => 'Text/HTML 6',
				'has_settings' => true,
			),
			'delimiter1'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter2'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter3'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter4'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter5'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter6'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'empty_space1' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
			'empty_space2' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
			'empty_space3' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
			'empty_space4' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
			'empty_space5' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
		),
	),
	'top_left__tablet'      => array(
		'title'        => 'Top Left',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'tablet',
		'content'      => array(),
	),
	'top_center__tablet'    => array(
		'title'        => 'Top Center',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'tablet',
		'content'      => array(),
	),
	'top_right__tablet'     => array(
		'title'        => 'Top Right',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'tablet',
		'content'      => array(),
	),
	'middle_left__tablet'   => array(
		'title'        => 'Middle Left',
		'has_settings' => true,
		'layout'       => 'one-thirds clear-item',
		'extra_class'  => 'tablet',
		'content'      => array(),
	),
	'middle_center__tablet' => array(
		'title'        => 'Middle Center',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'tablet',
		'content'      => array(),
	),
	'middle_right__tablet'  => array(
		'title'        => 'Middle Right',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'tablet',
		'content'      => array(),
	),
	'bottom_left__tablet'   => array(
		'title'        => 'Bottom Left',
		'has_settings' => true,
		'layout'       => 'one-thirds clear-item',
		'extra_class'  => 'tablet',
		'content'      => array(),
	),
	'bottom_center__tablet' => array(
		'title'        => 'Bottom Center',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'tablet',
		'content'      => array(),
	),
	'bottom_right__tablet'  => array(
		'title'        => 'Bottom Right',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'tablet',
		'content'      => array(),
	),


	/// mobile
	'all_item__mobile'      => array(
		'title'       => 'All Item',
		'layout'      => 'all',
		'extra_class' => 'mobile',
		'content'     => array(
			'logo'           => array(
				'title'        => 'Logo',
				'has_settings' => true,
			),
			'menu'           => array(
				'title'        => 'Menu',
				'has_settings' => true,
			),
			'search'         => array(
				'title'        => 'Search',
				'has_settings' => false,
			),
			'login'          => array(
				'title'        => 'Login',
				'has_settings' => false,
			),
			'cart'           => array(
				'title'        => 'Cart',
				'has_settings' => false,
			),
			'burger_sidebar' => array(
				'title'        => 'Burger Sidebar',
				'has_settings' => true,
			),
			'text1'          => array(
				'title'        => 'Text/HTML 1',
				'has_settings' => true,
			),
			'text2'          => array(
				'title'        => 'Text/HTML 2',
				'has_settings' => true,
			),

			'text3' => array(
				'title'        => 'Text/HTML 3',
				'has_settings' => true,
			),
			'text4' => array(
				'title'        => 'Text/HTML 4',
				'has_settings' => true,
			),

			'text5'        => array(
				'title'        => 'Text/HTML 5',
				'has_settings' => true,
			),
			'text6'        => array(
				'title'        => 'Text/HTML 6',
				'has_settings' => true,
			),
			'delimiter1'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter2'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter3'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter4'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter5'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'delimiter6'   => array(
				'title'        => '|',
				'has_settings' => true,
			),
			'empty_space1' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
			'empty_space2' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
			'empty_space3' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
			'empty_space4' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
			'empty_space5' => array(
				'title'        => '&#8592;&#8594;',
				'has_settings' => false,
			),
		),
	),
	'top_left__mobile'      => array(
		'title'        => 'Top Left',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'mobile',
		'content'      => array(),
	),
	'top_center__mobile'    => array(
		'title'        => 'Top Center',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'mobile',
		'content'      => array(),
	),
	'top_right__mobile'     => array(
		'title'        => 'Top Right',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'mobile',
		'content'      => array(),
	),
	'middle_left__mobile'   => array(
		'title'        => 'Middle Left',
		'has_settings' => true,
		'layout'       => 'one-thirds clear-item',
		'extra_class'  => 'mobile',
		'content'      => array(),
	),
	'middle_center__mobile' => array(
		'title'        => 'Middle Center',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'mobile',
		'content'      => array(),
	),
	'middle_right__mobile'  => array(
		'title'        => 'Middle Right',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'mobile',
		'content'      => array(),
	),
	'bottom_left__mobile'   => array(
		'title'        => 'Bottom Left',
		'has_settings' => true,
		'layout'       => 'one-thirds clear-item',
		'extra_class'  => 'mobile',
		'content'      => array(),
	),
	'bottom_center__mobile' => array(
		'title'        => 'Bottom Center',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'mobile',
		'content'      => array(),
	),
	'bottom_right__mobile'  => array(
		'title'        => 'Bottom Right',
		'has_settings' => true,
		'layout'       => 'one-thirds',
		'extra_class'  => 'mobile',
		'content'      => array(),
	),
);

$options = array(
	array(
		'id'               => 'gt3_header_builder_id',
		'type'             => 'gt3_header_builder',
		'full_width'       => true,
		'presets'          => 'default',
		'reload_on_change' => true,
		'options'          => array(
			'all_item'         => array(
				'title'   => 'All Item',
				'layout'  => 'all',
				'content' => array(
					'search'         => array(
						'title'        => 'Search',
						'has_settings' => false,
					),
					'login'          => array(
						'title'        => 'Login',
						'has_settings' => false,
					),
					'cart'           => array(
						'title'        => 'Cart',
						'has_settings' => false,
					),
					'burger_sidebar' => array(
						'title'        => 'Burger Sidebar',
						'has_settings' => true,
					),
					'text1'          => array(
						'title'        => 'Text/HTML 1',
						'has_settings' => true,
					),
					'text2'          => array(
						'title'        => 'Text/HTML 2',
						'has_settings' => true,
					),
					'text3'          => array(
						'title'        => 'Text/HTML 3',
						'has_settings' => true,
					),
					'text4'          => array(
						'title'        => 'Text/HTML 4',
						'has_settings' => true,
					),
					'text5'          => array(
						'title'        => 'Text/HTML 5',
						'has_settings' => true,
					),
					'text6'          => array(
						'title'        => 'Text/HTML 6',
						'has_settings' => true,
					),
					'delimiter1'     => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter2'     => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter3'     => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter4'     => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter5'     => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter6'     => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'empty_space1'   => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
					'empty_space2'   => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
					'empty_space3'   => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
					'empty_space4'   => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
					'empty_space5'   => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
				),
			),
			'top_left'         => array(
				'title'        => 'Top Left',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(),
			),
			'top_center'       => array(
				'title'        => 'Top Center',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(),
			),
			'top_right'        => array(
				'title'        => 'Top Right',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(),
			),
			'middle_left'      => array(
				'title'        => 'Middle Left',
				'has_settings' => true,
				'layout'       => 'one-thirds clear-item',
				'content'      => array(
					'logo' => array(
						'title'        => 'Logo',
						'has_settings' => true,
					),
				),
			),
			'middle_center'    => array(
				'title'        => 'Middle Center',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(),
			),
			'middle_right'     => array(
				'title'        => 'Middle Right',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(
					'menu' => array(
						'title'        => 'Menu',
						'has_settings' => true,
					),
				),
			),
			'bottom_left'      => array(
				'title'        => 'Bottom Left',
				'has_settings' => true,
				'layout'       => 'one-thirds clear-item',
				'content'      => array(),
			),
			'bottom_center'    => array(
				'title'        => 'Bottom Center',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(),
			),
			'bottom_right'     => array(
				'title'        => 'Bottom Right',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(),
			),

			/// tablet
			'all_item__tablet' => array(
				'title'       => 'All Item',
				'layout'      => 'all',
				'extra_class' => 'tablet',
				'content'     => array(
					'logo'           => array(
						'title'        => 'Logo',
						'has_settings' => true,
					),
					'menu'           => array(
						'title'        => 'Menu',
						'has_settings' => true,
					),
					'search'         => array(
						'title'        => 'Search',
						'has_settings' => false,
					),
					'login'          => array(
						'title'        => 'Login',
						'has_settings' => false,
					),
					'cart'           => array(
						'title'        => 'Cart',
						'has_settings' => false,
					),
					'burger_sidebar' => array(
						'title'        => 'Burger Sidebar',
						'has_settings' => true,
					),
					'text1'          => array(
						'title'        => 'Text/HTML 1',
						'has_settings' => true,
					),
					'text2'          => array(
						'title'        => 'Text/HTML 2',
						'has_settings' => true,
					),

					'text3' => array(
						'title'        => 'Text/HTML 3',
						'has_settings' => true,
					),
					'text4' => array(
						'title'        => 'Text/HTML 4',
						'has_settings' => true,
					),

					'text5'        => array(
						'title'        => 'Text/HTML 5',
						'has_settings' => true,
					),
					'text6'        => array(
						'title'        => 'Text/HTML 6',
						'has_settings' => true,
					),
					'delimiter1'   => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter2'   => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter3'   => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter4'   => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter5'   => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter6'   => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'empty_space1' => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
					'empty_space2' => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
					'empty_space3' => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
					'empty_space4' => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
					'empty_space5' => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
				),
			),


			'top_left__tablet'      => array(
				'title'        => 'Top Left',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'tablet',
				'content'      => array(),
			),
			'top_center__tablet'    => array(
				'title'        => 'Top Center',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'tablet',
				'content'      => array(),
			),
			'top_right__tablet'     => array(
				'title'        => 'Top Right',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'tablet',
				'content'      => array(),
			),
			'middle_left__tablet'   => array(
				'title'        => 'Middle Left',
				'has_settings' => true,
				'layout'       => 'one-thirds clear-item',
				'extra_class'  => 'tablet',
				'content'      => array(),
			),
			'middle_center__tablet' => array(
				'title'        => 'Middle Center',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'tablet',
				'content'      => array(),
			),
			'middle_right__tablet'  => array(
				'title'        => 'Middle Right',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'tablet',
				'content'      => array(),
			),
			'bottom_left__tablet'   => array(
				'title'        => 'Bottom Left',
				'has_settings' => true,
				'layout'       => 'one-thirds clear-item',
				'extra_class'  => 'tablet',
				'content'      => array(),
			),
			'bottom_center__tablet' => array(
				'title'        => 'Bottom Center',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'tablet',
				'content'      => array(),
			),
			'bottom_right__tablet'  => array(
				'title'        => 'Bottom Right',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'tablet',
				'content'      => array(),
			),

			/// mobile
			'all_item__mobile'      => array(
				'title'       => 'All Item',
				'layout'      => 'all',
				'extra_class' => 'mobile',
				'content'     => array(
					'logo'           => array(
						'title'        => 'Logo',
						'has_settings' => true,
					),
					'menu'           => array(
						'title'        => 'Menu',
						'has_settings' => true,
					),
					'search'         => array(
						'title'        => 'Search',
						'has_settings' => false,
					),
					'login'          => array(
						'title'        => 'Login',
						'has_settings' => false,
					),
					'cart'           => array(
						'title'        => 'Cart',
						'has_settings' => false,
					),
					'burger_sidebar' => array(
						'title'        => 'Burger Sidebar',
						'has_settings' => true,
					),
					'text1'          => array(
						'title'        => 'Text/HTML 1',
						'has_settings' => true,
					),
					'text2'          => array(
						'title'        => 'Text/HTML 2',
						'has_settings' => true,
					),

					'text3' => array(
						'title'        => 'Text/HTML 3',
						'has_settings' => true,
					),
					'text4' => array(
						'title'        => 'Text/HTML 4',
						'has_settings' => true,
					),

					'text5'        => array(
						'title'        => 'Text/HTML 5',
						'has_settings' => true,
					),
					'text6'        => array(
						'title'        => 'Text/HTML 6',
						'has_settings' => true,
					),
					'delimiter1'   => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter2'   => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter3'   => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter4'   => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter5'   => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter6'   => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'empty_space1' => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
					'empty_space2' => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
					'empty_space3' => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
					'empty_space4' => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
					'empty_space5' => array(
						'title'        => '&#8592;&#8594;',
						'has_settings' => false,
					),
				),
			),
			'top_left__mobile'      => array(
				'title'        => 'Top Left',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'mobile',
				'content'      => array(),
			),
			'top_center__mobile'    => array(
				'title'        => 'Top Center',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'mobile',
				'content'      => array(),
			),
			'top_right__mobile'     => array(
				'title'        => 'Top Right',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'mobile',
				'content'      => array(),
			),
			'middle_left__mobile'   => array(
				'title'        => 'Middle Left',
				'has_settings' => true,
				'layout'       => 'one-thirds clear-item',
				'extra_class'  => 'mobile',
				'content'      => array(),
			),
			'middle_center__mobile' => array(
				'title'        => 'Middle Center',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'mobile',
				'content'      => array(),
			),
			'middle_right__mobile'  => array(
				'title'        => 'Middle Right',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'mobile',
				'content'      => array(),
			),
			'bottom_left__mobile'   => array(
				'title'        => 'Bottom Left',
				'has_settings' => true,
				'layout'       => 'one-thirds clear-item',
				'extra_class'  => 'mobile',
				'content'      => array(),
			),
			'bottom_center__mobile' => array(
				'title'        => 'Bottom Center',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'mobile',
				'content'      => array(),
			),
			'bottom_right__mobile'  => array(
				'title'        => 'Bottom Right',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'extra_class'  => 'mobile',
				'content'      => array(),
			),
		),
		'default'          => array(
			'all_item'      => array(
				'title'   => 'All Item',
				'layout'  => 'all',
				'content' => array(
					'search'         => array(
						'title'        => 'Search',
						'has_settings' => false,
					),
					'login'          => array(
						'title'        => 'Login',
						'has_settings' => false,
					),
					'cart'           => array(
						'title'        => 'Cart',
						'has_settings' => false,
					),
					'burger_sidebar' => array(
						'title'        => 'Burger Sidebar',
						'has_settings' => true,
					),
					'text1'          => array(
						'title'        => 'Text/HTML 1',
						'has_settings' => true,
					),
					'text2'          => array(
						'title'        => 'Text/HTML 2',
						'has_settings' => true,
					),

					'text3' => array(
						'title'        => 'Text/HTML 3',
						'has_settings' => true,
					),
					'text4' => array(
						'title'        => 'Text/HTML 4',
						'has_settings' => true,
					),

					'text5'      => array(
						'title'        => 'Text/HTML 5',
						'has_settings' => true,
					),
					'text6'      => array(
						'title'        => 'Text/HTML 6',
						'has_settings' => true,
					),
					'delimiter1' => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter2' => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter3' => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter4' => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter5' => array(
						'title'        => '|',
						'has_settings' => true,
					),
					'delimiter6' => array(
						'title'        => '|',
						'has_settings' => true,
					),
				),
			),
			'top_left'      => array(
				'title'        => 'Top Left',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(),
			),
			'top_center'    => array(
				'title'        => 'Top Center',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(),
			),
			'top_right'     => array(
				'title'        => 'Top Right',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(),
			),
			'middle_left'   => array(
				'title'        => 'Middle Left',
				'has_settings' => true,
				'layout'       => 'one-thirds clear-item',
				'content'      => array(
					'logo' => array(
						'title'        => 'Logo',
						'has_settings' => true,
					),
				),
			),
			'middle_center' => array(
				'title'        => 'Middle Center',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(),
			),
			'middle_right'  => array(
				'title'        => 'Middle Right',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(
					'menu' => array(
						'title'        => 'Menu',
						'has_settings' => true,
					),
				),
			),
			'bottom_left'   => array(
				'title'        => 'Bottom Left',
				'has_settings' => true,
				'layout'       => 'one-thirds clear-item',
				'content'      => array(),
			),
			'bottom_center' => array(
				'title'        => 'Bottom Center',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(),
			),
			'bottom_right'  => array(
				'title'        => 'Bottom Right',
				'has_settings' => true,
				'layout'       => 'one-thirds',
				'content'      => array(),
			),
		),
		'default'          => $def_header_option,
	),

	//HEADER TEMPLATES
	// MAIN HEADER SETTINGS
	array(
		'id'           => 'header_templates-start',
		'type'         => 'gt3_section',
		'title'        => esc_html__( 'Header Templates', 'zohar' ),
		'indent'       => false,
		'section_role' => 'start'
	),

	//HEADER TEMPLATES
	array(
		'id'         => 'gt3_header_builder_presets',
		'type'       => 'gt3_presets',
		'presets'    => true,
		'full_width' => true,
		'title'      => esc_html__( 'Gt3 Preset', 'zohar' ),
		'subtitle'   => esc_html__( 'This allows you to set default header layout.', 'zohar' ),
		'default'    => array(
			'0' => array(
				'title'  => esc_html__( 'Default', 'zohar' ),
				'preset' => json_encode( array( 'gt3_header_builder_id' => $def_header_option ) )
			),
		),
		'templates'  => array(
			'1' => array(
				'alt'     => 'Header 1',
				'img'     => get_template_directory_uri() . '/core/admin/img/header_1.jpg',
				'presets' => $header_preset_1
			),
			'2' => array(
				'alt'     => 'Header 2',
				'img'     => get_template_directory_uri() . '/core/admin/img/header_2.jpg',
				'presets' => $header_preset_2
			),
			'3' => array(
				'alt'     => 'Header 3',
				'img'     => get_template_directory_uri() . '/core/admin/img/header_3.jpg',
				'presets' => $header_preset_3
			),
			'4' => array(
				'alt'     => 'Header 4',
				'img'     => get_template_directory_uri() . '/core/admin/img/header_4.jpg',
				'presets' => $header_preset_4
			),
			'5' => array(
				'alt'     => 'Header 5',
				'img'     => get_template_directory_uri() . '/core/admin/img/header_5.jpg',
				'presets' => $header_preset_5
			),
		),
		'options'    => array(),
	),
	array(
		'id'           => 'header_templates-end',
		'type'         => 'gt3_section',
		'indent'       => false,
		'section_role' => 'end'
	),

	//NO ITEM SETTINGS
	array(
		'id'           => 'no_item-start',
		'type'         => 'gt3_section',
		'title'        => esc_html__( 'Header Settings', 'zohar' ),
		'indent'       => false,
		'section_role' => 'start'
	),

	array(
		'id'    => 'no_item_message',
		'type'  => 'info',
		'style' => 'warning',
		'title' => esc_html__( 'Warning!', 'zohar' ),
		'icon'  => 'el-icon-info-sign',
		'desc'  => esc_html__( 'To modify the settings, please add any item to the header section. It can not be empty.', 'zohar' )
	),
	array(
		'id'           => 'no_item-end',
		'type'         => 'gt3_section',
		'indent'       => false,
		'section_role' => 'end'
	),


	//LOGO SETTINGS
	array(
		'id'           => 'logo-start',
		'type'         => 'gt3_section',
		'title'        => esc_html__( 'Logo Settings', 'zohar' ),
		'indent'       => false,
		'section_role' => 'start'
	),
	array(
		'id'    => 'header_logo',
		'type'  => 'media',
		'title' => esc_html__( 'Header Logo', 'zohar' ),
	),
	array(
		'id'      => 'logo_height_custom',
		'type'    => 'switch',
		'title'   => esc_html__( 'Enable Logo Height', 'zohar' ),
		'default' => true,
	),
	array(
		'id'             => 'logo_height',
		'type'           => 'dimensions',
		'units'          => false,
		'units_extended' => false,
		'title'          => esc_html__( 'Set Logo Height', 'zohar' ),
		'height'         => true,
		'width'          => false,
		'default'        => array(
			'height' => 23,
		),
		'required'       => array( 'logo_height_custom', '=', '1' ),
	),
	array(
		'id'       => 'logo_max_height',
		'type'     => 'switch',
		'title'    => esc_html__( 'Don\'t limit maximum height', 'zohar' ),
		'default'  => false,
		'required' => array( 'logo_height_custom', '=', '1' ),
	),
	array(
		'id'             => 'sticky_logo_height',
		'type'           => 'dimensions',
		'units'          => false,
		'units_extended' => false,
		'title'          => __( 'Set Sticky Logo Height', 'zohar' ),
		'height'         => true,
		'width'          => false,
		'default'        => array(
			'height' => '',
		),
		'required'       => array(
			array( 'logo_height_custom', '=', '1' ),
			array( 'logo_max_height', '=', '1' ),
		),
	),
	array(
		'id'    => 'logo_sticky',
		'type'  => 'media',
		'title' => __( 'Sticky Logo', 'zohar' ),
	),

	array(
		'id'    => 'logo_tablet',
		'type'  => 'media',
		'title' => __( 'Tablet Logo', 'zohar' ),
	),
	array(
		'id'             => 'logo_teblet_width',
		'type'           => 'dimensions',
		'units'          => false,
		'units_extended' => false,
		'title'          => __( 'Set Logo Width on Tablet', 'zohar' ),
		'height'         => false,
		'width'          => true,
	),

	array(
		'id'    => 'logo_mobile',
		'type'  => 'media',
		'title' => __( 'Mobile Logo', 'zohar' ),
	),
	array(
		'id'             => 'logo_mobile_width',
		'type'           => 'dimensions',
		'units'          => false,
		'units_extended' => false,
		'title'          => __( 'Set Logo Width on Mobile', 'zohar' ),
		'height'         => false,
		'width'          => true,
	),


	array(
		'id'           => 'logo-end',
		'type'         => 'gt3_section',
		'indent'       => false,
		'section_role' => 'end'
	),

	// MENU
	array(
		'id'           => 'menu-start',
		'type'         => 'gt3_section',
		'title'        => __( 'Menu Settings', 'zohar' ),
		'indent'       => false,
		'section_role' => 'start'
	),
	array(
		'id'      => 'menu_select',
		'type'    => 'select',
		'title'   => esc_html__( 'Select Menu', 'zohar' ),
		'options' => gt3_getMenuList(),
		'default' => '',
	),
	array(
		'id'      => 'menu_ative_top_line',
		'type'    => 'switch',
		'title'   => esc_html__( 'Enable Active Menu Item Marker', 'zohar' ),
		'default' => false,
	),
	array(
		'id'       => 'sub_menu_background',
		'type'     => 'color_rgba',
		'title'    => __( 'Sub Menu Background', 'zohar' ),
		'subtitle' => __( 'Set the background color for sub menu', 'zohar' ),
		'default'  => array(
			'color' => '#353745',
			'alpha' => '1',
			'rgba'  => 'rgba(53,55,69,1)'
		),
		'mode'     => 'background',
	),
	array(
		'id'          => 'sub_menu_color',
		'type'        => 'color',
		'title'       => __( 'Menu Text Color', 'zohar' ),
		'subtitle'    => __( 'Set the header text color for menu', 'zohar' ),
		'default'     => '#85cad9',
		'transparent' => false,
	),
	array(
		'id'          => 'sub_menu_color_hover',
		'type'        => 'color',
		'title'       => __( 'Menu Text Color on Hover and Current', 'zohar' ),
		'subtitle'    => __( 'Set the header text color for menu on hover and Current menu', 'zohar' ),
		'default'     => '#85cad9',
		'transparent' => false,
	),
	array(
		'id'           => 'menu-end',
		'type'         => 'gt3_section',
		'indent'       => true,
		'section_role' => 'end'

	),

	// BURGER SIDEBAR
	array(
		'id'           => 'burger_sidebar-start',
		'type'         => 'gt3_section',
		'title'        => __( 'Burger Sidebar Settings', 'zohar' ),
		'indent'       => false,
		'section_role' => 'start'
	),
	array(
		'id'    => 'burger_sidebar_select',
		'type'  => 'select',
		'title' => esc_html__( 'Select Sidebar', 'zohar' ),
		'data'  => 'sidebars',
	),
	array(
		'id'           => 'burger_sidebar-end',
		'type'         => 'gt3_section',
		'indent'       => false,
		'section_role' => 'end'
	),

);


$responsive_sections = array( '', '__tablet', '__mobile' );

$sections = array(
	'top_left'      => esc_html__( 'Top Left Settings', 'zohar' ),
	'top_center'    => esc_html__( 'Top Center Settings', 'zohar' ),
	'top_right'     => esc_html__( 'Top Right Settings', 'zohar' ),
	'middle_left'   => esc_html__( 'Middle Left Settings', 'zohar' ),
	'middle_center' => esc_html__( 'Middle Center Settings', 'zohar' ),
	'middle_right'  => esc_html__( 'Middle Right Settings', 'zohar' ),
	'bottom_left'   => esc_html__( 'Bottom Left Settings', 'zohar' ),
	'bottom_center' => esc_html__( 'Bottom Center Settings', 'zohar' ),
	'bottom_right'  => esc_html__( 'Bottom Right Settings', 'zohar' ),
);

$responsive_tabs = array(
	'desktop' => esc_html__( 'Desktop', 'zohar' ),
	'tablet'  => esc_html__( 'Tablet', 'zohar' ),
	'mobile'  => esc_html__( 'Mobile', 'zohar' ),
);

$header_global_settings = array();
foreach ( $responsive_tabs as $responsive_tab => $responsive_tab_translate ) {
	array_push( $header_global_settings,
		array(
			'id'           => $responsive_tab . '_header_settings-start',
			'type'         => 'gt3_section',
			'title'        => $responsive_tab_translate . esc_html__( ' Settings', 'zohar' ),
			'indent'       => false,
			'section_role' => 'start'
		)
	);

	if ( $responsive_tab == 'desktop' ) {
		array_push( $header_global_settings,
			array(
				'id'       => 'header_full_width',
				'type'     => 'switch',
				'title'    => esc_html__( 'Full Width Header', 'zohar' ),
				'subtitle' => esc_html__( 'Set header content in full width layout', 'zohar' ),
				'default'  => false,
			),
			array(
				'id'      => 'header_on_bg',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header Above Content', 'zohar' ),
				'default' => false,
			),
			array(
				'id'      => 'header_sticky',
				'type'    => 'switch',
				'title'   => esc_html__( 'Sticky Header', 'zohar' ),
				'default' => false,
			)
		);
	} else {
		array_push( $header_global_settings,
			array(
				'id'      => $responsive_tab . '_header_on_bg',
				'type'    => 'switch',
				'title'   => esc_html__( 'Header Above Content', 'zohar' ),
				'default' => false,
			),
			array(
				'id'       => $responsive_tab . '_header_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Header', 'zohar' ),
				'default'  => false,
				'required' => array( 'header_sticky', '=', '1' ),
			)
		);
	}

	if ( $responsive_tab == 'desktop' ) {
		array_push( $header_global_settings,
			array(
				'id'       => 'header_sticky_appearance_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Sticky Appearance Style', 'zohar' ),
				'options'  => array(
					'classic'    => esc_html__( 'Classic', 'zohar' ),
					'scroll_top' => esc_html__( 'Appearance only on scroll top', 'zohar' ),
				),
				'required' => array( 'header_sticky', '=', '1' ),
				'default'  => 'classic'
			),
			array(
				'id'       => 'header_sticky_appearance_from_top',
				'type'     => 'select',
				'title'    => esc_html__( 'Sticky Header Appearance From Top of Page', 'zohar' ),
				'options'  => array(
					'auto'   => esc_html__( 'Auto', 'zohar' ),
					'custom' => esc_html__( 'Custom', 'zohar' ),
				),
				'required' => array( 'header_sticky', '=', '1' ),
				'default'  => 'auto'
			),
			array(
				'id'             => 'header_sticky_appearance_number',
				'type'           => 'dimensions',
				'units'          => false,
				'units_extended' => false,
				'title'          => __( 'Set the distance from the top of the page', 'zohar' ),
				'height'         => true,
				'width'          => false,
				'default'        => array(
					'height' => 300,
				),
				'required'       => array( 'header_sticky_appearance_from_top', '=', 'custom' ),
			),
			array(
				'id'       => 'header_sticky_shadow',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Header Bottom Shadow', 'zohar' ),
				'default'  => true,
				'required' => array( 'header_sticky', '=', '1' ),
			)
		);
	}

	array_push( $header_global_settings,
		array(
			'id'           => $responsive_tab . '_header_settings-end',
			'type'         => 'gt3_section',
			'indent'       => false,
			'section_role' => 'end'
		)
	);
}


// add align options to each section
$aligns = array();
foreach ( $responsive_sections as $responsive_section ) {
	foreach ( $sections as $section => $section_translate ) {
		$default = explode( "_", $section );
		array_push( $aligns,
			array(
				'id'           => $section . $responsive_section . '-start',
				'type'         => 'gt3_section',
				'title'        => $section_translate,
				'indent'       => false,
				'section_role' => 'start'
			),
			array(
				'id'      => $section . $responsive_section . '-align',
				'type'    => 'select',
				'title'   => esc_html__( 'Item Align', 'zohar' ),
				'options' => array(
					'left'   => esc_html__( 'Left', 'zohar' ),
					'center' => esc_html__( 'Center', 'zohar' ),
					'right'  => esc_html__( 'Right', 'zohar' ),
				),
				'default' => ! empty( $default[1] ) ? $default[1] : 'left',
			),
			array(
				'id'           => $section . $responsive_section . '-end',
				'type'         => 'gt3_section',
				'indent'       => false,
				'section_role' => 'end'
			)
		);
	}
}


$side_opt = array();
$sides    = array(
	'top'    => esc_html__( 'Top Header Settings', 'zohar' ),
	'middle' => esc_html__( 'Middle Header Settings', 'zohar' ),
	'bottom' => esc_html__( 'Bottom Header Settings', 'zohar' ),
);
foreach ( $responsive_sections as $responsive_section ) {
	foreach ( $sides as $side => $section_translate ) {

		$background_color = $background_color2 = $border_color = array();

		$color       = '';
		$color_hover = '';
		$height      = '';

		if ( empty( $responsive_section ) ) {
			$background_color  = array(
				'color' => '#ffffff',
				'alpha' => '1',
				'rgba'  => 'rgba(255,255,255,1)'
			);
			$background_color2 = array(
				'color' => '#ffffff',
				'alpha' => '0',
				'rgba'  => 'rgba(255,255,255,0)'
			);
			$color             = '#232325';
			$color_hover       = '#232325';
			$height            = '100';
			$border_color      = array(
				'color' => '#F3F4F4',
				'alpha' => '1',
				'rgba'  => 'rgba(243,244,244,1)'
			);

		}

		array_push( $side_opt,
			//TOP SIDE
			array(
				'id'           => 'side_' . $side . $responsive_section . '-start',
				'type'         => 'gt3_section',
				'title'        => $section_translate,
				'indent'       => false,
				'section_role' => 'start'
			)
		);

		if ( ! empty( $responsive_section ) ) {
			array_push( $side_opt,
				//TOP SIDE
				array(
					'id'      => 'side_' . $side . $responsive_section . '_custom',
					'type'    => 'switch',
					'title'   => esc_html__( 'Customize ', 'zohar' ) . $section_translate,
					'default' => false,
				),
				array(
					'id'       => 'side_' . $side . $responsive_section . '_styling-start',
					'type'     => 'section',
					'title'    => esc_html__( 'Customize ', 'zohar' ) . $section_translate,
					'indent'   => true,
					'required' => array( 'side_' . $side . $responsive_section . '_custom', '=', '1' ),
				)
			);
		}

		array_push( $side_opt,
			array(
				'id'       => 'side_' . $side . $responsive_section . '_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background', 'zohar' ),
				'subtitle' => esc_html__( 'Set background color', 'zohar' ),
				'default'  => $background_color,
				'mode'     => 'background',
			),
			array(
				'id'       => 'side_' . $side . $responsive_section . '_background2',
				'type'     => 'color_rgba',
				'title'    => __( 'Inner Background', 'zohar' ),
				'subtitle' => __( 'Set background color', 'zohar' ),
				'default'  => $background_color2,
				'mode'     => 'background',
				'required' => array( 'header_full_width', '!=', '1' ),
			),
			array(
				'id'          => 'side_' . $side . $responsive_section . '_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color', 'zohar' ),
				'subtitle'    => esc_html__( 'Set text color', 'zohar' ),
				'default'     => $color,
				'transparent' => false,
			),
			array(
				'id'          => 'side_' . $side . $responsive_section . '_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Link Text Color on Hover', 'zohar' ),
				'subtitle'    => esc_html__( 'Set text color', 'zohar' ),
				'default'     => $color_hover,
				'transparent' => false,
			),
			array(
				'id'             => 'side_' . $side . $responsive_section . '_height',
				'type'           => 'dimensions',
				'units'          => false,
				'units_extended' => false,
				'title'          => esc_html__( 'Height', 'zohar' ),
				'height'         => true,
				'width'          => false,
				'default'        => array(
					'height' => $height,
				)
			),
			array(
				'id'       => 'side_' . $side . $responsive_section . '_spacing',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				'units'    => 'px',
				'all'      => false,
				'bottom'   => false,
				'top'      => false,
				'left'     => true,
				'right'    => true,
				'title'    => esc_html__( 'Padding (px)', 'zohar' ),
				'subtitle' => esc_html__( 'Set empty padding-left/-right to default 20px', 'zohar' ),
				'default'  => array(
					'padding-left'  => '',
					'padding-right' => '',

				)
			),

			array(
				'id'      => 'side_' . $side . $responsive_section . '_border',
				'type'    => 'switch',
				'title'   => esc_html__( 'Set Bottom Border', 'zohar' ),
				'default' => false,
			),
			array(
				'id'       => 'side_' . $side . $responsive_section . '_border_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Border Color', 'zohar' ),
				'subtitle' => esc_html__( 'Set border color', 'zohar' ),
				'default'  => $border_color,
				'mode'     => 'background',
				'required' => array( 'side_' . $side . $responsive_section . '_border', '=', '1' ),
			),
			array(
				'id'      => 'side_' . $side . $responsive_section . '_border_radius',
				'type'    => 'switch',
				'title'   => esc_html__( 'Set Border Radius', 'zohar' ),
				'default' => false,
			)
		);

		if ( empty( $responsive_section ) ) {
			array_push( $side_opt,
				array(
					'id'       => 'side_' . $side . $responsive_section . '_sticky',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Section in Sticky Header?', 'zohar' ),
					'default'  => true,
					'required' => array( 'header_sticky', '=', '1' ),
				),
				array(
					'id'       => 'side_' . $side . $responsive_section . '_background_sticky',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Sticky Header Background', 'zohar' ),
					'subtitle' => esc_html__( 'Set background color', 'zohar' ),
					'default'  => array(
						'color' => '#ffffff',
						'alpha' => '1',
						'rgba'  => 'rgba(255,255,255,1)'
					),
					'mode'     => 'background',
					'required' => array( 'side_' . $side . $responsive_section . '_sticky', '=', '1' ),
				),
				array(
					'id'          => 'side_' . $side . $responsive_section . '_color_sticky',
					'type'        => 'color',
					'title'       => esc_html__( 'Sticky Header Text Color', 'zohar' ),
					'subtitle'    => esc_html__( 'Set text color', 'zohar' ),
					'default'     => '#222328',
					'transparent' => false,
					'required'    => array( 'side_' . $side . $responsive_section . '_sticky', '=', '1' ),
				),
				array(
					'id'          => 'side_' . $side . $responsive_section . '_color_hover_sticky',
					'type'        => 'color',
					'title'       => esc_html__( 'Sticky Header Link Color on Hover', 'zohar' ),
					'subtitle'    => esc_html__( 'Set text color', 'zohar' ),
					'default'     => $color_hover,
					'transparent' => false,
					'required'    => array( 'side_' . $side . $responsive_section . '_sticky', '=', '1' ),
				),
				array(
					'id'             => 'side_' . $side . $responsive_section . '_height_sticky',
					'type'           => 'dimensions',
					'units'          => false,
					'units_extended' => false,
					'title'          => esc_html__( 'Sticky Header Height', 'zohar' ),
					'height'         => true,
					'width'          => false,
					'default'        => array(
						'height' => 58,
					),
					'required'       => array( 'side_' . $side . $responsive_section . '_sticky', '=', '1' ),
				),
				array(
					'id'       => 'side_' . $side . $responsive_section . '_spacing_sticky',
					'type'     => 'spacing',
					// An array of CSS selectors to apply this font style to
					'mode'     => 'padding',
					'units'    => 'px',
					'all'      => false,
					'bottom'   => false,
					'top'      => false,
					'left'     => true,
					'right'    => true,
					'title'    => esc_html__( 'Sticky Header Padding (px)', 'zohar' ),
					'subtitle' => esc_html__( 'Set empty padding-left/-right to default 20px', 'zohar' ),
					'default'  => array(
						'padding-left'  => '',
						'padding-right' => '',
					),
					'required' => array( 'side_' . $side . $responsive_section . '_sticky', '=', '1' ),
				)
			);
		} else {
			$header_sticky_prefix = str_replace( '__', '', $responsive_section );
			array_push( $side_opt,
				array(
					'id'       => 'side_' . $side . $responsive_section . '_sticky',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Section in Sticky Header?', 'zohar' ),
					'default'  => true,
					'required' => array( 'header_sticky', '=', '1' ),
				)
			);
		}

		if ( ! empty( $responsive_section ) ) {
			array_push( $side_opt,
				array(
					'id'       => 'side_' . $side . $responsive_section . '_styling-end',
					'type'     => 'section',
					'indent'   => false,
					'required' => array( 'side_' . $side . $responsive_section . '_custom', '=', '1' ),
				)
			);
		}

		array_push( $side_opt,
			array(
				'id'           => 'side_' . $side . $responsive_section . '-end',
				'type'         => 'gt3_section',
				'indent'       => false,
				'section_role' => 'end'
			)
		);

	}
}


// text editor
$text_editor_count = 6;
$text_opt          = array();
for ( $i = 1; $i <= $text_editor_count; $i ++ ) {
	array_push( $text_opt,
		array(
			'id'           => 'text' . $i . '-start',
			'type'         => 'gt3_section',
			'title'        => esc_html__( 'Text / HTML', 'zohar' ) . ' ' . $i . ' ' . esc_html__( 'Settings', 'zohar' ),
			'indent'       => false,
			'section_role' => 'start'
		),
		array(
			'id'      => 'text' . $i . '_editor',
			'type'    => 'editor',
			'title'   => esc_html__( 'Text Editor', 'zohar' ),
			'default' => '',
			'args'    => array(
				'wpautop'       => false,
				'media_buttons' => false,
				'textarea_rows' => 8,
				'teeny'         => false,
				'quicktags'     => true,
			),
		),
		array(
			'id'           => 'text' . $i . '-end',
			'type'         => 'gt3_section',
			'indent'       => false,
			'section_role' => 'end'
		)
	);
};


// delimiter
$delimiter_count = 6;
$delimiter_opt   = array();
for ( $i = 1; $i <= $delimiter_count; $i ++ ) {
	array_push( $delimiter_opt,
		// Delimiters
		array(
			'id'           => 'delimiter' . $i . '-start',
			'type'         => 'gt3_section',
			'title'        => esc_html__( 'Delimiter', 'zohar' ) . ' ' . $i . ' ' . esc_html__( 'Settings', 'zohar' ),
			'indent'       => false,
			'section_role' => 'start'
		),
		array(
			'id'      => 'delimiter' . $i . '_height',
			'type'    => 'dimensions',
			'units'   => array( 'em', 'px', '%' ),
			'title'   => esc_html__( 'Delimiter Height', 'zohar' ),
			'height'  => true,
			'width'   => false,
			'output'  => array( 'height' => '.gt3_delimiter' . $i . '' ),
			'default' => array(
				'height' => 1,
				'units'  => 'em',
			)
		),
		array(
			'id'           => 'delimiter' . $i . '-end',
			'type'         => 'gt3_section',
			'indent'       => false,
			'section_role' => 'end'
		)
	);
};

$options = array_merge( $options, $aligns, $text_opt, $delimiter_opt, $side_opt, $header_global_settings );

Redux::setSection( $opt_name, array(
	'id'     => 'gt3_header_builder_section',
	'title'  => __( 'GT3 Header Builder', 'zohar' ),
	'icon'   => 'el el-screen',
	'fields' => $options
) );
// END HEADER

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Page Title', 'zohar' ),
	'id'               => 'page_title',
	'icon'             => 'el-icon-screen',
	'customizer_width' => '450px',
	'fields'           => array(
		array(
			'id'      => 'page_title_conditional',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Page Title', 'zohar' ),
			'default' => true,
		),
		array(
			'id'       => 'blog_title_conditional',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Blog Post Title', 'zohar' ),
			'default'  => true,
			'required' => array( 'page_title_conditional', '=', '1' ),
		),
		array(
			'id'       => 'team_title_conditional',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Team Post Title', 'zohar' ),
			'default'  => false,
			'required' => array( 'page_title_conditional', '=', '1' ),
		),
		array(
			'id'       => 'portfolio_title_conditional',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Portfolio Post Title', 'zohar' ),
			'default'  => true,
			'required' => array( 'page_title_conditional', '=', '1' ),
		),
		array(
			'id'       => 'page_title-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Page Title Settings', 'zohar' ),
			'indent'   => true,
			'required' => array( 'page_title_conditional', '=', '1' ),
		),
		array(
			'id'      => 'page_title_breadcrumbs_conditional',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Breadcrumbs', 'zohar' ),
			'default' => false,
		),
		array(
			'id'      => 'page_title_vert_align',
			'type'    => 'select',
			'title'   => esc_html__( 'Vertical Align', 'zohar' ),
			'options' => array(
				'top'    => esc_html__( 'Top', 'zohar' ),
				'middle' => esc_html__( 'Middle', 'zohar' ),
				'bottom' => esc_html__( 'Bottom', 'zohar' )
			),
			'default' => 'middle'
		),
		array(
			'id'      => 'page_title_horiz_align',
			'type'    => 'select',
			'title'   => esc_html__( 'Page Title Text Align?', 'zohar' ),
			'options' => array(
				'left'   => esc_html__( 'Left', 'zohar' ),
				'center' => esc_html__( 'Center', 'zohar' ),
				'right'  => esc_html__( 'Right', 'zohar' )
			),
			'default' => 'left'
		),
		array(
			'id'          => 'page_title_font_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Page Title Font Color', 'zohar' ),
			'default'     => '#232325',
			'transparent' => false
		),
		array(
			'id'          => 'page_title_bg_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Page Title Background Color', 'zohar' ),
			'default'     => '#ffffff',
			'transparent' => false
		),
		array(
			'id'    => 'page_title_bg_image',
			'type'  => 'media',
			'title' => esc_html__( 'Page Title Background Image', 'zohar' ),
		),
		array(
			'id'               => 'page_title_bg_image',
			'type'             => 'background',
			'background-color' => false,
			'preview_media'    => true,
			'preview'          => false,
			'title'            => esc_html__( 'Page Title Background Image', 'zohar' ),
			'default'          => array(
				'background-repeat'     => 'no-repeat',
				'background-size'       => 'cover',
				'background-attachment' => 'scroll',
				'background-position'   => 'center center',
				'background-color'      => '#e0e2e3',
			)
		),
		array(
			'id'             => 'page_title_height',
			'type'           => 'dimensions',
			'units'          => false,
			'units_extended' => false,
			'title'          => esc_html__( 'Page Title Height', 'zohar' ),
			'height'         => true,
			'width'          => false,
			'default'        => array(
				'height' => 250,
			)
		),
		array(
			'id'      => 'page_title_top_border',
			'type'    => 'switch',
			'title'   => esc_html__( 'Page Title Top Border', 'zohar' ),
			'default' => false,
		),
		array(
			'id'       => 'page_title_top_border_color',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Page Title Top Border Color', 'zohar' ),
			'default'  => array(
				'color' => '#f3f4f4',
				'alpha' => '1',
				'rgba'  => 'rgba(243,244,244,1)'
			),
			'mode'     => 'background',
			'required' => array(
				array( 'page_title_top_border', '=', '1' ),
			),
		),
		array(
			'id'      => 'page_title_bottom_border',
			'type'    => 'switch',
			'title'   => esc_html__( 'Page Title Bottom Border', 'zohar' ),
			'default' => false,
		),
		array(
			'id'       => 'page_title_bottom_border_color',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Page Title Bottom Border Color', 'zohar' ),
			'default'  => array(
				'color' => '#eff0ed',
				'alpha' => '1',
				'rgba'  => 'rgba(239,240,237,1)'
			),
			'mode'     => 'background',
			'required' => array(
				array( 'page_title_bottom_border', '=', '1' ),
			),
		),
		array(
			'id'      => 'page_title_bottom_margin',
			'type'    => 'spacing',
			// An array of CSS selectors to apply this font style to
			'mode'    => 'margin',
			'all'     => false,
			'bottom'  => true,
			'top'     => false,
			'left'    => false,
			'right'   => false,
			'title'   => esc_html__( 'Page Title Bottom Margin', 'zohar' ),
			'default' => array(
				'margin-bottom' => '60',
			)
		),
		array(
			'id'       => 'page_title-end',
			'type'     => 'section',
			'indent'   => false,
			'required' => array( 'page_title_conditional', '=', '1' ),
		),

	)
) );

// -> START Footer Options
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Footer', 'zohar' ),
	'id'               => 'footer-option',
	'customizer_width' => '400px',
	'icon'             => 'el-icon-screen',
	'fields'           => array(
		array(
			'id'      => 'footer_full_width',
			'type'    => 'select',
			'title'   => esc_html__( 'Full Width Footer', 'zohar' ),
			'options' => array(
				'default'        => esc_html__( 'Default', 'zohar' ),
				'strech_footer'  => esc_html__( 'Strech Footer', 'zohar' ),
				'strech_content' => esc_html__( 'Strech Footer and Content', 'zohar' ),
			),
			'default' => 'strech_footer',
		),
		array(
			'id'          => 'footer_bg_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Footer Background Color', 'zohar' ),
			'default'     => '#f9f9f9',
			'transparent' => false
		),
		array(
			'id'          => 'footer_text_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Footer Text color', 'zohar' ),
			'default'     => '#949494',
			'transparent' => false
		),
		array(
			'id'          => 'footer_heading_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Footer Heading color', 'zohar' ),
			'default'     => '#232325',
			'transparent' => false
		),
		array(
			'id'               => 'footer_bg_image',
			'type'             => 'background',
			'background-color' => false,
			'preview_media'    => true,
			'preview'          => false,
			'title'            => esc_html__( 'Footer Background Image', 'zohar' ),
			'default'          => array(
				'background-repeat'     => 'repeat',
				'background-size'       => 'cover',
				'background-attachment' => 'scroll',
				'background-position'   => 'center center',
				'background-color'      => '#323336',
			)
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Footer Content', 'zohar' ),
	'id'               => 'footer_content',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
		array(
			'id'      => 'footer_switch',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Footer', 'zohar' ),
			'default' => true,
		),
		array(
			'id'       => 'footer-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Footer Settings', 'zohar' ),
			'indent'   => true,
			'required' => array( 'footer_switch', '=', '1' ),
		),
		array(
			'id'      => 'footer_column',
			'type'    => 'select',
			'title'   => esc_html__( 'Footer Column', 'zohar' ),
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5'
			),
			'default' => '4'
		),
		array(
			'id'       => 'footer_column2',
			'type'     => 'select',
			'title'    => esc_html__( 'Footer Column Layout', 'zohar' ),
			'options'  => array(
				'6-6' => '50% / 50%',
				'3-9' => '25% / 75%',
				'9-3' => '25% / 75%',
				'4-8' => '33% / 66%',
				'8-3' => '66% / 33%',
			),
			'default'  => '6-6',
			'required' => array( 'footer_column', '=', '2' ),
		),
		array(
			'id'       => 'footer_column3',
			'type'     => 'select',
			'title'    => esc_html__( 'Footer Column Layout', 'zohar' ),
			'options'  => array(
				'4-4-4' => '33% / 33% / 33%',
				'3-3-6' => '25% / 25% / 50%',
				'3-6-3' => '25% / 50% / 25%',
				'6-3-3' => '50% / 25% / 25%',
			),
			'default'  => '4-4-4',
			'required' => array( 'footer_column', '=', '3' ),
		),
		array(
			'id'       => 'footer_column5',
			'type'     => 'select',
			'title'    => esc_html__( 'Footer Column Layout', 'zohar' ),
			'options'  => array(
				'2-3-2-2-3' => '16% / 25% / 16% / 16% / 25%',
				'3-2-2-2-3' => '25% / 16% / 16% / 16% / 25%',
				'3-2-3-2-2' => '25% / 16% / 26% / 16% / 16%',
				'3-2-3-3-2' => '25% / 16% / 16% / 25% / 16%',
			),
			'default'  => '2-3-2-2-3',
			'required' => array( 'footer_column', '=', '5' ),
		),
		array(
			'id'      => 'footer_align',
			'type'    => 'select',
			'title'   => esc_html__( 'Footer Title Text Align', 'zohar' ),
			'options' => array(
				'left'   => esc_html__( 'Left', 'zohar' ),
				'center' => esc_html__( 'Center', 'zohar' ),
				'right'  => esc_html__( 'Right', 'zohar' ),
			),
			'default' => 'left'
		),
		array(
			'id'      => 'footer_spacing',
			'type'    => 'spacing',
			// An array of CSS selectors to apply this font style to
			'mode'    => 'padding',
			'all'     => false,
			'title'   => esc_html__( 'Footer Padding (px)', 'zohar' ),
			'default' => array(
				'padding-top'    => '70',
				'padding-right'  => '0',
				'padding-bottom' => '76',
				'padding-left'   => '0'
			)
		),
		array(
			'id'       => 'footer-end',
			'type'     => 'section',
			'indent'   => false,
			'required' => array( 'footer_switch', '=', '1' ),
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Copyright', 'zohar' ),
	'id'               => 'copyright',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
		array(
			'id'      => 'copyright_switch',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Copyright', 'zohar' ),
			'default' => true,
		),
		array(
			'id'       => 'copyright_editor',
			'type'     => 'editor',
			'title'    => esc_html__( 'Copyright Editor', 'zohar' ),
			'default'  => '',
			'args'     => array(
				'wpautop'       => false,
				'media_buttons' => false,
				'textarea_rows' => 15,
				'teeny'         => false,
				'quicktags'     => true,
			),
			'required' => array( 'copyright_switch', '=', '1' ),
		),
		array(
			'id'       => 'copyright_align',
			'type'     => 'select',
			'title'    => esc_html__( 'Copyright Title Text Align', 'zohar' ),
			'options'  => array(
				'left'   => esc_html__( 'Left', 'zohar' ),
				'center' => esc_html__( 'Center', 'zohar' ),
				'right'  => esc_html__( 'Right', 'zohar' ),
			),
			'default'  => 'center',
			'required' => array( 'copyright_switch', '=', '1' ),
		),
		array(
			'id'       => 'copyright_spacing',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'all'      => false,
			'title'    => esc_html__( 'Copyright Padding (px)', 'zohar' ),
			'default'  => array(
				'padding-top'    => '17',
				'padding-right'  => '0',
				'padding-bottom' => '17',
				'padding-left'   => '0'
			),
			'required' => array( 'copyright_switch', '=', '1' ),
		),
		array(
			'id'          => 'copyright_bg_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Copyright Background Color', 'zohar' ),
			'default'     => '#f5f5f5',
			'transparent' => false,
			'required'    => array( 'copyright_switch', '=', '1' ),
		),
		array(
			'id'          => 'copyright_text_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Copyright Text Color', 'zohar' ),
			'default'     => '#949494',
			'transparent' => false,
			'required'    => array( 'copyright_switch', '=', '1' ),
		),
		array(
			'id'       => 'copyright_top_border',
			'type'     => 'switch',
			'title'    => esc_html__( 'Set Copyright Top Border', 'zohar' ),
			'default'  => false,
			'required' => array( 'copyright_switch', '=', '1' ),
		),
		array(
			'id'       => 'copyright_top_border_color',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Copyright Border Color', 'zohar' ),
			'default'  => array(
				'color' => '#47484a',
				'alpha' => '1',
				'rgba'  => 'rgba(71,72,74,1)'
			),
			'mode'     => 'background',
			'required' => array(
				array( 'copyright_top_border', '=', '1' ),
				array( 'copyright_switch', '=', '1' )
			),
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Prefooter Area', 'zohar' ),
	'id'               => 'pre_footer',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
		array(
			'id'      => 'pre_footer_switch',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Prefooter Area', 'zohar' ),
			'default' => false,
		),
		array(
			'id'       => 'pre_footer_editor',
			'type'     => 'editor',
			'title'    => esc_html__( 'Prefooter Editor', 'zohar' ),
			'default'  => '',
			'args'     => array(
				'wpautop'       => false,
				'media_buttons' => false,
				'textarea_rows' => 2,
				'teeny'         => false,
				'quicktags'     => true,
			),
			'required' => array( 'pre_footer_switch', '=', '1' ),
		),
		array(
			'id'       => 'pre_footer_align',
			'type'     => 'select',
			'title'    => esc_html__( 'Prefooter Title Text Align', 'zohar' ),
			'options'  => array(
				'left'   => esc_html__( 'Left', 'zohar' ),
				'center' => esc_html__( 'Center', 'zohar' ),
				'right'  => esc_html__( 'Right', 'zohar' ),
			),
			'default'  => 'left',
			'required' => array( 'pre_footer_switch', '=', '1' ),
		),
		array(
			'id'       => 'pre_footer_spacing',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'all'      => false,
			'title'    => esc_html__( 'Prefooter Area Padding (px)', 'zohar' ),
			'default'  => array(
				'padding-top'    => '20',
				'padding-right'  => '0',
				'padding-bottom' => '20',
				'padding-left'   => '0'
			),
			'required' => array( 'pre_footer_switch', '=', '1' ),
		),
		array(
			'id'       => 'pre_footer_bottom_border',
			'type'     => 'switch',
			'title'    => esc_html__( 'Set Prefooter Border', 'zohar' ),
			'default'  => false,
			'required' => array( 'pre_footer_switch', '=', '1' ),
		),
		array(
			'id'       => 'pre_footer_bottom_border_color',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Prefooter Border Color', 'zohar' ),
			'default'  => array(
				'color' => '#e0e1dc',
				'alpha' => '1',
				'rgba'  => 'rgba(224,225,220,1)'
			),
			'mode'     => 'background',
			'required' => array(
				array( 'pre_footer_bottom_border', '=', '1' ),
				array( 'pre_footer_switch', '=', '1' )
			),
		),
	)
) );

// -> START Blog Options
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Blog', 'zohar' ),
	'id'               => 'blog-option',
	'customizer_width' => '400px',
	'icon'             => 'el-icon-th-list',
	'fields'           => array(
		array(
			'id'      => 'related_posts',
			'type'    => 'switch',
			'title'   => esc_html__( 'Related Posts', 'zohar' ),
			'default' => true,
		),
		array(
			'id'       => 'related_posts_filter',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Show Related Posts by', 'zohar' ),
			'options'  => array(
				'tag'      => esc_html__( 'Tag', 'zohar' ),
				'category' => esc_html__( 'Category', 'zohar' ),
			),
			'default'  => 'tag',
			'required' => array( 'related_posts', '=', '1' ),
		),
		array(
			'id'      => 'author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Author Box on Single Post', 'zohar' ),
			'default' => false,
		),
		array(
			'id'      => 'post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Post Comments', 'zohar' ),
			'default' => true,
		),
		array(
			'id'      => 'post_pingbacks',
			'type'    => 'switch',
			'title'   => esc_html__( 'Trackbacks and Pingbacks', 'zohar' ),
			'default' => true,
		),
		array(
			'id'      => 'blog_post_likes',
			'type'    => 'switch',
			'title'   => esc_html__( 'Likes on Posts', 'zohar' ),
			'default' => false,
		),
		array(
			'id'      => 'blog_post_share',
			'type'    => 'switch',
			'title'   => esc_html__( 'Share on Posts', 'zohar' ),
			'default' => false,
		),
		array(
			'id'      => 'blog_post_listing_content',
			'type'    => 'switch',
			'title'   => esc_html__( 'Cut Off Text in Blog Listing', 'zohar' ),
			'default' => false,
		),
		array(
			'id'      => 'blog_post_fimage_animation',
			'type'    => 'switch',
			'title'   => esc_html__( 'Add animation to Featured Image in Blog Listing', 'zohar' ),
			'default' => false,
		),
	)
) );

// -> START Gallery Options
if ( class_exists( '\ElementorModal\Widgets\GT3_Elementor_Gallery' ) ) {
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Gallery', 'zohar' ),
		'id'               => 'gallery-option',
		'customizer_width' => '400px',
		'icon'             => 'el el-picture',
		'fields'           => array(
			array(
				'id'      => 'gallery_type',
				'type'    => 'select',
				'title'   => esc_html__( 'Select default gallery type', 'zohar' ),
				'options' => array(
					'grid'         => esc_html__( 'Grid Gallery', 'zohar' ),
					'packery'      => esc_html__( 'Packery Gallery', 'zohar' ),
					'fs_slider'    => esc_html__( 'FullScreen Slider', 'zohar' ),
					'shift_slider' => esc_html__( 'Shift Slider', 'zohar' ),
					'masonry'      => esc_html__( 'Masonry Gallery', 'zohar' ),
					'kenburn'      => esc_html__( 'Kenburns', 'zohar' ),
					'ribbon'       => esc_html__( 'Ribbon Slider', 'zohar' ),
					'flow'         => esc_html__( 'Flow Slider', 'zohar' ),
				),
				'default' => 'grid'
			),
			// Grid
			array(
				'id'       => 'grid_grid_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Grid Type', 'zohar' ),
				'options'  => array(
					'vertical'  => esc_html__( 'Vertical Align', 'zohar' ),
					'square'    => esc_html__( 'Square', 'zohar' ),
					'rectangle' => esc_html__( 'Rectangle', 'zohar' ),
				),
				'default'  => 'vertical',
				'required' => array( 'gallery_type', '=', 'grid' ),
			),
			array(
				'id'       => 'grid_cols',
				'type'     => 'select',
				'title'    => esc_html__( 'Cols', 'zohar' ),
				'options'  => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'default'  => '4',
				'required' => array( 'gallery_type', '=', 'grid' ),
			),
			array(
				'id'       => 'grid_grid_gap',
				'type'     => 'select',
				'title'    => esc_html__( 'Grid Gap', 'zohar' ),
				'options'  => array(
					'0'    => '0',
					'1px'  => '1px',
					'2px'  => '2px',
					'3px'  => '3px',
					'4px'  => '4px',
					'5px'  => '5px',
					'10px' => '10px',
					'15px' => '15px',
					'20px' => '20px',
					'25px' => '25px',
					'30px' => '30px',
					'35px' => '35px',

					'2%'    => '2%',
					'4.95%' => '5%',
					'8%'    => '8%',
					'10%'   => '10%',
					'12%'   => '12%',
					'15%'   => '15%',
				),
				'default'  => '30px',
				'required' => array( 'gallery_type', '=', 'grid' ),
			),
			array(
				'id'       => 'grid_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Hover Effect', 'zohar' ),
				'options'  => array(
					'type1' => esc_html__( 'Type 1', 'zohar' ),
					'type2' => esc_html__( 'Type 2', 'zohar' ),
					'type3' => esc_html__( 'Type 3', 'zohar' ),
					'type4' => esc_html__( 'Type 4', 'zohar' ),
					'type5' => esc_html__( 'Type 5', 'zohar' ),
				),
				'default'  => 'type2',
				'required' => array( 'gallery_type', '=', 'grid' ),
			),

			array(
				'id'       => 'grid_lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Lightbox', 'zohar' ),
				'default'  => true,
				'required' => array( 'gallery_type', '=', 'grid' ),
			),
			array(
				'id'       => 'grid_show_title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Title', 'zohar' ),
				'default'  => true,
				'required' => array( 'gallery_type', '=', 'grid' ),
			),
			array(
				'id'            => 'grid_post_per_load',
				'type'          => 'slider',
				'title'         => esc_html__( 'Post Per Load', 'zohar' ),
				'default'       => 12,
				'min'           => 1,
				'step'          => 1,
				'max'           => 100,
				'display_value' => 'text',
				'required'      => array( 'gallery_type', '=', 'grid' ),
			),
			array(
				'id'       => 'grid_show_view_all',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show "See More" Button', 'zohar' ),
				'default'  => true,
				'required' => array( 'gallery_type', '=', 'grid' ),
			),
			array(
				'id'            => 'grid_load_items',
				'type'          => 'slider',
				'title'         => esc_html__( 'See Items', 'zohar' ),
				'default'       => 4,
				'min'           => 1,
				'step'          => 1,
				'max'           => 100,
				'display_value' => 'text',
				'required'      => array(
					array( 'gallery_type', '=', 'grid' ),
					array( 'grid_show_view_all', '=', '1' ),
				),
			),
			array(
				'id'       => 'grid_button_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Button Type', 'zohar' ),
				'options'  => array(
					'none'    => esc_html__( 'None', 'zohar' ),
					'default' => esc_html__( 'Default', 'zohar' ),
				),
				'default'  => 'default',
				'required' => array(
					array( 'gallery_type', '=', 'grid' ),
					array( 'grid_show_view_all', '=', '1' ),
				),
			),
			array(
				'id'       => 'grid_button_border',
				'type'     => 'switch',
				'title'    => esc_html__( 'Button Border', 'zohar' ),
				'default'  => true,
				'required' => array(
					array( 'gallery_type', '=', 'grid' ),
					array( 'grid_show_view_all', '=', '1' ),
				),
			),
			array(
				'id'       => 'grid_button_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Title', 'zohar' ),
				'default'  => esc_html__( 'Load More', 'zohar' ),
				'required' => array(
					array( 'gallery_type', '=', 'grid' ),
					array( 'grid_show_view_all', '=', '1' ),
				),
			),


			// Packery
			array(
				'id'       => 'packery_type',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Type', 'zohar' ),
				'options'  => array(
					'1' => array(
						'alt' => esc_html__( 'Type 1', 'zohar' ),
						'img' => esc_url( \ElementorModal\Widgets\GT3_Elementor_Gallery::$IMAGE_URL . 'type1.png' )
					),
					'2' => array(
						'alt' => esc_html__( 'Type 2', 'zohar' ),
						'img' => esc_url( \ElementorModal\Widgets\GT3_Elementor_Gallery::$IMAGE_URL . 'type2.png' )
					),
					'3' => array(
						'alt' => esc_html__( 'Type 3', 'zohar' ),
						'img' => esc_url( \ElementorModal\Widgets\GT3_Elementor_Gallery::$IMAGE_URL . 'type3.png' )
					),
					'4' => array(
						'alt' => esc_html__( 'Type 4', 'zohar' ),
						'img' => esc_url( \ElementorModal\Widgets\GT3_Elementor_Gallery::$IMAGE_URL . 'type4.png' )
					),
				),
				'default'  => '2',
				'required' => array( 'gallery_type', '=', 'packery' ),
			),
			array(
				'id'       => 'packery_grid_gap',
				'type'     => 'select',
				'title'    => esc_html__( 'Packery Gap', 'zohar' ),
				'options'  => array(
					'0'    => '0',
					'1px'  => '1px',
					'2px'  => '2px',
					'3px'  => '3px',
					'4px'  => '4px',
					'5px'  => '5px',
					'10px' => '10px',
					'15px' => '15px',
					'20px' => '20px',
					'25px' => '25px',
					'30px' => '30px',
					'35px' => '35px',

					'2%'    => '2%',
					'4.95%' => '5%',
					'8%'    => '8%',
					'10%'   => '10%',
					'12%'   => '12%',
					'15%'   => '15%',
				),
				'default'  => '30px',
				'required' => array( 'gallery_type', '=', 'packery' ),
			),
			array(
				'id'       => 'packery_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Hover Effect', 'zohar' ),
				'options'  => array(
					'type1' => esc_html__( 'Type 1', 'zohar' ),
					'type2' => esc_html__( 'Type 2', 'zohar' ),
					'type3' => esc_html__( 'Type 3', 'zohar' ),
					'type4' => esc_html__( 'Type 4', 'zohar' ),
					'type5' => esc_html__( 'Type 5', 'zohar' ),
				),
				'default'  => 'type2',
				'required' => array( 'gallery_type', '=', 'packery' ),
			),
			array(
				'id'       => 'packery_lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Lightbox', 'zohar' ),
				'default'  => true,
				'required' => array( 'gallery_type', '=', 'packery' ),
			),
			array(
				'id'       => 'packery_show_title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Title', 'zohar' ),
				'default'  => true,
				'required' => array( 'gallery_type', '=', 'packery' ),
			),
			array(
				'id'            => 'packery_post_per_load',
				'type'          => 'slider',
				'title'         => esc_html__( 'Post Per Load', 'zohar' ),
				'default'       => 12,
				'min'           => 1,
				'step'          => 1,
				'max'           => 100,
				'display_value' => 'text',
				'required'      => array( 'gallery_type', '=', 'packery' ),
			),
			array(
				'id'       => 'packery_show_view_all',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show "See More" Button', 'zohar' ),
				'default'  => true,
				'required' => array( 'gallery_type', '=', 'packery' ),
			),
			array(
				'id'            => 'packery_load_items',
				'type'          => 'slider',
				'title'         => esc_html__( 'See Items', 'zohar' ),
				'default'       => 4,
				'min'           => 1,
				'step'          => 1,
				'max'           => 100,
				'display_value' => 'text',
				'required'      => array(
					array( 'gallery_type', '=', 'packery' ),
					array( 'packery_show_view_all', '=', '1' ),
				),
			),
			array(
				'id'       => 'packery_button_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Button Type', 'zohar' ),
				'options'  => array(
					'none'    => esc_html__( 'None', 'zohar' ),
					'default' => esc_html__( 'Default', 'zohar' ),
				),
				'default'  => 'default',
				'required' => array(
					array( 'gallery_type', '=', 'packery' ),
					array( 'packery_show_view_all', '=', '1' ),
				),
			),
			array(
				'id'       => 'packery_button_border',
				'type'     => 'switch',
				'title'    => esc_html__( 'Button Border', 'zohar' ),
				'default'  => true,
				'required' => array(
					array( 'gallery_type', '=', 'packery' ),
					array( 'packery_show_view_all', '=', '1' ),
				),
			),
			array(
				'id'       => 'packery_button_border',
				'type'     => 'switch',
				'title'    => esc_html__( 'Button Border', 'zohar' ),
				'default'  => true,
				'required' => array(
					array( 'gallery_type', '=', 'packery' ),
					array( 'packery_show_view_all', '=', '1' ),
				),
			),
			array(
				'id'       => 'packery_button_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Title', 'zohar' ),
				'default'  => esc_html__( 'Load More', 'zohar' ),
				'required' => array(
					array( 'gallery_type', '=', 'packery' ),
					array( 'packery_show_view_all', '=', '1' ),
				),
			),
			// FS Slider
			array(
				'id'       => 'fs_controls',
				'type'     => 'switch',
				'title'    => esc_html__( 'Controls', 'zohar' ),
				'default'  => true,
				'required' => array( 'gallery_type', '=', 'fs_slider' ),
			),
			array(
				'id'       => 'fs_autoplay',
				'type'     => 'switch',
				'title'    => esc_html__( 'Autoplay', 'zohar' ),
				'default'  => true,
				'required' => array( 'gallery_type', '=', 'fs_slider' ),
			),
			array(
				'id'       => 'fs_thumbs',
				'type'     => 'switch',
				'title'    => esc_html__( 'Thumbnails', 'zohar' ),
				'default'  => true,
				'required' => array( 'gallery_type', '=', 'fs_slider' ),
			),
			array(
				'id'       => 'fs_interval',
				'type'     => 'text',
				'validate' => 'numeric',
				'title'    => esc_html__( 'Slide Duration', 'zohar' ),
				'default'  => '6000',
				'required' => array( 'gallery_type', '=', 'fs_slider' ),
			),
			array(
				'id'       => 'fs_transition_time',
				'type'     => 'text',
				'validate' => 'numeric',
				'title'    => esc_html__( 'Transition Interval', 'zohar' ),
				'default'  => '1000',
				'required' => array( 'gallery_type', '=', 'fs_slider' ),
			),
			array(
				'id'          => 'fs_panel_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Panel Color', 'zohar' ),
				'transparent' => false,
				'default'     => '#fff',
				'validate'    => 'color',
				'required'    => array( 'gallery_type', '=', 'fs_slider' ),
			),
			array(
				'id'       => 'fs_anim_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Anim style', 'zohar' ),
				'options'  => array(
					'fade'      => esc_html__( 'Fade', 'zohar' ),
					'slip'      => esc_html__( 'Slip', 'zohar' ),
					'slip_up'   => esc_html__( 'Slip Up', 'zohar' ),
					'slip_down' => esc_html__( 'Slip Down', 'zohar' ),
				),
				'default'  => 'fade',
				'required' => array( 'gallery_type', '=', 'fs_slider' ),
			),
			array(
				'id'       => 'fs_fit_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Fit Style', 'zohar' ),
				'options'  => array(
					'no_fit'     => __( 'Cover Slide', 'zohar' ),
					'fit_always' => __( 'Fit Always', 'zohar' ),
					'fit_width'  => __( 'Fit Horizontal', 'zohar' ),
					'fit_height' => __( 'Fit Vertical', 'zohar' ),
				),
				'default'  => 'no_fit',
				'required' => array( 'gallery_type', '=', 'fs_slider' ),
			),
			array(
				'id'          => 'fs_module_height',
				'type'        => 'text',
				'title'       => esc_html__( 'Module Height', 'zohar' ),
				'description' => esc_html__( 'Set module height in px (pixels). Enter \'100%\' for full height mode', 'zohar' ),
				'default'     => '100%',
				'required'    => array( 'gallery_type', '=', 'fs_slider' ),
			),

			// Shift
			array(
				'id'          => 'shift_controls',
				'type'        => 'switch',
				'title'       => esc_html__( 'Show Control Buttons', 'zohar' ),
				'description' => esc_html__( 'Turn ON or OFF control buttons', 'zohar' ),
				'default'     => true,
				'required'    => array( 'gallery_type', '=', 'shift_slider' ),
			),
			array(
				'id'          => 'shift_infinity_scroll',
				'type'        => 'switch',
				'title'       => esc_html__( 'Infinite Scroll', 'zohar' ),
				'default'     => true,
				'required'    => array( 'gallery_type', '=', 'shift_slider' ),
				'description' => esc_html__( 'Turn ON or OFF infinite  scrolling. Autoplay works only when infinite scroll is ON', 'zohar' ),
			),
			array(
				'id'          => 'shift_autoplay',
				'type'        => 'switch',
				'title'       => esc_html__( 'Autoplay', 'zohar' ),
				'description' => esc_html__( 'Turn ON or OFF slider autoplay', 'zohar' ),
				'default'     => true,
				'required'    => array(
					array( 'gallery_type', '=', 'shift_slider' ),
					array( 'shift_infinity_scroll', '=', '1' ),
				),
			),
			array(
				'id'          => 'shift_interval',
				'type'        => 'text',
				'validate'    => 'numeric',
				'title'       => esc_html__( 'Slide Duration', 'zohar' ),
				'description' => esc_html__( 'Set the timing of single slides in milliseconds', 'zohar' ),
				'default'     => '6000',
				'required'    => array(
					array( 'gallery_type', '=', 'shift_slider' ),
					array( 'shift_infinity_scroll', '=', '1' ),
					array( 'shift_autoplay', '=', '1' ),
				),
			),
			array(
				'id'          => 'shift_transition_time',
				'type'        => 'text',
				'validate'    => 'numeric',
				'title'       => esc_html__( 'Transition Interval', 'zohar' ),
				'description' => esc_html__( 'Set transition animation time', 'zohar' ),
				'default'     => '600',
				'required'    => array( 'gallery_type', '=', 'shift_slider' ),
			),
			array(
				'id'       => 'shift_descr_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Show Title', 'zohar' ),
				'options'  => array(
					'always'   => esc_html__( 'Always Show', 'zohar' ),
					'hide'     => esc_html__( 'Always Hide', 'zohar' ),
					'on_hover' => esc_html__( 'Show on Hover', 'zohar' ),
					'expanded' => esc_html__( 'Show when slide is expanded', 'zohar' ),
				),
				'default'  => 'on_hover',
				'required' => array( 'gallery_type', '=', 'shift_slider' ),
			),
			array(
				'id'          => 'shift_expandeble',
				'type'        => 'switch',
				'title'       => esc_html__( 'Expandable slides', 'zohar' ),
				'description' => esc_html__( 'Turn ON or OFF expandable slides', 'zohar' ),
				'required'    => array( 'gallery_type', '=', 'shift_slider' ),
			),
			array(
				'id'          => 'shift_hover_effect',
				'type'        => 'switch',
				'title'       => esc_html__( 'Hover Effect', 'zohar' ),
				'default'     => true,
				'required'    => array( 'gallery_type', '=', 'shift_slider' ),
				'description' => esc_html__( 'Turn ON or OFF hover effect', 'zohar' ),
			),
			array(
				'id'          => 'shift_module_height',
				'type'        => 'text',
				'title'       => esc_html__( 'Module Height', 'zohar' ),
				'description' => esc_html__( 'Set module height in px (pixels). Enter \'100%\' for full height mode', 'zohar' ),
				'default'     => '100%',
				'required'    => array( 'gallery_type', '=', 'shift_slider' ),
			),
			// Masonry
			array(
				'id'       => 'masonry_cols',
				'type'     => 'select',
				'title'    => esc_html__( 'Cols', 'zohar' ),
				'options'  => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'default'  => '4',
				'required' => array( 'gallery_type', '=', 'masonry' ),
			),
			array(
				'id'       => 'masonry_grid_gap',
				'type'     => 'select',
				'title'    => esc_html__( 'Grid Gap', 'zohar' ),
				'options'  => array(
					'0'    => '0',
					'1px'  => '1px',
					'2px'  => '2px',
					'3px'  => '3px',
					'4px'  => '4px',
					'5px'  => '5px',
					'10px' => '10px',
					'15px' => '15px',
					'20px' => '20px',
					'25px' => '25px',
					'30px' => '30px',
					'35px' => '35px',

					'2%'    => '2%',
					'4.95%' => '5%',
					'8%'    => '8%',
					'10%'   => '10%',
					'12%'   => '12%',
					'15%'   => '15%',
				),
				'default'  => '30px',
				'required' => array( 'gallery_type', '=', 'masonry' ),
			),
			array(
				'id'       => 'masonry_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Hover Effect', 'zohar' ),
				'options'  => array(
					'type1' => esc_html__( 'Type 1', 'zohar' ),
					'type2' => esc_html__( 'Type 2', 'zohar' ),
					'type3' => esc_html__( 'Type 3', 'zohar' ),
					'type4' => esc_html__( 'Type 4', 'zohar' ),
					'type5' => esc_html__( 'Type 5', 'zohar' ),
				),
				'default'  => 'type2',
				'required' => array( 'gallery_type', '=', 'masonry' ),
			),

			array(
				'id'       => 'masonry_lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Lightbox', 'zohar' ),
				'default'  => true,
				'required' => array( 'gallery_type', '=', 'masonry' ),
			),
			array(
				'id'       => 'masonry_show_title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Title', 'zohar' ),
				'default'  => true,
				'required' => array( 'gallery_type', '=', 'masonry' ),
			),
			array(
				'id'            => 'masonry_post_per_load',
				'type'          => 'slider',
				'title'         => esc_html__( 'Post Per Load', 'zohar' ),
				'default'       => 12,
				'min'           => 1,
				'step'          => 1,
				'max'           => 100,
				'display_value' => 'text',
				'required'      => array( 'gallery_type', '=', 'masonry' ),
			),
			array(
				'id'       => 'masonry_show_view_all',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show "See More" Button', 'zohar' ),
				'default'  => true,
				'required' => array( 'gallery_type', '=', 'masonry' ),
			),
			array(
				'id'            => 'masonry_load_items',
				'type'          => 'slider',
				'title'         => esc_html__( 'See Items', 'zohar' ),
				'default'       => 4,
				'min'           => 1,
				'step'          => 1,
				'max'           => 100,
				'display_value' => 'text',
				'required'      => array(
					array( 'gallery_type', '=', 'masonry' ),
					array( 'masonry_show_view_all', '=', '1' ),
				),
			),
			array(
				'id'       => 'masonry_button_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Button Type', 'zohar' ),
				'options'  => array(
					'none'    => esc_html__( 'None', 'zohar' ),
					'default' => esc_html__( 'Default', 'zohar' ),
				),
				'default'  => 'default',
				'required' => array(
					array( 'gallery_type', '=', 'masonry' ),
					array( 'masonry_show_view_all', '=', '1' ),
				),
			),
			array(
				'id'       => 'masonry_button_border',
				'type'     => 'switch',
				'title'    => esc_html__( 'Button Border', 'zohar' ),
				'default'  => true,
				'required' => array(
					array( 'gallery_type', '=', 'masonry' ),
					array( 'masonry_show_view_all', '=', '1' ),
				),
			),
			array(
				'id'       => 'masonry_button_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Title', 'zohar' ),
				'default'  => esc_html__( 'Load More', 'zohar' ),
				'required' => array(
					array( 'gallery_type', '=', 'masonry' ),
					array( 'masonry_show_view_all', '=', '1' ),
				),
			),
			// Kenburns
			array(
				'id'          => 'kenburn_interval',
				'type'        => 'text',
				'validate'    => 'numeric',
				'title'       => esc_html__( 'Slide Duration', 'zohar' ),
				'description' => esc_html__( 'Set the timing of single slides in milliseconds', 'zohar' ),
				'default'     => '6000',
				'required'    => array(
					array( 'gallery_type', '=', 'kenburn' ),
				),
			),
			array(
				'id'          => 'kenburn_transition_time',
				'type'        => 'text',
				'validate'    => 'numeric',
				'title'       => esc_html__( 'Transition Interval', 'zohar' ),
				'description' => esc_html__( 'Set transition animation time', 'zohar' ),
				'default'     => '600',
				'required'    => array( 'gallery_type', '=', 'kenburn' ),
			),
			array(
				'id'          => 'kenburn_overlay_state',
				'type'        => 'switch',
				'title'       => esc_html__( 'Overlay', 'zohar' ),
				'description' => esc_html__( 'Turn ON or OFF slides color overlay.', 'zohar' ),
				'required'    => array( 'gallery_type', '=', 'kenburn' ),
			),
			array(
				'id'          => 'kenburn_overlay_bg',
				'type'        => 'color',
				'title'       => esc_html__( 'Panel Color', 'zohar' ),
				'transparent' => false,
				'default'     => '#fff',
				'validate'    => 'color',
				'required'    => array(
					array( 'gallery_type', '=', 'kenburn' ),
					array( 'kenburn_overlay_state', '=', '1' ),
				),
			),
			array(
				'id'          => 'kenburn_module_height',
				'type'        => 'text',
				'title'       => esc_html__( 'Module Height', 'zohar' ),
				'description' => esc_html__( 'Set module height in px (pixels). Enter \'100%\' for full height mode', 'zohar' ),
				'default'     => '100%',
				'required'    => array( 'gallery_type', '=', 'kenburn' ),
			),
			// Ribbon
			array(
				'id'          => 'ribbon_show_title',
				'type'        => 'switch',
				'title'       => esc_html__( 'Show Title', 'zohar' ),
				'description' => esc_html__( 'Turn ON or OFF titles and captions', 'zohar' ),
				'default'     => true,
				'required'    => array( 'gallery_type', '=', 'ribbon' ),
			),
			array(
				'id'          => 'ribbon_descr',
				'type'        => 'switch',
				'title'       => esc_html__( 'Show Caption', 'zohar' ),
				'description' => esc_html__( 'Turn ON or OFF captions', 'zohar' ),
				'default'     => false,
				'required'    => array( 'gallery_type', '=', 'ribbon' ),
			),

			array(
				'id'            => 'ribbon_items_padding',
				'type'          => 'slider',
				'title'         => esc_html__( 'Paddings around the images', 'zohar' ),
				'description'   => esc_html__( 'Please use this option to add paddings around the images. Recommended size in pixels 0-50. (Ex.: 15px)', 'zohar' ),
				'default'       => 0,
				'min'           => 0,
				'step'          => 1,
				'max'           => 100,
				'display_value' => 'text',
				'required'      => array( 'gallery_type', '=', 'ribbon' ),
			),
			array(
				'id'       => 'ribbon_controls',
				'type'     => 'switch',
				'title'    => esc_html__( 'Controls', 'zohar' ),
				'default'  => false,
				'required' => array( 'gallery_type', '=', 'ribbon' ),
			),
			array(
				'id'       => 'ribbon_autoplay',
				'type'     => 'switch',
				'title'    => esc_html__( 'Autoplay', 'zohar' ),
				'default'  => false,
				'required' => array( 'gallery_type', '=', 'ribbon' ),
			),
			array(
				'id'          => 'ribbon_interval',
				'type'        => 'text',
				'validate'    => 'numeric',
				'title'       => esc_html__( 'Slide Duration', 'zohar' ),
				'description' => esc_html__( 'Set the timing of single slides in milliseconds', 'zohar' ),
				'default'     => '6000',
				'required'    => array(
					array( 'gallery_type', '=', 'ribbon' ),
					array( 'ribbon_autoplay', '=', '1' ),
				),
			),
			array(
				'id'          => 'ribbon_transition_time',
				'type'        => 'text',
				'validate'    => 'numeric',
				'title'       => esc_html__( 'Transition Interval', 'zohar' ),
				'description' => esc_html__( 'Set transition animation time', 'zohar' ),
				'default'     => '600',
				'required'    => array(
					array( 'gallery_type', '=', 'ribbon' ),
					array( 'ribbon_autoplay', '=', '1' ),
				),
			),
			array(
				'id'          => 'ribbon_module_height',
				'type'        => 'text',
				'title'       => esc_html__( 'Module Height', 'zohar' ),
				'description' => esc_html__( 'Set module height in px (pixels). Enter \'100%\' for full height mode', 'zohar' ),
				'default'     => '100%',
				'required'    => array( 'gallery_type', '=', 'ribbon' ),
			),
			// Flow
			array(
				'id'            => 'flow_img_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Image Width in px (pixels)', 'zohar' ),
				'default'       => 1168,
				'min'           => 640,
				'step'          => 2,
				'max'           => 2560,
				'display_value' => 'text',
				'required'      => array( 'gallery_type', '=', 'flow' ),
			),
			array(
				'id'            => 'flow_img_height',
				'type'          => 'slider',
				'title'         => esc_html__( 'Image Height in px (pixels)', 'zohar' ),
				'default'       => 820,
				'min'           => 480,
				'step'          => 2,
				'max'           => 1600,
				'display_value' => 'text',
				'required'      => array( 'gallery_type', '=', 'flow' ),
			),
			array(
				'id'          => 'flow_title_state',
				'type'        => 'switch',
				'title'       => esc_html__( 'Show Title', 'zohar' ),
				'description' => esc_html__( 'Turn ON or OFF titles on slide', 'zohar' ),
				'default'     => false,
				'required'    => array( 'gallery_type', '=', 'flow' ),
			),
			array(
				'id'       => 'flow_autoplay',
				'type'     => 'switch',
				'title'    => esc_html__( 'Autoplay', 'zohar' ),
				'default'  => false,
				'required' => array( 'gallery_type', '=', 'flow' ),
			),
			array(
				'id'          => 'flow_interval',
				'type'        => 'text',
				'validate'    => 'numeric',
				'title'       => esc_html__( 'Slide Duration', 'zohar' ),
				'description' => esc_html__( 'Set the timing of single slides in milliseconds', 'zohar' ),
				'default'     => '6000',
				'required'    => array(
					array( 'gallery_type', '=', 'flow' ),
					array( 'flow_autoplay', '=', '1' ),
				),
			),
			array(
				'id'          => 'flow_transition_time',
				'type'        => 'text',
				'validate'    => 'numeric',
				'title'       => esc_html__( 'Transition Interval', 'zohar' ),
				'description' => esc_html__( 'Set transition animation time', 'zohar' ),
				'default'     => '600',
				'required'    => array(
					array( 'gallery_type', '=', 'flow' ),
					array( 'flow_autoplay', '=', '1' ),
				),
			),
			array(
				'id'          => 'flow_module_height',
				'type'        => 'text',
				'title'       => esc_html__( 'Module Height', 'zohar' ),
				'description' => esc_html__( 'Set module height in px (pixels). Enter \'100%\' for full height mode', 'zohar' ),
				'default'     => '100%',
				'required'    => array( 'gallery_type', '=', 'flow' ),
			),
		)
	) );
}

// -> START Layout Options
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Sidebars', 'zohar' ),
	'id'               => 'layout_options',
	'customizer_width' => '400px',
	'icon'             => 'el el-website',
	'fields'           => array(
		array(
			'id'      => 'page_sidebar_layout',
			'type'    => 'image_select',
			'title'   => esc_html__( 'Page Sidebar Layout', 'zohar' ),
			'options' => array(
				'none'  => array(
					'alt' => 'None',
					'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/1col.png'
				),
				'left'  => array(
					'alt' => 'Left',
					'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/2cl.png'
				),
				'right' => array(
					'alt' => 'Right',
					'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/2cr.png'
				)
			),
			'default' => 'right'
		),
		array(
			'id'       => 'page_sidebar_def',
			'type'     => 'select',
			'title'    => esc_html__( 'Page Sidebar', 'zohar' ),
			'data'     => 'sidebars',
			'required' => array( 'page_sidebar_layout', '!=', 'none' ),
		),
		array(
			'id'      => 'blog_single_sidebar_layout',
			'type'    => 'image_select',
			'title'   => esc_html__( 'Blog Single Sidebar Layout', 'zohar' ),
			'options' => array(
				'none'  => array(
					'alt' => 'None',
					'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/1col.png'
				),
				'left'  => array(
					'alt' => 'Left',
					'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/2cl.png'
				),
				'right' => array(
					'alt' => 'Right',
					'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/2cr.png'
				)
			),
			'default' => 'none'
		),
		array(
			'id'       => 'blog_single_sidebar_def',
			'type'     => 'select',
			'title'    => esc_html__( 'Blog Single Sidebar', 'zohar' ),
			'data'     => 'sidebars',
			'required' => array( 'blog_single_sidebar_layout', '!=', 'none' ),
		),
		array(
			'id'      => 'portfolio_single_sidebar_layout',
			'type'    => 'image_select',
			'title'   => esc_html__( 'Portfolio Single Sidebar Layout', 'zohar' ),
			'options' => array(
				'none'  => array(
					'alt' => 'None',
					'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/1col.png'
				),
				'left'  => array(
					'alt' => 'Left',
					'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/2cl.png'
				),
				'right' => array(
					'alt' => 'Right',
					'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/2cr.png'
				)
			),
			'default' => 'none'
		),
		array(
			'id'       => 'portfolio_single_sidebar_def',
			'type'     => 'select',
			'title'    => esc_html__( 'Portfolio Single Sidebar', 'zohar' ),
			'data'     => 'sidebars',
			'required' => array( 'portfolio_single_sidebar_layout', '!=', 'none' ),
		),
		array(
			'id'      => 'team_single_sidebar_layout',
			'type'    => 'image_select',
			'title'   => esc_html__( 'Team Single Sidebar Layout', 'zohar' ),
			'options' => array(
				'none'  => array(
					'alt' => 'None',
					'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/1col.png'
				),
				'left'  => array(
					'alt' => 'Left',
					'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/2cl.png'
				),
				'right' => array(
					'alt' => 'Right',
					'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/2cr.png'
				)
			),
			'default' => 'none'
		),
		array(
			'id'       => 'team_single_sidebar_def',
			'type'     => 'select',
			'title'    => esc_html__( 'Team Single Sidebar', 'zohar' ),
			'data'     => 'sidebars',
			'required' => array( 'team_single_sidebar_layout', '!=', 'none' ),
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Sidebar Generator', 'zohar' ),
	'id'               => 'sidebars_generator_section',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
		array(
			'id'       => 'sidebars',
			'type'     => 'multi_text',
			'validate' => 'no_html',
			'add_text' => esc_html__( 'Add Sidebar', 'zohar' ),
			'title'    => esc_html__( 'Sidebar Generator', 'zohar' ),
			'default'  => array(
				"Main Sidebar",
				"Menu Sidebar",
				"Shop Sidebar",
				"Footer Contacts White",
				"Footer Info White",
				"Cases",
				"Footer Info Home3",
				"Footer Contacts Home3"
			),
		),
	)
) );


// -> START Styling Options
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Color Options', 'zohar' ),
	'id'               => 'color_options',
	'customizer_width' => '400px',
	'icon'             => 'el-icon-brush'
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Colors', 'zohar' ),
	'id'               => 'color_options_color',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
		array(
			'id'          => 'theme-custom-color',
			'type'        => 'color',
			'title'       => esc_html__( 'Theme Color', 'zohar' ),
			'transparent' => false,
			'default'     => '#cfb795',
			'validate'    => 'color',
		),
		array(
			'id'          => 'body-background-color',
			'type'        => 'color',
			'title'       => esc_html__( 'Body Background Color', 'zohar' ),
			'transparent' => false,
			'default'     => '#ffffff',
			'validate'    => 'color',
		),
	)
) );


Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Typography', 'zohar' ),
	'id'               => 'typography_options',
	'customizer_width' => '400px',
	'icon'             => 'el-icon-font',
	'fields'           => array(
		array(
			'id'             => 'menu-font',
			'type'           => 'typography',
			'title'          => esc_html__( 'Menu Font', 'zohar' ),
			'google'         => true,
			'font-style'     => true,
			'color'          => false,
			'line-height'    => true,
			'font-size'      => true,
			'font-backup'    => false,
			'text-align'     => false,
			'letter-spacing' => true,
			'text-transform' => true,
			// 'all_styles'    => true,
			'default'        => array(
				'font-family'    => 'Montserrat',
				'google'         => true,
				'font-size'      => '12px',
				'line-height'    => '22px',
				'font-weight'    => '500',
				'text-transform' => 'uppercase',
			),
		),

		array(
			'id'             => 'main-font',
			'type'           => 'typography',
			'title'          => esc_html__( 'Main Font', 'zohar' ),
			'google'         => true,
			'font-backup'    => false,
			'font-size'      => true,
			'line-height'    => true,
			'color'          => true,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'text-align'     => false,
			'all_styles'     => true,
			'default'        => array(
				'font-size'   => '18px',
				'line-height' => '30px',
				'color'       => '#1e252f',
				'google'      => true,
				'font-family' => 'Lato',
				'font-weight' => '300',
			),
		),
		array(
			'id'             => 'secondary-font',
			'type'           => 'typography',
			'title'          => esc_html__( 'Secondary Font', 'zohar' ),
			'google'         => true,
			'font-backup'    => false,
			'font-size'      => true,
			'line-height'    => true,
			'color'          => true,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'text-align'     => false,
			'default'        => array(
				'font-size'   => '14px',
				'line-height' => '20px',
				'color'       => '#b0b0b0',
				'google'      => true,
				'font-family' => 'Lato',
				'font-weight' => '500',
			),
		),
		array(
			'id'             => 'header-font',
			'type'           => 'typography',
			'title'          => esc_html__( 'Headers Font', 'zohar' ),
			'google'         => true,
			'font-backup'    => false,
			'font-size'      => false,
			'line-height'    => false,
			'color'          => true,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'text-align'     => false,
			'text-transform' => false,
			'default'        => array(
				'color'       => '#2a2e3a',
				'google'      => true,
				'font-family' => 'Lato',
				'font-weight' => '700',
			),
		),
		array(
			'id'             => 'h1-font',
			'type'           => 'typography',
			'title'          => esc_html__( 'H1', 'zohar' ),
			'google'         => true,
			'font-backup'    => false,
			'font-size'      => true,
			'line-height'    => true,
			'color'          => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'text-align'     => false,
			'text-transform' => false,
			'default'        => array(
				'font-size'   => '36px',
				'line-height' => '43px',
				'google'      => true,
			),
		),
		array(
			'id'             => 'h2-font',
			'type'           => 'typography',
			'title'          => esc_html__( 'H2', 'zohar' ),
			'google'         => true,
			'font-backup'    => false,
			'font-size'      => true,
			'line-height'    => true,
			'color'          => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'text-align'     => false,
			'text-transform' => false,
			'default'        => array(
				'font-size'   => '30px',
				'line-height' => '40px',
				'google'      => true,
			),
		),
		array(
			'id'             => 'h3-font',
			'type'           => 'typography',
			'title'          => esc_html__( 'H3', 'zohar' ),
			'google'         => true,
			'font-backup'    => false,
			'font-size'      => true,
			'line-height'    => true,
			'color'          => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'text-align'     => false,
			'text-transform' => false,
			'default'        => array(
				'font-size'   => '24px',
				'line-height' => '36px',
				'google'      => true,
			),
		),
		array(
			'id'             => 'h4-font',
			'type'           => 'typography',
			'title'          => esc_html__( 'H4', 'zohar' ),
			'google'         => true,
			'font-backup'    => false,
			'font-size'      => true,
			'line-height'    => true,
			'color'          => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'text-align'     => false,
			'text-transform' => false,
			'default'        => array(
				'font-size'   => '20px',
				'line-height' => '33px',
				'google'      => true,
			),
		),
		array(
			'id'             => 'h5-font',
			'type'           => 'typography',
			'title'          => esc_html__( 'H5', 'zohar' ),
			'google'         => true,
			'font-backup'    => false,
			'font-size'      => true,
			'line-height'    => true,
			'color'          => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'text-align'     => false,
			'text-transform' => false,
			'default'        => array(
				'font-size'   => '16px',
				'line-height' => '28px',
				'google'      => true,
			),
		),
		array(
			'id'             => 'h6-font',
			'type'           => 'typography',
			'title'          => esc_html__( 'H6', 'zohar' ),
			'google'         => true,
			'font-backup'    => false,
			'font-size'      => true,
			'line-height'    => true,
			'color'          => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'text-align'     => false,
			'text-transform' => false,
			'default'        => array(
				'font-size'   => '14px',
				'line-height' => '24px',
				'google'      => true,
			),
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Google Map', 'zohar' ),
	'id'               => 'google_map',
	'customizer_width' => '400px',
	'icon'             => 'el el-map-marker',
	'fields'           => array(
		array(
			'id'      => 'map_prefooter_default',
			'type'    => 'switch',
			'title'   => esc_html__( 'Enable Map Output in the Prefooter Area?', 'zohar' ),
			'default' => false,
		),
		array(
			'id'      => 'google_map_api_key',
			'type'    => 'text',
			'title'   => esc_html__( 'Google Map API Key', 'zohar' ),
			'desc'    => esc_html__( 'Create own API key', 'zohar' )
			             . ' <a href="https://developers.google.com/maps/documentation/javascript/get-api-key#--api" target="_blank">'
			             . esc_html__( 'here', 'zohar' )
			             . '</a>',
			'default' => '',
		),
		array(
			'id'      => 'google_map_latitude',
			'type'    => 'text',
			'title'   => esc_html__( 'Map Latitude Coordinate', 'zohar' ),
			'default' => '-37.8172507',
		),
		array(
			'id'      => 'google_map_longitude',
			'type'    => 'text',
			'title'   => esc_html__( 'Map Longitude Coordinate', 'zohar' ),
			'default' => '144.9535833',
		),
		array(
			'id'      => 'zoom_map',
			'type'    => 'select',
			'title'   => esc_html__( 'Default Zoom Map', 'zohar' ),
			'desc'    => esc_html__( 'Select the number of zoom map.', 'zohar' ),
			'options' => array(
				'10' => esc_html__( '10', 'zohar' ),
				'11' => esc_html__( '11', 'zohar' ),
				'12' => esc_html__( '12', 'zohar' ),
				'13' => esc_html__( '13', 'zohar' ),
				'14' => esc_html__( '14', 'zohar' ),
				'15' => esc_html__( '15', 'zohar' ),
				'16' => esc_html__( '16', 'zohar' ),
				'17' => esc_html__( '17', 'zohar' ),
				'18' => esc_html__( '18', 'zohar' ),
			),
			'default' => '14'
		),
		array(
			'id'      => 'map_marker_info',
			'type'    => 'switch',
			'title'   => esc_html__( 'Map Marker Info', 'zohar' ),
			'default' => true,
		),
		array(
			'id'       => 'custom_map_marker',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Map Marker URl', 'zohar' ),
			'default'  => '',
			'subtitle' => esc_html__( 'Visible only on mobile or if "Map Marker Info" option is off.', 'zohar' ),
		),
		array(
			'id'       => 'map_marker_info_street_number',
			'type'     => 'text',
			'title'    => esc_html__( 'Street Number', 'zohar' ),
			'default'  => '',
			'required' => array( 'map_marker_info', '=', '1' ),
		),
		array(
			'id'       => 'map_marker_info_street',
			'type'     => 'text',
			'title'    => esc_html__( 'Street', 'zohar' ),
			'default'  => '',
			'required' => array( 'map_marker_info', '=', '1' ),
		),
		array(
			'id'           => 'map_marker_info_descr',
			'type'         => 'textarea',
			'title'        => esc_html__( 'Short Description', 'zohar' ),
			'default'      => '',
			'required'     => array( 'map_marker_info', '=', '1' ),
			'allowed_html' => array(
				'a'      => array(
					'href'  => array(),
					'title' => array()
				),
				'br'     => array(),
				'em'     => array(),
				'strong' => array()
			),
			'description'  => esc_html__( 'The optimal number of characters is 35', 'zohar' ),
		),
		array(
			'id'          => 'map_marker_info_background',
			'type'        => 'color',
			'title'       => esc_html__( 'Map Marker Info Background', 'zohar' ),
			'subtitle'    => esc_html__( 'Set Map Marker Info Background', 'zohar' ),
			'default'     => '#f9f9f9',
			'transparent' => false,
			'required'    => array( 'map_marker_info', '=', '1' ),
		),
		array(
			'id'             => 'map-marker-font',
			'type'           => 'typography',
			'title'          => esc_html__( 'Map Marker Font', 'zohar' ),
			'google'         => true,
			'font-backup'    => false,
			'font-size'      => false,
			'line-height'    => false,
			'color'          => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'text-align'     => false,
			'default'        => array(
				'google'      => true,
				'font-family' => 'Montserrat',
				'font-weight' => '700',
			),
		),
		array(
			'id'          => 'map_marker_info_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Map Marker Description Text Color', 'zohar' ),
			'subtitle'    => esc_html__( 'Set Map Marker Description Text Color', 'zohar' ),
			'default'     => '#949494',
			'transparent' => false,
			'required'    => array( 'map_marker_info', '=', '1' ),
		),
		array(
			'id'      => 'custom_map_style',
			'type'    => 'switch',
			'title'   => esc_html__( 'Custom Map Style', 'zohar' ),
			'default' => false,
		),
		array(
			'id'       => 'custom_map_code',
			'type'     => 'ace_editor',
			'title'    => esc_html__( 'JavaScript Style Array', 'zohar' ),
			'desc'     => esc_html__( 'To change the style of the map, you must insert the JavaScript Style Array code from ', 'zohar' ) . ' <a href="https://snazzymaps.com/" target="_blank">' . esc_html__( 'Snazzy Maps', 'zohar' )
			              . '</a>',
			'mode'     => 'javascript',
			'theme'    => 'chrome',
			'default'  => "",
			'required' => array( 'custom_map_style', '=', '1' ),
		),
	),
) );


if ( class_exists( 'WooCommerce' ) ) {
	// -> START Layout Options
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Shop', 'zohar' ),
		'id'               => 'woocommerce_layout_options',
		'customizer_width' => '400px',
		'icon'             => 'el el-shopping-cart',
		'fields'           => array()
	) );
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Products Page', 'zohar' ),
		'id'               => 'products_page_settings',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'       => 'shop_cat_title_conditional',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Title for Shop Category', 'zohar' ),
				'default'  => true,
				'required' => array( 'page_title_conditional', '=', '1' ),
			),
			array(
				'id'      => 'products_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Products Layout', 'zohar' ),
				'options' => array(
					'container'  => esc_html__( 'Container', 'zohar' ),
					'full_width' => esc_html__( 'Full Width', 'zohar' ),
				),
				'default' => 'container'
			),
			array(
				'id'      => 'products_sidebar_layout',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Products Page Sidebar Layout', 'zohar' ),
				'options' => array(
					'none'  => array(
						'alt' => 'None',
						'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/1col.png'
					),
					'left'  => array(
						'alt' => 'Left',
						'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/2cl.png'
					),
					'right' => array(
						'alt' => 'Right',
						'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/2cr.png'
					)
				),
				'default' => 'none'
			),
			array(
				'id'       => 'products_sidebar_def',
				'type'     => 'select',
				'title'    => esc_html__( 'Products Page Sidebar', 'zohar' ),
				'data'     => 'sidebars',
				'required' => array( 'products_sidebar_layout', '!=', 'none' ),
			),
			array(
				'id'    => 'products_per_page_frontend',
				'type'  => 'switch',
				'title' => esc_html__( 'Show dropdown on the frontend to change Number of products displayed per page', 'zohar' ),
			),
			array(
				'id'    => 'products_sorting_frontend',
				'type'  => 'switch',
				'title' => esc_html__( 'Show dropdown on the frontend to change Sorting of products displayed per page', 'zohar' ),
			),
			array(
				'id'      => 'products_infinite_scroll',
				'type'    => 'select',
				'title'   => esc_html__( 'Infinite Scroll', 'zohar' ),
				'desc'    => esc_html__( 'Select Infinite Scroll options', 'zohar' ),
				'options' => array(
					'none'     => esc_html__( 'None', 'zohar' ),
					'view_all' => esc_html__( 'Activate after clicking on "View All"', 'zohar' ),
					'always'   => esc_html__( 'Always', 'zohar' ),
				),
				'default' => 'none',
			),
			array(
				'id'       => 'woocommerce_pagination',
				'type'     => 'select',
				'title'    => esc_html__( 'Pagination', 'zohar' ),
				'desc'     => esc_html__( 'Select the position of pagination.', 'zohar' ),
				'options'  => array(
					'top'        => esc_html__( 'Top', 'zohar' ),
					'bottom'     => esc_html__( 'Bottom', 'zohar' ),
					'top_bottom' => esc_html__( 'Top and Bottom', 'zohar' ),
					'off'        => esc_html__( 'Off', 'zohar' ),
				),
				'default'  => 'top_bottom',
				'required' => array( 'products_infinite_scroll', '!=', 'always' ),
			),
			array(
				'id'      => 'woocommerce_grid_list',
				'type'    => 'select',
				'title'   => esc_html__( 'Grid/List Option', 'zohar' ),
				'desc'    => esc_html__( 'Display products in grid or list view by default', 'zohar' ),
				'options' => array(
					'grid' => esc_html__( 'Grid', 'zohar' ),
					'list' => esc_html__( 'List', 'zohar' ),
					'off'  => esc_html__( 'Off', 'zohar' ),
				),
				'default' => 'off',
			),
			array(
				'id'     => 'section-label_color-start',
				'type'   => 'section',
				'title'  => esc_html__( '"Sale", "Hot" and "New" labels color', 'zohar' ),
				'indent' => true,
			),
			array(
				'id'       => 'label_color_sale',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Color for "Sale" label', 'zohar' ),
				'subtitle' => esc_html__( 'Select the Background Color for "Sale" label.', 'zohar' ),
				'default'  => array(
					'color' => '#e63764',
					'alpha' => '1',
					'rgba'  => 'rgba(230,55,100,1)'
				),
			),
			array(
				'id'       => 'label_color_hot',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Color for "Hot" label', 'zohar' ),
				'subtitle' => esc_html__( 'Select the Background Color for "Hot" label.', 'zohar' ),
				'default'  => array(
					'color' => '#71d080',
					'alpha' => '1',
					'rgba'  => 'rgba(113,208,128,1)'
				),
			),
			array(
				'id'       => 'label_color_new',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Color for "New" label', 'zohar' ),
				'subtitle' => esc_html__( 'Select the Background Color for "New" label.', 'zohar' ),
				'default'  => array(
					'color' => '#6ad1e4',
					'alpha' => '1',
					'rgba'  => 'rgba(106,209,228,1)'
				),
			),
			array(
				'id'     => 'section-label_color-end',
				'type'   => 'section',
				'indent' => false,
			),
		)
	) );
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Single Product Page', 'zohar' ),
		'id'               => 'product_page_settings',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
			array(
				'id'      => 'product_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Thumbnails Layout', 'zohar' ),
				'options' => array(
					'horizontal'     => esc_html__( 'Thumbnails Bottom', 'zohar' ),
					'vertical'       => esc_html__( 'Thumbnails Left', 'zohar' ),
					'thumb_grid'     => esc_html__( 'Thumbnails Grid', 'zohar' ),
					'thumb_vertical' => esc_html__( 'Thumbnails Vertical Grid', 'zohar' ),
				),
				'default' => 'horizontal'
			),
			array(
				'id'      => 'activate_carousel_thumb',
				'type'    => 'switch',
				'title'   => esc_html__( 'Activate Carousel for Vertical Thumbnail', 'zohar' ),
				'default' => false,
			),
			array(
				'id'       => 'product_title_conditional',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Product Page Title', 'zohar' ),
				'default'  => false,
				'required' => array( 'page_title_conditional', '=', '1' ),
			),
			array(
				'id'      => 'product_container',
				'type'    => 'select',
				'title'   => esc_html__( 'Product Page Layout', 'zohar' ),
				'options' => array(
					'container'  => esc_html__( 'Container', 'zohar' ),
					'full_width' => esc_html__( 'Full Width', 'zohar' ),
				),
				'default' => 'container'
			),
			array(
				'id'       => 'sticky_thumb',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Thumbnails', 'zohar' ),
				'default'  => false,
				'required' => array( 'product_layout', '!=', 'thumb_vertical' ),
			),
			array(
				'id'      => 'product_sidebar_layout',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Single Product Page Sidebar Layout', 'zohar' ),
				'options' => array(
					'none'  => array(
						'alt' => 'None',
						'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/1col.png'
					),
					'left'  => array(
						'alt' => 'Left',
						'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/2cl.png'
					),
					'right' => array(
						'alt' => 'Right',
						'img' => esc_url( ReduxFramework::$_url ) . 'assets/img/2cr.png'
					)
				),
				'default' => 'none'
			),
			array(
				'id'       => 'product_sidebar_def',
				'type'     => 'select',
				'title'    => esc_html__( 'Single Product Page Sidebar', 'zohar' ),
				'data'     => 'sidebars',
				'required' => array( 'product_sidebar_layout', '!=', 'none' ),
			),
			array(
				'id'       => 'shop_title_conditional',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Single Product Title Area (Category name)', 'zohar' ),
				'default'  => true,
				'required' => array( 'page_title_conditional', '=', '1' ),
			),
			array(
				'id'      => 'shop_size_guide',
				'type'    => 'switch',
				'title'   => esc_html__( 'Show Size Guide', 'zohar' ),
				'default' => false,
			),
			array(
				'id'       => 'size_guide',
				'type'     => 'media',
				'title'    => esc_html__( 'Size guide Popup Image', 'zohar' ),
				'required' => array( 'shop_size_guide', '=', true ),
			),
			array(
				'id'      => 'next_prev_product',
				'type'    => 'switch',
				'title'   => esc_html__( 'Show Next and Previous products', 'zohar' ),
				'default' => true,
			),
		)
	) );
}

