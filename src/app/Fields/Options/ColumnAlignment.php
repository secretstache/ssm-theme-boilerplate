<?php

namespace App\Fields\Options;

use StoutLogic\AcfBuilder\FieldsBuilder;

class ColumnAlignment {

	public static function getFields() {

		/**
         * [Option] - Column Alignment Options
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $columnAlignmentOptions = new FieldsBuilder('column_alignment_options');

        $columnAlignmentOptions

            ->addRadio('option_y_alignment', [
                'label'		=> 'Y Alignment',
                'layout'	=> 'horizontal',
                'wrapper'   => [
                    'width'	=> '50'
                ]
            ])
                ->addChoice('top', 'Top')
                ->addChoice('middle', 'Middle')
                ->addChoice('bottom', 'Bottom')

            ->addRadio('option_x_alignment', [
                'label'		=> 'X Alignment',
                'layout'	=> 'horizontal',
                'default_value' => 'center',
                'wrapper'   => [
                    'width'	=> '50'
                ]
            ])
                ->addChoice('left', 'Left')
                ->addChoice('center', 'Center')
                ->addChoice('right', 'Right');

		return $columnAlignmentOptions;

	}

}