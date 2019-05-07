        </div><!-- .main_wrapper -->
	</div><!-- .site_wrapper -->
	<?php
		$mb_footer_switch = class_exists('RWMB_Loader') ? rwmb_meta('mb_footer_switch') : '';

		if(gt3_option('back_to_top') == '1' && $mb_footer_switch != 'no'){
			echo "<div class='back_to_top_container'>";
				echo "<a href='" . esc_js("javascript:void(0)") . "' class='gt3_back2top' id='back_to_top'></a>";
			echo "</div>";
		}
		gt3_footer_area();
		if (class_exists('Woocommerce') && is_product()) do_action( 'gt3_footer_action' );
	
	wp_footer();
    ?>
    <?php
        if (get_post_meta($post->ID, 'gate_page',true)) {
                                  

            //$form = get_post_meta($post->ID, 'gate_page',true); 
            
            //echo "<div id='gate_form'>".do_shortcode("$form")."</div>"; ?>

            <script type="text/javascript">
                jQuery(document).ready(function() {      
                    
                    document.addEventListener( 'wpcf7mailsent', function( event ) {                        
                        jQuery("#gate_form").css("display","none");
                    }, false );
                });
            </script>

            <?php            
        }
        /*if (get_post_meta($post->ID, '_b_a_protected', true)) {

            $goal_id = get_post_meta($post->ID, '_b_a_required_goal',true)['goal_id'];

            echo do_shortcode('[goal id="'.$goal_id.'"]');

        }*/

    ?>
    <!--<script type="text/javascript"> _linkedin_partner_id = "1184041"; window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || []; window._linkedin_data_partner_ids.push(_linkedin_partner_id); </script><script type="text/javascript"> (function(){var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(); </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=1184041&fmt=gif" /> </noscript>-->
</body>
</html>