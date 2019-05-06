<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // If this file is called directly, abort.

class Widget_Eael_Cookie_Consent extends Widget_Base {

	public function get_name() {
		return 'eael-cookie-consent';
	}

	public function get_title() {
		return esc_html__( 'EA Cookie Consent', 'essential-addons-elementor' );
	}

	public function get_icon() {
		return 'eicon-alert';
	}

	public function get_categories() {
		return [ 'essential-addons-elementor' ];
	}

	protected function _register_controls() {

		/**
		 * Cookie Consent Content
		 */
		$this->start_controls_section(
			'eael_section_cookie_content',
			[
				'label' => esc_html__( 'Content', 'essential-addons-elementor' )
			]
		);

		$this->add_control(
			'eael_cookie_massage',
			[
				'label'       => esc_html__( 'Massage', 'essential-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'This website uses cookies to ensure you get the best experience on our website.', 'essential-addons-elementor' ),
				'dynamic'     => [ 'active' => true ]
			]
		);

		$this->add_control(
			'eael_cookie_policy_link_text',
			[
				'label'       => esc_html__( 'Policy link Text', 'essential-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Learn More', 'essential-addons-elementor' )
			]
		);

		$this->add_control(
			'eael_cookie_policy_link',
			[
				'label'         => esc_html__( 'Policy Link', 'essential-addons-elementor' ),
				'type'          => Controls_Manager::URL,
				'label_block'   => true,
				'default'       => [
					'url'         => 'http://',
					'is_external' => '',
				],
				'show_external' => true,
				'separator'     => 'after'
			]
		);

		$this->add_control(
			'eael_cookie_dismiss_btn_text',
			[
				'label'       => esc_html__( 'Dismiss Button Text', 'essential-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Got it!', 'essential-addons-elementor' )
			]
		);

		$this->end_controls_section();

		/**
		 * Cookie Consent Settings
		 */
		$this->start_controls_section(
			'eael_section_cookie_settings',
			[
				'label' => esc_html__( 'Settings', 'essential-addons-elementor' )
			]
		);

		$this->add_control(
			'eael_cookie_position',
			[
				'label'       => esc_html__( 'Position', 'essential-addons-elementor' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'bottom',
				'label_block' => false,
				'options'     => [
					'top'          => esc_html__( 'Top', 'essential-addons-elementor' ),
					'bottom'       => esc_html__( 'Bottom', 'essential-addons-elementor' ),
					'bottom-left'  => esc_html__( 'Bottom Left', 'essential-addons-elementor' ),
					'bottom-right' => esc_html__( 'Bottom Right', 'essential-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'eael_cookie_layout',
			[
				'label'       => esc_html__( 'Layout', 'essential-addons-elementor' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'block',
				'label_block' => false,
				'options'     => [
					'block'    => esc_html__( 'Block', 'essential-addons-elementor' ),
					'classic'  => esc_html__( 'Classic', 'essential-addons-elementor' ),
					'wire'     => esc_html__( 'Wire', 'essential-addons-elementor' ),
					'edgeless' => esc_html__( 'Edgeless', 'essential-addons-elementor' ),
				],
			]
		);


		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_cookie_content_style',
			[
				'label' => esc_html__( 'Content Style', 'essential-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'eael_cookie_content_typography',
				'selector' => '{{WRAPPER}} .eael-cookie-consent .cc-window .cc-message',
			]
		);

		$this->add_control(
			'eael_cookie_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#3937a3',
				'selectors' => [
					'{{WRAPPER}} .eael-cookie-consent .cc-window' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_cookie_content_color',
			[
				'label'     => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .eael-cookie-consent .cc-window' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_cookie_policy_link_color',
			[
				'label'     => esc_html__( 'Policy Link Color', 'essential-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .eael-cookie-consent .cc-window .cc-link' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Button Style
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_cookie_button_style',
			[
				'label' => esc_html__( 'Button', 'essential-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'eael_cookie_btn_typography',
				'selector' => '{{WRAPPER}} .eael-cookie-consent .cc-window .cc-btn',
			]
		);

		$this->start_controls_tabs( 'eael_cookie_button_tabs' );

		// Normal State Tab
		$this->start_controls_tab( 'eael_cookie_btn_normal', [ 'label' => esc_html__( 'Normal', 'essential-addons-elementor' ) ] );

		$this->add_control(
			'eael_cookie_dismiss_btn_normal_color',
			[
				'label'     => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .eael-cookie-consent .cc-window .cc-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_cookie_dismiss_btn_normal_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#f9f9f9',
				'selectors' => [
					'{{WRAPPER}} .eael-cookie-consent .cc-window .cc-btn' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_cookie_dismiss_btn_normal_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'essential-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#f9f9f9',
				'condition' => [
					'eael_cookie_layout' => 'wire',
				],
				'selectors' => [
					'{{WRAPPER}} .eael-cookie-consent .cc-window .cc-btn' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_cookie_btn_border_radius',
			[
				'label'     => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-cookie-consent .cc-window .cc-btn' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->end_controls_tab();

		// Hover State Tab
		$this->start_controls_tab( 'eael_cookie_btn_hover', [ 'label' => esc_html__( 'Hover', 'essential-addons-elementor' ) ] );

		$this->add_control(
			'eael_cookie_dismiss_btn_hover_color',
			[
				'label'     => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#f9f9f9',
				'selectors' => [
					'{{WRAPPER}} .eael-cookie-consent .cc-window .cc-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_cookie_dismiss_btn_hover_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#3F51B5',
				'selectors' => [
					'{{WRAPPER}} .eael-cookie-consent .cc-window .cc-btn:after' => 'background: {{VALUE}};',
					'{{WRAPPER}} .eael-cookie-consent .cc-window .cc-btn:hover' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_cookie_dismiss_btn_hover_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'essential-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => [
					'eael_cookie_layout' => 'wire',
				],
				'selectors' => [
					'{{WRAPPER}} .eael-cookie-consent .cc-window .cc-btn:hover' => 'border-color: {{VALUE}};',
				],
			]

		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'eael_cookie_btn_padding',
			[
				'label'      => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .eael-cookie-consent .cc-window .cc-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_cookie_btn_margin',
			[
				'label'      => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .eael-cookie-consent .cc-window .cc-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'      => 'eael_cookie_button_shadow',
				'selector'  => '{{WRAPPER}} .eael-cookie-consent .cc-window .cc-btn',
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'eael-cookie-consent-wrapper', [
			'class' => 'eael-cookie-consent',

			'data-message'          => $settings['eael_cookie_massage'],
			'data-dismiss-btn-text' => $settings['eael_cookie_dismiss_btn_text'],
			'data-policy-link-text' => $settings['eael_cookie_policy_link_text'],
			'data-policy-link'      => $settings['eael_cookie_policy_link'],

			'data-position' => $settings['eael_cookie_position'],
			'data-layout'   => $settings['eael_cookie_layout'],

			'data-bg-color'                       => $settings['eael_cookie_bg_color'],
			'data-content-color'                  => $settings['eael_cookie_content_color'],
			'data-dismiss-btn-bg-color'           => $settings['eael_cookie_dismiss_btn_normal_bg_color'],
			'data-dismiss-btn-color'              => $settings['eael_cookie_dismiss_btn_normal_color'],
			'data-dismiss-btn-border-color'       => $settings['eael_cookie_dismiss_btn_normal_border_color'],
			'data-dismiss-btn-hover-bg-color'     => $settings['eael_cookie_dismiss_btn_hover_bg_color'],
			'data-dismiss-btn-hover-color'        => $settings['eael_cookie_dismiss_btn_hover_color'],
			'data-dismiss-btn-hover-border-color' => $settings['eael_cookie_dismiss_btn_hover_border_color'],
		] );

		?>
        <div <?php echo $this->get_render_attribute_string( 'eael-cookie-consent-wrapper' ); ?>></div>


		<?php

	}

	protected function content_template() {

		?>


		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_Eael_Cookie_Consent() );