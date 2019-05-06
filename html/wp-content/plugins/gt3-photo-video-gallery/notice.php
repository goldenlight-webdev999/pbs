<?php

class GT3_Notice {
	private $notice = array(
		'disable_50_off' => array(
			'option' => 'gt3pg_disable_50_off',
			'callback' => 'pro_version',
		),
	);


	function __construct(){
		if (is_array($this->notice) && count($this->notice)) {
			add_action('wp_ajax_gt3pg_disable_notice', array($this, 'ajax_handler'));

			foreach($this->notice as $notice) {
				if (isset($notice['option']) &&
				    !get_option($notice['option']) &&
				    method_exists($this, $notice['callback'])) {
					add_action('admin_notices', array($this,$notice['callback']));
				}
			}
		}
	}
	function ajax_handler(){
		if(!isset($_POST['gt3_action'])) {
			wp_die(0);
		}
		$action = $_POST['gt3_action'];

		$is_local = false;
		switch($action) {
			case 'disable_rate_later':
				$is_local = true;
				$rate_time = time()+3600*24*7;
				update_option('gt3_rate_date', $rate_time);
				break;
			case 'disable_rate_notice':
				$is_local = true;
				update_option('gt3pg_disable_rate_notice', true);
				break;
			case 'disable_50_off':
				$is_local = true;
				update_option('gt3pg_disable_50_off', true);
				break;
			case 'disable_NewYearSale2019':
				$is_local = true;
				update_option('gt3pg_disable_NewYearSale2019', true);
				break;
		}
		$is_local && die(1);
		if (key_exists($action, $this->notice) && key_exists('action_callback',$this->notice[$action])) {
			$notice = $this->notice[$action];
			if (method_exists($this, $notice['action_callback']) && is_callable(array($this, $notice['action_callback']))) {
				call_user_func(array($this,$notice['action_callback']));
			}
		}
		wp_die(1);
	}


	function pro_version(){
		$msg   = 'The <b>Pro version</b> of GT3 Photo & Video Gallery is now available. <span style="color: red;">Save 50% OFF</span> -&gt; <a href="http://bit.ly/2BwslYG" target="_blank">View Pro Version</a>';
		$class = 'notice notice-warning gt3pg_error_notice is-dismissible gt3pg_50_off_info';
		echo '<div class="'.$class.'"><p>'.$msg.'</p></div>';
		?>
		<script>
			document.addEventListener("DOMContentLoaded", function () {
				var notice = document.querySelector('.gt3pg_50_off_info');
				if (notice) {
					notice = notice.querySelector('.notice-dismiss');
					notice.addEventListener('click', function (e) {
						jQuery.ajax({
							url: ajaxurl,
							method: "POST",
							data: {
								action: "gt3pg_disable_notice",
								gt3_action: "disable_50_off"
							}
						})
					})
				}
			})
		</script>
		<?php
	}



}

new GT3_Notice();
