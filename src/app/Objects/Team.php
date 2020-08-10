<?php

namespace App\Objects;

/**
 * Add Team CPT
 */
add_action( 'init', function() {

    register_extended_post_type( "ssm_team_member", array(

        "capability_type"   => "page",
        "menu_icon"         => "dashicons-groups",
        "menu_position"		=> 5,
        "supports" 			=> array( "title", "thumbnail" ),
        "show_in_menu"      => "ssm",
        "has_archive"       => "team",
        "public"            => false,
        "show_ui"           => true,

        "labels" => array(
            "all_items"             => "Team",
            "featured_image"       	=> 'Headshot',
            "set_featured_image"    => 'Set Headshot',
            "remove_featured_image" => 'Remove Headshot',
            "use_featured_image"    => 'Use as Headshot'
        ),

        "admin_cols"    => array( // admin posts list columns
            "default_team_headshot" => array(
                'title'          => "Headshot",
                'featured_image' => 'thumbnail',
                'width'          => 100,
                'height'         => 100,
            ),
            "default_team_role" => array(
                "taxonomy" => "ssm_team_member_role"
            ),
            "title"
        ),

        "admin_filters" => array( // admin posts list filters
            "role" => array(
                "taxonomy" => "ssm_team_member_role"
            )
        )

    ), array(

        "singular"  => "Team Member",
        "plural"    => "Team",
        "slug"      => "team"

    ) );
    
});

/**
 * Add Team Category taxonomy
 */
add_action( 'init', function() {

    register_extended_taxonomy( "ssm_team_member_role", "ssm_team_member", array(

        "hierarchical" => false

    ), array(

        "singular"  => "Role",
        "plural"    => "Roles",
        "slug"      => "role"

    ) );

});

/**
 * Move Thumbnail column for Team CPT
 */
add_filter( 'manage_ssm_team_member_posts_columns', function( $columns ) {

    unset($columns["title"]);

    $new_columns = array_slice($columns, 0, 2, true) + array("title" => "Title") + array_slice($columns, 2, count($columns) - 1, true);

    return $new_columns;

}, 99, 1);