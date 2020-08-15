<?php

namespace App\Fields\Modules;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\Header as HeaderComponent;
use App\Fields\Options\TextAlignment;
use App\Fields\Options\HtmlAttributes;

class Header {

	public static function getFields() {

		/**
         * [Module] - Header
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $headerModule = new FieldsBuilder('header', [
            'title'	=> 'Header'
        ]);

        $headerModule

            ->addTab('Content')

                ->addFields(HeaderComponent::getFields())

            ->addTab('Options')

                ->addFields(TextAlignment::getFields())

                ->addFields(HtmlAttributes::getFields());

		return $headerModule;

	}

}