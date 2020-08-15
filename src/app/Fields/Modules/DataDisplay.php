<?php

namespace App\Fields\Modules;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\DataDisplay as DataDisplayComponent;
use App\Fields\Options\HtmlAttributes;

class DataDisplay {

	public static function getFields() {

		/**
         * [Module] - Data Display
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $dataDisplayModule = new FieldsBuilder('data-display', [
            'title'	=> 'Data Display'
        ]);

        $dataDisplayModule

            ->addTab('Content')

                ->addFields(DataDisplayComponent::getFields())

            ->addTab('Options')

                ->addFields(HtmlAttributes::getFields());

		return $dataDisplayModule;

	}

}