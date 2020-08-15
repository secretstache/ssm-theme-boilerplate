<?php

namespace App\Fields\Options;

use StoutLogic\AcfBuilder\FieldsBuilder;

class TextAlignment {

	public static function getFields() {

		/**
         * [Option] - Text Alignment
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $textAlignmentOptions = new FieldsBuilder('text_alignment_options');
        
        $textAlignmentOptions
        
            ->addRadio('option_text_alignment', [
                'label'		=>	'Text Alignment',
                'layout' 	=> 'horizontal'
            ])
                ->addChoice('align-left', 'Left')
                ->addChoice('align-center', 'Center')
                ->addChoice('align-right', 'Right');

		return $textAlignmentOptions;

	}

}