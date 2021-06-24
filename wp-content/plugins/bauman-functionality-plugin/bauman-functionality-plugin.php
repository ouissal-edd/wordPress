<?php
/*
Plugin Name: Bauman Functionality Plugin
Plugin URI: http://themeforest.net/user/ClaPat/portfolio
Description: Shortcodes and Custom Post Types for Bauman WordPress Themes
Version: 1.0
Author: Clapat
Author URI: http://themeforest.net/user/ClaPat/
*/

if( !defined('BAUMAN_SHORTCODES_DIR_URL') ) define('BAUMAN_SHORTCODES_DIR_URL', plugin_dir_url(__FILE__));
if( !defined('BAUMAN_SHORTCODES_DIR') ) define('BAUMAN_SHORTCODES_DIR', plugin_dir_path(__FILE__));

// metaboxes
require_once( BAUMAN_SHORTCODES_DIR . '/metaboxes/init.php' );

// load plugin's text domain
add_action( 'plugins_loaded', 'bauman_shortcodes_load_textdomain' );
function bauman_shortcodes_load_textdomain() {
    load_plugin_textdomain( 'clapat_bauman_plugin_text_domain', false, dirname( plugin_basename( __FILE__ ) ) . '/include/langs' );
}

// custom post types
require_once( BAUMAN_SHORTCODES_DIR . '/include/custom-post-types-config.php' );

// bauman shortcodes
require_once( BAUMAN_SHORTCODES_DIR . '/include/shortcodes.php' );

?>