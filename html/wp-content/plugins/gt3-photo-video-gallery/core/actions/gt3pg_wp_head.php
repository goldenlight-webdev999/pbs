<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	} // Exit if accessed directly

	function gt3pg_wp_head() {
		$gt3_photo_gallery = gt3pg_get_option( "photo_gallery" );
		if ( isset( $gt3_photo_gallery['gt3pg_text_before_head'] ) ) {
			echo( ( strlen( $gt3_photo_gallery['gt3pg_text_before_head'] ) ) ? "<style>" . $gt3_photo_gallery['gt3pg_text_before_head'] . "</style>\n" : '' );
		}
	}