'use strict';

;(function (factory) {
	window.gt3Elementor = window.gt3Elementor || {};
	window.gt3Elementor.CoreFrontend = window.gt3Elementor.CoreFrontend || factory(window.jQuery);
})(function ($) {

	function CoreFrontend() {
		if (!this || this.widgets !== CoreFrontend.prototype.widgets) {
			return new CoreFrontend()
		}

		this.initialize();
	}

	$.extend(CoreFrontend.prototype, {
		widgets: {
			'gt3-core-testimonials': 'Testimonials',
			'gt3-core-TestimonialsLite': 'TestimonialsLite',
			'gt3-core-flipbox': 'FlipBox',
			'gt3-core-imagebox': 'ImageBox',
			'gt3-core-tabs': 'Tabs',
			'gt3-core-accordion': 'Accordion',
			'gt3-core-newaccordion': 'NewAccordion',
			'gt3-core-shoplist': 'ShopList',
			'gt3-core-counter': 'Counter',
			'gt3-core-piechart': 'PieChart',
			'gt3-core-portfolio': 'Portfolio',
			'gt3-core-portfoliocarousel': 'PortfolioCarousel',
            'gt3-core-project': 'Project',
			'gt3-core-team': 'Team',
			'gt3-core-blog': 'Blog',
			'gt3-core-gallerypackery': 'GalleryPackery',
			'gt3-core-videopopup': 'VideoPopup',
			'gt3-core-image-carousel': 'ImageCarousel',
			'gt3-core-pricebox': 'PriceBox',
			'gt3-core-button': 'Button',
		},
		body: $('body'),
		html: $('html'),
		window: $(window),
		adminbar: $('#wpadminbar'),
		is_admin: !!$('body').hasClass('admin-bar'),
		windowSize: {
			width: 1920,
			height: 1080,
			orientation: 'landscape',
			ratio: 1.778
		},
		page_title: $('.gt3-page-title_wrapper'),
		header: $('.gt3_header_builder'),
		header_over_bg: $('.gt3_header_builder').hasClass('header_over_bg'),
		header_sticky: $('.sticky_header'),
		is_single: $('body').hasClass('single-gallery'),
		footer: $('footer'),
		editMode: false,
		support: (function (element) {
			var support = {
				touch:
				window.ontouchstart !== undefined ||
				(window.DocumentTouch && document instanceof DocumentTouch)
			};
			var transitions = {
				webkitTransition: {
					end: 'webkitTransitionEnd',
					prefix: '-webkit-'
				},
				MozTransition: {
					end: 'transitionend',
					prefix: '-moz-'
				},
				OTransition: {
					end: 'otransitionend',
					prefix: '-o-'
				},
				transition: {
					end: 'transitionend',
					prefix: ''
				}
			};
			var prop;
			for (prop in transitions) {
				if (
					transitions.hasOwnProperty(prop) &&
					element.style[prop] !== undefined
				) {
					support.transition = transitions[prop];
					support.transition.name = prop;
					break
				}
			}

			function elementTests() {
				var transition = support.transition;
				var prop;
				var translateZ;
				document.body.appendChild(element);
				if (transition) {
					prop = transition.name.slice(0, -9) + 'ransform';
					if (element.style[prop] !== undefined) {
						element.style[prop] = 'translateZ(0)';
						translateZ = window
							.getComputedStyle(element)
							.getPropertyValue(transition.prefix + 'transform');
						support.transform = {
							prefix: transition.prefix,
							name: prop,
							translate: true,
							translateZ: !!translateZ && translateZ !== 'none'
						}
					}
				}
				if (element.style.backgroundSize !== undefined) {
					support.backgroundSize = {};
					element.style.backgroundSize = 'contain';
					support.backgroundSize.contain =
						window
							.getComputedStyle(element)
							.getPropertyValue('background-size') === 'contain';
					element.style.backgroundSize = 'cover';
					support.backgroundSize.cover =
						window
							.getComputedStyle(element)
							.getPropertyValue('background-size') === 'cover'
				}
				document.body.removeChild(element)
			}

			if (document.body) {
				elementTests()
			} else {
				$(document).on('DOMContentLoaded', elementTests)
			}
			return support
			// Test element, has to be standard HTML and must not be hidden
			// for the CSS3 tests using window.getComputedStyle to be applicable:
		})(document.createElement('div')),
		agent: {
			isOpera: (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0,
			isFirefox: typeof InstallTrigger !== 'undefined',
			isSafari: /constructor/i.test(window.HTMLElement) || (function (p) {
				return p.toString() === "[object SafariRemoteNotification]";
			})(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification)),
			isIE: /*@cc_on!@*/false || !!document.documentMode,
			isChrome: !!window.chrome && !!window.chrome.webstore,
			isEdge: false,
			isBlink: false
		},
		EasingFunctions: {
			// http://gizma.com/easing/#l
			linearTween: function (t, b, c, d) {
				return c * t / d + b;
			},
			easeInQuad: function (t, b, c, d) {
				t /= d;
				return c * t * t + b;
			},
			easeOutQuad: function (t, b, c, d) {
				t /= d;
				return -c * t * (t - 2) + b;
			},
			easeInOutQuad: function (t, b, c, d) {
				t /= d / 2;
				if (t < 1) return c / 2 * t * t + b;
				t--;
				return -c / 2 * (t * (t - 2) - 1) + b;
			},
			easeInCubic: function (t, b, c, d) {
				t /= d;
				return c * t * t * t + b;
			},
			easeOutCubic: function (t, b, c, d) {
				t /= d;
				t--;
				return c * (t * t * t + 1) + b;
			},
			easeInOutCubic: function (t, b, c, d) {
				t /= d / 2;
				if (t < 1) return c / 2 * t * t * t + b;
				t -= 2;
				return c / 2 * (t * t * t + 2) + b;
			},
			easeInQuart: function (t, b, c, d) {
				t /= d;
				return c * t * t * t * t + b;
			},
			easeOutQuart: function (t, b, c, d) {
				t /= d;
				t--;
				return -c * (t * t * t * t - 1) + b;
			},
			easeInOutQuart: function (t, b, c, d) {
				t /= d / 2;
				if (t < 1) return c / 2 * t * t * t * t + b;
				t -= 2;
				return -c / 2 * (t * t * t * t - 2) + b;
			},
			easeInQuint: function (t, b, c, d) {
				t /= d;
				return c * t * t * t * t * t + b;
			},
			easeOutQuint: function (t, b, c, d) {
				t /= d;
				t--;
				return c * (t * t * t * t * t + 1) + b;
			},
			easeInSine: function (t, b, c, d) {
				return -c * Math.cos(t / d * (Math.PI / 2)) + c + b;
			},
			easeOutSine: function (t, b, c, d) {
				return c * Math.sin(t / d * (Math.PI / 2)) + b;
			},
			easeInOutSine: function (t, b, c, d) {
				return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b;
			},
			easeInExpo: function (t, b, c, d) {
				return c * Math.pow(2, 10 * (t / d - 1)) + b;
			},
			easeOutExpo: function (t, b, c, d) {
				return c * (-Math.pow(2, -10 * t / d) + 1) + b;
			},
			easeInOutExpo: function (t, b, c, d) {
				t /= d / 2;
				if (t < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
				t--;
				return c / 2 * (-Math.pow(2, -10 * t) + 2) + b;
			},
			easeInCirc: function (t, b, c, d) {
				t /= d;
				return -c * (Math.sqrt(1 - t * t) - 1) + b;
			},
			easeOutCirc: function (t, b, c, d) {
				t /= d;
				t--;
				return c * Math.sqrt(1 - t * t) + b;
			},
			easeInOutCirc: function (t, b, c, d) {
				t /= d / 2;
				if (t < 1) return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b;
				t -= 2;
				return c / 2 * (Math.sqrt(1 - t * t) + 1) + b;
			}
		},
		isInViewport: function (elem) {
			if ('length' in elem) elem = elem[0];
			var bounding = elem.getBoundingClientRect();
			return (
				(bounding.top > 0 && (window.innerHeight || document.documentElement.clientHeight) > bounding.top + 50)
				|| (bounding.top < 0 && (Math.abs(bounding.top) + 50 < bounding.height))
			);
		},
		setCookie: function (name, value, options) {
			options = options || {};

			$.extend(options, {
				path: '/',
				expires: 2592000 // month
			});

			var expires = options.expires;

			if (typeof expires == "number" && expires) {
				var d = new Date();
				d.setTime(d.getTime() + expires * 1000);
				expires = options.expires = d;
			}
			if (expires && expires.toUTCString) {
				options.expires = expires.toUTCString();
			}

			// value = encodeURIComponent(value);

			var updatedCookie = name + "=" + typeof value === "object" ? JSON.stringify(value) : value;

			for (var propName in options) {
				updatedCookie += "; " + propName;
				var propValue = options[propName];
				if (propValue !== true) {
					updatedCookie += "=" + propValue;
				}
			}

			document.cookie = updatedCookie;
		},
		getCookie: function (name) {
			var matches = document.cookie.match(new RegExp(
				"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
			));
			return matches ? decodeURIComponent(matches[1]) : undefined;
		},
		getAdminBar: function () {
			if (this.is_admin && !this.adminbar) {
				this.adminbar = $('#wpadminbar');
			}
		},
		setTransition: function (element, duration, delay, _return) {
			var that = this;
			if (this.support.transition) {
				if ('length' in element && element.length) {
					element = element[0];
				}
				if ('style' in element) {
					var style = element.style;
					style[this.support.transition.name + 'Duration'] = !duration ? '' : duration + 'ms';
					style[this.support.transition.name + 'Delay'] = !delay ? '' : delay + 'ms';

					if (_return) {
						$(element).on(this.support.transition.end, endOfTransition);
					}
				}
			}

			function endOfTransition() {
				$(element).off(that.support.transition.end, endOfTransition);
				that.setTransition(element, 0, 0);
			}
		},
		cubic: function (encodedFuncName, coOrdArray) {
			if ($.isArray(encodedFuncName)) {
				coOrdArray = encodedFuncName;
				encodedFuncName = 'bez_' + coOrdArray.join('_').replace(/\./g, 'p');
			}
			if (typeof $.easing[encodedFuncName] !== "function") {
				var polyBez = function (p1, p2) {
					var A = [null, null], B = [null, null], C = [null, null],
						bezCoOrd = function (t, ax) {
							C[ax] = 3 * p1[ax], B[ax] = 3 * (p2[ax] - p1[ax]) - C[ax], A[ax] = 1 - C[ax] - B[ax];
							return t * (C[ax] + t * (B[ax] + t * A[ax]));
						},
						xDeriv = function (t) {
							return C[0] + t * (2 * B[0] + 3 * A[0] * t);
						},
						xForT = function (t) {
							var x = t, i = 0, z;
							while (++i < 14) {
								z = bezCoOrd(x, 0) - t;
								if (Math.abs(z) < 1e-3) break;
								x -= z / xDeriv(x);
							}
							return x;
						};
					return function (t) {
						return bezCoOrd(xForT(t), 1);
					}
				};
				$.easing[encodedFuncName] = function (x, t, b, c, d) {
					return c * polyBez([coOrdArray[0], coOrdArray[1]], [coOrdArray[2], coOrdArray[3]])(t / d) + b;
				}
			}
			return encodedFuncName;
		},
		array_chunk: function (input, size) {
			if (Array.isArray(input)) {
				for (var x, i = 0, c = -1, l = input.length, n = []; i < l; i++) {
					(x = i % size) ? n[c][x] = input[i] : n[++c] = [input[i]];
				}
				return n;
			}
			return input;
		},
		removeKey: function (arrayName, key) {
			var x;
			var tmpArray = {};
			var i = 0;
			for (x in arrayName) {
				if (x != key) {
					tmpArray[i++] = arrayName[x];
				}
			}
			return tmpArray;
		},
		getHeight: function () {
			var Height = this.getWindowHeight();
			if (this.is_admin) {
				Height -= this.adminbar.height() || 32;
			}
			if (this.header_sticky.length && this.header_sticky.hasClass('sticky_on')) {
				Height -= this.header_sticky.height();
			}
			return Height;
		},
		getWindowHeight: function () {
			return window.innerHeight;
		},
		get_position: function (element) {
			if ('tagName' in element && element.tagName !== 'IMG') {
				element = $('img', element);
			}
			element = $(element);
			return {
				top: Math.round(element.offset().top - $(document).scrollTop() - parseInt(element.css('margin-top'))),
				left: Math.round(element.offset().left - $(document).scrollLeft() - parseInt(element.css('margin-left'))),
				width: Math.round(element.width()),
				height: Math.round(element.height())
			};
		},
		scrollTo: function (element, duration, callback) {
			if (typeof element !== "number") {
				element = this.getScrollTo(element);
			}

			$('html, body').animate({
				scrollTop: (element)
			}, duration, this.cubic([0.75, 0, 0.25, 1]), callback);
		},
		getScrollTo: function (element) {
			var offset = element.offset().top;
			offset -= this.adminbar.height();
			if (this.header_sticky.length && this.header_sticky.hasClass('sticky_on')) {
				offset -= this.header_sticky.height();
			}
			return offset;
		},
		getScrollToCenter: function (element) {
			var offset = this.getScrollTo(element);
			var h_p = (this.window.height() - element.height()) / 2;
			return (offset - h_p);
		},
		roundNumber: function (num) {
			return +(Math.round(num + "e+2") + "e-2");
		},
		initialize: function () {
			var that = this;

			that.window.on('load', function () {
				that.adminbar = $('#wpadminbar');
			});

			$(window).on('resize', that.resize.bind(that));
			that.resize();
			this.agent.isEdge = !this.agent.isIE && !!window.StyleMedia;
			this.agent.isBlink = (this.agent.isChrome || this.agent.isOpera) && !!window.CSS;

			if (typeof window.elementorFrontend !== 'undefined') {
				$.each(that.widgets, function (name, callback) {
					window.elementorFrontend.hooks.addAction('frontend/element_ready/' + name + '.default', that[callback].bind(that));
				})
			}
			if (typeof elementorFrontend !== 'undefined') {
				this.editMode = elementorFrontend.config.isEditMode || (elementorFrontend.isEditMode && elementorFrontend.isEditMode());
			}

			$( 'body:not(.elementor-editor-active) .gt3_column_link-elementor' ).each(function(){
				var element = jQuery(this);
				var element_url = element.attr('data-column-clickable-url');
				var element_link_blank = element.attr('data-column-clickable-blank')

				element.find('.elementor-column-wrap').on('click',function(e){
					if (e.target.nodeName != 'A') {
						if (element_link_blank == 'yes') {
							window.open(element_url, '_blank');
						}else{
							window.location.href = element_url;
						}
					}
				})
			})


		},
		resize: function () {
			this.windowSize.width = this.window.width();
			this.windowSize.height = this.window.height();
			this.windowSize.ratio = parseFloat(this.windowSize.width / this.windowSize.height).toFixed(3);
			this.windowSize.orientation = this.windowSize.ratio >= 1 ? 'landscape' : 'portrait';
			this.setCookie('gt3-window-size', this.windowSize);
		},
		loadFullImage: function ($items, callback) {
			var that = this;
			var $img = $('[data-srcset]', $items);
			if ($img.length) {
				$img = $img.first();
				$img.attr({srcset: $img.data('srcset')}).removeAttr('data-srcset').imagesLoaded(function () {
					that.loadFullImage($items, callback);
				})
			} else if (callback instanceof Function) {
				callback.call($items);
			}
		},
		Testimonials: function ($scope) {
			$scope = jQuery('.module_testimonial', $scope);
			if (!$scope.length) {
				return;
			}
			var settings = $scope.data('settings');
			$('.testimonials_item', $scope).css('display', '');

			jQuery('.testimonials_rotator', $scope).slick({
				autoplay: settings.autoplay,
				autoplaySpeed: settings.autoplaySpeed,
				fade: settings.fade,
				dots: settings.dots,
				arrows: settings.arrows,
				slidesToScroll: settings.items_per_line,
				slidesToShow: settings.items_per_line,
				focusOnSelect: true,
				speed: 500,
				infinite: true,
				prevArrow: '<div class="slick-prev gt3_modified"><div class="theme_icon-arrows-left"></div>' + settings.l10n.prev + '</div>',
				nextArrow: '<div class="slick-next gt3_modified">' + settings.l10n.next + '<div class="theme_icon-arrows-right"></div></div>',
				responsive: [
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}

				]
			});

		},
		TestimonialsLite: function ($scope) {
			$scope = jQuery('.gt3_testimonial', $scope);
			if (!$scope.length) {
				return;
			}
			var settings = $scope.data('settings');
			$('.testimonials_item', $scope).css('display', '');

			var testimonials_list = $('.testimonials_list', $scope);
			var quote_color = $scope.find('.testimonials_content .testimonials-text').css('color');
			var canvas = document.createElement('canvas');
			canvas.classList.add("testimonials-canvas-quote");
			testimonials_list.prepend(canvas);

			var img = new Image;
		      img.onload = function () {
		        canvas.width = this.width;
		        canvas.height = this.height;
		        // draw image
		        ctx.drawImage(this, 0, 0);
		        // set composite mode
		        ctx.globalCompositeOperation = "source-in";
		        // draw color
		        ctx.fillStyle = quote_color;
		        ctx.fillRect(0, 0, canvas.width, canvas.height);
		        var image = canvas.toDataURL("image/png");
		      	testimonials_list.prepend('<img class="testimonials-text-quote-holder" src="'+image+'"/>');
		      	$('.testimonials_item', $scope).each(function(){
					var element = jQuery(this);
					if (element.length) {
						element.find('.testimonials-text-quote').attr('src',image);
				    }
				})

		      };
		      if ($scope.attr('data-quote-src').length) {
		      	img.src = $scope.attr('data-quote-src');
		      }else{
		      	img.src = gt3_gt3theme.templateUrl+"/img/quote.png";
		      }
		      var ctx = canvas.getContext("2d");

			jQuery('.testimonials_rotator', $scope).slick({
				autoplay: settings.autoplay,
				autoplaySpeed: settings.autoplaySpeed,
				fade: settings.fade,
				dots: settings.dots,
				arrows: settings.arrows,
				slidesToScroll: settings.items_per_line,
				slidesToShow: settings.items_per_line,
				focusOnSelect: true,
				speed: 500,
				infinite: true,
				prevArrow: '<div class="slick-prev gt3_modified"><div class="theme_icon-arrows-left"></div>' + settings.l10n.prev + '</div>',
				nextArrow: '<div class="slick-next gt3_modified">' + settings.l10n.next + '<div class="theme_icon-arrows-right"></div></div>',
				responsive: [
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}

				]
			});

		},
		FlipBox: function ($scope) {
			var that = this;
			var $wrap_text = $scope.find('.text_wrap'),
				$fake_space = $scope.find('.fake_space');

			function resize() {
				if ($wrap_text.length && $fake_space.length) {
					$fake_space.height($wrap_text.height());
				}
			}

			that.window.on('resize', resize);
			resize();
		},
		ImageBox: function ($scope) {

		},
		Tabs: function ($scope) {
			var type_style_vertical = $scope.find('.vertical_type'),
				active_tab = $scope.find('.gt3_tabs_wrapper').attr('data-active-tab'),
				tabs_count = $scope.find('.gt3_tabs_nav li').length;

			if (active_tab > tabs_count) {
				active_tab = 1;
			}

			var tabindex_1 = active_tab - 1;

			if (type_style_vertical.length) {
				$scope.find('.gt3_tabs_wrapper').tabs({
					active: tabindex_1
				}).addClass('ui-tabs-vertical ui-helper-clearfix');
				$scope.find('li').removeClass('ui-corner-top').addClass('ui-corner-left');
			} else {
				$scope.find('.gt3_tabs_wrapper').tabs({
					active: tabindex_1
				});
			}
		},
		Accordion: function ($scope) {
			var $wrapper = $scope.find('.accordion_wrapper');
			$wrapper.accordion({
					classes: {
						"ui-accordion": "highlight"
					},
					header: ".item_title",
					icons: {
						"header": " ui-icon-copy",
						"activeHeader": " ui-icon-alert"
					}
				}
			);
			jQuery(window).resize(function () {
				$wrapper.accordion("refresh");
			});
		},
		NewAccordion: function ($scope) {
			var $wrapper = $scope.find('.newaccordion_wrapper');
			$wrapper.accordion({
					classes: {
						"ui-accordion": "highlight"
					},
					header: ".item_title",
					icons: false
				}
			);
			jQuery(window).resize(function () {
				$wrapper.accordion("refresh");
			});
		},
		ShopList: function ($scope) {
			if (this.editMode) {
				var wrapper = jQuery(".gt3_theme_core.gt3-shop-list", $scope);
				if (wrapper.length) {
					wrapper.each(function () {
						var $this = $(this);
						if ($this.parent().parent().hasClass('elementor-element-editable')) {
							$this.addClass('gt3-shop-list-view').slideDown();
						}
					});
				}
			}
		},
		Counter: function ($scope) {
			var that = this;
			var $wrapper = $scope.find('.counter-wrapper');

			var options = $wrapper.data('options');
			var settings = $wrapper.data('settings');
			var element = $scope.find('.counter')[0];
			options.easingFn = that.EasingFunctions[options.easingFn];

			that.window.on('scroll', scroll);
			var countUp = new CountUp(element, settings.start, settings.end, settings.decimal, settings.duration, options);

			function start() {
				if (!countUp.error) {
					countUp.start(function () {
						countUp.duration = 100;
						countUp.update(settings.end);
					})
				} else console.error(countUp.error);
			}

			function scroll() {
				if (that.isInViewport($wrapper)) {
					that.window.off('scroll', scroll);
					start();
				}
			}

			scroll();
		},
		PieChart: function ($scope) {
			var that = this;
			var $wrapper = $scope.find('.gt3_elementor_pie_chart');

			that.window.on('scroll', scroll);

			function start() {
				var this_label_value = $wrapper.attr('data-label-value');
				$wrapper.circleProgress({
					startAngle: -Math.PI
				}).on('circle-animation-progress', function (event, progress) {
					$wrapper.find('strong').html(Math.round(this_label_value * progress) + $wrapper.attr('data-units'));
				});
			}

			function scroll() {
				if (that.isInViewport($wrapper)) {
					that.window.off('scroll', scroll);
					start();
				}
			}

			scroll();

		},



		PortfolioCarousel: function ($scope) {
			var that = this;
			var wrapper = $scope.hasClass('portfolio_carousel_wrapper') ? $scope : $('.portfolio_carousel_wrapper', $scope);
			if (!wrapper.length) {
				console.warn('Portfolio Carousel wrapper not found');
				return;
			}

			var settings = wrapper.data('settings');

			$('.portfolio_item', $scope).css('display', '');

			var variableWidth = jQuery('.items_list', $scope).parents('.elementor-section').hasClass('elementor-section-full_width') && jQuery('.items_list', $scope).parents('.elementor-section').hasClass('elementor-section-stretched') && settings.centerMode;

			var responsive = [];

			responsive.push({
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			});

			if (settings.items_per_line == 3) {
				responsive.push({
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				});
			}

			jQuery('.items_list', $scope).slick({
				autoplay: settings.autoplay,
				autoplaySpeed: settings.autoplaySpeed,
				dots: settings.dots,
				arrows: settings.arrows,
				slidesToScroll: settings.items_per_line,
				slidesToShow: settings.items_per_line,
				centerMode: settings.centerMode,
				variableWidth: variableWidth,
				focusOnSelect: true,
				speed: 500,
				infinite: true,
				prevArrow: '<div class="slick-prev gt3_modified"><div class="theme_icon-arrows-left"></div>' + settings.l10n.prev + '</div>',
				nextArrow: '<div class="slick-next gt3_modified">' + settings.l10n.next + '<div class="theme_icon-arrows-right"></div></div>',
				responsive: responsive
			});
		},


		Portfolio: function ($scope) {
			var that = this;
			var wrapper = $scope.hasClass('portfolio_wrapper') ? $scope : $('.portfolio_wrapper', $scope);
			if (!wrapper.length) {
				console.warn('Portfolio wrapper not found');
				return;
			}

			var settings = wrapper.data('settings');

			if (!'type' in settings) return;
			var query = {
				pagination_en: settings.pagination_en,
				query: settings.query,
				show_title: settings.show_title,
				show_category: settings.show_category,
				use_filter: settings.use_filter,
				random: settings.random,
				render_index: wrapper.attr('data-post-index'),
				settings: settings.settings
			};
			query.action = 'gt3_themes_core_portfolio_load_items';
			query.query.paged = 0;

			var isotope = jQuery('.isotope_wrapper', $scope);

			var paged = 0;
			var packery = settings.packery,
				wrap_width_origin, index, width, height, wrap_width, wrap_height,
				wrap_ratio, img_ratio;

			isotope.imagesLoaded(function () {
				grid_resize();
			});

			if (!that.editMode) {
				var block_ajax = false;
				$('.portfolio_view_more_link', $scope).on('click', function (e) {
					e.preventDefault();
					if (block_ajax) return;
					block_ajax = true;

					query.render_index =  wrapper.attr('data-post-index');

					query.query.paged++;
					jQuery.ajax({
						type: "POST",
						data: query,
						url: gt3_themes_core.ajaxurl,
						success: function (data) {
							if ('post_count' in data && data.post_count > 0) {
								var post_index = wrapper.attr('data-post-index');
								wrapper.attr('data-post-index',(Number(post_index)+data.post_count))
								var add = $(data.respond);
								isotope.append(add).isotope('appended', add);
								setTimeout(function () {
									isotope.isotope({sortby: 'original-order'});
									grid_resize();
								}, 200);
								setTimeout(function () {
									showImages();
								}, 800);
							}
							if ('max_page' in data && (data.max_page <= query.query.paged || data.max_page === 0)) {
								$('.portfolio_view_more_link', $scope).remove();
							}
							if ('exclude' in data) {
								query.query.exclude = data.exclude;
							}
							block_ajax = false;
						},
						error: function (e) {
							console.error('Error request');
							block_ajax = false;
						}
					});
				});

				if (!query.pagination_en) {
					$scope.on("click", ".isotope-filter a", function (e) {
						e.preventDefault();
						var data_filter = this.getAttribute("data-filter");
						jQuery(this).siblings().removeClass("active");
						jQuery(this).addClass("active");
						isotope.isotope({filter: data_filter});
						show_lazy_images();
					});
				}
			}


			that.window.on('resize', function () {
				grid_resize();
			});

			function grid_resize() {
				var options = {
					itemSelector: '.isotope_item',
					layoutMode: 'masonry'
				};

				var layoutMode = 'masonry';
				var wrap_width_origin = '.isotope_item';
				if (settings.type === 'grid' && !isotope.hasClass('portfolio_offset_mode')) {
					layoutMode = 'fitRows';
				}
				if (settings.type === 'packery') {
					wrap_width_origin = '.isotope_item.packery_extra_size-default';
				}

				if (isotope[0] instanceof HTMLElement) {
					isotope.isotope({
						layoutMode: layoutMode,
						itemSelector: '.isotope_item',
						percentPosition: true,
						stagger: 30,
						transitionDuration: '0.4s',
						masonry: {
							columnWidth: wrap_width_origin,
							rowHeight: wrap_width_origin
						},
						originLeft: !jQuery('body').hasClass('rtl')
					}).isotope('layout');
				}else{					
					var isotope_items = isotope.find('.isotope_item');
					var isotope_items_html = '';
					isotope_items.each(function(){
						isotope_items_html += jQuery(this)[0].outerHTML;
					})

					isotope_items_html = jQuery(isotope_items_html)
					isotope.empty();

					show_lazy_images(isotope_items_html.find('img.gt3_lazyload'));

					isotope.isotope({
						layoutMode: layoutMode,
						itemSelector: '.isotope_item',
						percentPosition: true,
						masonry: {
							columnWidth: wrap_width_origin
						},
						originLeft: !jQuery('body').hasClass('rtl')
					}).isotope('insert', isotope_items_html ).imagesLoaded(function () {
						setTimeout(function(){
							isotope.isotope('layout')
						}, 200);
					});
					
				}

			}

			// on scroll loading items
			that.window.on('scroll', scroll);

			function scroll() {
				if (that.isInViewport($scope)) {
					that.window.off('scroll', scroll);
					showImages();
				}
			}

			scroll();

			function showImages() {
				if (jQuery('.loading:first', $scope).length) {
					jQuery('.loading:first', $scope).addClass('loaded').removeClass('loading');
					setTimeout(showImages, 200);
				}
			}

			show_lazy_images();

			function show_lazy_images(gt3_lazyload = isotope.find('img.gt3_lazyload')){

				if (isotope[0] instanceof HTMLElement) {
					var lazyImages = [].slice.call(gt3_lazyload);
				}else{
					var lazyImages = [].slice.call(gt3_lazyload);
				}

				let active = false;

				const lazyLoad = function() {
					if (active === false) {
						active = true;

						setTimeout(function() {
							lazyImages.forEach(function(lazyImage) {
					    		var lazyImagesLength = lazyImages.length
					    	if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {

					        	lazyImage.src = lazyImage.dataset.src;
					        	lazyImage.srcset = lazyImage.dataset.srcset;

						        lazyImage.onload = function(){

						        	setTimeout(function() {
						            	lazyImage.classList.remove("gt3_lazyload");
						        		lazyImage.classList.add("gt3_lazyload_loaded");
						        		jQuery( lazyImage ).parents('.isotope_item.lazy_loading').removeClass('lazy_loading').addClass('lazy_loaded')
						            },(800*(1/(lazyImagesLength - lazyImages.length))))
						        }

						        lazyImages = lazyImages.filter(function(image) {
						         	return image !== lazyImage;
						        });

						        if (lazyImages.length === 0) {
						         	document.removeEventListener("scroll", lazyLoad);
						         	window.removeEventListener("resize", lazyLoad);
						         	window.removeEventListener("orientationchange", lazyLoad);
						        }
					      	}
					    });

					    active = false;
					  }, 200);
					}
				};
				lazyLoad();
				document.addEventListener("scroll", lazyLoad);
				window.addEventListener("resize", lazyLoad);
				window.addEventListener("orientationchange", lazyLoad);
			}

		},
        Project: function ($scope) {
            var that = this;
            var wrapper = $scope.hasClass('project_wrapper') ? $scope : $('.project_wrapper', $scope);
            if (!wrapper.length) {
                console.warn('Project wrapper not found');
                return;
            }

            var settings = wrapper.data('settings');

            if (!'type' in settings) return;
            var query = {
                pagination_en: settings.pagination_en,
                query: settings.query,
                show_title: settings.show_title,
                show_category: settings.show_category,
                use_filter: settings.use_filter,
                random: settings.random,
                render_index: settings.render_index,
                settings: settings.settings
            };
            query.action = 'gt3_themes_core_project_load_items';
            query.query.paged = 0;

            var isotope = jQuery('.isotope_wrapper', $scope);

            var paged = 0;
            var packery = settings.packery,
                wrap_width_origin, index, width, height, wrap_width, wrap_height,
                wrap_ratio, img_ratio;

            if (settings.type === 'grid') {
                isotope.imagesLoaded(function () {
                    resize();
                    //showImages();
                });
            } else if (settings.type === 'packery') {
                resize();
                isotope.imagesLoaded(function () {
                    resize();
                    //showImages();
                });
            } else if (settings.type === 'masonry') {
                resize();
                isotope.imagesLoaded(function () {
                    isotope.isotope('layout');
                    //showImages();
                });
            }

            if (!that.editMode) {
                var block_ajax = false;
                $('.project_view_more_link', $scope).on('click', function (e) {
                    e.preventDefault();
                    if (block_ajax) return;
                    block_ajax = true;

                    query.query.paged++;
                    jQuery.ajax({
                        type: "POST",
                        data: query,
                        url: gt3_themes_core.ajaxurl,
                        success: function (data) {
                            if ('post_count' in data && data.post_count > 0) {
                                var add = $(data.respond);

                                isotope.append(add).isotope('appended', add);
                                setTimeout(function () {
                                    isotope.isotope({sortby: 'original-order'});
                                    resize();
                                }, 50);
                                setTimeout(function () {
                                    showImages();
                                }, 800);
                            }
                            if ('max_page' in data && (data.max_page <= query.query.paged || data.max_page === 0)) {
                                $('.project_view_more_link', $scope).remove();
                            }
                            if ('exclude' in data) {
                                query.query.exclude = data.exclude;
                            }
                            block_ajax = false;
                        },
                        error: function (e) {
                            console.error('Error request');
                            block_ajax = false;
                        }
                    });
                });

                if (!query.pagination_en) {
                    $scope.on("click", ".isotope-filter a", function (e) {
                        e.preventDefault();
                        var data_filter = this.getAttribute("data-filter");
                        jQuery(this).siblings().removeClass("active");
                        jQuery(this).addClass("active");
                        isotope.isotope({filter: data_filter});
                    });
                }
            }


            that.window.on('resize', function () {
                resize();
            });

            function resize() {
                switch (settings.type) {
                    case 'grid':
                        grid_resize();
                        break;
                    case 'packery' :
                        packery_resize();
                        break;
                    case 'masonry':
                        masonry_resize();
                        break;
                }
            }

            function get_max_height() {
                var max = 0;
                jQuery.each(isotope.children(), function (key, value) {
                    if (max <= jQuery(value).outerHeight()) max = jQuery(value).outerHeight();
                });
                return max;
            }

            function grid_resize() {
                if (settings.gap_unit === '%') {
                    var gap = (wrapper.width() * parseFloat(settings.gap_value) / 100).toFixed(2);
                    isotope
                        .find('.isotope_item')
                        .css('padding-right', gap + 'px')
                        .css('padding-bottom', gap + 'px');
                }

                var options = {
                    itemSelector: '.isotope_item',
                    layoutMode: 'masonry'
                };

                var wrap_height, wrap_width, wrap_ratio, img_ratio;
                if (settings.grid_type === 'rectangle' || settings.grid_type === 'square') {
                    wrapper.find('img').each(function (key, value) {
                        var img = $(this);
                        var parent = img.closest('.img_wrap');
                        if (that.window.outerWidth() < 600) {
                            parent
                                .css('height', 'auto')
                                .css('width', 'auto')
                                .attr('data-ratio', '');

                            img.attr('data-ratio', '')
                                .closest('.img').css('height', 'auto').css('width', 'auto')
                        } else {
                            wrap_height = wrap_width = Math.ceil(parent.outerWidth());
                            if (settings.grid_type === 'rectangle') {
                                wrap_height = Math.ceil(wrap_width * 0.75);
                            }

                            wrap_height = Math.ceil(wrap_height);

                            // wrap_height = wrap_width = wrap_width_origin;

                            wrap_ratio = (wrap_width / wrap_height);
                            img_ratio = ((img.attr('width') || 1) / (img.attr('height') || 1));
                            if (wrap_ratio > img_ratio) img_ratio = 0.5;

                            console.log(parent.height());

                            parent
                                .css('height', Math.floor(wrap_height))
                                // .css('width', Math.floor(wrap_width))
                                .attr('data-ratio', wrap_ratio >= 1 ? 'landscape' : 'portrait');

                            img.attr('data-ratio', img_ratio >= 1 ? 'landscape' : 'portrait')
                                .closest('.img').css('height', parent.height()).css('width', parent.width())
                        }
                    });
                }


                if (that.window.width() > 600) {
                    $.extend(options, {
                        layoutMode: 'fitRows',
                        itemSelector: '.isotope_item',
                        fitRows: {
                            // columnWidth: Math.floor(isotope.width() / query.cols),
                            rowHeight: get_max_height()
                        },
                        originLeft: !jQuery('body').hasClass('rtl')
                    })
                }
                isotope.isotope(options);
            }

            function packery_resize() {
                if (query.gap_unit === '%') {
                    var gap = (wrapper.width() * parseFloat(settings.gap_value) / 100).toFixed(2);
                    isotope.find('.isotope_item').css('padding-right', gap + 'px').css('padding-bottom', gap + 'px');
                }


                var grid = packery.grid;
                var native_grid = grid;
                var lap = packery.lap;

                var viewport = function () {
                    var e = window, a = 'inner';
                    if (!('innerWidth' in window)) {
                        a = 'client';
                        e = document.documentElement || document.body;
                    }
                    return {width: e[a + 'Width'], height: e[a + 'Height']};
                }();

                if (viewport.width < 600) {
                    grid = 1;
                } else if (viewport.width < 992 && (grid % 2 === 0)) {
                    lap = lap / 2;
                    grid /= 2;
                }

                if (grid === 5) {
                    if (viewport.width < 600) {
                        grid = 1;
                    } else if (viewport.width < 992 && (grid === 5)) {
                        lap = lap / 2;
                        grid = 2;
                    }
                }

                wrap_width_origin = Math.floor(isotope.width() / grid);

                var local_key = 0;

                wrapper.find('.isotope_item').each(function (key, value) {
                    var img = $(this).find('img');
                    var parent = $(this);
                    var text_wrap = parent.find('.text_wrap');

                    if (viewport.width < 600) {
                        parent
                            .css('height', 'auto')
                            .css('width', 'auto')
                            .attr('data-ratio', '');

                        img.attr('data-ratio', '')
                            .closest('.img_wrap').css('height', 'auto').css('width', 'auto')
                    } else {
                        wrap_height = wrap_width = wrap_width_origin;

                        index = local_key % lap + 1;
                        if (index in packery.elem) {
                            if ('w' in packery.elem[index] && packery.elem[index].w > 1) {
                                wrap_width = wrap_width_origin * packery.elem[index].w;
                            }
                            if ('h' in packery.elem[index] && packery.elem[index].h > 1) {
                                if (viewport.width < 992 && (native_grid === 5)) {
                                    wrap_height = wrap_width_origin * 1;
                                } else {
                                    wrap_height = wrap_width_origin * packery.elem[index].h;
                                }

                            }
                        }

                        local_key++;


                        wrap_ratio = (wrap_width / wrap_height);
                        img_ratio = ((img.attr('width') || 1) / (img.attr('height') || 1));
                        var wrap_data_ratio = wrap_ratio >= 1 ? 'landscape' : 'portrait';
                        var img_data_ratio = img_ratio >= 1 ? 'landscape' : 'portrait';

                        if (wrap_data_ratio === 'portrait' && img_data_ratio === 'portrait' && wrap_ratio >= img_ratio) {
                            wrap_data_ratio = 'landscape';
                        } else if (wrap_data_ratio === 'landscape' && img_data_ratio === 'landscape' && img_ratio <= wrap_ratio) {
                            img_data_ratio = 'portrait';
                        }

                        parent
                            .css('height', Math.floor(wrap_height))
                            .css('width', Math.floor(wrap_width))
                            .attr('data-ratio-n', wrap_ratio)

                            .attr('data-ratio', wrap_data_ratio);

                        img.attr('data-ratio', img_data_ratio)
                            .attr('data-ratio-n', img_ratio)

                            .closest('.img_wrap').css('height', parent.height()).css('width', parent.width())

                        if (text_wrap.height() > 30) {
                            parent.addClass('animate_text_wrap');
                        } else {
                            parent.removeClass('animate_text_wrap');
                        }
                    }
                });

                isotope.isotope({
                    layoutMode: 'masonry',
                    itemSelector: '.isotope_item',
                    masonry: {
                        columnWidth: wrap_width_origin
                    },
                    originLeft: !jQuery('body').hasClass('rtl')
                }).isotope('layout');
            }

            function masonry_resize() {
                if (settings.gap_unit === '%') {
                    var gap = (wrapper.width() * parseFloat(settings.gap_value) / 100).toFixed(2);
                    isotope.find('.isotope_item').css('padding-right', gap + 'px').css('padding-bottom', gap + 'px');
                }

                isotope.isotope().isotope('layout');
            }

            // on scroll loading items
            that.window.on('scroll', scroll);

            function scroll() {
                if (that.isInViewport($scope)) {
                    that.window.off('scroll', scroll);
                    showImages();
                }
            }

            scroll();

            function showImages() {
                if (jQuery('.loading:first', $scope).length) {
                    jQuery('.loading:first', $scope).removeClass('loading');
                    setTimeout(showImages, 200);
                }
            }

            // on scroll loading items end

        },
		Team: function ($scope) {
			if (jQuery(".isotope", $scope).length) {
				jQuery(".isotope", $scope).isotope({
					itemSelector: ".item-team-member, .gt3_practice_list__item, .gt3_course_item.isotope-item",
					originLeft: !jQuery('body').hasClass('rtl')
				}).imagesLoaded(function () {
					jQuery(".isotope", $scope).isotope('layout');
				})
			}
			jQuery(window).on('resize', function () {
				jQuery(".isotope", $scope).each(function () {
					jQuery(this).isotope({
						itemSelector: ".item-team-member, .gt3_practice_list__item, .gt3_course_item.isotope-item",
						originLeft: !jQuery('body').hasClass('rtl')
					})
				})
			});
			$scope.on("click", ".isotope-filter a,.isotope-row .gt3_course_filter a", function (e) {
				e.preventDefault();
				var data_filter = this.getAttribute("data-filter");
				jQuery(this).siblings().removeClass("active");
				jQuery(this).addClass("active");
				var grid = this.parentNode.nextElementSibling;
				jQuery(grid).isotope({filter: data_filter});
			});

			var gt3_count = 1;
            $scope.each(function () {
				var li = jQuery(this).find('.item-team-member');
				li.each(function () {
					jQuery(this).on('mouseover', function () {
						gt3_count++;
						jQuery(this).addClass('hovered').css({'z-index': gt3_count});
					});
					jQuery(this).on("mouseleave", function () {
						jQuery(this).removeClass('hovered')
					})
				});
			});

        },
		Blog: function ($scope) {
			$scope = $scope.hasClass('gt3_module_blog') ? $scope : $scope.find('.gt3_module_blog');
			if (!$scope.length) {
				return;
			}

            showImages();
            function showImages() {
                if (jQuery('.loading:first', $scope).length) {
                    jQuery('.loading:first', $scope).removeClass('loading');
                    setTimeout(showImages, 200);
                }
            }

            var wrapper = jQuery(".isotope_blog_items", $scope);
			if (!wrapper.length) {
				return;
			}

			var settings = JSON.parse($scope.attr('data-settings')),
				windowWidth = myWindow.outerWidth();


			function resize() {
				var packery = settings.packery_grid,
					wrap_width_origin, wrap_height, wrap_width, index;

				windowWidth = myWindow.outerWidth();

				var grid = packery.grid;
				var lap = packery.lap;

				if (windowWidth < 600) {
					grid = 1;
				} else if (windowWidth < 900 && (grid % 2 === 0)) {
					lap = lap / 2;
					grid /= 2;
				} else if (windowWidth < 900 && grid > 2) {
					grid = 2;
				}

				wrap_width_origin = Math.floor(wrapper.width() / grid);

				var local_key = 0;
				wrapper.find('.element').each(function (key, value) {
					var $this = $(this);
					if (windowWidth < 600) {

						$this
							.css('height', 'auto')
							.css('width', 'auto')
							.attr('data-ratio', '');

					} else {
						wrap_height = wrap_width = wrap_width_origin;

						index = local_key % lap + 1;
						if (index in packery.elem) {
							if ('w' in packery.elem[index] && packery.elem[index].w > 1) {
								wrap_width = wrap_width_origin * packery.elem[index].w;
							}
							if ('h' in packery.elem[index] && packery.elem[index].h > 1) {
								wrap_height = wrap_width_origin * packery.elem[index].h;
							}
						}

						local_key++;


						$this
							.css('height', Math.floor(wrap_height))
							.css('width', Math.floor(wrap_width));

					}
				});
				wrapper.isotope({
					layoutMode: 'masonry',
					itemSelector: '.element',
					masonry: {
						columnWidth: wrap_width_origin
					},
					originLeft: !jQuery('body').hasClass('rtl')
				}).isotope('layout');
			}

			if (settings.packery) {
				resize();
			} else {
				wrapper.isotope({
					itemSelector: '.element',
					originLeft: !jQuery('body').hasClass('rtl')
				}).imagesLoaded(function () {
					wrapper.isotope('layout')
				});
			}

			jQuery(window).on('resize',windowResize);
			function windowResize() {
				if (settings.packery) {
					resize();
				} else {
					$scope.off();
					wrapper.isotope('layout');
				}
			}

			wrapper.on("remove", function () {
				jQuery(window).off('resize',windowResize);
			})

			//var isotope = jQuery('.isotope_blog_items', $scope);

			$scope.on("click", ".isotope-filter a", function (e) {
				e.preventDefault();
				var data_filter = this.getAttribute("data-filter");
				jQuery(this).siblings().removeClass("active");
				jQuery(this).addClass("active");
				wrapper.isotope({filter: data_filter});
			});
			$scope.addClass('blog_packery_loaded');
			if (this.editMode) {
				jQuery(window).trigger('resize');
			}

		},
		GalleryPackery: function ($scope) {
			var that = this;
			var wrapper = $scope.hasClass('packery_wrapper') ? $scope : jQuery('.packery_wrapper', $scope);
			if (!wrapper.length) {
				console.warn('Packery wrapper not found');
				return;
			}

			var isotope = jQuery('.isotope_wrapper', $scope);

			var query = wrapper.data('settings');
			query.action = 'gt3_core_packery_load_images';


			var pad = wrapper.data('margin') || 0,
				images = this.array_chunk(wrapper.data('images'), query.load_items),
				packery = query.packery,
				wrap_width_origin, index, width, height, wrap_width, wrap_height,
				wrap_ratio, img_ratio;

			var paged = 0,
				max_page = images.length,
				lightbox = query.lightbox,
				lightbox_array,
				lightbox_obj,
				gap;

			if (lightbox) {
				lightbox_array = window['images' + query.uid];
				if (!that.editMode) {
					wrapper.on('click', '.lightbox', function (event) {
						event.preventDefault();
						event.stopPropagation();
						var options = {
							index: $(this).closest('.isotope_item').index(),
							container: '#popup_gt3_elementor_gallery',
							event: event,
							instance: query.uid
						};

						lightbox_obj = blueimp.ElementorGallery(lightbox_array, options);
					});
				}
			}

			query.packery = null;

			function resize() {
				if (query.gap_unit === '%') {
					gap = (wrapper.width() * parseFloat(query.gap_value) / 100).toFixed(2);
					isotope.find('.isotope_item').css('padding-right', gap + 'px').css('padding-bottom', gap + 'px');
				}


				var grid = packery.grid;
				var lap = packery.lap;

				if ($(window).outerWidth() < 600) {
					grid = 1;
				} else if ($(window).outerWidth() < 900 && (grid % 2 === 0)) {
					lap = lap / 2;
					grid /= 2;
				}

				wrap_width_origin = Math.floor(isotope.width() / grid);

				var local_key = 0;
				wrapper.find('img').each(function (key, value) {
					var img = $(this);
					var parent = img.closest('.isotope_item');
					if ($(window).outerWidth() < 600) {
						parent
							.css('height', 'auto')
							.css('width', 'auto')
							.attr('data-ratio', '');

						img.attr('data-ratio', '')
							.closest('.img').css('height', 'auto').css('width', 'auto')
					} else {
						wrap_height = wrap_width = wrap_width_origin;

						index = local_key % lap + 1;
						if (index in packery.elem) {
							if ('w' in packery.elem[index] && packery.elem[index].w > 1) {
								wrap_width = wrap_width_origin * packery.elem[index].w;
							}
							if ('h' in packery.elem[index] && packery.elem[index].h > 1) {
								wrap_height = wrap_width_origin * packery.elem[index].h;
							}
						}

						local_key++;

						wrap_ratio = (wrap_width / wrap_height);
						img_ratio = ((img.attr('width') || 1) / (img.attr('height') || 1));
						if (wrap_ratio > img_ratio) img_ratio = 0.5;

						var wrap_data_ratio = wrap_ratio >= 1 ? 'landscape' : 'portrait';
						var img_data_ratio = img_ratio >= 1 ? 'landscape' : 'portrait';

						if (wrap_data_ratio === 'portrait' && img_data_ratio === 'portrait' && wrap_ratio >= img_ratio) {
							wrap_data_ratio = 'landscape';
						} else if (wrap_data_ratio === 'landscape' && img_data_ratio === 'landscape' && img_ratio <= wrap_ratio) {
							img_data_ratio = 'portrait';
						}

						parent
							.css('height', Math.floor(wrap_height))
							.css('width', Math.floor(wrap_width))
							.attr('data-ratio-n', wrap_ratio)

							.attr('data-ratio', wrap_data_ratio);

						img.attr('data-ratio', img_data_ratio)
							.attr('data-ratio-n', img_ratio)

							.closest('.img_wrap').css('height', parent.height()).css('width', parent.width())

					}
				});

				isotope.isotope({
					layoutMode: 'masonry',
					itemSelector: '.isotope_item',
					masonry: {
						columnWidth: wrap_width_origin
					},
					originLeft: !jQuery('body').hasClass('rtl')
				}).isotope('layout');
			}

			resize();
			isotope.imagesLoaded(function () {
				resize();
				showImages();
			});

			if (!that.editMode) {
				$scope.on("click", ".isotope-filter a", function (e) {
					e.preventDefault();
					var data_filter = this.getAttribute("data-filter");
					jQuery(this).siblings().removeClass("active");
					jQuery(this).addClass("active");
					isotope.isotope({filter: data_filter});
				});

				$('.view_more_link', $scope).on('click', function (e) {
					e.preventDefault();
					query.images = images[paged++];

					jQuery.ajax({
						type: "POST",
						data: query,
						url: gt3_themes_core.ajaxurl,
						success: function (data) {
							if ('post_count' in data) {
								if (data.post_count > 0) {
									var add = $(data.respond);
									isotope.append(add).isotope('appended', add);
									if (lightbox && 'gallery_items' in data) {
										lightbox_array = lightbox_array.concat(data.gallery_items);
									}
									setTimeout(function () {
										isotope.isotope({sortby: 'original-order'});
										resize();
									}, 50);
									setTimeout(function () {
										showImages();
									}, 800);
								}
							}
						},
						error: function (e) {
							console.error('Error request');
						}
					});
					if (paged >= max_page) {
						// jQuery(this).remove();
						jQuery(this).addClass('hidden');
					}
				});
			}

			function showImages() {
				if (jQuery('.loading:first', $scope).length) {
					jQuery('.loading:first', $scope).removeClass('loading');
					setTimeout(showImages, 240);
				} else {
					resize();
				}
			}


			$(window).on('resize', function () {
				resize();
			});

			if (paged >= max_page) {
				jQuery('.view_more_link', $scope).remove();
			}
		},
		Button: function ($scope) {
			var is_alignment_inline = jQuery($scope).find('.alignment_inline').length;
			if (is_alignment_inline) {
				jQuery($scope).addClass('gt3-core-button--alignment_inline')
			}else{
				jQuery($scope).removeClass('gt3-core-button--alignment_inline')
			}

		},
		VideoPopup: function ($scope) {
			var swipebox = jQuery('.swipebox-video', $scope);
			var settings = swipebox.data('settings');
			swipebox.swipebox({
				useCSS: true, // false will force the use of jQuery for animations
				useSVG: true, // false to force the use of png for buttons
				initialIndexOnArray: 0, // which image index to init when a array is passed
				hideCloseButtonOnMobile: false, // true will hide the close button on mobile devices
				removeBarsOnMobile: true, // false will show top bar on mobile devices
				hideBarsDelay: 3000, // delay before hiding bars on desktop
				videoMaxWidth: 1140,
				autoplayVideos: settings.autoplay,
				beforeOpen: function () {
				}, // called before opening
				afterOpen: null, // called after opening
				afterClose: function () {
				}, // called after closing
				loopAtEnd: false // true will return to the first image after the last image is reached
			});
		},
		ImageCarousel: function ($scope) {
			var that = this;
			var wrapper = $scope.hasClass('gt3_carousel_list') ? $scope : jQuery('.gt3_carousel_list', $scope);
			if (!wrapper.length) {
				return;
			}
			wrapper.slick();
		},
		PriceBox: function ($scope) {
			var windowW = window.innerWidth ? window.innerWidth : jQuery(window).width();
			if (windowW >= 1200) {
				if (!$scope.hasClass('hover_effect-yes')) return;
				var item_body = $scope.find('.gt3_price_item_body-elementor');
				$scope.mouseenter(function () {
					item_body.animate({
						height: "show",
						opacity: "show"
					}, 500);
				}).mouseleave(function () {
					item_body.animate({
						height: "hide",
						opacity: "hide"
					}, 500);
				});
			}
		}
	});

	return CoreFrontend;
});

jQuery(window).on('elementor/frontend/init', function () {
	window.gt3Elementor.CoreFrontend = window.gt3Elementor.CoreFrontend();
});


