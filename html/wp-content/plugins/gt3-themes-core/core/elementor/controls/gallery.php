<?php

namespace Elementor;

if(!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

use Elementor\Base_Data_Control;


if(!class_exists('\Elementor\GT3_Core_Elementor_Control_Gallery')) {
	class GT3_Core_Elementor_Control_Gallery extends Base_Data_Control {

		public function get_type(){
			return self::type();
		}

		public static function type(){
			return 'gt3-elementor-core-gallery';
		}

		public function get_default_value(){
			return array();
		}

		public function get_value($control, $widget){
			if(isset($widget[$control['name']]) && !empty($widget[$control['name']])) {
				$images = explode(',', $widget[$control['name']]);
			} else {
				$images = array();
			}

			return $images;
		}

		public function content_template(){
			?>
			<div class="elementor-control-field">
				<div class="elementor-control-gt3-gallery elementor-control-type-gallery">
					<div class="control-gt3-gallery-title">{{ label }}</div>
					<div class="control-gt3-gallery-info"></div>
					<div class="control-gt3-gallery-preview"></div>
					<div class="elementor-button elementor-control-gallery-add control-gt3-gallery-add"><?php echo esc_html__('+ Add Image', 'gt3_themes_core') ?></div>
					<input type="hidden" data-setting="{{ name }}" class="control-gt3-gallery-input" />
				</div>
			</div>
			<?php
		}
	}
}






