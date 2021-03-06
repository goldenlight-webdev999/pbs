(function ($) {
	'use strict';
	    $(document).ready(function() {
			$('#grid').on('click',function(e) {
			    e.preventDefault();
			    jQuery(this).addClass('active');
				jQuery('#list').removeClass('active');
			    localStorage.setItem('gt3_gridlist_woo','grid');
				jQuery('.site-main > ul.products, .gt3_theme_core.gt3-shop-list > ul.products').fadeOut(300, function() {
					jQuery(this).addClass('grid').removeClass('list').fadeIn(300);
				});
				return false;
			});

			$('#list').on('click',function(e) {
				e.preventDefault();
				jQuery(this).addClass('active');
				jQuery('#grid').removeClass('active');
				localStorage.setItem('gt3_gridlist_woo','list');
				jQuery('.site-main > ul.products, .gt3_theme_core.gt3-shop-list > ul.products').fadeOut(300, function() {
					jQuery(this).removeClass('grid').addClass('list').fadeIn(300);
				});
				return false;
			});

			var _localStorage = localStorage.getItem('gt3_gridlist_woo');
			if (_localStorage) {
		        jQuery('.site-main > ul.products, .gt3_theme_core.gt3-shop-list > ul.products, #gridlist-toggle').addClass(localStorage.getItem('gt3_gridlist_woo'));
		    }

		    if (_localStorage === 'grid') {
		        jQuery('.gt3-gridlist-toggle #grid').addClass('active');
		        jQuery('.gt3-gridlist-toggle #list').removeClass('active');
		    }

		    if (_localStorage === 'list') {
		        jQuery('.gt3-gridlist-toggle #list').addClass('active');
		        jQuery('.gt3-gridlist-toggle #grid').removeClass('active');
		    }

			jQuery('#gt3-gridlist-toggle').find('a').click(function(event) {
			    event.preventDefault();
			});
	    })
})(jQuery);
