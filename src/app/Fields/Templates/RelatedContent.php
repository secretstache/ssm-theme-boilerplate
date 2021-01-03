<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\TemplateHeader;
use App\Fields\Options\Background;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\Admin;

class RelatedContent {

	public static function getFields() {

        /**
         * [Template] - Related Content
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $relatedContentTemplate = new FieldsBuilder('related-content', [
            'title'	=> 'Related Content'
        ]);

        $relatedContentTemplate

            ->addTab('Content')

                ->addFields(TemplateHeader::getFields())

                ->addRadio('post_query', [
                    'layout'		=> 'horizontal',
                    'default_value'	=> 'most_recent'
                ])
                    ->addChoice('most_recent', 'Most Recent')
                    ->addChoice('curated', 'Curated')

                ->addNumber('number_of_posts_to_show')
                    ->conditional('post_query', '==', 'most_recent')

                ->addRelationship('posts_to_show', [
                    'label'     => 'Posts to show',
                    'post_type' => ['post'],
                    'filters'   => [
                        0       => 'search',
                    ],
                    'return_format' => 'id',
                ])
                    ->conditional('post_query', '==', 'curated')

            ->addTab('Options')

                ->addFields(Background::getFields())

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());
        
        return $relatedContentTemplate;

	}

}