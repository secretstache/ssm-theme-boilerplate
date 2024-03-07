<?php

namespace App\View\Composers\Templates;

use App\View\Composers\Switches\Templates;

class RelatedContent extends Templates
{
    public static function getTemplateData( $template ) {

        $relatedContentData = [];

        $args = [
            'post_type'         => 'post',
            'posts_per_page'    => $template['number_posts'] ?: 3,
            'status' 	        => 'publish',
            'fields'            => 'ids'
        ];

        if( $template['query'] == 'latest' ) {
                            
            $posts = get_posts( $args );

        } elseif( $template['query'] == 'curated' && $template['posts_to_show'] ){

            $posts = $template['posts_to_show'];

        }

        $relatedContentData = [ 
            'id'            => self::getCustomID($template),
            'classes'       => self::getCustomClasses('layout-' . $template['layout'], $template),
            'posts'         => $posts ?? []
        ];

        return $relatedContentData;

    }

}