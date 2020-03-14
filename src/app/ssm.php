<?php

/**
 * SSM Theme Boilerplate
 */

namespace App;

/**
 * Add Required Plugins
 */
add_filter( 'sober/bundle/file', function () {
    return get_template_directory( __FILE__ ) . '/config/json/required-plugins.json';
});

/**
 * Add SSM menu item
 */
add_action( 'admin_menu', function () {

    add_menu_page(
        "Secret Stache",
        "Secret Stache",
        "manage_options",
        "ssm",
        "",
        "dashicons-layout",
        5
    );

});

/**
 * Remove first SSM submenu item
 */
add_action( 'admin_init', function () {
    remove_submenu_page("ssm", "ssm");
}, 99);

/**
 * Create SSM Menu sub items
 */
add_action( 'init', function() {

    if( class_exists("acf") ) {

        // Add Brand Settings Page
        acf_add_options_sub_page( array(
            "page_title" => "Brand Settings",
            "menu_title" => "Brand Settings",
            "parent_slug" => "ssm",
		));

    }
    
});

/**
 * Register Objects
 */
foreach ( glob( get_template_directory( __FILE__ ) . '/app/Objects/*.php') as $file) {    
	require_once( $file );
}