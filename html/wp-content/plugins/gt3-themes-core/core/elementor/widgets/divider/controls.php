<?php

if(!defined('ABSPATH')) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


/** @var \ElementorModal\Widgets\GT3_Core_Elementor_Widget_Divider $widget */

$widget->start_controls_section(
	'basic',
	array(
		'label' => esc_html__('General', 'gt3_themes_core')
	)
);

$widget->add_responsive_control(
	'align',
	array(
		'label'        => esc_html__('Alignment', 'gt3_themes_core'),
		'type'         => Controls_Manager::CHOOSE,
		'options'      => array(
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
		'prefix_class' => 'elementor%s-align-',
		'default'      => '',
	)
);

$widget->add_control(
	'line_left',
	array(
		'label' => esc_html__('Line left', 'gt3_themes_core'),
		'type'  => Controls_Manager::SWITCHER,
	)
);

$widget->add_control(
	'line_right',
	array(
		'label' => esc_html__('Line right', 'gt3_themes_core'),
		'type'  => Controls_Manager::SWITCHER,
	)
);

$widget->add_control(
	'text',
	array(
		'label' => esc_html__('Text', 'gt3_themes_core'),
		'type'  => Controls_Manager::TEXT,
	)
);

$widget->add_control(
	'color',
	array(
		'label'     => esc_html__('Color', 'gt3_themes_core'),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}}.elementor-widget-gt3-core-divider h6' => 'color: {{VALUE}};',
		),
		'separator' => 'none',

	)
);

$widget->add_control(
	'color_line',
	array(
		'label'     => esc_html__('Line Background Color', 'gt3_themes_core'),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}}.elementor-widget-gt3-core-divider .gt3_divider_wrapper-elementor span' => 'background: {{VALUE}};',
		),
		'separator' => 'none',
		'default' => '#777777'
	)
);

$widget->add_control(
	'line_width',
	array(
		'label'       => esc_html__('Line Width', 'gt3_themes_core'),
		'type'        => Controls_Manager::SLIDER,
		'default'     => array(
			'size' => 20,
			'unit' => 'px',
		),
		'range'       => array(
			'px' => array(
				'min'  => 10,
				'max'  => 100,
				'step' => 1,
			),
		),
		'size_units'  => array( 'px' ),
		'label_block' => true,
		'selectors'   => array(
			'{{WRAPPER}}.elementor-widget-gt3-core-divider .gt3_divider_wrapper-elementor span' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);

$widget->add_control(
	'line_height',
	array(
		'label'       => esc_html__('Line Height', 'gt3_themes_core'),
		'type'        => Controls_Manager::SLIDER,
		'default'     => array(
			'size' => 2,
			'unit' => 'px',
		),
		'range'       => array(
			'px' => array(
				'min'  => 1,
				'max'  => 10,
				'step' => 1,
			),
		),
		'size_units'  => array( 'px' ),
		'label_block' => true,
		'selectors'   => array(
			'{{WRAPPER}}.elementor-widget-gt3-core-divider .gt3_divider_wrapper-elementor span' => 'height: {{SIZE}}{{UNIT}};',
		),
	)
);

$widget->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'title_typography',
		'selector' => '{{WRAPPER}}.elementor-widget-gt3-core-divider h6',
	)
);

$widget->end_controls_section();