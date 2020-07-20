<?php
/**
 * @package  WordifyPlugin
 */
/*
Plugin Name: Wordify Plugin
Plugin URI: http://hashmater.com/plugins/wordify
Description: This plugin is essential to install with 'Wordify' theme.
Version: 1.0.0
Author: Bilal Punjabi
Author URI: http://hashmater.com/team/bilalpunjabi786
License: GPLv2 or later
Text Domain: wordify-plugin

*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use Inc\Base\Activate;
use Inc\Base\Deactivate;

/**This code runs during plugin activation */
function activate(){
	Activate::run();
}
register_activation_hook( __FILE__ , 'activate' );

/**This code runs during deactivation of plugin */
function deactivate(){
	Deactivate::run();
}
register_deactivation_hook( __FILE__ , 'deactivate' );


if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}