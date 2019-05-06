<?php

function enqueue_ajax_post_search_script() {
    wp_enqueue_script(
		'eael-posts-ajax-search-js',
		ESSENTIAL_ADDONS_EL_URL.'assets/js/eael-ajax-posts-search.js',
		array( 'jquery' ), '1.0', true
    );
    
    $url = [
        'ajaxUrl'   => admin_url( 'admin-ajax.php' )
    ];
    wp_localize_script( 'eael-posts-ajax-search-js', 'AjaxPostSearch', $url );

}
add_action( 'wp_enqueue_scripts', 'enqueue_ajax_post_search_script' );


function eael_ajax_post_title_filter($where, $wp_query) {
    global $wpdb;
    if ( $search_term = $wp_query->get( 'key_title' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . $wpdb->esc_like( $search_term ) . '%\'';
    }
    return $where;
}


add_action( 'wp_ajax_eael_ajax_post_search', 'ajax_post_search' );
function ajax_post_search() {

    $args = array(
        'post_type'   => 'post',
        'key_title'   => esc_attr($_POST['key']),
        'post_status' => 'publish',
    );

    add_filter( 'posts_where', 'eael_ajax_post_title_filter', 10, 2 );
    $query = new WP_Query($args);

    if( $query->have_posts() ) {
        while($query->have_posts()) {
            $query->the_post();

            ob_start();
            ?>
                <div class="ajax-search-result-post">
                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                </div>
            <?php
            echo ob_get_clean();
        }

        wp_reset_postdata();
    }
    
    remove_filter( 'posts_where', 'eael_ajax_post_title_filter', 10 );
    die();
}