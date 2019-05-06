<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
    <?php echo((gt3_option('responsive') == "1") ? '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">' : ''); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="pingback" href="<?php esc_url(bloginfo('pingback_url')); ?>">
    <?php
        wp_head();
    ?>
    <!-- Google Tag Manager -->
 
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','GTMDataLayer','GTM-TWTDGH');</script>
    <!-- End Google Tag Manager -->
</head>

<?php $gt3_ID = gt3_get_queried_object_id(); ?>


<body <?php body_class(); ?> <?php echo 'data-theme-color="'.esc_attr(gt3_option("theme-custom-color")).'"'; ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TWTDGH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
        if (get_post_meta($post->ID, 'gate_page',true)) {
                                  

            $form = get_post_meta($post->ID, 'gate_page',true); 
            
            echo "<div id='gate_form'>".do_shortcode("$form")."</div>";
        }        

    ?>
    <?php
        /*gt3_preloader();		
        gt3_get_header_builder( $gt3_ID );
        if (get_post_type() != 'gallery') {
	        gt3_get_page_title($gt3_ID);
        }*/
    ?>
	<div class="gt3_header_builder__container">
		<div class="gt3_header_builder__section gt3_header_builder__section--middle">
			<div class="gt3_header_builder__section-container container">
				<div class="middle_left left header_side">
					<div class="header_side_container">
						<div class="logo_container sticky_logo_enable tablet_logo_enable mobile_logo_enable">
							<a href="<?php echo site_url(); ?>">
								<img class="default_logo" src="<?php echo site_url('wp-content/uploads/2019/04/pbsns-logo-flat.png'); ?>" alt="logo" style="height:70px;">
								<img class="sticky_logo" src="<?php echo site_url('wp-content/uploads/2019/04/pbsns-logo-flat.png'); ?>" alt="logo" style="height:70px;">
								<img class="tablet_logo" src="<?php echo site_url('wp-content/uploads/2019/04/pbsns-logo-flat.png'); ?>" alt="logo">
								<img class="mobile_logo" src="<?php echo site_url('wp-content/uploads/2019/04/pbsns-logo-flat.png'); ?>" alt="logo">
							</a>
						</div>
					</div>
				</div>
				<div class="middle_right right header_side">
					<div class="header_side_container">
						<div class="gt3_header_builder_component gt3_header_builder_menu_component">
							<?php wp_nav_menu( array( 'theme_location' => 'main_menu' ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <div class="site_wrapper fadeOnLoad">
        <?php
            $page_shortcode = '';
            if (class_exists( 'RWMB_Loader' )) {
                $page_shortcode = rwmb_meta('mb_page_shortcode');
                if (strlen($page_shortcode) > 0) {
                    echo do_shortcode($page_shortcode);
                }
            }
        ?>
        <div class="main_wrapper">