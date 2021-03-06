<?php

if(!defined('ABSPATH')) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\GT3_Core_Elementor_Control_Query;

/** @var \ElementorModal\Widgets\GT3_Core_Elementor_Widget_Team $widget */

$widget->start_controls_section(
	'general',
	array(
		'label' => esc_html__('Main Settings', 'gt3_themes_core'),
		'tab'   => Controls_Manager::TAB_SETTINGS,
	)
);

$widget->add_control(
	'type',
	array(
		'label'   => esc_html__('Type', 'gt3_themes_core'),
		'type'    => Controls_Manager::SELECT,
		'options' => array(
			'type1' => esc_html__('Type 1', 'gt3_themes_core'),
			'type2' => esc_html__('Type 2', 'gt3_themes_core'),
			'type3' => esc_html__('Type 3', 'gt3_themes_core'),
			'type4' => esc_html__('Type 4', 'gt3_themes_core'),
		),
		'default' => 'type1',
	)
);

$widget->add_control(
	'use_filter',
	array(
		'label' => esc_html__('Use Filter?', 'gt3_themes_core'),
		'type'  => Controls_Manager::SWITCHER,
	)
);

$widget->add_responsive_control(
	'filter_align',
	array(
		'label'     => esc_html__('Alignment', 'gt3_themes_core'),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'left'   => array(
				'title' => esc_html__('Left', 'gt3_themes_core'),
				'icon'  => 'fa fa-align-left',
			),
			'center' => array(
				'title' => esc_html__('Center', 'gt3_themes_core'),
				'icon'  => 'fa fa-align-center',
			),
			'right'  => array(
				'title' => esc_html__('Right', 'gt3_themes_core'),
				'icon'  => 'fa fa-align-right',
			),
		),
		'selectors' => array(
			'{{WRAPPER}}.elementor-widget-gt3-core-team .isotope-filter' => 'text-align: {{VALUE}};',
		),
		'default'   => '',
		'condition' => array(
			'use_filter!' => '',
		)
	)
);

$widget->add_control(
	'link_post',
	array(
		'label' => esc_html__('Enable Link to Post', 'gt3_themes_core'),
		'type'  => Controls_Manager::SWITCHER,
	)
);

$widget->add_control(
	'posts_per_line',
	array(
		'label'   => esc_html__('Items Per Line', 'gt3_themes_core'),
		'type'    => Controls_Manager::SELECT,
		'options' => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
		'default' => '1',
	)
);

$widget->add_control(
	'grid_gap',
	array(
		'label'     => esc_html__('Grid Gap', 'gt3_themes_core'),
		'type'      => Controls_Manager::SELECT,
		'options'   => array(
			'0'  => '0',
			'1'  => '1px',
			'2'  => '2px',
			'3'  => '3px',
			'4'  => '4px',
			'5'  => '5px',
			'10' => '10px',
			'15' => '15px',
			'20' => '20px',
			'25' => '25px',
			'30' => '30px',
			'35' => '35px',
		),
		'default'   => '0',
		'selectors' => array(
			'{{WRAPPER}}.elementor-widget-gt3-core-team .item_list'        => 'margin-right:-{{VALUE}}px; margin-bottom:-{{VALUE}}px;',
			'{{WRAPPER}}.elementor-widget-gt3-core-team .item-team-member' => 'padding-right: {{VALUE}}px; padding-bottom:{{VALUE}}px;'
		)
	)
);

$widget->add_control(
	'custom_item_height',
	array(
		'label' => esc_html__('Enable Custom Item Height?', 'gt3_themes_core'),
		'type'  => Controls_Manager::SWITCHER,
	)
);

$widget->add_responsive_control(
	'item_img_height',
	array(
		'label'       => esc_html__('Item Image Height', 'gt3_themes_core'),
		'type'        => Controls_Manager::SLIDER,
		'default'     => array(
			'size' => 440,
			'unit' => 'px',
		),
		'range'       => array(
			'px' => array(
				'min'  => 300,
				'max'  => 600,
				'step' => 1,
			),
		),
		'size_units'  => array( 'px' ),
		'description' => esc_html__('Enter item image height in pixels.', 'gt3_themes_core'),
		'label_block' => true,
		'selectors'   => array(
			'{{WRAPPER}}.elementor-widget-gt3-core-team .team_image_cover' => 'height: {{SIZE}}{{UNIT}};',
		),
		'condition' => array(
			'custom_item_height!' => '',
		)
	)
);

$widget->end_controls_section();

$widget->start_controls_section(
	'query',
	array(
		'label' => esc_html__('Build Query', 'gt3_themes_core'),
		'tab'   => Controls_Manager::TAB_SETTINGS,
	)
);

$widget->add_control(
	'query',
	array(
		'label'       => esc_html__('Query', 'gt3-elementor-addons'),
		'type'        => GT3_Core_Elementor_Control_Query::type(),
		'settings'    => array(
			'showCategory'  => true,
			'showUser'      => true,
			'showPost'      => true,
			'post_type'     => $widget->POST_TYPE,
			'post_taxonomy' => $widget->TAXONOMY,
		),
	)
);

$widget->end_controls_section();

$widget->start_controls_section(
	'style_section',
	array(
		'label' => esc_html__( 'Style', 'gt3_themes_core' ),
		'tab'   => Controls_Manager::TAB_STYLE
	)
);

$widget->start_controls_tabs( 'style_tabs' );

$widget->start_controls_tab( 'default_tab',
	array(
		'label' => esc_html__( 'Default', 'gt3_themes_core' ),
	)
);

$widget->add_control(
	'title_color',
	array(
		'label'     => esc_html__( 'Title color', 'gt3_themes_core' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .team_title__text' => 'color: {{VALUE}};',
		),
	)
);
$widget->add_control(
	'job_color',
	array(
		'label'     => esc_html__( 'Member Job color', 'gt3_themes_core' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .team-positions' => 'color: {{VALUE}};',
		),
	)
);
$widget->add_control(
	'desc_color',
	array(
		'label'     => esc_html__( 'Short Description color', 'gt3_themes_core' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .member-short-desc' => 'color: {{VALUE}};',
		),
	)
);
$widget->add_control(
	'icon_color',
	array(
		'label'     => esc_html__( 'Icons color', 'gt3_themes_core' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .item_wrapper .member-icon' => 'color: {{VALUE}} !important;',
		),
	)
);


$widget->end_controls_tab();

$widget->start_controls_tab( 'hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'gt3_themes_core' ),
	)
);

$widget->add_control(
	'title_color_hover',
	array(
		'label'     => esc_html__( 'Title color', 'gt3_themes_core' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .item_wrapper:hover .team_title__text' => 'color: {{VALUE}};',
		),
	)
);
$widget->add_control(
	'job_color_hover',
	array(
		'label'     => esc_html__( 'Member Job color', 'gt3_themes_core' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .item_wrapper:hover .team-positions' => 'color: {{VALUE}};',
		),
	)
);
$widget->add_control(
	'desc_color_hover',
	array(
		'label'     => esc_html__( 'Short Description color', 'gt3_themes_core' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .item_wrapper:hover .member-short-desc' => 'color: {{VALUE}};',
		),
	)
);
$widget->add_control(
	'icon_color_hover',
	array(
		'label'     => esc_html__( 'Icons color', 'gt3_themes_core' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .item_wrapper:hover .member-icon' => 'color: {{VALUE}} !important;',
		),
	)
);

$widget->end_controls_tab();

$widget->end_controls_section();
