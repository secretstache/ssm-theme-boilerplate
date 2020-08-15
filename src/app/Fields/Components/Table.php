<?php

namespace App\Fields\Components;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Table {

	public static function getFields() {

		/**
         * [Component] - Table
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $tableComponent = new FieldsBuilder('table');

        $tableComponent

            ->addTrueFalse('first_row_is_table_header', [
                'label'		=>	'The first row is the table header',
                'message'	=>	'The first row is the table header',
                'wrapper'	=>	[
                    'class'	=>	'hide-label'
                ]	
            ])

            ->addField('table', 'table', [
                'wrapper'	    => [
                    'classes'	=> 'hide-label'
                ]
            ]);

		return $tableComponent;

	}

}