<?php

namespace App\Fields\Options;

use StoutLogic\AcfBuilder\FieldsBuilder;

class ImageLink {

	public static function getFields() {

		/**
         * [Option] - Image Link
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Extract Link Source into it's own snippet
         * @todo Link to Team Snippet Code
         */
        $imageLinkOptions = new FieldsBuilder('image_link_options');

        $imageLinkOptions

            ->addTrueFalse('option_add_image_link', [
                'message'		=> 'Add Image Link',
                'wrapper'		=> [
                    'class'		=> 'hide-label'
                ]
            ])

            ->addRadio('link_source', [
                'label'			=> 'Source',
                'layout'		=> 'horizontal',
                'wrapper'		=> [
                    'width'		=> '50'
                ]	
            ])
                ->addChoice('internal', 'Internal Page')
                ->addChoice('external', 'External URL')
                    ->conditional('option_add_image_link', '==', 1)

            ->addPostObject('option_image_link_page_id', [
                'label'			=> 	'Select Page',
                'post_type'     => ['page'],
                'wrapper'		=> [
                    'width'		=> 	'50'
                ]	
            ])
                ->conditional('link_source', '==', 'internal')

            ->addText('option_image_link_url', [
                'label'			=> 	'URL',
                'wrapper'		=> [
                    'width'		=> 	'50'
                ]	
            ])
                ->conditional('link_source', '==', 'external');

		return $imageLinkOptions;

	}

}