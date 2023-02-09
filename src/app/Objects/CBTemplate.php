<?php

namespace App\Objects;

/**
 * Add Content Block Template CPT
 */
add_action( 'init', function() {

    register_extended_post_type( "cb_template", [

        "capability_type"   => "page",
        "menu_icon"         => "dashicons-image-filter",
        "menu_position"		=> 5,
        "supports" 			=> [ "title" ],
        "show_in_menu"      => 'ssm',
        "has_archive"       => false,
        "public"            => false,
        "show_ui"           => true,

        "labels"            => [
            "all_items"     => "Content Block Templates",
        ],

        "admin_cols"        => [ // admin posts list columns
            "title"
        ],

    ], [

        "singular"  => "Content Block Template",
        "plural"    => "Content Block Templates",
        "slug"      => "template"

    ] );

}); 