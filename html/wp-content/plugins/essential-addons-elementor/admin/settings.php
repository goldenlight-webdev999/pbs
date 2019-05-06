<?php
/**
 * Admin Settings Page
 */

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

class Eael_Admin_Settings {

	/**
	 * Contains Default Component keys
	 * @var array
	 * @since 2.3.0
	 */
	public $eael_default_keys = [ 'contact-form-7', 'count-down', 'counter', 'creative-btn', 'divider', 'fancy-text', 'img-comparison', 'instagram-gallery', 'interactive-promo',  'lightbox', 'post-block', 'post-grid', 'post-carousel', 'post-timeline', 'product-grid', 'team-members', 'testimonial-slider', 'testimonials', 'testimonials', 'weforms', 'static-product', 'call-to-action', 'flip-box', 'info-box', 'dual-header', 'price-table', 'price-menu', 'flip-carousel', 'interactive-cards', 'ninja-form', 'content-timeline', 'gravity-form', 'data-table', 'caldera-form','twitter-feed', 'twitter-feed-carousel', 'facebook-feed', 'facebook-feed-carousel', 'filter-gallery', 'dynamic-filter-gallery', 'content-ticker', 'image-accordion', 'post-list', 'tooltip', 'adv-tabs', 'adv-accordion', 'adv-google-map', 'mailchimp', 'toggle', 'one-page-navigation', 'team-member-carousel', 'image-hotspots', 'logo-carousel', 'wpforms', 'protected-content', 'progress-bar', 'offcanvas', 'woo-collections', 'section-particles', 'section-parallax', 'advanced-menu', 'image-scroller', 'global-tooltip', 'cookie-consent', 'dismissible-section' ];

	/**
	 * Will Contain All Components Default Values
	 * @var array
	 * @since 2.3.0
	 */
	private $eael_default_settings;

	/**
	 * Will Contain User End Settings Value
	 * @var array
	 * @since 2.3.0
	 */
	private $eael_settings;

	/**
	 * Will Contains Settings Values Fetched From DB
	 * @var array
	 * @since 2.3.0
	 */
	private $eael_get_settings;

