<div id="extensions" class="eael-settings-tab eael-extensions-list">
    <div class="row">
        <div class="col-full">
            <h4>Available Extensions</h4>
            <div class="eael-checkbox-container">

                <div class="eael-checkbox">
                    <input type="checkbox" id="section-particles" name="section-particles" <?php checked( 1, $this->eael_get_settings['section-particles'], true ); ?> >
                    <label for="section-particles"></label>
                    <p class="eael-el-title"><?php _e( 'Particles', 'essential-addons-elementor' ) ?></p>
                </div>

                <div class="eael-checkbox">
                    <input type="checkbox" id="section-parallax" name="section-parallax" <?php checked( 1, $this->eael_get_settings['section-parallax'], true ); ?> >
                    <label for="section-parallax"></label>
                    <p class="eael-el-title"><?php _e( 'Parallax', 'essential-addons-elementor' ) ?></p>
                </div>

                <div class="eael-checkbox">
                    <input type="checkbox" id="global-tooltip" name="global-tooltip" <?php checked( 1, $this->eael_get_settings['global-tooltip'], true ); ?> >
                    <label for="global-tooltip"></label>
                    <p class="eael-el-title"><?php _e( 'Global Tooltip', 'essential-addons-elementor' ) ?></p>
                </div>

            </div>

            <div class="eael-save-btn-wrap">
                <button type="submit" class="button eael-btn js-eael-settings-save"><?php _e('Save settings', 'essential-addons-elementor'); ?></button>
            </div>
        </div>
    </div>
</div>