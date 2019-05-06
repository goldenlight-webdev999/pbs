'use strict';

(function (factory) {

	window.gt3Elementor = window.gt3Elementor || {};
	window.gt3Elementor.Core = window.gt3Elementor.Core || {};
	window.gt3Elementor.Core.Editor = window.gt3Elementor.Core.Editor || factory(window.jQuery);

})(function ($) {


	function CoreEditor() {
		if (!this || this.options !== CoreEditor.prototype.options) {
			return new CoreEditor()
		}

		this.initialize();

	}

	$.extend(CoreEditor.prototype, {
		options: {

		},
		initialize: function () {
			var that = this;
			window.elementor.channels.editor.on('section:activated', function (sectionName, editor) {
				var wrap = $('.elementor-control-type-gt3-elementor-core-gallery', editor.$el);

				if (wrap.length) {
					that.Gallery(wrap);
				}

                var model = editor.getOption('editedElementView').getEditModel(),
                    currentElementType = model.get('elType');
                if ('widget' === currentElementType) {
                    currentElementType = model.get('widgetType');
                }
                if ('gt3-core-shoplist' === currentElementType && 'section_general' === sectionName) {
                    setTimeout(function () {
                        var input = editor.$el.find('[data-setting="hidden_update"]');
                        input.val(input.val() === '1' ? '0' : '1').trigger('input');
                    }, 10);
                }
			});

			elementor.hooks.addAction( 'panel/open_editor/widget/text-editor', function( panel, model, view ) {
			   var $element = view.$el.find( '.elementor-selector' );
			   window.elementor.channels.editor.on('change:text-editor', function (sectionName, editor) {
			   	console.log(sectionName, editor)
					console.log('check');
					that.elementor_def_editor_change(view.$el);
				});
			} );

			window.elementor.hooks.addAction('panel/open_editor/widget/gt3-core-testimonials', that['Testimonials'].bind(that));
			window.elementor.hooks.addAction('panel/open_editor/widget', that['hiddenUpdate'].bind(that));

		},

		elementor_def_editor_change: function (view) {
			var body = view.parents('body');
			var color = body.css('color');
			var font_size = body.css('font-size');
			var line_height = body.css('line-height');
			var font_family = body.css('font-family');
			var font_weight = body.css('font-weight');

				if (font_size != jQuery(view).css('font-size')) {
					jQuery(view).addClass('elementor-element-custom_font_size');
				}else{
					jQuery(view).removeClass('elementor-element-custom_font_size');
				}
				if (line_height != jQuery(view).css('line-height')) {
					jQuery(view).addClass('elementor-element-custom_line_height');
				}else{
					jQuery(view).removeClass('elementor-element-custom_line_height');
				}
				if (font_family != jQuery(view).css('font-family')) {
					jQuery(view).addClass('elementor-element-custom_font_family');
				}else{
					jQuery(view).removeClass('elementor-element-custom_font_family');
				}
				if (font_weight != jQuery(view).css('font-weight')) {
					jQuery(view).addClass('elementor-element-custom_font_weight');
				}else{
					jQuery(view).removeClass('elementor-element-custom_font_weight');
				}
				if (color != jQuery(view).css('color')) {
					jQuery(view).addClass('elementor-element-custom_color');
				}else{
					jQuery(view).removeClass('elementor-element-custom_color');
				}

		},

		Gallery: function (wrap) {
			var gallery = $('.control-gt3-gallery-input', wrap), // Save field
				preview = $('.control-gt3-gallery-preview', wrap), // Render block
				info = $('.control-gt3-gallery-info', wrap), // Info Block
				images = [],
				media, // wp.media
				frameStates = {
					create: 'gallery',
					add: 'gallery-library',
					edit: 'gallery-edit'
				};
			if (!preview.length) return;
			if (preview.hasClass('started')) return;
			preview.addClass('started');

			Sortable.create(preview[0], {
				onEnd: function (evt) {
					var newImages = [];
					$.each(preview.children(), function (key, item) {
						var id = parseInt($(item).attr('data-id'));
						$.each(images, function (key, value) {
							if (id === parseInt(value)) {
								newImages.push(value);
								return false;
							}
						});
					});
					images = newImages;
					Save();
					return false;
				}
			});

			wrap.on('click', '.control-gt3-gallery-add', function (e) {
				e.preventDefault();
				var state = hasImage() ? 'add' : 'create';
				prepareMedia(state);
				openMedia();
			});

			wrap.on('click', '.control-gt3-gallery-item', function (e) {
				e.preventDefault();
				prepareMedia('edit');
				openMedia();
			});

			wrap.on('click', '.control-gt3-gallery-clear', function (e) {
				e.preventDefault();
				if (confirm(gt3_i18l_Elementor_Editor.clearAllConfirm)) {
					images = [];
					Save();
					RenderGallery();
				}
			});

			function prepareMedia(state) {
				var options = {
					frame: 'post',
					multiple: true,
					state: frameStates[state],
					button: {
						text: gt3_i18l_Elementor_Editor.insertMedia
					}
				};

				if (hasImage()) {
					options.selection = fetchSelection();
				}


				media = wp.media(options);
				media.on({
					'update': Update,
					'menu:render:default': menuRender,
					'content:render:browse': gallerySettings
				})
			}

			function openMedia() {
				media.open();
			}

			function Update(selected) {
				images = [];
				selected.each(function (attachment) {
					if (attachment.get('mime').indexOf('svg') === -1) {
						images.push(attachment.get('id'));
					}
				});
				Save();
				RenderGallery();
			}

			function menuRender(view) {
				view.unset('insert');
				view.unset('featured-image');
			}

			function gallerySettings(browser) {
				browser.sidebar.on('ready', function () {
					browser.sidebar.unset('gallery');
				});
			}

			function Save() {
				gallery.trigger('focus').val(getIds()).trigger('change').trigger('blur').trigger('input');
			}

			function hasImage() {
				return !!images.length;
			}

			function getIds() {
				return hasImage() ? images.join(',') : '';
			}

			function getIdsArray() {
				return images;
			}

			function fetchSelection() {
				var attachments = wp.media.query({
					orderby: 'post__in',
					order: 'ASC',
					type: 'image',
					perPage: -1,
					post__in: getIdsArray()
				});

				return new wp.media.model.Selection(attachments.models, {
					props: attachments.props.toJSON(),
					multiple: true
				});
			}

			function RenderGallery() {
				var query = wp.media.query({
						post__in: getIdsArray(),
						orderby: 'post__in',
						order: 'ASC',
						type: 'image',
						perPage: -1,
					}),
					promise = query.more();
				var id, src;
				preview[0].innerHTML = '';

				promise.done(function () {
					if (images.length > 0) {
						$.each(query.models, function (k, image) {
							var elem = document.createElement('div');
							id = image.get('id')
							src = (image.get('sizes')['thumbnail'] && image.get('sizes')['thumbnail']['url']) || image.get('sizes')['full']['url'];
							elem.classList.add('control-gt3-gallery-item');
							elem.dataset.id = id;
							elem.style.backgroundImage = 'url("'+src+'")';
							preview[0].appendChild(elem);
						});


						info.html(images.length + ' ' + gt3_i18l_Elementor_Editor.imagesSelected + ' <a href="#" class="control-gt3-gallery-clear">(' + gt3_i18l_Elementor_Editor.clear + ')</a>');
					} else {
						info[0].innerText = gt3_i18l_Elementor_Editor.noImagesSelected;
					}
				});
			}

			function loadGallery() {
				if (!gallery.val().length) {
					images = [];
				} else {
					images = gallery.val().split(',');
				}
				RenderGallery();
			}

			loadGallery();
		},
		hiddenUpdate: function (panel, model, view) {
			panel.$el.on('click', '[data-event="update_widget"]', function () {
				var input = $(this).closest('#elementor-controls').find('[data-setting*="hidden_update"]').eq(0);
				input.val(input.val() === '1' ? '0' : '1').trigger('input');
			});
		},
		Testimonials: function (panel, model, view) {
			var element, icons, preview, preview_html, icon_preview, modal_edit_title,
				remove_icon, insert_icon, modal_edit_link, index = null, el = null;
			var $modal = $('#testimonial_modal', $('body'));

			// Update on load widget
			panel.$el.on('click', '[data-event="update_icons"]', function () {
				var wrapper = $(this).closest('.elementor-repeater-row-controls');
				wrapper.find('.elementor-control-icons_preview .elementor-control-raw-html').html(wrapper.find('.elementor-control-icons [data-setting="icons"]').val());
			});

			// Open modal
			panel.$el.on('click', '[data-event="show_modal"]', function () {
				// open
				if (!$modal.length) {
					$modal = $(this).closest('.elementor-repeater-row-controls').find('.modal-wrapper').clone();
					$modal.attr('id','testimonial_modal');
					$('body').append($modal);
				}
				$modal.addClass('show');

				//init elements
				element = $(this).closest('.elementor-repeater-row-controls');
				icons = element.find('.elementor-control-icons [data-setting="icons"]');
				preview = element.find('.elementor-control-icons_preview .elementor-control-raw-html');
				preview_html = $modal.find('.preview_html');
				icon_preview = $modal.find('.icon_preview');
				modal_edit_title = $modal.find('.modal_edit_title');
				modal_edit_link = $modal.find('.modal_edit_link');
				remove_icon = $modal.find('.remove_icon');
				insert_icon = $modal.find('.insert_icon');

				// load value
				preview_html.html(icons.val());

				// Clear
				icon_preview.html('');
				modal_edit_title.val('').attr('disabled', 'disabled');
				modal_edit_link.val('').attr('disabled', 'disabled');
				remove_icon.attr('disabled', 'disabled');
				insert_icon.attr('disabled', 'disabled');

				// Sortable
				Sortable.create($modal.find('.prev_orig')[0],
					{
						group: {
							name: 'icons',
							pull: 'clone',
							put: false
						},
						sort: false
					}
				);

				Sortable.create($modal.find('.remove_wrapper')[0],
					{
						group: {
							name: 'icons',
							pull: false,
							put: true
						},
						sort: false,
						onAdd: function (e) {
							$(e.item).remove();
						}
					}
				);

				Sortable.create(preview_html[0],
					{
						group: {
							name: 'icons',
							pull: false,
							put: true
						},
						sort: true,
						onAdd: function (e) {
							$(e.item).click();
						}
					}
				);


				$modal.on('click', '.close', function () {
					// close
					$(this).closest('.modal-wrapper').removeClass('show');
					$modal.off();
				});

				// Insert array
				$modal.on('click', '.prev_orig .social', function (e) {
					e.preventDefault();

					el = $(this);
					index = null;

					icon_preview.html(el.clone());
					modal_edit_title.val(el.attr('title')).removeAttr('disabled');
					modal_edit_link.val('#').removeAttr('disabled');

					// remove_icon.removeAttr('disabled');
					insert_icon.removeAttr('disabled').val('Insert');

				});

				// Preview
				$modal.on('click', '.preview_html .social', function (e) {
					e.preventDefault();

					index = el = $(this);

					icon_preview.html(el.clone());
					modal_edit_title.val(el.attr('title')).removeAttr('disabled');
					modal_edit_link.val(el.attr('href')).removeAttr('disabled');

					remove_icon.removeAttr('disabled');
					insert_icon.removeAttr('disabled').val('Update');
				});

				// remove_icon
				$modal.on('click', '.remove_icon', function (e) {
					e.preventDefault();

					index.fadeOut(300,function () {
						index.remove();
						index = null;
					});


					icon_preview.html('');
					modal_edit_title.val(el.attr('')).attr('disabled', 'disabled');
					modal_edit_link.val(el.attr('')).attr('disabled', 'disabled');
					remove_icon.attr('disabled', 'disabled');
					insert_icon.attr('disabled', 'disabled');
				});

				// Insert Button
				$modal.on('click', '.insert_icon', function (e) {
					e.preventDefault();
					if (index !== null) {
						index.attr('title', modal_edit_title.val())
							.attr('href', modal_edit_link.val())
							.find('img').attr('title', modal_edit_title.val());
					} else {
						var insert = el.clone();
						insert.attr('title', modal_edit_title.val())
							.attr('href', modal_edit_link.val())
							.find('img').attr('title', modal_edit_title.val());
						preview_html.append(insert);
					}

					icon_preview.html('');
					modal_edit_title.val('').attr('disabled', 'disabled');
					modal_edit_link.val('').attr('disabled', 'disabled');
					remove_icon.attr('disabled', 'disabled');
					insert_icon.attr('disabled', 'disabled');
				});

				// Save
				$modal.on('click', '.save_button', function (e) {
					e.preventDefault();

					icons.val(preview_html.html()).trigger('input');
					preview.html(preview_html.html())
					$(this).closest('.modal-wrapper').removeClass('show');
					$modal.off();
				});
			});

			// Close modal

		},
	});


	return CoreEditor;
});


