<div id="elements" class="eael-settings-tab eael-elements-list">
    <div class="row">
        <div class="col-full">
            <!-- Content Element Starts -->
            <h4>Content Elements</h4>
            <div class="eael-checkbox-container">
                <div class="eael-checkbox">
                    <input type="checkbox" id="info-box" name="info-box" <?php checked( 1, $this->eael_get_settings['info-box'], true ); ?> >
                    <label for="info-box"></label>
                    <p class="eael-el-title"><?php _e( 'Info Box', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="team-members" name="team-members" <?php checked( 1, $this->eael_get_settings['team-members'], true ); ?> >
                    <label for="team-members"></label>
                    <p class="eael-el-title"><?php _e( 'Team Member', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="team-member-carousel" name="team-member-carousel" <?php checked( 1, $this->eael_get_settings['team-member-carousel'], true ); ?> >
                    <label for="team-member-carousel"></label>
                    <p class="eael-el-title"><?php _e( 'Team Member Carousel', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="flip-box" name="flip-box" <?php checked( 1, $this->eael_get_settings['flip-box'], true ); ?> >
                    <label for="flip-box"></label>
                    <p class="eael-el-title"><?php _e( 'Flip Box', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="dual-header" name="dual-header" <?php checked( 1, $this->eael_get_settings['dual-header'], true ); ?> >
                    <label for="dual-header"></label>
                    <p class="eael-el-title"><?php _e( 'Dual Color Header', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="creative-btn" name="creative-btn" <?php checked( 1, $this->eael_get_settings['creative-btn'], true ); ?> >
                    <label for="creative-btn"></label>
                    <p class="eael-el-title"><?php _e( 'Creative Button', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="tooltip" name="tooltip" <?php checked( 1, $this->eael_get_settings['tooltip'], true ); ?> >
                    <label for="tooltip"></label>
                    <p class="eael-el-title"><?php _e( 'Tooltip', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="toggle" name="toggle" <?php checked( 1, $this->eael_get_settings['toggle'], true ); ?> >
                    <label for="toggle"></label>
                    <p class="eael-el-title"><?php _e( 'Toggle', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="testimonial-slider" name="testimonial-slider" <?php checked( 1, $this->eael_get_settings['testimonial-slider'], true ); ?> >
                    <label for="testimonial-slider"></label>
                    <p class="eael-el-title"><?php _e( 'Testimonial Slider', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="testimonials" name="testimonials" <?php checked( 1, $this->eael_get_settings['testimonials'], true ); ?> >
                    <label for="testimonials"></label>
                    <p class="eael-el-title"><?php _e( 'Testimonials', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="static-product" name="static-product" <?php checked( 1, $this->eael_get_settings['static-product'], true ); ?> >
                    <label for="static-product"></label>
                    <p class="eael-el-title"><?php _e( 'Static Product', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="adv-tabs" name="adv-tabs" <?php checked( 1, $this->eael_get_settings['adv-tabs'], true ); ?> >
                    <label for="adv-tabs"></label>
                    <p class="eael-el-title"><?php _e( 'Advanced Tabs', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="adv-accordion" name="adv-accordion" <?php checked( 1, $this->eael_get_settings['adv-accordion'], true ); ?> >
                    <label for="adv-accordion"></label>
                    <p class="eael-el-title"><?php _e( 'Advanced Accordion', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="offcanvas" name="offcanvas" <?php checked( 1, $this->eael_get_settings['offcanvas'], true ); ?> >
                    <label for="offcanvas"></label>
                    <p class="eael-el-title"><?php _e( 'Offcanvas', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="advanced-menu" name="advanced-menu" <?php checked( 1, $this->eael_get_settings['advanced-menu'], true ); ?> >
                    <label for="advanced-menu"></label>
                    <p class="eael-el-title"><?php _e( 'Advanced Menu', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="cookie-consent" name="cookie-consent" <?php checked( 1, $this->eael_get_settings['cookie-consent'], true ); ?> >
                    <label for="cookie-consent"></label>
                    <p class="eael-el-title"><?php _e( 'Cookie Consent', 'essential-addons-elementor' ) ?></p>
                </div>
            </div>
            <!-- Content Element Ends -->
            <!-- Dynamic Content Element Starts -->
            <h4>Dynamic Content Elements</h4>
            <div class="eael-checkbox-container">
                <div class="eael-checkbox">
                    <input type="checkbox" id="post-grid" name="post-grid" <?php checked( 1, $this->eael_get_settings['post-grid'], true ); ?> >
                    <label for="post-grid"></label>
                    <p class="eael-el-title"><?php _e( 'Post Grid', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="post-block" name="post-block" <?php checked( 1, $this->eael_get_settings['post-block'], true ); ?> >
                    <label for="post-block"></label>
                    <p class="eael-el-title"><?php _e( 'Post Block', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="post-carousel" name="post-carousel" <?php checked( 1, $this->eael_get_settings['post-carousel'], true ); ?> >
                    <label for="post-carousel"></label>
                    <p class="eael-el-title"><?php _e( 'Post Carousel', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="post-timeline" name="post-timeline" <?php checked( 1, $this->eael_get_settings['post-timeline'], true ); ?> >
                    <label for="post-timeline"></label>
                    <p class="eael-el-title"><?php _e( 'Post Timeline', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="post-list" name="post-list" <?php checked( 1, $this->eael_get_settings['post-list'], true ); ?> >
                    <label for="post-list"></label>
                    <p class="eael-el-title"><?php _e( 'Post List', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="instagram-gallery" name="instagram-gallery" <?php checked( 1, $this->eael_get_settings['instagram-gallery'], true ); ?> >
                    <label for="instagram-gallery"></label>
                    <p class="eael-el-title"><?php _e( 'Instagram Gallery', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="product-grid" name="product-grid" <?php checked( 1, $this->eael_get_settings['product-grid'], true ); ?> >
                    <label for="product-grid"></label>
                    <p class="eael-el-title"><?php _e( 'Woo Product Grid', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="woo-collections" name="woo-collections" <?php checked( 1, $this->eael_get_settings['woo-collections'], true ); ?> >
                    <label for="woo-collections"></label>
                    <p class="eael-el-title"><?php _e( 'Woo Product Collections', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="content-timeline" name="content-timeline" <?php checked( 1, $this->eael_get_settings['content-timeline'], true ); ?> >
                    <label for="content-timeline"></label>
                    <p class="eael-el-title"><?php _e( 'Content Timeline', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="data-table" name="data-table" <?php checked( 1, $this->eael_get_settings['data-table'], true ); ?> >
                    <label for="data-table"></label>
                    <p class="eael-el-title"><?php _e( 'Data Table', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="dynamic-filter-gallery" name="dynamic-filter-gallery" <?php checked( 1, $this->eael_get_settings['dynamic-filter-gallery'], true ); ?> >
                    <label for="dynamic-filter-gallery"></label>
                    <p class="eael-el-title"><?php _e( 'Dynamic Filter Gallery', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="content-ticker" name="content-ticker" <?php checked( 1, $this->eael_get_settings['content-ticker'], true ); ?> >
                    <label for="content-ticker"></label>
                    <p class="eael-el-title"><?php _e( 'Content Ticker', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="adv-google-map" name="adv-google-map" <?php checked( 1, $this->eael_get_settings['adv-google-map'], true ); ?> >
                    <label for="adv-google-map"></label>
                    <p class="eael-el-title"><?php _e( 'Advanced Google Map', 'essential-addons-elementor' ) ?>
                        (<span><a href="#" id="eael-popup-api-modal">Settings</a></span>)
                        <input type="hidden" name="google-map-api" id="google-map-api-hidden" class="google-map-api" placeholder="Set API Key" value="<?php echo get_option('eael_save_google_map_api'); ?>">
                    </p>
                </div>
            </div>
            <!-- Dynamic Content Element Ends -->
            <!-- Creative Element Starts -->
            <h4>Creative Elements</h4>
            <div class="eael-checkbox-container">
                <div class="eael-checkbox">
                    <input type="checkbox" id="fancy-text" name="fancy-text" <?php checked( 1, $this->eael_get_settings['fancy-text'], true ); ?> >
                    <label for="fancy-text"></label>
                    <p class="eael-el-title"><?php _e( 'Fancy Text', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="interactive-promo" name="interactive-promo" <?php checked( 1, $this->eael_get_settings['interactive-promo'], true ); ?> >
                    <label for="interactive-promo"></label>
                    <p class="eael-el-title"><?php _e( 'Interactive Promo', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="count-down" name="count-down" <?php checked( 1, $this->eael_get_settings['count-down'], true ); ?>>
                    <label for="count-down"></label>
                    <p class="eael-el-title"><?php _e( 'Count Down', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="counter" name="counter" <?php checked( 1, $this->eael_get_settings['counter'], true ); ?>>
                    <label for="counter"></label>
                    <p class="eael-el-title"><?php _e( 'Counter', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="lightbox" name="lightbox" <?php checked( 1, $this->eael_get_settings['lightbox'], true ); ?> >
                    <label for="lightbox"></label>
                    <p class="eael-el-title"><?php _e( 'Lightbox', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="protected-content" name="protected-content" <?php checked( 1, $this->eael_get_settings['protected-content'], true ); ?> >
                    <label for="protected-content"></label>
                    <p class="eael-el-title"><?php _e( 'Protected Content', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="img-comparison" name="img-comparison" <?php checked( 1, $this->eael_get_settings['img-comparison'], true ); ?> >
                    <label for="img-comparison"></label>
                    <p class="eael-el-title"><?php _e( 'Image Comparison', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="flip-carousel" name="flip-carousel" <?php checked( 1, $this->eael_get_settings['flip-carousel'], true ); ?> >
                    <label for="flip-carousel"></label>
                    <p class="eael-el-title"><?php _e( 'Flip Carousel', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="logo-carousel" name="logo-carousel" <?php checked( 1, $this->eael_get_settings['logo-carousel'], true ); ?> >
                    <label for="logo-carousel"></label>
                    <p class="eael-el-title"><?php _e( 'Logo Carousel', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="interactive-cards" name="interactive-cards" <?php checked( 1, $this->eael_get_settings['interactive-cards'], true ); ?> >
                    <label for="interactive-cards"></label>
                    <p class="eael-el-title"><?php _e( 'Interactive Cards', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="filter-gallery" name="filter-gallery" <?php checked( 1, $this->eael_get_settings['filter-gallery'], true ); ?> >
                    <label for="filter-gallery"></label>
                    <p class="eael-el-title"><?php _e( 'Filterable Gallery', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="image-accordion" name="image-accordion" <?php checked( 1, $this->eael_get_settings['image-accordion'], true ); ?> >
                    <label for="image-accordion"></label>
                    <p class="eael-el-title"><?php _e( 'Image Accordion', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="one-page-navigation" name="one-page-navigation" <?php checked( 1, $this->eael_get_settings['one-page-navigation'], true ); ?> >
                    <label for="one-page-navigation"></label>
                    <p class="eael-el-title"><?php _e( 'One Page Navigation', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="image-hotspots" name="image-hotspots" <?php checked( 1, $this->eael_get_settings['image-hotspots'], true ); ?> >
                    <label for="image-hotspots"></label>
                    <p class="eael-el-title"><?php _e( 'Image Hotspots', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="divider" name="divider" <?php checked( 1, $this->eael_get_settings['divider'], true ); ?> >
                    <label for="divider"></label>
                    <p class="eael-el-title"><?php _e( 'Divider', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="progress-bar" name="progress-bar" <?php checked( 1, $this->eael_get_settings['progress-bar'], true ); ?> >
                    <label for="progress-bar"></label>
                    <p class="eael-el-title"><?php _e( 'Progress Bar', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="image-scroller" name="image-scroller" <?php checked( 1, $this->eael_get_settings['image-scroller'], true ); ?> >
                    <label for="image-scroller"></label>
                    <p class="eael-el-title"><?php _e( 'Image Scroller', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="dismissible-section" name="dismissible-section" <?php checked( 1, $this->eael_get_settings['dismissible-section'], true ); ?> >
                    <label for="dismissible-section"></label>
                    <p class="eael-el-title"><?php _e( 'Dismissible Section', 'essential-addons-elementor' ) ?></p>
                </div>
            </div>
            <!-- Creative Element Ends -->
            <!-- Marketing Elements Starts -->
            <h4>Marketing Elements</h4>
            <div class="eael-checkbox-container">
                <div class="eael-checkbox">
                    <input type="checkbox" id="call-to-action" name="call-to-action" <?php checked( 1, $this->eael_get_settings['call-to-action'], true ); ?> >
                        <label for="call-to-action"></label>
                    <p class="eael-el-title"><?php _e( 'Call To Action', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="price-table" name="price-table" <?php checked( 1, $this->eael_get_settings['price-table'], true ); ?> >
                    <label for="price-table"></label>
                    <p class="eael-el-title"><?php _e( 'Pricing Table', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="price-menu" name="price-menu" <?php checked( 1, $this->eael_get_settings['price-menu'], true ); ?> >
                    <label for="price-menu"></label>
                    <p class="eael-el-title"><?php _e( 'Price menu', 'essential-addons-elementor' ) ?></p>
                </div>
            </div>
            <!-- Marketing Elements Ends -->
            <!-- Form Styler Elements Starts -->
            <h4>Form Styler Elements</h4>
            <div class="eael-checkbox-container">
                <div class="eael-checkbox">
                    <input type="checkbox" id="mailchimp" name="mailchimp" <?php checked( 1, $this->eael_get_settings['mailchimp'], true ); ?> >
                    <label for="mailchimp"></label>
                    <p class="eael-el-title"><?php _e( 'Mailchimp', 'essential-addons-elementor' ) ?>
                        (<span><a href="#" id="eael-popup-mailchimp-api-modal">Settings</a></span>)
                        <input type="hidden" name="mailchimp-api" id="mailchimp-api-hidden" class="mailchimp-api" placeholder="Set API Key" value="<?php echo get_option('eael_save_mailchimp_api'); ?>">
                    </p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="weforms" name="weforms" <?php checked( 1, $this->eael_get_settings['weforms'], true ); ?> >
                    <label for="weforms"></label>
                    <p class="eael-el-title"><?php _e( 'weForms', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="contact-form-7" name="contact-form-7" <?php checked( 1, $this->eael_get_settings['contact-form-7'], true ); ?> >
                    <label for="contact-form-7"></label>
                    <p class="eael-el-title"><?php _e( 'Contact Form 7', 'essential-addons-elementor' ); ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="ninja-form" name="ninja-form" <?php checked( 1, $this->eael_get_settings['ninja-form'], true ); ?> >
                        <label for="ninja-form"></label>
                    <p class="eael-el-title"><?php _e( 'Ninja Form', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="gravity-form" name="gravity-form" <?php checked( 1, $this->eael_get_settings['gravity-form'], true ); ?> >
                    <label for="gravity-form"></label>
                    <p class="eael-el-title"><?php _e( 'Gravity Form', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="caldera-form" name="caldera-form" <?php checked( 1, $this->eael_get_settings['caldera-form'], true ); ?> >
                    <label for="caldera-form"></label>
                    <p class="eael-el-title"><?php _e( 'Caldera Form', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="wpforms" name="wpforms" <?php checked( 1, $this->eael_get_settings['wpforms'], true ); ?> >
                    <label for="wpforms"></label>
                    <p class="eael-el-title"><?php _e( 'WPForms', 'essential-addons-elementor' ) ?></p>
                </div>
            </div>
            <!-- Form Styler Elements Ends -->
            <!-- Social Feed Elements Starts -->
            <h4>Social Feed Elements</h4>
            <div class="eael-checkbox-container">
                <div class="eael-checkbox">
                    <input type="checkbox" id="twitter-feed" name="twitter-feed" <?php checked( 1, $this->eael_get_settings['twitter-feed'], true ); ?> >
                    <label for="twitter-feed"></label>
                    <p class="eael-el-title"><?php _e( 'Twitter Feed', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="twitter-feed-carousel" name="twitter-feed-carousel" <?php checked( 1, $this->eael_get_settings['twitter-feed-carousel'], true ); ?> >
                    <label for="twitter-feed-carousel"></label>
                    <p class="eael-el-title"><?php _e( 'Twitter Feed Carousel', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="facebook-feed" name="facebook-feed" <?php checked( 1, $this->eael_get_settings['facebook-feed'], true ); ?> >
                    <label for="facebook-feed"></label>
                    <p class="eael-el-title"><?php _e( 'Facebook Feed', 'essential-addons-elementor' ) ?></p>
                </div>
                <div class="eael-checkbox">
                    <input type="checkbox" id="facebook-feed-carousel" name="facebook-feed-carousel" <?php checked( 1, $this->eael_get_settings['facebook-feed-carousel'], true ); ?> >
                    <label for="facebook-feed-carousel"></label>
                    <p class="eael-el-title"><?php _e( 'Facebook Feed Carousel', 'essential-addons-elementor' ) ?></p>
                </div>
            </div>
            <!-- Social Feed Elements Ends -->
            <div class="eael-save-btn-wrap">
                <button type="submit" class="button eael-btn js-eael-settings-save"><?php _e('Save settings', 'essential-addons-elementor'); ?></button>
            </div>
        </div>
    </div>
</div>