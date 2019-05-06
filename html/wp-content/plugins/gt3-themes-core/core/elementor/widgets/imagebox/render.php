<?php

if(!defined('ABSPATH')) {
	exit;
}

use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Group_Control_Image_Size;

/** @var \ElementorModal\Widgets\GT3_Core_Elementor_Widget_ImageBox $widget */

$settings = $widget->get_settings_for_display();

if ($settings['type'] === 'image') {

    $has_content = !empty($settings['title_text']) || !empty($settings['description_text']);

    $html = '<div class="gt3-core-imagebox-wrapper">';

    if (!empty($settings['link']['url'])) {
        $widget->add_render_attribute('link', 'href', $settings['link']['url']);

        if ($settings['link']['is_external']) {
            $widget->add_render_attribute('link', 'target', '_blank');
        }

        if (!empty($settings['link']['nofollow'])) {
            $widget->add_render_attribute('link', 'rel', 'nofollow');
        }
    }

    if (!empty($settings['image']['url'])) {
        $widget->add_render_attribute('image', 'src', $settings['image']['url']);
        $widget->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
        $widget->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));

        if ($settings['hover_animation']) {
            $widget->add_render_attribute('image', 'class', 'elementor-animation-' . $settings['hover_animation']);
        }

        $image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');

        if (!empty($settings['link']['url'])) {
            $image_html = '<a ' . $widget->get_render_attribute_string('link') . '>' . $image_html . '</a>';
        }

	    $image_html = '<figure class="gt3-core-imagebox-img">' . $image_html . '</figure>';

	    if ( $settings['position'] === 'default' || empty($settings['title_text']) ){
		    $html .= $image_html;
	    }
    }

    if ($has_content) {

        $html .= '<div class="gt3-core-imagebox-content">';

        if (!empty($settings['title_text'])) {
            $widget->add_render_attribute('title_text', 'class', 'gt3-core-imagebox-title');

            $widget->add_inline_editing_attributes('title_text', 'none');

            $title_html = $settings['title_text'];

            if (!empty($settings['link']['url'])) {
                $title_html = '<a ' . $widget->get_render_attribute_string('link') . '>' . $title_html . '</a>';
            }

            $html .= '<div class="gt3-core-imagebox-title">';

            if ($settings['position'] !== 'default'){
	            $html .= $image_html;
            }

            $html .= sprintf('<%1$s %2$s>%3$s</%1$s>', $settings['title_size'], $widget->get_render_attribute_string('title_text'), $title_html);

	        $html .= '</div>';
        }

        if (!empty($settings['description_text'])) {
            $widget->add_render_attribute('description_text', 'class', 'gt3-core-imagebox-description');

            $widget->add_inline_editing_attributes('description_text');

            $html .= sprintf('<p %1$s>%2$s</p>', $widget->get_render_attribute_string('description_text'), $settings['description_text']);
        }

        $html .= '</div>';
    }

    $html .= '</div>';

    echo ''.$html;

}else{

    $widget->add_render_attribute( 'icon', 'class', [ 'elementor-icon', 'elementor-animation-' . $settings['hover_animation'] ] );

    $icon_tag = 'span';
    $has_icon = ! empty( $settings['icon'] );

    if ( ! empty( $settings['link']['url'] ) ) {
        $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );
        $icon_tag = 'a';

        if ( $settings['link']['is_external'] ) {
            $widget->add_render_attribute( 'link', 'target', '_blank' );
        }

        if ( $settings['link']['nofollow'] ) {
            $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
        }
    }

    if ( $has_icon ) {
        $widget->add_render_attribute( 'i', 'class', $settings['icon'] );
        $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
    }

    $icon_attributes = $widget->get_render_attribute_string( 'icon' );
    $link_attributes = $widget->get_render_attribute_string( 'link' );

    $widget->add_render_attribute( 'description_text', 'class', 'gt3-core-imagebox-description' );

    $widget->add_inline_editing_attributes( 'title_text', 'none' );
    $widget->add_inline_editing_attributes( 'description_text' );

	$icon_html = '';
    ?>
    <div class="gt3-core-imagebox-wrapper">
	<?php if ( $has_icon ) {
		$icon_html .= '<'.implode( ' ', [ $icon_tag, $icon_attributes, $link_attributes ] ).'>';
        $icon_html .= '<i '. $widget->get_render_attribute_string( 'i' ).'></i>';
        $icon_html .= '</'.$icon_tag.'>';

        if ($settings['position'] === 'default'){
	        echo '<div class="gt3-core-imagebox-icon">';
            echo ''.$icon_html;
	        echo '</div>';
        }
	} ?>
    <div class="gt3-core-imagebox-content">

    <<?php echo ''.$settings['title_size']; ?> class="gt3-core-imagebox-title2">
    <?php echo ($settings['position'] !== 'default' ? $icon_html : ''); ?>
    <<?php echo implode( ' ', [
		$icon_tag,
		$link_attributes
	] ); ?><?php echo ''.$widget->get_render_attribute_string( 'title_text' ); ?>
    ><?php echo ''.$settings['title_text']; ?></<?php echo ''.$icon_tag; ?>>
    </<?php echo ''.$settings['title_size']; ?>>
    <p <?php echo ''.$widget->get_render_attribute_string( 'description_text' ); ?>><?php echo ''.$settings['description_text']; ?></p>
    </div>
    </div>
    <?php
}


