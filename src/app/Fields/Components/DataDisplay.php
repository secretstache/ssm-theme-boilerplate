<?php

namespace App\Fields\Components;

use StoutLogic\AcfBuilder\FieldsBuilder;

class DataDisplay {

	public static function getFields() {

		/**
         * [Component] - Data Display
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $dataDisplayComponent = new FieldsBuilder('data-display');

        $dataDisplayComponent
        
            ->addRepeater('data', [
                'layout'		=> 'block',
                'min'			=> 1,
                'button_label'	=> 'Add Data Item',
                'wrapper'		=> [
                    'class'		=> 'hide-label'
                ]
            ])
                ->addText('value', [
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])

                ->addText('unit', [
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])

                ->addWysiwyg('explanation', [
                    'label'         => 'Explanation',
                    'toolbar'       => 'basic',
                    'media_upload' 	=> 0
                ])

            ->endRepeater();

		return $dataDisplayComponent;

	}

}