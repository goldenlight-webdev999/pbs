<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * One Page Navigation Widget
 */
class Eae_Dismissible_Section extends Widget_Base {

    /**
	 * Retrieve one page navigation widget name.
	 */
    public function get_name() {
        return 'eae-dismissible-section';
    }

    /**
	 * Retrieve one page navigation widget title.
	 */
    public function get_title() {
        return __( 'EA Dismissible Section', 'essential-addons-elementor' );
    }

    /**
	 * Retrieve the list of categories the one page navigation widget belongs to.
	 */
    public function get_categories() {
        return [ 'essential-addons-elementor' ];
    }

    /**
	 * Retrieve one page navigation widget icon.
	 */
    public function get_icon() {
        return 'fa fa-superpowers';
    }

    /**
	 * Register one page navigation widget controls.
	 */
    protected function _register_controls() {

        $this->start_controls_section(
            'section_properties',
            [
                'label'                 => __( 'Section', 'essential-addons-elementor' )
            ]
        );

        $this->add_responsive_control(
			'section_height',
			[
				'label' => __( 'Height', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 800,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'selectors' => [
					'{{WRAPPER}} .eae-removeable-banner' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'section_content',
            [
                'label'                 => __( 'Content', 'essential-addons-elementor' )
            ]
        );

        $this->add_control(
			'content_type',
			[
				'label'       => __( 'Content Type', 'essential-addons-elementor' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'toggle'      => false,
				'default'     => 'content',
				'options'     => [
					'content'          => [
						'title' => __( 'Content', 'essential-addons-elementor' ),
						'icon'  => 'fa fa-edit',
                    ],
                    'templates'         => [
						'title' => __( 'Saved Templates', 'essential-addons-elementor' ),
						'icon'  => 'fa fa-file-code-o',
					]
                ],
                'selectors' => [
                    '{{WRAPPER}} .banner-content-inner' => 'text-align: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
			'removeable_banner_description',
			[
				'label'       => __( 'Description', 'essential-addons-elementor' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => __( 'Essential Addons Elementor Dismissible Section' ),
				'placeholder' => __( 'Type your content here', 'essential-addons-elementor' ),
				'condition'   => [
                    'content_type' => 'content'
                ]
			]
        );

        $this->add_control(
            'rm_banner_content_template',
            [
                'label'                 => __( 'Choose Template', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::SELECT,
                'options'               => get_page_template_options( 'section' ),
				'default'               => '-1',
				'condition'             => [
					'content_type'    => 'templates',
				],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_settings',
            [
                'label'                 => __( 'Settings', 'essential-addons-elementor' )
            ]
        );

        $this->add_responsive_control(
			'close_button',
			[
				'label'        => __( 'Enable Close Button', 'essential-addons-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'essential-addons-elementor' ),
				'label_off'    => __( 'Hide', 'essential-addons-elementor' ),
				'return_value' => 'yes'
			]
        );

        $this->add_control(
            'close_button_icon',
            [
                'label'     => __( 'Button Icon', 'essential-addons-elementor' ),
                'type'      => Controls_Manager::ICON,
                'default'   => 'fa fa-close',
                'condition' => [
                    'close_button!' => ''
                ]
            ]
        );

        $this->add_control(
			'close_button_permission',
			[
				'label'       => __( 'Close Button For?', 'essential-addons-elementor' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'logged-in-users',
				'options'     => [
					'logged-in-users' => __( 'Logged-in Users', 'essential-addons-elementor' ),
					'for-all'         => __( 'For All', 'essential-addons-elementor' ),
                ],
                'condition' => [
                    'close_button!' => ''
                ]
			]
		);
        
        $this->add_responsive_control(
			'scroll_button',
			[
				'label'        => __( 'Enable Scroll Button', 'essential-addons-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'essential-addons-elementor' ),
				'label_off'    => __( 'Hide', 'essential-addons-elementor' ),
				'return_value' => 'yes',
			]
        );

        $this->add_control(
            'scroll_button_icon',
            [
                'label'     => __( 'Button Icon', 'essential-addons-elementor' ),
                'type'      => Controls_Manager::ICON,
                'default'   => 'fa fa-chevron-down',
                'condition' => [
                    'scroll_button!' => ''
                ]
            ]
        );

        $this->add_responsive_control(
			'scroll_icon_position',
			[
				'label' => __( 'Icon Position', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'bottom',
				'options' => [
					'top'    => __( 'Top', 'essential-addons-elementor' ),
					'bottom' => __( 'Bottom', 'essential-addons-elementor' ),
                ],
                'condition' => [
                    'scroll_button!' => ''
                ]
			]
		);
        
        $this->add_control(
            'scroll_id',
            [
                'label'       => __( 'Section ID', 'essential-addons-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'description' => __( 'Insert scroll section css ID.', 'essential-addons-elementor' ),
                'placeholder' => 'scroll-section-id',
                'condition'   => [
                    'scroll_button!' => ''
                ]
            ]
        );
        $this->end_controls_section();

         /**
         * Style Tab: Removeable Banner
         */
        $this->start_controls_section(
            'section_style',
            [
                'label'                 => __( 'Background', 'essential-addons-elementor' ),
                'tab'                   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
                'name'      => 'removeable_banner_background',
                'types'     => [ 'classic', 'gradient' ],
                'selector'  => '{{WRAPPER}} .eae-removeable-banner',
			]
        );

        $this->add_responsive_control(
			'banner_padding',
			[
				'label'      => __( 'Padding', 'essential-addons-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'separator'  => 'before',
				'selectors'  => [
					'{{WRAPPER}} .banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        

        $this->add_responsive_control(
			'banner_margin',
			[
				'label'                 => __( 'Margin', 'essential-addons-elementor' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_content_style',
            [
                'label' => __( 'Content', 'essential-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
			'content_position',
			[
				'label'   => __( 'Content Position', 'essential-addons-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'content-middle',
				'options' => [
					'content-top'    => __( 'Top', 'essential-addons-elementor' ),
					'content-middle' => __( 'Middle', 'essential-addons-elementor' ),
					'content-bottom' => __( 'Bottom', 'essential-addons-elementor' ),
                ]
			]
        );
        
        $this->add_responsive_control(
			'content_alignment',
			[
				'label'       => __( 'Alignment', 'essential-addons-elementor' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'toggle'      => false,
				'default'     => 'center',
				'options'     => [
					'left'          => [
						'title' => __( 'Left', 'essential-addons-elementor' ),
						'icon'  => 'eicon-h-align-left',
                    ],
                    'center'         => [
						'title' => __( 'Center', 'essential-addons-elementor' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'         => [
						'title' => __( 'Right', 'essential-addons-elementor' ),
						'icon'  => 'eicon-h-align-right',
					],
                ],
                'selectors' => [
                    '{{WRAPPER}} .banner-content-inner' => 'text-align: {{VALUE}}'
                ]
			]
		);

        $this->add_control(
            'banner_content_color',
            [
                'label'                 => __( 'Color', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '',
                'selectors'             => [
                    '{{WRAPPER}} .banner-content' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'banner_content_typography',
                'label'    => __( 'Typography', 'essential-addons-elementor' ),
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .banner-content'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_close_button_style',
            [
                'label'     => __( 'Close Button', 'essential-addons-elementor' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'close_button!' => ''
                ]
            ]
        );

        $this->add_responsive_control(
			'close_icon_position',
			[
				'label' => __( 'Icon Position', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'top-right',
				'options' => [
					'top-left'     => __( 'Top Left', 'essential-addons-elementor' ),
					'top-right'    => __( 'Top Right', 'essential-addons-elementor' ),
					'bottom-left'  => __( 'Bottom Left', 'essential-addons-elementor' ),
					'bottom-right' => __( 'Bottom Right', 'essential-addons-elementor' ),
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'close_button_typography',
                'label'    => __( 'Typography', 'essential-addons-elementor' ),
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .removeable-close-button'
            ]
        );

        $this->add_responsive_control(
			'close_button_padding',
			[
				'label'      => __( 'Padding', 'essential-addons-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'separator'  => 'before',
				'selectors'  => [
					'{{WRAPPER}} .removeable-close-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->add_responsive_control(
			'close_button_margin',
			[
				'label'      => __( 'Margin', 'essential-addons-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'separator'  => 'before',
				'selectors'  => [
					'{{WRAPPER}} .removeable-close-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->start_controls_tabs('close_button_style_tabs');

            $this->start_controls_tab(
                'close_button_normal_tab',
                [
                    'label' => __( 'Normal', 'essential-addons-elementor' ),
                ]
            );

            $this->add_control(
                'close_button_color',
                [
                    'label'                 => __( 'Color', 'essential-addons-elementor' ),
                    'type'                  => Controls_Manager::COLOR,
                    'default'               => '#000000',
                    'selectors'             => [
                        '{{WRAPPER}} .removeable-close-button' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'close_button_bg',
                [
                    'label'                 => __( 'Background', 'essential-addons-elementor' ),
                    'type'                  => Controls_Manager::COLOR,
                    'selectors'             => [
                        '{{WRAPPER}} .removeable-close-button' => 'background: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'     => 'close_button_border',
                    'label'    => __( 'Border', 'essential-addons-elementor' ),
                    'selector' => '{{WRAPPER}} .removeable-close-button',
                ]
            );

            $this->add_responsive_control(
                'close_button_radius',
                [
                    'label' => __( 'Border Radius', 'essential-addons-elementor' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ '%' ],
                    'range' => [
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .removeable-close-button' => 'border-radius: {{SIZE}}{{UNIT}};',
                    ]
                ]
            );

            $this->end_controls_tab();
            
            $this->start_controls_tab(
                'close_button_hover_tab',
                [
                    'label' => __( 'Hover', 'essential-addons-elementor' ),
                ]
            );

            $this->add_control(
                'close_button_hover_color',
                [
                    'label'                 => __( 'Color', 'essential-addons-elementor' ),
                    'type'                  => Controls_Manager::COLOR,
                    'default'               => '',
                    'selectors'             => [
                        '{{WRAPPER}} .removeable-close-button:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'close_button_hover_bg',
                [
                    'label'                 => __( 'Background', 'essential-addons-elementor' ),
                    'type'                  => Controls_Manager::COLOR,
                    'selectors'             => [
                        '{{WRAPPER}} .removeable-close-button:hover' => 'background: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'     => 'close_button_hover_border',
                    'label'    => __( 'Border', 'essential-addons-elementor' ),
                    'selector' => '{{WRAPPER}} .removeable-close-button:hover',
                ]
            );

            $this->add_responsive_control(
                'close_button_hover_radius',
                [
                    'label' => __( 'Border Radius', 'essential-addons-elementor' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ '%' ],
                    'range' => [
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .removeable-close-button:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                    ]
                ]
            );

            $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_scroll_button_style',
            [
                'label'     => __( 'Scroll Button', 'essential-addons-elementor' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'scroll_button!' => ''
                ]
            ]
        );

        $this->add_control(
            'scroll_button_color',
            [
                'label'                 => __( 'Color', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'default'               => '#ffffff',
                'selectors'             => [
                    '{{WRAPPER}} .rm-section-scroll-button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
			'scroll_button_bg_type',
			[
				'label'   => __( 'Background Type', 'essential-addons-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'color' => [
						'title' => __( 'Color', 'essential-addons-elementor' ),
						'icon'  => 'fa fa-paint-brush',
					],
					'image' => [
						'title' => __( 'Image', 'essential-addons-elementor' ),
						'icon'  => 'fa fa-image',
					],
				],
				'default' => 'color',
				'toggle'  => true,
			]
        );
        

        $this->add_control(
			'scroll_button_bg_image',
			[
				'label'   => __( 'Choose Image', 'essential-addons-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
                ],
                'selector'  => '{{WRAPPER}} .rm-section-scroll-button',
                'condition' => [
                    'scroll_button_bg_type' => 'image'
                ]
			]
		);

        $this->add_control(
            'scroll_button_bg',
            [
                'label'                 => __( 'Background', 'essential-addons-elementor' ),
                'type'                  => Controls_Manager::COLOR,
                'selectors'             => [
                    '{{WRAPPER}} .rm-section-scroll-button' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'scroll_button_bg_type' => 'color'
                ]
            ]
        );

        $this->add_responsive_control(
			'scroll_button_radius',
			[
				'label' => __( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .rm-section-scroll-button' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'scroll_button_typography',
                'label'    => __( 'Typography', 'essential-addons-elementor' ),
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .rm-section-scroll-button'
            ]
        );
        
        $this->add_responsive_control(
			'scroll_button_padding',
			[
				'label'      => __( 'Padding', 'essential-addons-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'separator'  => 'before',
				'selectors'  => [
					'{{WRAPPER}} .rm-section-scroll-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->add_responsive_control(
			'scroll_button_margin',
			[
				'label'      => __( 'Margin', 'essential-addons-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'separator'  => 'before',
				'selectors'  => [
					'{{WRAPPER}} .rm-section-scroll-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->end_controls_section();

    }

    protected function render_close_button( $settings ) {
        if($settings['close_button_permission'] === 'logged-in-users' ) {
            if( ! is_user_logged_in() ) return;
        }
        if($settings['close_button'] && ! empty($settings['close_button_icon'])) :
            $this->add_render_attribute( 'close_button', 'data-id', $this->get_id() );
        ?>
            <span <?php echo $this->get_render_attribute_string('close_button'); ?>><i class="<?php echo $settings['close_button_icon']; ?>"></i></span>
        <?php endif;
    }

    protected function render_scroll_button( $settings ) {
        if($settings['scroll_button'] && ! empty($settings['scroll_button_icon'])) :
    ?>
            <a
                href="#<?php echo esc_attr($settings['scroll_id']); ?>"
                <?php echo $this->get_render_attribute_string('scroll_button'); ?>
                <?php if(isset($settings['scroll_button_bg_image']['url']) && ! empty($settings['scroll_button_bg_image']['url'])) : ?>
                style="background-image:url(<?php echo esc_url($settings['scroll_button_bg_image']['url']); ?>);"
                <?php endif; ?>

            ><i class="<?php echo $settings['scroll_button_icon']; ?>"></i></a>
        <?php endif;
    }

    protected function read_cookie() {
        $cookie = "rm_banner_hide_".$this->get_id();

        if( isset($_COOKIE[$cookie]) && !empty($_COOKIE[$cookie]) ) {
            $class = $_COOKIE[$cookie];
            $class = str_replace(" ", ".", $class);
            return [
                'status'    => 'true',
                'class'     => $class
            ];
        }else {
            return [ 'status' => 'false' ];
        }
    }

    protected function print_styles() {
        $cookie = $this->read_cookie();

        if( ! is_array($cookie) ) return;

        if( $cookie['status'] == 'true' ) {
            echo '<style>.'.$cookie['class'].'{display:none;}</style>';
        }
    }

    protected function render_section_content($settings) {
        $this->add_render_attribute( 'banner-content', 'class', 'banner-content' );

        if($settings['content_position']) {
            $this->add_render_attribute( 'banner-content', 'class', $settings['content_position'] );
        }

        if($settings['content_alignment']) {
            $this->add_render_attribute( 'banner-content', 'class', $settings['content_alignment'] );
        }

        ?>
        <div <?php echo $this->get_render_attribute_string('banner-content'); ?>>
            <?php if($settings['content_type'] == 'content') : ?>
                <div class="banner-content-inner">
                    <?php echo ($settings['removeable_banner_description']); ?>
                </div>
            <?php else : ?>
                <?php echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $settings['rm_banner_content_template'] ); ?>
            <?php endif; ?>
        </div>
        <?php
    }

    protected function render() {
        if (!\Elementor\Plugin::instance()->editor->is_edit_mode()) {
			$this->print_styles();
        }
        
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute(
            'banner-wrapper',
            [
                'class' => 'eae-removeable-banner'
            ]
        );

        $this->add_render_attribute(
            'close_button',
            [
                'class' => [
                    'removeable-close-button',
                    $settings['close_icon_position']
                ]
            ]
        );

        $this->add_render_attribute(
            'scroll_button',
            [
                'class' => 'rm-section-scroll-button'
            ]
        );

        ?>
            <div <?php echo $this->get_render_attribute_string('banner-wrapper'); ?>>
                <?php $this->render_close_button($settings); ?>
                <?php $this->render_section_content($settings); ?>
                <?php $this->render_scroll_button($settings); ?>
            </div>
        <?php
    }

    protected function _content_template() {
    }    

}
Plugin::instance()->widgets_manager->register_widget_type( new Eae_Dismissible_Section() );