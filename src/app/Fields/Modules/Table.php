<?php

namespace App\Fields\Modules;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\Table as TableComponent;
use App\Fields\Options\HtmlAttributes;

class Table {

	public static function getFields() {

		/**
         * [Module] - Table
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $tableModule = new FieldsBuilder('table', [
            'title'	=> 'Table'
        ]);

        $tableModule

            ->addTab('Content')

                ->addFields(TableComponent::getFields())

            ->addTab('Options')

                ->addFields(HtmlAttributes::getFields());

		return $tableModule;

	}

}