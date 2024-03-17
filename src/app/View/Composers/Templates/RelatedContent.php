<?php

namespace App\View\Composers\Templates;

use App\View\Composers\Switches\Templates;

class RelatedContent extends Templates
{
    public static function getTemplateData( $template ) {

        $relatedContentData = [];

        $args = [
            'post_type'         => 'post',
            'posts_per_page'    => $template['posts_number'] ?: 3,
            'status' 	        => 'publish',
            'fields'            => 'ids'
        ];

        if ( $template['query'] == 'latest' ) {

            $posts = get_posts( $args );

        } elseif ( $template['query'] == 'type' && $template['resource_type'] ) {

            $args = [
                'tax_query'      => [
                    [
                        'taxonomy'		=> 'resource_type',
                        'field'         => 'slug',
                        'terms'			=> [ $template['type']->slug ],
                    ]
                ]
            ];

            $posts = get_posts( $args );

        } elseif ( $template['query'] == 'solution' && $template['resource_solution'] ) {

            $meta_queries['relation'] = 'OR';

            foreach( $template['resource_solution'] as $key => $value ) {
                $meta_queries[] = [
                    'key'       => 'resource_solutions',
                    'value'     => $value,
                    'compare'   => 'LIKE',
                ];
            }

            $args['meta_query'] = $meta_queries;

            $posts = get_posts( $args );

        } elseif( $template['query'] == 'curated' && $template['posts_to_show'] ){

            $posts = $template['posts_to_show'];

        }

        $relatedContentData = [ 
            'id'            => self::getCustomID($template),
            'classes'       => self::getCustomClasses('', $template),
            'posts'         => $posts ?? []
        ];

        return $relatedContentData;

    }

}