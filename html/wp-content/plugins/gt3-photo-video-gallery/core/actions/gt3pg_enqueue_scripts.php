<?php
if(!defined('ABSPATH')) {
	exit;
} // Exit if accessed directly

add_action('enqueue_block_editor_assets', function(){
	wp_enqueue_media();
	wp_enqueue_script('media-grid');
	wp_enqueue_script('media');
	// Scripts.
	wp_enqueue_script(
		'gt3-photo-video-gallery-block',
		GT3PG_PLUGINROOTURL.'/dist/editor.js',
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			// Tabs
			'jquery-ui-tabs',
			'jquery-ui-accordion',
		), // Dependencies, defined above.
		'',
		true
	);
	wp_localize_script(
		'gt3-photo-video-gallery-block',
		'gt3_gutenberg_photo_video_support',
		array(
			'defaults'           => $GLOBALS['gt3_photo_gallery'],
			'extensions_enabled' => (isset($GLOBALS['gt3pg']) && isset($GLOBALS['gt3pg']['extension']) ?
				array_map(function($value){
					return true;
				}, array_flip(array_keys($GLOBALS['gt3pg']['extension']))) :
				array()
			),
		)
	);

	// Styles.
	wp_enqueue_style(
		'gt3-photo-video-gallery-editor',
		GT3PG_PLUGINROOTURL.'/dist/editor.css',
		array( 'wp-edit-blocks' ),
		''
	);
	wp_enqueue_media();
	wp_enqueue_script('media-grid');
	wp_enqueue_script('media');
	// Scripts.

	// Styles.
	wp_enqueue_style(
		'gt3-photo-video-gallery-editor',
		plugins_url('dist/editor.css', dirname(__FILE__)),
		array( 'wp-edit-blocks' ),
		''
	);

	gt3pg_wp_enqueue_scripts();
//	gt3pg_register_front_css_js();

	if (version_compare(get_bloginfo('version'),'5.0','>=')) {
		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'gt3-photo-video-gallery-block', 'gt3pg' );
		}
	}
});

function get_jed_locale_data($domain){
	$translations = get_translations_for_domain($domain);

	$locale = array(
		'' => array(
			'domain' => $domain,
			'lang'   => is_admin() ? get_user_locale() : get_locale(),
		),
	);

	if(!empty($translations->headers['Plural-Forms'])) {
		$locale['']['plural_forms'] = $translations->headers['Plural-Forms'];
	}

	foreach($translations->entries as $msgid => $entry) {
		$locale[$msgid] = $entry->translations;
	}

	return $locale;
}
add_action('wp_enqueue_scripts', 'gt3pg_wp_enqueue_scripts');

function gt3pg_wp_enqueue_scripts(){
	wp_register_script('blueimp-gallery.js', GT3PG_PLUGINROOTURL.'/dist/frontend.js', array( 'jquery' ,'imagesloaded'), GT3PG_PLUGIN_VERSION, true);
	wp_register_script('isotope', GT3PG_JSURL.'isotope.pkgd.min.js', array( 'jquery' ), '3.0.4', true);

	wp_enqueue_style('blueimp-gallery.css', GT3PG_PLUGINROOTURL.'/dist/frontend.css', null, GT3PG_PLUGIN_VERSION);

	wp_localize_script('blueimp-gallery.js', 'gt3pg_ajax', array(
		'url' => admin_url('admin-ajax.php')
	));
}
