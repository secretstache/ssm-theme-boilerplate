<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Lists\Modules;
use App\Fields\Components\Image;
use App\Fields\Options\Background;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\Admin;

class SplitContent {

	public static function getFields() {

        /**
         * [Template] - Split Content
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $splitContentTemplate = new FieldsBuilder('split-content', [
            'label'	=> 'Split Content'
        ]);

        $splitContentTemplate

            ->addTab('Content')

                ->addFields(Modules::getFields())

                ->addRadio('media_position', [
                    'layout'	=> 'horizontal'
                ])
                    ->addChoice('media-left', 'Left')
                    ->addChoice('media-Right', 'Right')

                ->addFields(Image::getFields())

            ->addTab('Options')

                ->addFields(Background::getFields())

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());
        
        return $splitContentTemplate;

	}

}