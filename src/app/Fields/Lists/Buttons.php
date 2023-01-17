<?php

namespace App\Fields\Lists;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Modules\Button;

class Buttons {

	public static function getFields() {

		/**
         * [List] - Buttons
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $buttonsList = new FieldsBuilder('buttons', [
            'title'	=> 'Button(s)'
        ]);

        $buttonsList

            ->addRepeater('buttons', [
                'label'         => false,
                'layout'	    => 'block',
                'min'			=> 1,
                'max'			=> 2,
                'button_label'	=> 'Add Button'
            ])
            
                ->addFields(Button::getFields());

		return $buttonsList;

	}

}