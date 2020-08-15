<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\Header;
use App\Fields\Lists\Buttons;
use App\Fields\Options\Background;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\Admin;

class CallToAction {

	public static function getFields() {

		/**
         * [Template] - Call to Action
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $callToActionTemplate = new FieldsBuilder('call-to-action', [
            'title'	=> 'Call To Action'
        ]);

        $callToActionTemplate

            ->addTab('Content')

                ->addFields(Header::getFields())

                ->addFields(Buttons::getFields())

            ->addTab('Options')

                ->addFields(Background::getFields())

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());
        
        return $callToActionTemplate;

	}

}