<?php
/*
Plugin Name: Simpliest Social Share
Description: Links to share posts and products on social media
Version: 1.0.8
Author: Covalenciawebs
Author URI: https://covalenciawebs.com
Text Domain: cvw-social-share
Domain Path: languages
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

*/


define( 'CVWSL_PLUGIN', __FILE__ );

define( 'CVWSL_PLUGIN_BASENAME', plugin_basename( CVWSL_PLUGIN ) );

define( 'CVWSL_PLUGIN_NAME', trim( dirname( CVWSL_PLUGIN_BASENAME ), '/' ) );

define( 'CVWSL_PLUGIN_DIR', untrailingslashit( dirname( CVWSL_PLUGIN ) ) );


load_plugin_textdomain( 'cvw-social-share', false, 'cvw-social-share/languages' );

require_once CVWSL_PLUGIN_DIR . '/includes/admin.php';
require_once CVWSL_PLUGIN_DIR . '/includes/frontend.php';