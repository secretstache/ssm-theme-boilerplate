<?php

namespace App\Fields\Modules;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\Accordion as AccordionComponent;
use App\Fields\Options\HtmlAttributes;

class Accordion {

	public static function getFields() {

		/**
         * [Module] - Accordion
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $accordionModule = new FieldsBuilder('accordion', [
            'title'	=>	'Accordion'
        ]);

        $accordionModule

            ->addTab('Content')

                ->addFields(AccordionComponent::getFields())

            ->addTab('Options')
            
                ->addFields(HtmlAttributes::getFields());
        
		return $accordionModule;

	}

}