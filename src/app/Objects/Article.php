<?php

namespace App\Objects;

/**
 * Add Article CPT
 */
add_action( 'init', function() {

    register_extended_post_type( "ssm_article", array(

        "capability_type"   => "page",
        "menu_icon"         => "dashicons-format-aside",
        "menu_position"		=> 25,
        "supports" 			=> array( "title", "editor", "thumbnail" ),
        "show_in_menu"      => "ssm",
        "has_archive"       => "articles",

        "labels" => array(
            "all_items" => "Articles"
        ),

        "admin_cols"    => array( // admin posts list columns
            "category" => array(
                "taxonomy"      => "ssm_article_category"
            )
        ),

        "admin_filters" => array( // admin posts list filters
            "category" => array(
                "taxonomy" => "ssm_article_category"
            )
        )

    ), array(

        "singular"  => "Article",
        "plural"    => "Articles",
        "slug"      => "article"

    ) );
    
});

/**
 * Add Article Category taxonomy
 */
add_action( 'init', function() {

    register_extended_taxonomy( "ssm_article_category", "ssm_article", array(

        "hierarchical" => true

    ), array(

        "singular"  => "Category",
        "plural"    => "Categories",
        "slug"      => "category"

    ) );

});