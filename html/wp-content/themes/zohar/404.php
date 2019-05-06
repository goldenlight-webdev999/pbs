<?php get_header();

$page_bg = gt3_option('page_404_bg');
$page_bg_url  = $page_bg['url'];
get_header();
?>
	<div class="wrapper_404 " <?php echo !empty($page_bg_url) ? "style='background-image: url(".esc_url($page_bg_url).")';" : "" ?> >
		<div class="container_vertical_wrapper">
			<div class="container a-center">
				<h3><?php echo esc_html__('Whoops!', 'zohar'); ?></h3>
				<h1 class="number_404"><?php echo esc_html__('404', 'zohar'); ?></h1>
				<h2><?php echo esc_html__('Nothing Was Found!', 'zohar'); ?></h2>
				<p><?php echo esc_html__('Either Something Get Wrong or the Page Doesn\'t Exist Anymore.', 'zohar'); ?></p>
				<div class="gt3_404_search">
					<?php get_search_form(); ?>
				</div>
				<div class="gt3_module_button_list"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Take me home', 'zohar'); ?></a></div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>