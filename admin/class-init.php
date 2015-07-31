<?php

if( !class_exists( 'BSP_admin' ) ) {

	# This class contains the admin part of the LBP plugin
	class BSP_admin {

		# Let's fire up the class
		function __construct() {
			add_action('admin_init',			array($this, 'bsp_register_settings'), 5);
			add_action('admin_menu',			array($this, 'bsp_register_menu'), 5);
			add_action('admin_enqueue_scripts',	array($this, 'bsp_register_admin_style'), 15);
			add_action('admin_enqueue_scripts', array($this, 'bsp_register_admin_script'), 15);

		}


		# Register the settings
		function bsp_register_settings() {
			register_setting(BSP_FOLDER, 'bsp_header_content', 'trim');
		}


		# Register the menu pages
		function bsp_register_menu() {

			add_submenu_page('options-general.php', BSP_NAME, BSP_NAME, 'manage_options', BSP_FOLDER, array($this, 'bsp_panel_page'));

		}


		# Show and handle the admin panel page
		function bsp_panel_page() {

	    	# Handle the post
	        if(isset($_POST['submit'])) {

	        	# Check nonce
	        	if(isset( $_POST[BSP_FOLDER . '_nonce'] )) {

		        	# Secure the data
		        	$input = implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $_POST['bsp_header_content'])));
		        	$input = wp_kses($input);

		        	# Save the data
		    		update_option('bsp_header_content', $input);
					$this->message = __('Settings Saved.', 'bsp');

	        	} elseif( !wp_verify_nonce($_POST[BSP_FOLDER . '_nonce'], BSP_FOLDER) ) {

		        	# Invalid nonce
		        	$this->errorMessage = __('Settings NOT saved due to a security check (REASON 1).', 'bsp');

	        	} else {

	        		$this->errorMessage = __('Settings NOT saved due to a security check (REASON 2).', 'bsp');

				}
	        }

	        // Get latest settings
	        $this->settings = array(
	        	'bsp_header_content' => esc_textarea(stripslashes(get_option('bsp_header_content'))),
	        );

	    	// Load Settings Form
	        require_once( BSP_PATH . 'admin/pages/bsp-panel.php' );

		}


		# Include the admin css file
		function bsp_register_admin_style() {

			wp_register_style('bsp_admin_css', plugins_url() . '/' . BSP_FOLDER . '/library/css/admin-style.css', false, '1.0.0');
			wp_enqueue_style('bsp_admin_css');

		}


		# Include the admin javascript file
		function bsp_register_admin_script() {

			$page_info = get_current_screen();

			if($page_info->id == 'settings_page_builder-source') {
				wp_register_script('bsp_admin_javascript', plugins_url() . '/' . BSP_FOLDER . '/library/js/admin-script.js', false, '1.0.0');
				wp_enqueue_script('bsp_admin_javascript');
			}


		}


	}

}