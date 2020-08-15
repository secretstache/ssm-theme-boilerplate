<?php

namespace App\Fields\Modules;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\Form as FormComponent;
use App\Fields\Options\HtmlAttributes;

class Form {

	public static function getFields() {

		/**
         * [Module] - Form
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $formModule = new FieldsBuilder('form', [
            'title'	=> 'Form'
        ]);

        $formModule

            ->addTab('Content')

                ->addFields(FormComponent::getFields())

            ->addTab('Options')

                ->addFields(HtmlAttributes::getFields());

		return $formModule;

	}

}