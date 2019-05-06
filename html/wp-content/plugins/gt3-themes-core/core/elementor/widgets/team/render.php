<?php

if(!defined('ABSPATH')) {
	exit;
}

use Elementor\GT3_Core_Elementor_Control_Query;

/** @var \ElementorModal\Widgets\GT3_Core_Elementor_Widget_Team $widget */

$settings = $widget->get_settings();

$team_short_class = '';
if (isset($settings['grid_gap']) && $settings['grid_gap'] != '0') {
	$team_short_class = 'team_has_grid_gap';
}

$query_args = $settings['query']['query'];
unset($settings['query']['query']);
$query_raw = $settings['query'];

$query = new WP_Query($query_args);

$exclude = array();
if(isset($query_args['orderby']) && $query_args['orderby'] == 'rand') {
	foreach($query->posts as $_post) {
		$exclude[] = $_post->ID;
	}
}

$compile = '';

$widget->add_render_attribute('wrapper', 'class', 'module_team');
$widget->add_render_attribute('wrapper', 'class', esc_attr($settings['type']));
?>
	<div <?php $widget->print_render_attribute_string('wrapper') ?>>
		<div class="shortcode_team <?php echo esc_attr($team_short_class); ?>">
			<div class="items<?php echo (int) $settings['posts_per_line']; ?>">
				<?php if($settings['use_filter'] && !empty($query_raw['taxonomy'])) { ?>
					<div class="isotope-filter">
						<?php
						echo '<a href="#" class="active" data-filter="*">'.esc_html__('All', 'gt3_themes_core').'</a>';
						foreach($widget->get_taxonomy($query_raw['taxonomy']) as $cat_slug) {
							echo '<a href="#" data-filter=".'.esc_attr($cat_slug['slug']).'">'.esc_html($cat_slug['name']).'</a>';
						}
						?>
					</div>
				<?php }
				$widget->add_render_attribute('item_list', 'class', 'item_list gt3_clear');
				if($settings['use_filter'] && !empty($query_raw['taxonomy'])) {
					$widget->add_render_attribute('item_list', 'class', 'isotope');
				}
				?>
				<ul <?php $widget->print_render_attribute_string('item_list') ?>>
					<?php
					if($query->have_posts()) {
						$widget->render_index = 1;
						while($query->have_posts()) {
							$query->the_post();
							$compile .= $widget->render_team_item($query_args['posts_per_page'], false, $settings['grid_gap'], $settings['link_post'], $settings['custom_item_height'],$settings);
						}
						wp_reset_postdata();
					}
					echo ''.$compile;
					?>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
	</div>
<?php



