<?php

# First we define some variables
define('BSP_VERSION', 	'1.0.1');
define('BSP_FOLDER', 	'builder-source');
define('BSP_NAME',		'Builder source');
define('BSP_PATH', 		plugin_dir_path(BSP_FILE));
define('BSP_BASENAME', 	plugin_basename(BSP_FILE));
define('BSP_URL',		'http://www.prodes.nl/wordpress/builder-source/');
define('BSP_DIR',		__DIR__);


/********* Autoloading classes *********/

/**
 * Load the classes
 *
 * @param 	string $class Class name
 * @return 	void
 */
function bsp_autoload( $class ) {

	static $classes = null;

	if ( $classes === null ) {

		$classes = array(
			'bsp_init'       => BSP_PATH . 'inc/class-init.php',
			'bsp_admin'      => BSP_PATH . 'admin/class-init.php',
		);
	}

	$cn = strtolower( $class );

	if ( isset( $classes[ $cn ] ) ) {
		require_once( $classes[ $cn ] );
	}
}

if ( function_exists( 'spl_autoload_register' ) ) {

	spl_autoload_register( 'bsp_autoload' );
}



if ( ! function_exists( 'spl_autoload_register' ) ) {

	//add_action( 'admin_init', 'LBP_deactivate', 1 );

} else {

	$GLOBALS['BSP_INIT'] = new BSP_INIT;

	if ( is_admin() ) {
		add_action( 'plugins_loaded', 'bsp_admin_init', 15 );
	}

}

# This function fires every time the Wordpress admin is loaded
function bsp_admin_init() {
	$GLOBALS['BSP_admin'] = new BSP_admin;
}


# This function is fired on activation
function bsp_activate() {
	bsp_register_translation();
	flush_rewrite_rules();
}


# This function registers the language files
function bsp_register_translation() {
	load_plugin_textdomain('bsp', false, basename( dirname( BSP_FILE ) ) . '/languages' );
}
add_action('init', 'bsp_register_translation');



register_activation_hook( BSP_FILE, 'bsp_activate' );
