<?php

namespace ElementorModal\Widgets;

use Elementor\Widget_Base;

if(!defined('ABSPATH')) {
	exit;
}

if (!class_exists('ElementorModal\Widgets\GT3_Core_Elementor_Widget_ShopList')) {
	class GT3_Core_Elementor_Widget_ShopList extends \ElementorModal\Widgets\GT3_Core_Widget_Base {

        public function get_title() {
            return esc_html__('Shop List', 'gt3_themes_core');
        }

        public function get_icon() {
            return 'eicon-posts-grid';
        }

        public function get_name() {
            return 'gt3-core-shoplist';
        }

        public function get_script_depends() {
            return array(
                'imagesloaded',
            );
        }

        public function get_woo_category() {
            $return = array();
            if (class_exists('WooCommerce')) {
                $product_categories = get_terms('product_cat', 'orderby=count&hide_empty=0');
                if (is_array($product_categories)) {
                    foreach ($product_categories as $cat) {
                        $return[$cat->name . ' (' . $cat->slug . ')'] = $cat->slug;
                    }
                }
            }

            return $return;
        }

		/*public function add_product_post_class( $classes ) {
			$classes[] = 'product';

			return $classes;
		}

		public function add_products_post_class_filter() {
			add_filter( 'post_class', array( $this, 'add_product_post_class') );
		}

		public function remove_products_post_class_filter() {
			remove_filter( 'post_class', array( $this, 'add_product_post_class') );
		}*/


	}
}











