<?php

/**
 * Plugin Name: Builder source by Prodes
 * Plugin URI: http://www.prodes.nl/
 * Description: Injects a comment in the source of your Wordpress site to show the builder information
 * Version: 1.0.1
 * Author: Jurgen Bosch
 * Author URI: http://www.prodes.nl
 * License: GPLv3
 *
 * Copyright 2015  Prodes  (email : info@prodes.nl)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

# I know it's ugly, but this config needs to be right here!
if(!defined( 'BSP_FILE')) {
	define('BSP_FILE', __FILE__ );
}

# Load the listings by Prodes plugin
require_once( dirname( __FILE__ ) . '/init.php' );

