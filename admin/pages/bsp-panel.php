<div class="wrap">
    <h2>Builder source by Prodes &raquo; <?php _e('Settings', 'bsp'); ?></h2>

    <?php
    if (isset($this->message)) {
        ?>
        <div class="updated fade"><p><?php echo $this->message; ?></p></div>
        <?php
    }
    if (isset($this->errorMessage)) {
        ?>
        <div class="error fade"><p><?php echo $this->errorMessage; ?></p></div>
        <?php
    }
    ?>

    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <!-- Content -->
            <div id="post-body-content">
                <form action="options-general.php?page=builder-source" method="post">
                    <p>
                        <label for="bsp_header_content"><strong><?php _e('Comment in header', 'bsp'); ?></strong></label>
                        <textarea name="bsp_header_content" id="bsp_header_content" class="widefat" rows="8" style="font-family:Courier New;"><?php echo $this->settings['bsp_header_content']; ?></textarea>
                        <?php _e('This output will be printed in the <code>&lt;head&gt;</code> section.', 'bsp'); ?>
                    </p>
                    <?php wp_nonce_field(BSP_FOLDER, BSP_FOLDER . '_nonce'); ?>
                    <p>
                        <input name="submit" type="submit" name="Submit" class="button button-primary" value="<?php _e('Save', 'bsp'); ?>" />
                    </p>
                </form>

                <div class="result">
                    <h3>Example output</h3>
                    <div class="browser-preview">
                    </div>
                </div>
            </div>
            <!-- /post-body-content -->

            <!-- Sidebar -->
            <div id="postbox-container-1" class="postbox-container">
                <br><br>
                <strong>PROUDLY BUILT BY PRODES - INTERNET PARTNER</strong><br>
                <br>
                If you have any questions feel free to contact us at <a href="mailto:info@prodes.nl">info@prodes.nl</a>
            </div>
            <!-- /postbox-container -->
        </div>
    </div>
</div>