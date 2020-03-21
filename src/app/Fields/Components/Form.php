<?php

namespace App\Fields\Components;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Form {

	public static function getFields() {

		/**
         * [Component] - Form
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $formComponent = new FieldsBuilder('form_component');
        $formComponent
            ->addField('form', 'forms', [
                'wrapper'	=> [
                    'classes'	=> 'hide-label'
                ]
            ]);

		return $formComponent;

	}

}