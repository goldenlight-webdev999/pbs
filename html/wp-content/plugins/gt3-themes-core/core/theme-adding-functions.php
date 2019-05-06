<?php
// Adding functions for theme

function gt3_types_init(){
	if (class_exists('Vc_Manager')) {
		if (function_exists('gt3_shift_title_function')) {
			call_user_func('vc_add_shortcode_param','gt3_shift_title_position' , 'gt3_shift_title_function', get_template_directory_uri().'/core/vc/custom_types/js/gt3_shift_title.js');
		}
		if (function_exists('gt3_multi_select')) {
			call_user_func('vc_add_shortcode_param','gt3-multi-select', 'gt3_multi_select', get_template_directory_uri().'/core/vc/custom_types/js/gt3_multi_select.js' );
		}
		if (function_exists('gt3_on_off_function')) {
			call_user_func('vc_add_shortcode_param','gt3_on_off_function', get_template_directory_uri().'/core/vc/custom_types/js/gt3_on_off.js');
		}
		if (function_exists('gt3_packery_layout_select_function')) {
			call_user_func('vc_add_shortcode_param','gt3_packery_layout_select' , 'gt3_packery_layout_select_function', get_template_directory_uri().'/core/vc/custom_types/js/gt3_packery_layout.js');
		}
		if (function_exists('gt3_image_select')) {
			call_user_func('vc_add_shortcode_param','gt3_dropdown', 'gt3_image_select', get_template_directory_uri().'/core/vc/custom_types/js/gt3_image_select.js' );
		}
		if( function_exists( 'vc_add_shortcode_param' ) && function_exists('gt3_func_init_hotspot') ) {
			add_action('admin_enqueue_scripts', 'gt3_hotspot_assets');
			vc_add_shortcode_param('gt3_init_hotspot', 'gt3_func_init_hotspot', get_template_directory_uri() . '/core/admin/js/gt3_param.js');
		}
	}

    if (class_exists('Elementor')) {

    }
}
add_action( 'init', 'gt3_types_init' );


function gt3_sort_place (){
    $mb_logo_position = rwmb_meta('mb_logo_position');
    $mb_menu_position = rwmb_meta('mb_menu_position');
    $mb_left_bar_position = rwmb_meta('mb_left_bar_position');
    $mb_right_bar_position = rwmb_meta('mb_right_bar_position');

    $mb_logo_order = rwmb_meta('mb_logo_order');
    $mb_menu_order = rwmb_meta('mb_menu_order');
    $mb_left_bar_order = rwmb_meta('mb_left_bar_order');
    $mb_right_bar_order = rwmb_meta('mb_right_bar_order');
    $positions = array(
        'logo' => $mb_logo_position,
        'menu' => $mb_menu_position,
        'left_bar' => $mb_left_bar_position,
        'right_bar' => $mb_right_bar_position
    );
    $sorting_array = array(
        'Left align side' => '',
        'Center align side' => '',
        'Right align side' => ''
    );
    foreach ($positions as $pos => $value) {
        switch ($value) {
            case 'left_align_side':
                $sorting_array['Left align side'][$pos] = ${'mb_'.$pos.'_order'};
                break;
            case 'center_align_side':
                $sorting_array['Center align side'][$pos] = $pos;
                break;
            case 'right_align_side':
                $sorting_array['Right align side'][$pos] = $pos;
                break;
        }
    }
    foreach ($sorting_array as $key => $value) {
        if (is_array($sorting_array[$key])) {
            asort($value);
            $sorting_array[$key] = $value;
        }
        $sorting_array[$key]['placebo'] = 'placebo';
    }
    return $sorting_array;
}

