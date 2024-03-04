<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\TemplateHeader;
use App\Fields\Options\Background;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\Admin;
use App\Fields\Options\TemplateSpacing;

class RelatedContent {

	public static function getFields() {

        /**
         * [Template] - Related Content
         */
        $relatedContentTemplate = new FieldsBuilder('related-content', [
            'title'	=> 'Related Content'
        ]);

        $relatedContentTemplate

            ->addTab('Content')

                ->addFields(TemplateHeader::getFields())

                ->addRadio('query', [
                    'label'     => 'Query',
                    'layout'	=> 'horizontal',
                ])
                    ->addChoice('latest', 'Latest')
                    ->addChoice('curated', 'Curated')

                ->addRelationship('posts_to_show', [
                    'label'         => 'Posts to show',
                    'post_type'     => ['post'],
                    'filters'       => ['search'],
                    'return_format' => 'id',
                ])
                    ->conditional('query', '==', 'curated')

            ->addTab('Options')

                ->addFields(Background::getFields())

                ->addFields(TemplateSpacing::getFields())

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());
        
        return $relatedContentTemplate;

	}

}