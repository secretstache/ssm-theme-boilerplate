<?php

namespace App\Fields\Options;

use StoutLogic\AcfBuilder\FieldsBuilder;

class ColumnLayout {

	public static function getFields() {

		/**
         * [Option] - Column Layout Options
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $columnLayoutOptions = new FieldsBuilder('column_layout_options');

        $columnLayoutOptions

            ->addRadio('option_columns_width', [
                'label'		=> 'Column Layout',
                'layout'	=> 'horizontal',
                'wrapper'	=> [
                    'class'	=> 'column-layout swatches'
                ]
            ])
                ->addChoice(8, '8')
                ->addChoice(10, '10');

        $columnLayoutOptions
        
			->addField('option_columns_mobile_order', "text", [
				'label'		=> 'Mobile Order',
				'wrapper'	=> [
					'class'	=> 'column-layout-mobile-order'
				]
			]);

		return $columnLayoutOptions;

	}

}
