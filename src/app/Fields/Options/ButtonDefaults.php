<?php

namespace App\Fields\Options;

use StoutLogic\AcfBuilder\FieldsBuilder;

class ButtonDefaults {

	public static function getFields() {

		/**
         * [Option] - Default Button Options
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $defaultButtonOptions = new FieldsBuilder('default_button_options');

        $defaultButtonOptions

            ->addRadio('option_button_alignment', [
                'label'		=> 'Alignment',
                'layout'	=> 'horizontal',
                'wrapper'	=> [
                    'width'	=> '50'
                ]
            ])
                ->addChoice('align-left', 'Left')
                ->addChoice('align-center', 'Center')
                ->addChoice('align-right', 'Right');

        return $defaultButtonOptions;

	}

}