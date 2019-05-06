<?php

	/**
	 *
	 */
	class GT3PortfolioRegister {
		private static $instance = null;

		private $cpt;
		private $taxonomy;
		private $slug;

		public static function instance(){
			if(!self::$instance instanceof self) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		private function __construct(){
			$this->cpt          = 'portfolio';
			$this->taxonomy     = $this->cpt.'_category';
			$this->taxonomy_pos = $this->cpt.'_position';
			$this->tag = $this->cpt.'_tag';
			$this->slug         = $this->cpt;
			if (function_exists('gt3_option')) {
	            $slug_option = gt3_option('portfolio_slug');
	        }else{
	            $slug_option = '';
	        }

	        if (empty($slug_option)) {
	            $this->slug = $this->cpt;
	        }else{
	            $this->slug = sanitize_title( $slug_option );
	        }

			add_action('init', array($this, 'register'));
		}

		public function register(){
			$this->registerPostType();
			$this->registerTax();
			add_filter('single_template', array( $this, 'register_single_template' ));
			add_filter('archive_template', array( $this, 'register_archive_template' ));			
			add_filter('post_gallery', array( $this, 'shortcode_gallery' ), 20, 3);
			add_action('wp_footer', array( $this, 'wp_footer' ));
		}

		private function getSlug(){
			return $this->slug;
		}

		private function registerPostType(){

			register_post_type(
				$this->cpt,
				array(
					'label'           => esc_html__('Portfolio', 'gt3_themes_core'),
					'labels'          => array(
						'name'               => __('Portfolios', 'gt3_themes_core'),
						'singular_name'      => __('Portfolio', 'gt3_themes_core'),
						'menu_name'          => __('Portfolio', 'gt3_themes_core'),
						'name_admin_bar'     => __('Portfolio', 'gt3_themes_core'),
						'add_new'            => __('Add Portfolio', 'gt3_themes_core'),
						'add_new_item'       => __('Add New Portfolio', 'gt3_themes_core'),
						'new_item'           => __('New Portfolio', 'gt3_themes_core'),
						'edit_item'          => __('Edit Portfolio', 'gt3_themes_core'),
						'view_item'          => __('View Portfolio', 'gt3_themes_core'),
						'all_items'          => __('All Portfolios', 'gt3_themes_core'),
						'search_items'       => __('Search Portfolios', 'gt3_themes_core'),
						'parent_item_colon'  => __('Parent Portfolios:', 'gt3_themes_core'),
						'not_found'          => __('No Portfolios found.', 'gt3_themes_core'),
						'not_found_in_trash' => __('No Portfolios found in Trash.', 'gt3_themes_core')
					),
					'public'          => true,
					'has_archive'     => true,
					'capability_type' => 'post',
					'rewrite'         => array(
						'slug' => $this->slug
					),
					'menu_position'   => 5,
					'show_ui'         => true,
					'supports'        => array(
						'title',
						'editor',
						'thumbnail',
						'page-attributes'
					),
					'menu_icon'       => 'dashicons-format-gallery',
					'taxonomies'      => array( $this->taxonomy_pos )
				)
			);
		}

		private function registerTax(){
			$labels = array(
				'name'              => __('Portfolio Categories', 'gt3_themes_core'),
				'singular_name'     => __('Portfolio Category', 'gt3_themes_core'),
				'search_items'      => __('Search Portfolio Categories', 'gt3_themes_core'),
				'all_items'         => __('All Portfolio Categories', 'gt3_themes_core'),
				'parent_item'       => __('Parent Portfolio Category', 'gt3_themes_core'),
				'parent_item_colon' => __('Parent Portfolio Category:', 'gt3_themes_core'),
				'edit_item'         => __('Edit Portfolio Category', 'gt3_themes_core'),
				'update_item'       => __('Update Portfolio Category', 'gt3_themes_core'),
				'add_new_item'      => __('Add New Portfolio Category', 'gt3_themes_core'),
				'new_item_name'     => __('New Portfolio Category Name', 'gt3_themes_core'),
				'menu_name'         => __('Portfolio Categories', 'gt3_themes_core'),
			);

			register_taxonomy(
				$this->taxonomy,
				array( $this->cpt ),
				array(
					'hierarchical'      => true,
					'labels'            => $labels,
					'show_ui'           => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite'           => array( 'slug' => $this->slug. '-' . __('category', 'gt3_themes_core') ),
				)
			);

			$labels = array(
				'name' => __( 'Portfolio Tags', 'gt3_themes_core' ),
				'singular_name' => __( 'Portfolio Tag', 'gt3_themes_core' ),
				'search_items' =>  __( 'Search Portfolio Tags','gt3_themes_core' ),
				'all_items' => __( 'All Portfolio Tags','gt3_themes_core' ),
				'parent_item_colon' => __( 'Parent Portfolio Tag:','gt3_themes_core' ),
				'edit_item' => __( 'Edit Portfolio Tag','gt3_themes_core' ),
				'update_item' => __( 'Update Portfolio Tag','gt3_themes_core' ),
				'add_new_item' => __( 'Add New Portfolio Tag','gt3_themes_core' ),
				'new_item_name' => __( 'New Portfolio Tag Name','gt3_themes_core' ),
				'menu_name' => __( 'Portfolio Tags','gt3_themes_core' ),
			);

			register_taxonomy($this->tag, array($this->cpt), array(
				'hierarchical' => false,
				'labels' => $labels,
				'show_ui' => true,
				'show_admin_column' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => $this->slug.__('-tag','gt3_themes_core') ),
			));
		}

		public function register_single_template($single){
			global $post;
			if($post->post_type == $this->cpt) {
				if(!file_exists(get_template_directory().'/single-'.$this->cpt.'.php')
				   && file_exists(plugin_dir_path(__FILE__).'single-'.$this->cpt.'.php')
				   && is_readable(plugin_dir_path(__FILE__).'single-'.$this->cpt.'.php')) {
					return plugin_dir_path(__FILE__).'single-'.$this->cpt.'.php';
				}
			}

			return $single;
		}

		public function register_archive_template($archive){
	        global $post;
	        if(!empty($post) && $post->post_type == $this->cpt && is_archive()) {
	            if(!file_exists(get_template_directory().'/archive-'.$this->cpt.'.php')
	        		&& file_exists(plugin_dir_path(__FILE__).'archive-'.$this->cpt.'.php')
					&& is_readable(plugin_dir_path(__FILE__).'archive-'.$this->cpt.'.php')) {
	            	return plugin_dir_path(dirname( __FILE__ )).'/portfolio/archive-'.$this->cpt.'.php';
	            }
	        }

	        return $archive;  
	    }

		public function shortcode_gallery($content, $attr, $instance){
			global $post;

			if(get_post_type() != $this->cpt) {
				return $content;
			} else {
				ob_start();
				?>
				<div class="portfolio_gallery">
					<div class="header_panel">

					</div>
					<div class="content_wrapper">

					</div>
					<div class="footer_panel">

					</div>
				</div>

				<?php
				$GLOBALS['gt3themes_portfolio_gallery_footer'] = ob_get_clean();
			}

			return $content;

		}

		public function wp_footer(){
			if (isset($GLOBALS['gt3themes_portfolio_gallery_footer']) && !empty($GLOBALS['gt3themes_portfolio_gallery_footer'])) {
				echo $GLOBALS['gt3themes_portfolio_gallery_footer'];
			}
		}


	}

	GT3PortfolioRegister::instance();
