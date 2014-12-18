<?php
/*
 * Plugin Name: DFD Reddcoin Tips
 * Version: 1.0.5
 * Plugin URI: https://wordpress.org/plugins/dfd-reddcoin-tips/
 * Description: A Wordpress plugin to display <a href="http://www.reddcoin.com/" target="_blank">Reddcoin</a> tipping and payment widgets on your website, and send and recieve Reddcoins within a built-in password-protected admin console that fully integrates and connects you to the Reddcoin API (<a href="https://www.reddapi.com/" target="_blank">ReddAPI.com</a>).
 * Author: Michael Kilday
 * Author URI: http://www.dragonfrugal.com/
 */

//delete_option( 'dfdrdd_settings_plugin_options' );  // DEBUGGING ONLY - Delete ALL plugin database data
//delete_option( 'dfdrdd_settings_plugin_options_api_get' );  // DEBUGGING ONLY - Delete ALL plugin database data
//delete_option( 'dfdrdd_settings_plugin_options_api_post' );  // DEBUGGING ONLY - Delete ALL plugin database data
//delete_option( 'dfdrdd_console_plugin_options' ); // DEBUGGING ONLY - Delete ALL plugin database data

if ( ! defined( 'ABSPATH' ) ) exit;


if ( !$_SESSION ) {
session_start();  // We need a session for the qr image generator
}

if ( !$_SESSION['dfdrddtips_url'] ) {
$_SESSION['dfdrddtips_url'] = plugins_url() . '/dfd-reddcoin-tips';
}


if ( !$_SESSION['sec_key'] ) {
//$_SESSION['sec_key'] = NULL;  // Testing for null security keys security holes
$_SESSION['sec_key'] = md5(rand(10000000,100000000));  // Security key for console, to prevent cross-site request forgery
}


// Functions
require_once( 'includes/functions/main_functions.php' );


// Widgets
require_once( 'includes/widgets/tip-widgets/tip_widget_1.php' );
add_action( 'widgets_init', 'dfd_rdd_register_tip_widget_1' );
require_once( 'includes/widgets/tip-widgets/tip_widget_2.php' );
add_action( 'widgets_init', 'dfd_rdd_register_tip_widget_2' );



// Register our WP stuff
add_action( 'admin_menu' , 'add_settings_page' );
add_action( 'admin_menu', 'add_console_page' );

add_action( 'admin_init', 'dfd_reddcoin_settings_general_init' );
add_action( 'admin_init', 'dfd_reddcoin_settings_api_init' );
add_action( 'admin_init', 'dfd_reddcoin_console_options_init' );

add_action( 'wp_head', 'render_html_head_script' );


$dfdrdd_settings_options = get_option( 'dfdrdd_settings_plugin_options' );

$dfdrdd_settings_options_api_get_encrypted = get_option( 'dfdrdd_settings_plugin_options_api_get' );
$dfdrdd_settings_options_api_post_encrypted = get_option( 'dfdrdd_settings_plugin_options_api_post' ); 

add_action( 'init', 'encrypt_api' );



$dfdrdd_console_options = get_option( 'dfdrdd_console_plugin_options' );


 // Tipping address put in a session for qrlib QR image data
$_SESSION['rdd_coin_address'] = trim($dfdrdd_settings_options['reddcoin_tip_address']);
 


?>