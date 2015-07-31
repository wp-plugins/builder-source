<?php

if(!class_exists('BSP_init')) {

	class BSP_init {

		function __construct() {
			add_action('wp_head',				array($this, 'inject_comment'), 0);
		}


		function inject_comment() {

			# Ignore admin, feed, robots or trackbacks
			if (is_admin() OR is_feed() OR is_robots() OR is_trackback()) {
				return;
			}

			# Get the current header content
			$meta   = get_option('bsp_header_content');
			$lines  = explode(PHP_EOL, $meta);

			# Check if value is not empty
			if(empty($meta)){ return; }
			if(trim($meta) == ''){ return; }

			$comment = PHP_EOL . '<!-- Builder source v' . BSP_VERSION . ' - ' . BSP_URL . '' . PHP_EOL;
			foreach($lines as $line) {
				$comment .=  stripslashes($line) . PHP_EOL;
			}
			$comment .= '-->' . PHP_EOL;

			echo $comment;

		}


		function bsp_setting_value($setting) {

			$output = '';
			$meta   = get_option($setting);
			$lines  = explode(PHP_EOL, $meta);

			# Check if value is not empty
			if(empty($meta)){ return; }
			if(trim($meta) == ''){ return; }

			return $lines;

		}




	}

}