jQuery(window).ready(function () {
	if (typeof window.gt3Elementor.Core.Editor === 'function')
		window.gt3Elementor.Core.Editor = window.gt3Elementor.Core.Editor();
} );

var GT3ElementorCoreQueryItemView = elementor.modules.controls.BaseMultiple.extend({
	ui: {
		postsPerPageControl: '[data-setting="posts_per_page"]',
		ignoreStickyPostsControl: '[data-setting="ignore_sticky_posts"]',
		ignoreStickyPostsControlWrapper: '.ignore_sticky_posts-wrapper',
		orderByControl:'[data-setting="orderby"]',
		orderControl: '[data-setting="order"]',

		taxonomyControl: '[data-setting="taxonomy"]',
		tagsControl: '[data-setting="tags"]',
		authorControl: '[data-setting="author__in"]',
		postControl: '[data-setting="post__in"]',
		selectedPost__in: '.selected_post__in'
	},

	events: function () {
		return {
			'change @ui.postsPerPageControl': 'onChange',
			'change @ui.ignoreStickyPostsControl': 'onChange',
			'change @ui.orderByControl': 'onChange',
			'change @ui.orderControl': 'onChange',

			'change @ui.taxonomyControl': 'onChange',
			'change @ui.tagsControl': 'onChange',
			'change @ui.authorControl': 'onChange',
			'change @ui.postControl': 'onChange',
		};
	},

	onReady: function () {
		this.settings = Object.assign({
			post_tag: "post_tag",
			post_taxonomy: "category",
			post_type: "post",
			showCategory: false,
			showPost: false,
			showTag: false,
			showUser: false,
		}, this.model.get('settings'));

		this.baseurl =  window.location.href.substring(0, window.location.href.indexOf('/wp-admin'));

		this.initTaxonomy();
		this.initTag();
		this.initUser();
		this.initPost();
		if (this.settings.post_type === 'post') {
			this.ui.ignoreStickyPostsControl.prop('checked', this.getControlValue('ignore_sticky_posts') === "1");
		} else {
			this.ui.ignoreStickyPostsControlWrapper.hide();
		}
	},

	initTaxonomy: function () {
		if (!this.settings.showCategory) return;
		var that = this,
			control_value = that.getControlValue('taxonomy') || [];

		$.ajax({
			url: ajaxurl,
			method: 'POST',
			data: {
				action: 'gt3_ajax_query',
				gt3_action: 'get-taxonomy',
				taxonomy: this.settings.post_taxonomy,
				include: control_value,
			}
		}).done(function (data) {
			control_value = data.map(function (val) {
				return val.value;
			});
			that.ui.taxonomyControl.select2({
				value: control_value,
				data:
					data.map(function (val) {
						return {
							id: val.value,
							text: val.label,
							selected: control_value.indexOf(val.value.toString()) !== -1,
						};
					}),
				// closeOnSelect: false,
				multiple: true,
				cache: true,
				ajax: {
					url: ajaxurl,
					method: 'POST',
					dataType: 'json',
					delay: 250,
					cache: true,
					data: function (params) {
						return Object.assign({
							action: 'gt3_ajax_query',
							gt3_action: 'get-taxonomy',
							select2: true,
							taxonomy: that.settings.post_taxonomy,
							exclude: that.getControlValue('taxonomy'),
							hide_empty: true,
						}, params);
					},
					processResults: function (data) {
						return {
							results: data.map(function (val) {
								return {
									id: val.value,
									text: val.label
								};
							})
						}
					},
				},
				minimumInputLength: 1,
			});
		});
	},
	initTag: function () {
		if (!this.settings.showTag) return;
		var that = this,
			control_value = that.getControlValue('tags') || [];


		$.ajax({
			url: ajaxurl,
			method: 'POST',
			data:
				{
					action: 'gt3_ajax_query',
					gt3_action: 'get-taxonomy',
					taxonomy: this.settings.post_tag,
					include: control_value
				}
		}).done(function (data) {
			that.ui.tagsControl.select2({
				value: control_value,
				data: data.map(function (val) {
					return {
						id: val.value,
						text: val.label,
						selected: control_value.indexOf(val.value.toString()) !== -1,
					};
				}),
				// closeOnSelect: false,
				multiple: true,
				cache: true,
				ajax: {
					url: ajaxurl,
					method: 'POST',
					dataType: 'json',
					delay: 250,
					cache: true,
					data: function (params) {
						return Object.assign({
							action: 'gt3_ajax_query',
							gt3_action: 'get-taxonomy',
							select2: true,
							taxonomy: that.settings.post_tag,
							exclude: that.getControlValue('tags'),
							hide_empty: true
						}, params);
					},
					processResults: function (data) {
						return {
							results: data.map(function (val) {
								return {
									id: val.value,
									text: val.label
								};
							})
						}

					},
				},
				minimumInputLength: 1,
			});
		});
	},

	initUser: function () {
		if (!this.settings.showUser) return;
		var that = this,
			control_value = that.getControlValue('author__in') || [];


		$.ajax({
			url: ajaxurl,
			method: 'POST',
			data: {
				action: 'gt3_ajax_query',
				gt3_action: 'get-user',
				post_type: this.settings.post_type,
				include: control_value
			}
		}).done(function (data) {
			that.ui.authorControl.select2({
				value: control_value,
				data: data.map(function (val) {
					return {
						id: val.value,
						text: val.label,
						selected: control_value.indexOf(val.value.toString()) !== -1,
					};
				}),
				// closeOnSelect: false,
				multiple: true,
				cache: true,
				ajax: {
					url: ajaxurl,
					method: 'POST',
					dataType: 'json',
					delay: 250,
					cache: true,
					data: function (params) {
						return Object.assign({
							action: 'gt3_ajax_query',
							gt3_action: 'get-user',
							select2: true,
							post_type: that.settings.post_type,
							exclude: that.getControlValue('author__in')
						}, params);
					},
					processResults: function (data) {
						return {
							results: data.map(function (val) {
								return {
									id: val.value,
									text: val.label
								};
							})
						}

					},
				},
				minimumInputLength: 1,
			});
		});
	},
	initPost: function () {
		if (!this.settings.showPost) return;
		var that = this,
			control_value = that.getControlValue('post__in') || [];

		$.ajax({
			url: ajaxurl,
			method: 'POST',
			data: {
				action: 'gt3_ajax_query',
				gt3_action: 'get-post',
				post_type: this.settings.post_type,
				include: control_value
			}
		}).done(function (data) {
			that.ui.postControl.select2({
				value: control_value,
				data: data.map(function (val) {
					return {
						id: val.value,
						text: val.label,
						selected: control_value.indexOf(val.value.toString()) !== -1,
					};
				}),
				// closeOnSelect: false,
				multiple: true,
				cache: true,
				ajax: {
					url: ajaxurl,
					method: 'POST',
					dataType: 'json',
					delay: 250,
					cache: true,
					data: function (params) {
						return Object.assign({
							action: 'gt3_ajax_query',
							gt3_action: 'get-post',
							select2: true,
							post_type: that.settings.post_type,
							exclude: that.getControlValue('post__in'),
						}, params);
					},
					processResults: function (data) {
						return {
							results: data.map(function (val) {
								return {
									id: val.value,
									text: val.label
								};
							})
						}

					},
				},
				minimumInputLength: 1,
			});
		});
	},

	onChange: function (e) {
		var target = e.currentTarget,
			name = target.dataset.setting,
			obj = {},
			val = $(target).val();

		if (['taxonomy', 'tags', 'author__in', 'post__in'].indexOf(name.toString()) !== -1) {
			val = val || [];
		} else if (name === 'ignore_sticky_posts') {
			val = target.checked ? "1" : "0";
			this.ui.ignoreStickyPostsControl.prop( 'checked', val === "1" );
		}
		obj[name] = val;

		this.setValue(obj);
		if (!!this.getControlValue('post__in').length) {
			this.ui.selectedPost__in.hide();
		} else {
			this.ui.selectedPost__in.show();
		}
	}
});
elementor.addControlView('gt3-elementor-core-query', GT3ElementorCoreQueryItemView);

window.elementor.hooks.addAction('panel/open_editor/widget',function (action, model) {
    var hiddenUpdate = model.attributes.settings.get('hiddenUpdate');
    if (typeof hiddenUpdate !== 'undefined') {
        model.attributes.settings.set('hiddenUpdate',!hiddenUpdate);
    }
    return false;
});

window.elementor.channels.editor.on('change:gt3-core-shoplist:prod_per_row',function(model){
    model.elementSettingsModel.trigger('change',model)
});







