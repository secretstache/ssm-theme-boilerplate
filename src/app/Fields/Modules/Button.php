<?php

namespace App\Fields\Modules;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\Button as ButtonComponent;
use App\Fields\Options\ButtonDefaults;
use App\Fields\Options\HtmlAttributes;

class Button {

	public static function getFields() {

		/**
         * [Module] - Button
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $buttonModule = new FieldsBuilder('button', [
            'title'	=>	'Button'
        ]);
        
        $buttonModule

            ->addTab('Content')

                ->addFields(ButtonComponent::getFields())

            ->addTab('Options')

                ->addFields(ButtonDefaults::getFields())

                ->addFields(HtmlAttributes::getFields());

		return $buttonModule;

	}

}