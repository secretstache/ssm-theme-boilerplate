<?php

namespace App\Fields\Components;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Accordion {

	public static function getFields() {

		/**
         * [Component] - Accordion
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $accordionComponent = new FieldsBuilder('accordion_component');
        $accordionComponent
            ->addRepeater('accordion', [
                'layout'				=>	'block',
                'min'						=>	1,
                'collapsed'			=>	'title',
                'button_label'	=> 'Add Item',
                'wrapper'				=>	[
                    'class'		=>	'hide-label'
                ]
            ])
                ->addText('title')
                ->addWysiwyg('Description')
            ->endRepeater();

		return $accordionComponent;

	}

}