	/**
	 * Initializing all default hooks and functions
	 * @param
	 * @return void
	 * @since 1.1.2
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'create_eael_admin_menu' ), 600 );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_eael_admin_scripts' ) );
		// add_action( 'init', array( $this, 'enqueue_eael_admin_scripts' ) );
		add_action( 'wp_ajax_save_settings_with_ajax', array( $this, 'eael_save_settings_with_ajax' ) );

	}

	/**
	 * Loading all essential scripts
	 * @param
	 * @return void
	 * @since 1.1.2
	 */
	public function enqueue_eael_admin_scripts( $hook ) {
		if( isset( $hook ) && $hook == 'plugins.php' ) {
			wp_enqueue_style( 'essential_addons_elementor-sweetalert2-css', plugins_url( '/', __FILE__ ).'assets/vendor/sweetalert2/css/sweetalert2.min.css' );
			wp_enqueue_script( 'essential_addons_core-js', plugins_url( '/', __FILE__ ).'assets/vendor/sweetalert2/js/core.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'essential_addons_sweetalert2-js', plugins_url( '/', __FILE__ ).'assets/vendor/sweetalert2/js/sweetalert2.min.js', array( 'jquery', 'essential_addons_core-js' ), '1.0', true );
		}
		if( isset( $_GET['page'] ) && ( $_GET['page'] == 'eael-settings' || $_GET['page'] == 'essential-addons-elementor-license' ) ) {
			wp_enqueue_style( 'essential_addons_elementor-admin-css', plugins_url( '/', __FILE__ ).'assets/css/admin.css' );
			wp_enqueue_style( 'font-awesome-css', plugins_url( '/', __FILE__ ).'assets/vendor/font-awesome/css/font-awesome.min.css' );
			wp_enqueue_script( 'essential_addons_elementor-admin-js', plugins_url( '/', __FILE__ ).'assets/js/admin.js', array( 'jquery', 'jquery-ui-tabs' ), '1.0', true );
			wp_enqueue_script( 'essential_addons_core-js', plugins_url( '/', __FILE__ ).'assets/vendor/sweetalert2/js/core.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'essential_addons_sweetalert2-js', plugins_url( '/', __FILE__ ).'assets/vendor/sweetalert2/js/sweetalert2.min.js', array( 'jquery', 'essential_addons_core-js' ), '1.0', true );

			$eael_admin_js_settings = array(
				'eael_google_api' => get_option('eael_save_google_map_api'),
				'eael_mailchimp_api' => get_option('eael_save_mailchimp_api'),
			);
			wp_localize_script( 'essential_addons_elementor-admin-js', 'eaelAdmin', $eael_admin_js_settings );
		}

	}

	/**
	 * Create an admin menu.
	 * @param
	 * @return void
	 * @since 1.1.2
	 */
	public function create_eael_admin_menu() {

		add_submenu_page(
			'elementor',
			'Essential Addons',
			'Essential Addons',
			'manage_options',
			'eael-settings',
			array( $this, 'eael_admin_settings_page' )
		);

	}

	/**
	 * Create settings page.
	 * @param
	 * @return void
	 * @since 1.1.2
	 */
	public function eael_admin_settings_page() {

		$js_info = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		);
		wp_localize_script( 'essential_addons_elementor-admin-js', 'js_eael_pro_settings', $js_info );

	   /**
	    * This section will handle the "eael_save_settings" array. If any new settings options is added
	    * then it will matches with the older array and then if it founds anything new then it will update the entire array.
	    */
	   $this->eael_default_settings = array_fill_keys( $this->eael_default_keys, true );
	   $this->eael_get_settings = get_option( 'eael_save_settings', $this->eael_default_settings );
	   $eael_new_settings = array_diff_key( $this->eael_default_settings, $this->eael_get_settings );
	   if( ! empty( $eael_new_settings ) ) {
	   	$eael_updated_settings = array_merge( $this->eael_get_settings, $eael_new_settings );
	   	update_option( 'eael_save_settings', $eael_updated_settings );
	   }
	   $this->eael_get_settings = get_option( 'eael_save_settings', $this->eael_default_settings );
		?>
		<div class="eael-settings-wrap">
		  	<form action="" method="POST" id="eael-settings" name="eael-settings">
		  		<div class="eael-header-bar">
					<div class="eael-header-left">
						<div class="eael-admin-logo-inline">
							<img src="<?php echo plugins_url( '/', __FILE__ ).'assets/images/ea-logo.svg'; ?>">
						</div>
						<h2 class="title"><?php _e( 'Essential Addons Settings', 'essential-addons-elementor' ); ?></h2>
					</div>
					<div class="eael-header-right">
						<button type="submit" class="button eael-btn js-eael-settings-save"><?php _e('Save settings', 'essential-addons-elementor'); ?></button>
					</div>
				</div>
			  	<div class="response-wrap"></div>
			  	<div class="eael-settings-tabs">

			    	<ul class="eael-tabs">
				      	<li>
							<a href="#general" class="active"><img src="<?php echo plugins_url( '/', __FILE__ ).'assets/images/icon-settings.svg'; ?>"><span>General</span></a>
						</li>
				      	<li><a href="#elements">
						  <img src="<?php echo plugins_url( '/', __FILE__ ).'assets/images/icon-modules.svg'; ?>"><span>Elements</span></a>
						</li>
						<li><a href="#extensions">
						  <img src="<?php echo plugins_url( '/', __FILE__ ).'assets/images/icon-extensions.svg'; ?>"><span>Extensions</span></a>
						</li>
			    	</ul><!-- /.eael-tabs -->

					<?php
						include('partials/general.php');
						include('partials/elements.php');
						include('partials/extensions.php');
					?>
			    	
			  	</div>
		  	</form>
		</div>
		<?php

	}

	/**
	 * Saving data with ajax request
	 * @param
	 * @return  array
	 * @since 1.1.2
	 */
	public function eael_save_settings_with_ajax() {

		if( isset( $_POST['fields'] ) ) {
			parse_str( $_POST['fields'], $settings );
		}else {
			return;
		}
		$this->eael_settings = array(
			'contact-form-7' 		=> intval( $settings['contact-form-7'] ? 1 : 0 ),
			'count-down' 			=> intval( $settings['count-down'] ? 1 : 0 ),
			'counter' 				=> intval( $settings['counter'] ? 1 : 0 ),
			'creative-btn' 			=> intval( $settings['creative-btn'] ? 1 : 0 ),
			'divider'	 			=> intval( $settings['divider'] ? 1 : 0 ),
			'fancy-text' 			=> intval( $settings['fancy-text'] ? 1 : 0 ),
			'img-comparison' 		=> intval( $settings['img-comparison'] ? 1 : 0 ),
			'instagram-gallery' 	=> intval( $settings['instagram-gallery'] ? 1 : 0 ),
			'interactive-promo' 	=> intval( $settings['interactive-promo'] ? 1 : 0 ),
			'lightbox' 				=> intval( $settings['lightbox'] ? 1 : 0 ),
			'post-block' 			=> intval( $settings['post-block'] ? 1 : 0 ),
			'post-list' 			=> intval( $settings['post-list'] ? 1 : 0 ),
			'post-grid' 			=> intval( $settings['post-grid'] ? 1 : 0 ),
			'post-carousel'			=> intval( $settings['post-carousel'] ? 1 : 0 ),
			'post-timeline' 		=> intval( $settings['post-timeline'] ? 1 : 0 ),
			'product-grid' 			=> intval( $settings['product-grid'] ? 1 : 0 ),
			'team-members' 			=> intval( $settings['team-members'] ? 1 : 0 ),
			'testimonial-slider' 	=> intval( $settings['testimonial-slider'] ? 1 : 0 ),
			'testimonials' 			=> intval( $settings['testimonials'] ? 1 : 0 ),
			'weforms' 				=> intval( $settings['weforms'] ? 1 : 0 ),
			'static-product' 		=> intval( $settings['static-product'] ? 1 : 0 ),
			'call-to-action' 		=> intval( $settings['call-to-action'] ? 1 : 0 ),
			'flip-box' 				=> intval( $settings['flip-box'] ? 1 : 0 ),
			'info-box' 				=> intval( $settings['info-box'] ? 1 : 0 ),
			'dual-header' 			=> intval( $settings['dual-header'] ? 1 : 0 ),
			'price-table' 			=> intval( $settings['price-table'] ? 1 : 0 ),
			'price-menu' 			=> intval( $settings['price-menu'] ? 1 : 0 ),
			'flip-carousel' 		=> intval( $settings['flip-carousel'] ? 1 : 0 ),
			'logo-carousel' 		=> intval( $settings['logo-carousel'] ? 1 : 0 ),
			'interactive-cards' 	=> intval( $settings['interactive-cards'] ? 1 : 0 ),
			'ninja-form' 			=> intval( $settings['ninja-form'] ? 1 : 0 ),
			'gravity-form' 			=> intval( $settings['gravity-form'] ? 1 : 0 ),
			'content-timeline' 		=> intval( $settings['content-timeline'] ? 1 : 0 ),
			'data-table' 			=> intval( $settings['data-table'] ? 1 : 0 ),
			'caldera-form' 			=> intval( $settings['caldera-form'] ? 1 : 0 ),
			'wpforms' 				=> intval( $settings['wpforms'] ? 1 : 0 ),
			'twitter-feed'           => intval( $settings['twitter-feed'] ? 1 : 0 ),
			'facebook-feed'          => intval( $settings['facebook-feed'] ? 1 : 0 ),
			'facebook-feed-carousel' => intval( $settings['facebook-feed-carousel'] ? 1 : 0 ),
			'twitter-feed-carousel'  => intval( $settings['twitter-feed-carousel'] ? 1 : 0 ),
			'filter-gallery'         => intval( $settings['filter-gallery'] ? 1 : 0 ),
			'dynamic-filter-gallery' => intval( $settings['dynamic-filter-gallery'] ? 1 : 0 ),
			'content-ticker'         => intval( $settings['content-ticker'] ? 1 : 0 ),
			'image-accordion'        => intval( $settings['image-accordion'] ? 1 : 0 ),
			'tooltip'                => intval( $settings['tooltip'] ? 1 : 0 ),
			'adv-tabs'               => intval( $settings['adv-tabs'] ? 1 : 0 ),
			'adv-accordion'          => intval( $settings['adv-accordion'] ? 1 : 0 ),
			'adv-google-map'         => intval( $settings['adv-google-map'] ? 1 : 0 ),
			'mailchimp'              => intval( $settings['mailchimp'] ? 1 : 0 ),
			'toggle'                 => intval( $settings['toggle'] ? 1 : 0 ),
			'one-page-navigation'    => intval( $settings['one-page-navigation'] ? 1 : 0 ),
			'team-member-carousel'   => intval( $settings['team-member-carousel'] ? 1 : 0 ),
			'image-hotspots'         => intval( $settings['image-hotspots'] ? 1 : 0 ),
			'protected-content'      => intval( $settings['protected-content'] ? 1 : 0 ),
			'progress-bar'           => intval( $settings['progress-bar'] ? 1 : 0 ),
			'offcanvas'              => intval( $settings['offcanvas'] ? 1 : 0 ),
			'woo-collections'        => intval( $settings['woo-collections'] ? 1 : 0 ),
			'advanced-menu'          => intval( $settings['advanced-menu'] ? 1 : 0 ),
			'image-scroller'         => intval( $settings['image-scroller'] ? 1 : 0 ),
			'section-particles'      => intval( $settings['section-particles'] ? 1 : 0 ),
			'section-parallax'       => intval( $settings['section-parallax'] ? 1 : 0 ),
			'dismissible-section'    => intval( $settings['dismissible-section'] ? 1 : 0 ),
			'global-tooltip'         => intval( $settings['global-tooltip'] ? 1 : 0 ),
			'cookie-consent'         => intval( $settings['cookie-consent'] ? 1 : 0 ),
		);
		update_option( 'eael_save_settings', $this->eael_settings );
		// Saving Google Map Api Key
		$eael_google_map_api = $settings['google-map-api'];
		update_option( 'eael_save_google_map_api', $eael_google_map_api );

		// Saving Mailchimp Api Key
		$eael_mailchimp_api = $settings['mailchimp-api'];
		update_option( 'eael_save_mailchimp_api', $eael_mailchimp_api );

		return true;
		die();

	}

}

new Eael_Admin_Settings();