// out search shortcode
if (!function_exists('gt3_search_shortcode')) {
    function gt3_search_shortcode(){
        if (function_exists('gt3_option')) {
            $header_height = gt3_option('header_height');
        }
        $header_height = $header_height['height'];
        if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
            if (rwmb_meta('mb_customize_header_layout') == 'custom') {
                $header_height = rwmb_meta("mb_header_height");
            }
        }

        $search_style = '';
        $search_style .= !empty($header_height) ? 'height:'.$header_height.'px;' : '';
        $search_style = !empty($search_style) ? ' style="'.$search_style.'"' : '' ;


        $out = '<div class="header_search"'.$search_style.'>';
            $out .= '<div class="header_search__container">';
                $out .= '<div class="header_search__icon">';
                    $out .= '<i></i>';
                $out .= '</div>';
                $out .= '<div class="header_search__inner">';
                    $out .= '<div class="gt3_search_form__wrapper">';
                        if (function_exists('gt3_option')) {
                            $header_search_title = gt3_option('header_search_title');
                            if ($header_search_title != NULL && (empty($header_search_title) || $header_search_title == 'What are you looking for today?')) {
                                $header_search_title = esc_html__( 'What are you looking for today?', 'gt3_themes_core' );
                            }
                            if (!empty($header_search_title)) {
                                $out .= '<div class="header_search__inner_title">'.esc_attr($header_search_title).'</div>';
                            }
                        }
                        $out .= get_search_form(false);
                    $out .= '</div>';
                    $out .= '<div class="header_search__inner_cover"></div>';
                    $out .= '<div class="header_search__inner_close"><i class="header_search__search_close_icon"></i></div>';
                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
        return $out;
    }
    add_shortcode('gt3_search', 'gt3_search_shortcode');
}

if (!function_exists('gt3_menu_shortcode')) {
    function gt3_menu_shortcode(){
        if (function_exists('gt3_option')) {
            $header_height = gt3_option('header_height');
        }
        $header_height = $header_height['height'];
        if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
            if (rwmb_meta('mb_customize_header_layout') == 'custom') {
                $header_height = rwmb_meta("mb_header_height");
            }
        }

        $search_style = '';
        $search_style .= !empty($header_height) ? 'height:'.$header_height.'px;' : '';
        $search_style = !empty($search_style) ? ' style="'.$search_style.'"' : '' ;

        ob_start();
        if (has_nav_menu( 'top_header_menu' )) {
            echo "<nav class='top-menu main-menu main_menu_container'>";
                gt3_top_menu ();
            echo "</nav>";
            echo '<div class="mobile-navigation-toggle"><div class="toggle-box"><div class="toggle-inner"></div></div></div>';
        }
        $out = ob_get_clean();
        return !empty($out) ? $out : '';
    }
    add_shortcode('gt3_menu', 'gt3_menu_shortcode');
}

if (!function_exists('gt3_top_menu')) {
    function gt3_top_menu (){
        wp_nav_menu( array(
            'theme_location'  => 'top_header_menu',
            'container' => '',
            'container_class' => '',
            'after' => '',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'walker' => ''
        ) );
    }
}

add_action('wp_head','gt3_wp_head_custom_code',1000);
function gt3_wp_head_custom_code() {
    // this code not only js or css / can insert any type of code

    if (function_exists('gt3_option')) {
        $header_custom_code = gt3_option('header_custom_js');
    }
    echo isset($header_custom_code) ? $header_custom_code : '';
}

add_action('wp_footer', 'gt3_custom_footer_js',1000);
function gt3_custom_footer_js() {
    if (function_exists('gt3_option')) {
        $custom_js = gt3_option('custom_js');
    }
    echo isset($custom_js) ? '<script type="text/javascript" id="gt3_custom_footer_js">'.$custom_js.'</script>' : '';
}


if (!function_exists('gt3_string_coding')) {
    function gt3_string_coding($code){
        if (!empty($code)) {
            return base64_encode($code);
        }
        return;
    }
}


/**
 * @param $tmpl
 * @param null $settings
 */
function gt3_get_woo_template ($tmpl, $settings = NULL) {
    $locate = locate_template('woocommerce/' . $tmpl . '.php');
    if (!empty($locate)){
        require $locate;
    }
}

/**
 * Grid/List Section
 */
