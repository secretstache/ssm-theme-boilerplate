<?php

namespace App\Objects;

/**
 * Add Design System CPT
 */
add_action( 'init', function() {

    register_extended_post_type( "ssm_design_system", [

        "capability_type"   => "page",
        "menu_icon"         => "dashicons-welcome-widgets-menus",
        "menu_position"		=> 5,
        "supports" 			=> [ "title" ],
        "show_in_menu"      => 'ssm',
        "has_archive"       => false,
        "public"            => true,
        "show_ui"           => true,
        "exclude_from_search" => false,
        "show_in_nav_menus"   => false,

        "labels"            => [
            "all_items"     => "Design System",
        ],

        "admin_cols"    => [
            "title"
        ],

    ], [

        "singular"  => "Design System Entry",
        "plural"    => "Design System",
        "slug"      => "design-system"

    ] );

});

/**
 * Design System - Redirect non-logged in users
 */
add_action('template_redirect', function() {

    if ( get_post_type() == 'ssm_design_system' && ! is_user_logged_in() ) {

        wp_redirect( home_url( '/' ) );

        exit();

    }

}, 10 );