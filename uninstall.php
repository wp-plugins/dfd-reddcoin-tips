<?php
//if uninstall not called from WordPress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
    exit();

// Remove database data upon plugin deactivation
$option_name1 = 'dfdrdd_settings_plugin_options';
$option_name2 = 'dfdrdd_settings_plugin_options_api_get';
$option_name3 = 'dfdrdd_settings_plugin_options_api_post';
$option_name4 = 'dfdrdd_console_plugin_options';

delete_option( $option_name1 );
delete_option( $option_name2 );
delete_option( $option_name3 );
delete_option( $option_name4 );

// For site options in multisite
delete_site_option( $option_name1 );  
delete_site_option( $option_name2 ); 
delete_site_option( $option_name3 );  
delete_site_option( $option_name4 ); 

//drop a custom db table
//global $wpdb;
//$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}mytable" );


?>