if ( class_exists('WooCommerce') ) {
    if ( ! class_exists( 'GT3_GridList_WOO' ) ) {

        class GT3_GridList_WOO {
            private static $instance = null;

            public static function instance(){
                if(!self::$instance instanceof self) {
                    self::$instance = new self();
                }

                return self::$instance;
            }

            private function __construct(){
                add_action( 'wp' , array( $this, 'setup' ) , 20);
            }

            // Setup
            public function setup() {
                add_action('wp_enqueue_scripts', array($this, 'gt3_enqueue_scripts'), 20);
                $woocommerce_grid_list = gt3_option('woocommerce_grid_list');
                if ($woocommerce_grid_list == 'grid' || $woocommerce_grid_list == 'list') {
                    add_action('woocommerce_before_shop_loop', array($this, 'toggle_button'), 12);
                    add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_single_excerpt', 5);
                    add_action('woocommerce_shortcode_after_recent_products_loop', 'woocommerce_pagination', 10);
                }
            }

            // Scripts & styles
            public static function gt3_enqueue_scripts() {
                static $allow = true;
                if (!$allow) return;
                $allow = false;

                wp_enqueue_style( 'dashicons' );
                wp_enqueue_script( 'gt3-gridlist-woo', plugin_dir_url(__FILE__).'elementor/assets/js/core-gridlist-woo.js', array( 'jquery' ), gt3_themes_core_version() );
                add_action( 'wp_footer', array( 'GT3_GridList_WOO', 'gridlist_woo_set_default_view' ), 1 );
            }

            // Toggle button
            public static function toggle_button() {
                $grid_view = esc_html__( 'Grid view', 'gt3_themes_core' );
                $list_view = esc_html__( 'List view', 'gt3_themes_core' );

                $compile = sprintf( '<nav class="gt3-gridlist-toggle">
										<a href="#" id="list" title="%2$s"></a>
										<a href="#" id="grid" title="%1$s"></a>
										<div class="gt3_woo_gridlist-toggle">
											<div class="gt3_woo_gridlist-one"></div>
											<div class="gt3_woo_gridlist-two"></div>
											<div class="gt3_woo_gridlist-three"></div>
											<div class="gt3_woo_gridlist-four"></div>
											<div class="gt3_woo_gridlist-five"></div>
										</div>
									</nav>', $grid_view, $list_view );

                echo apply_filters( 'gt3_gridlist_woo_toggle_button_output', $compile, $grid_view, $list_view );
            }

            public static function gridlist_woo_set_default_view() {

                $default = gt3_option('woocommerce_grid_list');
                ?>
                <script>
                    var $default = '<?php echo esc_attr($default); ?>',
                        $default_loc = localStorage.getItem('gt3_gridlist_woo');

                    if ($default_loc == null) {
                        jQuery( '.site-main > ul.products' ).addClass( '<?php echo esc_attr($default); ?>' );
                        jQuery( '.gt3-gridlist-toggle #<?php echo esc_attr($default); ?>' ).addClass( 'active' );
                    }
                </script>
                <?php
            }
        }

        GT3_GridList_WOO::instance();
    }



    function gt3_new_product_tab_callback() {
        $post_id = get_the_ID();
        if (get_post_type($post_id) != 'product') return;
        $gt3_product_details = get_post_meta($post_id,'gt3_new_product_tab_meta_value_key',true);
        $gt3_product_subtitle = get_post_meta($post_id,'gt3_product_subtitle_meta_value_key',true);

        echo '<div class="rwmb-field rwmb-select-wrapper">';
        wp_nonce_field('gt3_new_product_tab_nonce_'.$post_id,'gt3_new_product_tab_nonce');
        echo '<div class="rwmb-label">
                  <label for="gt3_product_subtitle_field">'.esc_html__("Sub-Title for Current product", 'gt3_themes_core' ).'</label>
              </div>
              <div class="rwmb-input">
                  <textarea id="gt3_product_subtitle_field" name="gt3_product_subtitle_field" style="width:100%;height:90px;" />'.$gt3_product_subtitle.'</textarea>
              </div>';
        echo '<div class="rwmb-label">
                  <label for="gt3_new_product_tab_field">'.esc_html__("Tab \"Details\" for Current product", 'gt3_themes_core' ).'</label>
              </div>
              <div class="rwmb-input">
                  <textarea id="gt3_new_product_tab_field" name="gt3_new_product_tab_field" style="width:100%;height:90px;" />'.$gt3_product_details.'</textarea>
              </div>';
        echo '</div>';
    }

    function gt3_new_product_tab_save_postdata( $post_id ) {
        if (!isset($_POST['gt3_new_product_tab_nonce']) || !wp_verify_nonce($_POST['gt3_new_product_tab_nonce'],'gt3_new_product_tab_nonce_'.$post_id)) return;
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
            return $post_id;
        }
        if ( 'page' == $_POST['post_type'] && ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        } elseif( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
        if ( !isset($_POST['gt3_new_product_tab_field']) && !isset($_POST['gt3_product_subtitle_field']) )
            return;

        $_data = wp_kses_post( $_POST['gt3_new_product_tab_field'] );
        $_data_2 = wp_kses_post( $_POST['gt3_product_subtitle_field'] );
        update_post_meta( $post_id, 'gt3_new_product_tab_meta_value_key', $_data );
        update_post_meta( $post_id, 'gt3_product_subtitle_meta_value_key', $_data_2 );
    }
    add_action( 'save_post', 'gt3_new_product_tab_save_postdata' );

    function gt3_new_product_tab_frontend( $tabs ) {
        $gt3_product_details = get_post_meta(get_the_ID(),'gt3_new_product_tab_meta_value_key',true);
        if ( !empty( $gt3_product_details ) ) {
            $tabs['details'] = array(
                'title'     => esc_html__( 'Details', 'gt3_themes_core' ),
                'priority'  => 20,
                'callback'  => 'woo_new_product_tab_content'
            );
        }
        return $tabs;
    }
    function woo_new_product_tab_content() {
        $gt3_product_details = get_post_meta(get_the_ID(),'gt3_new_product_tab_meta_value_key',true);
        echo '<h2>'.esc_html__( 'Details', 'gt3_themes_core' ).'</h2>';
        echo '<p>'.wp_kses_post($gt3_product_details).'</p>';
    }
    add_filter( 'woocommerce_product_tabs', 'gt3_new_product_tab_frontend' );

    // Display Product Title
    function gt3_product_subtitle_frontend() {
        $gt3_product_subtitle = get_post_meta(get_the_ID(),'gt3_product_subtitle_meta_value_key',true);
        if ( !empty( $gt3_product_subtitle ) ) {
            echo '<h4 class="gt3-product-subtitle">'.esc_attr($gt3_product_subtitle).'</h4>';
        }
    }
    add_action('woocommerce_single_product_summary','gt3_product_subtitle_frontend', 6);

    // New tab for Single Product Data Tabs
    function gt3_new_product_tab() {
        add_meta_box( 'gt3_new_product_tab', esc_html__( 'Product Options', 'gt3_themes_core' ), 'gt3_new_product_tab_callback', 'product' );
    }
    add_action('add_meta_boxes', 'gt3_new_product_tab');

}


/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 * If Redux is running as a plugin, this will remove the demo notice and links
 */
add_action( 'redux/loaded', 'gt3_remove_demo' );
if ( ! function_exists( 'gt3_remove_demo' ) ) {
    function gt3_remove_demo() {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
}

remove_filter('pre_user_description', 'wp_filter_kses');

function gt3_remove_action_yith_woocompare_frontend() {
    gt3_remove_undeletable_action( 'woocommerce_after_shop_loop_item', 'YITH_Woocompare_Frontend','add_compare_link' );
}
if ( !function_exists('gt3_remove_undeletable_action') ) {
    function gt3_remove_undeletable_action( $tag, $class, $method ) {
        $filters = $GLOBALS['wp_filter'][ $tag ];

        if ( empty ( $filters ) ) return;

        foreach ( $filters as $priority => $filter ) {
            foreach ( $filter as $identifier => $function ) {
                if ( is_array( $function) and is_a( $function['function'][0], $class ) and $method === $function['function'][1] ) {
                    remove_filter( $tag, array ( $function['function'][0], $method ), $priority );
                }
            }
        }
    }
}

function gt3_custom_dequeue_style () {
    wp_dequeue_style( 'flick' );
}
add_action( 'wp_enqueue_scripts', 'gt3_custom_dequeue_style', 100 );

function gt3_add_svg_to_upload_mimes( $upload_mimes ) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'gt3_add_svg_to_upload_mimes', 10, 1 );


// srcset maker
if (!function_exists('gt3_get_image_srcset')) {
    /**
     *  get image src,srcset,sizes
     * @param  [type]  $src                   [image src]
     * @param  integer $image_ratio           [ratio of width/height]
     * @param  array   $responsive_dimensions [array with demensions settings arrays]
     * @return [type]                         [src srcset sizes html]
     */
    function gt3_get_image_srcset($src,$image_ratio = 1,$responsive_dimensions = array(),$lazyload = false){
        if (empty($src)) {
            return;
        }

        $srcset_out = '';
        $sizes_out  = '';
        $image_width_and_dimensions = array();
        $src_out = '';

        $image_width_array = array();

        if (!empty($responsive_dimensions)) {
            foreach ($responsive_dimensions as $responsive_dimension) {
                $view_port = $responsive_dimension[0];
                $image_width = $responsive_dimension[1];
                $responsive_image_ratio = !empty($responsive_dimension[2]) ? $responsive_dimension[2] : $image_ratio;
                if ($responsive_image_ratio == null) {
                    $image_height = null;
                }else{
                   $image_height = (int)($image_width * $responsive_image_ratio);
                }

                $image_width_array[$image_width] = true;

                if (!empty($view_port)) {
                    if (!empty($sizes_out)) {
                        $sizes_out .= ', ';
                    }
                    $sizes_out .= '(min-width: '.(int)$view_port.'px) '.(int)$image_width.'px';
                    if ((int)$view_port == 1200) {
                        $image_out = aq_resize($src, $image_width, $image_height, true, true, true );
                        if ($image_out) {
                            if ($lazyload) {
                                $src_out = 'data-src="'.esc_url($image_out).'"';
                            }else{
                                $src_out = 'src="'.esc_url($image_out).'"';
                            }
                            
                        }else{
                            if ($lazyload) {
                                $src_out = 'data-src="'.esc_url($src).'"';
                            }else{
                                $src_out = 'src="'.esc_url($src).'"';
                            }
                        }
                    }
                }

                if (empty($image_width_and_dimensions[$image_width.'_'.$image_height])) {
                    $image_width_and_dimensions[$image_width.'_'.$image_height] = true;
                    $srcset_out .= !empty($srcset_out) ? ', ' : '';
                    $srcset_out .= esc_url(aq_resize($src, $image_width, $image_height, true, true, true ));
                    $srcset_out .= ' '.(int)$image_width.'w';
                }

            }
            if ( empty($image_width_array['420'])) {
                $sizes_out .= ', (max-width: 600px) 420px';
                $srcset_out .= ','.esc_url(aq_resize($src, 420, 420*$image_ratio, true, true, true )).' 420w';
            }
        }
        if (empty($src_out)) {
            $image_out = aq_resize($src, 1170, 1170*$image_ratio, true, true, true );
            $src_out = 'src="'.esc_url($image_out).'"';
        }

        if ($image_out) {
            if (!empty($srcset_out)) {
                if ($lazyload) {
                    $srcset_out = ' data-srcset="'.$srcset_out.'"';
                }else{
                    $srcset_out = ' srcset="'.$srcset_out.'"';
                }
            }

            if (!empty($sizes_out)) {
                $sizes_out = ' sizes="'.$sizes_out.'"';
            }
        }else{
            $srcset_out = '';
            $sizes_out = '';
        }

        return $src_out.$srcset_out.$sizes_out;

    }
}

if (!function_exists('gt3_add_post_admin_thumbnail_column')) {
    add_image_size( 'gt3-admin-post-featured-image', 120, 120, true );
    add_filter('manage_portfolio_posts_columns', 'gt3_add_post_admin_thumbnail_column', 2);
    add_filter('manage_project_posts_columns', 'gt3_add_post_admin_thumbnail_column', 2);
    add_filter('manage_team_posts_columns', 'gt3_add_post_admin_thumbnail_column', 2);
    add_filter('manage_post_posts_columns', 'gt3_add_post_admin_thumbnail_column', 2);

    function gt3_add_post_admin_thumbnail_column($gt3_columns){
        $gt3_columns['post_thumb'] = __('Featured Image','gt3_themes_core ');
        return $gt3_columns;
    }
}

if (!function_exists('gt3_show_post_thumbnail_column')) {
    add_action('manage_portfolio_posts_custom_column', 'gt3_show_post_thumbnail_column', 5, 2);
    add_action('manage_project_posts_custom_column', 'gt3_show_post_thumbnail_column', 5, 2);
    add_action('manage_team_posts_custom_column', 'gt3_show_post_thumbnail_column', 5, 2);
    add_action('manage_post_posts_custom_column', 'gt3_show_post_thumbnail_column', 5, 2);

    function gt3_show_post_thumbnail_column($gt3_columns, $portfolio_id){
        switch($gt3_columns){
            case 'post_thumb':
            if( function_exists('the_post_thumbnail') ) {
                the_post_thumbnail( 'gt3-admin-post-featured-image' );
            }
            else
                echo 'hmm... your theme doesn\'t support featured image...';
            break;
        }
    }
}

if( !function_exists('register_posts_widgets')){
	function register_posts_widgets(){
		register_widget('posts');
	}
}

if( !function_exists('register_flickr_widgets')) {
	function register_flickr_widgets() {
		register_widget( 'flickr' );
	}
}

if( !function_exists('register_title_widgets')) {
	function register_title_widgets() {
		register_widget( 'title' );
	}
}

if( !function_exists('remove_aq_resize_filter')) {
	function remove_aq_resize_filter($aq_upscale){
	    remove_filter('image_resize_dimensions', $aq_upscale);
    }
}


/* add options to hide column on responsive dims */
if ( !function_exists( 'ch_hide_column_elementor_controls' ) ) {
    add_action( 'elementor/element/before_section_end' , 'ch_hide_column_elementor_controls', 10, 3 );
    function ch_hide_column_elementor_controls( $section, $section_id, $args ) {

        if ( $section_id == 'layout') {
            $section->add_control(
            'gt3_column_link',
            [
              'label'       => __( 'Column Link Url', 'gt3_themes_core' ),
              'type'        => Elementor\Controls_Manager::URL,
              'dynamic'     => [
                'active' => true,
              ],
              'placeholder' => __( 'https://your-link.com', 'gt3_themes_core' ),
              'selectors'   => [
            ],
            ]
          );
        }

        if( $section_id == 'section_advanced' ) :

            $section->add_control(
                'hide_desktop_column',
                [
                    'label' => __( 'Hide On Desktop', 'gt3_themes_core' ),
                    'type' => Elementor\Controls_Manager::SWITCHER,
                    'default' => '',
                    'prefix_class' => 'elementor-',
                    'label_on' => __( 'Hide', 'gt3_themes_core' ),
                    'label_off' => __( 'Show', 'gt3_themes_core' ),
                    'return_value' => 'hidden-desktop',
                ]
            );

            $section->add_control(
                'hide_tablet_column',
                [
                    'label' => __( 'Hide On Tablet', 'gt3_themes_core' ),
                    'type' => Elementor\Controls_Manager::SWITCHER,
                    'default' => '',
                    'prefix_class' => 'elementor-',
                    'label_on' => __( 'Hide', 'gt3_themes_core' ),
                    'label_off' => __( 'Show', 'gt3_themes_core' ),
                    'return_value' => 'hidden-tablet',
                ]
            );

            $section->add_control(
                'hide_mobile_column',
                [
                    'label' => __( 'Hide On Mobile', 'gt3_themes_core' ),
                    'type' => Elementor\Controls_Manager::SWITCHER,
                    'default' => '',
                    'prefix_class' => 'elementor-',
                    'label_on' => __( 'Hide', 'gt3_themes_core' ),
                    'label_off' => __( 'Show', 'gt3_themes_core' ),
                    'return_value' => 'hidden-phone',
                ]
            );
        endif;
    }
}


if (!function_exists('gt3_column_before_render_options')) {
    function gt3_column_before_render_options( $element ) {
      $settings  = $element->get_settings_for_display();

      if ( ! empty( $settings['gt3_column_link']['url'] ) ) {

        $element->add_render_attribute( '_wrapper', 'class', 'gt3_column_link-elementor' );
        $element->add_render_attribute( '_wrapper', 'style', 'cursor: pointer;' );
        $element->add_render_attribute( '_wrapper', 'data-column-clickable-url', $settings['gt3_column_link']['url'] );

        if ( $settings['gt3_column_link']['is_external'] ) {
          $element->add_render_attribute( '_wrapper', 'data-column-clickable-blank', 'yes' );
        }
      }
    }
    add_action( 'elementor/frontend/column/before_render', 'gt3_column_before_render_options', 10 );
}

add_action('elementor/element/image-carousel/section_style_navigation/before_section_end', function($element,$args){
    /* @var \Elementor\Widget_Base $element */
    $element->update_control('arrows_color',array(
        'selectors' => [
            '{{WRAPPER}} .elementor-image-carousel-wrapper .slick-slider .slick-prev:before, {{WRAPPER}} .elementor-image-carousel-wrapper .slick-slider .slick-prev:after, {{WRAPPER}} .elementor-image-carousel-wrapper .slick-slider .slick-next:before, {{WRAPPER}} .elementor-image-carousel-wrapper .slick-slider .slick-next:after' => 'color: {{VALUE}};',
        ]
    ));
},20,2);



if (!function_exists('gt3_get_top_offset_for_page_title')) {
    function gt3_get_top_offset_for_page_title($header_on_bg,$tablet_header_on_bg,$mobile_header_on_bg,$responsive_header_height){

        $custom_page_title_style = '';
        if(is_array($responsive_header_height) && !empty($responsive_header_height['desktop_height'])){
            if ((bool)$header_on_bg && $responsive_header_height['desktop_height']) {
                $custom_page_title_style .= ".gt3-page-title_wrapper .gt3-page-title{padding-top: ".(int)$responsive_header_height['desktop_height']."px;}";
            }
            if ((bool)$tablet_header_on_bg) {
                $custom_page_title_style .=  "@media only screen and (max-width: 1200px){.gt3-page-title_wrapper .gt3-page-title{padding-top: ".(int)$responsive_header_height['tablet_height']."px;}}";
            }else{
                $custom_page_title_style .=  "@media only screen and (max-width: 1200px){.gt3-page-title_wrapper .gt3-page-title{padding-top: 20px;padding-bottom: 20px;}}";
            }
            if ((bool)$mobile_header_on_bg && $responsive_header_height['mobile_height']) {
                $custom_page_title_style .=  "@media only screen and (max-width: 767px){.gt3-page-title_wrapper .gt3-page-title{padding-top: ".(int)$responsive_header_height['mobile_height']."px;}}";
            }else{
                $custom_page_title_style .=  "@media only screen and (max-width: 767px){.gt3-page-title_wrapper .gt3-page-title{padding-top: 20px;padding-bottom: 20px;}}";
            }
            echo ' <script type="text/javascript">
                var custom_page_title_style = "' .  $custom_page_title_style  . '";
                if (document.getElementById("custom_page_title_style")) {
                    document.getElementById("custom_page_title_style").innerHTML += custom_page_title_style;
                } else if (custom_page_title_style !== "") {
                    document.head.innerHTML += \'<style id="custom_page_title_style" type="text/css">\'+custom_page_title_style+\'</style>\';
                }</script>';
        }
    }
}


if (!function_exists('getSolidColorFromImage')) {
    function getSolidColorFromImage($filepath) {
        $attach_id = get_post_thumbnail_id(get_the_ID());
        $solid_color = get_post_meta( $attach_id, 'solid_color', true);

        if (!empty($solid_color)) {
            return $solid_color;
        }

        $type = wp_check_filetype($filepath); // [] if you don't have exif you could use getImageSize()
        if (!empty($type) && is_array($type) && !empty($type['ext'])) {
            $type = $type['ext'];
        }else{
            return '#D3D3D3';
        }
        $allowedTypes = array(
            'gif',  // [] gif
            'jpg',  // [] jpg
            'png',  // [] png
            'bmp'   // [] bmp
        );
        if (!in_array($type, $allowedTypes)) {
            return '#D3D3D3';
        }
        $im = false;
        switch ($type) {
            case 'gif' :
                $im = imageCreateFromGif($filepath);
            break;
            case 'jpg' :
                $im = imageCreateFromJpeg($filepath);
            break;
            case 'png' :
                $im = imageCreateFromPng($filepath);
            break;
            case 'bmp' :
                $im = imageCreateFromBmp($filepath);
            break;
        }

        if ($im) {
            $thumb=imagecreatetruecolor(1,1);
            imagecopyresampled($thumb,$im,0,0,0,0,1,1,imagesx($im),imagesy($im));
            $mainColor=strtoupper(dechex(imagecolorat($thumb,0,0)));
            update_post_meta( $attach_id, 'solid_color', $mainColor );
            return $mainColor;
        }else{
            return '#D3D3D3';
        }
    }
}

if (!function_exists('gt3_add_widget_to_theme')) {
    function gt3_add_widget_to_theme(){
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/widgets/posts.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/widgets/flickr.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/widgets/title.php';
    }
}

require_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/class-gt3-woocommerce-adjacent-products.php';
