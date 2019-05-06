<?php

if(!defined('ABSPATH')) {
	exit;
}

/** @var \ElementorModal\Widgets\GT3_Core_Elementor_Widget_Divider $widget */

$settings = array();

$settings = wp_parse_args($widget->get_settings(), $settings);

$widget->add_render_attribute('wrapper', 'class', array(
	'gt3_divider_wrapper-elementor',
	empty($settings['text']) ? 'without_text' : '',
));

?>
	<div <?php $widget->print_render_attribute_string('wrapper') ?>>
		<?php
		if($settings['line_left']) {
			echo '<span></span>';
		}
		if(!empty($settings['text'])) {
			echo '<h6>'.esc_html($settings['text']).'</h6>';
		}
		if($settings['line_right']) {
			echo '<span></span>';
		}
		?>
	</div>
<?php




