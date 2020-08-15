<?php

namespace App\Fields\Options;

use StoutLogic\AcfBuilder\FieldsBuilder;

class ColumnsPerRow {

	public static function getFields() {

		/**
         * [Option] - Block Grid Columns Per Row
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $blockGridColumnsPerRowOptions = new FieldsBuilder('block_grid_columns_per_row_options');
        
        $blockGridColumnsPerRowOptions
        
            ->addRadio('columns_per_row', [
                'label'		=>	'Columns Per Row',
                'layout'	=>	'horizontal'
            ])
                ->addChoice('2')
                ->addChoice('3')
                ->addChoice('4');

		return $blockGridColumnsPerRowOptions;

	}

}