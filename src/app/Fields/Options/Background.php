<?php

namespace App\Fields\Options;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Background {

	public static function getFields() {

		/**
         * [Option] - Background Options
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Extract each background option into their own reusable block
         * @todo Link to Team Snippet Code
         */
        $backgroundOptions = new FieldsBuilder('background_options');

        $backgroundOptions

            ->addRadio('option_background', [
                'label'		=> 'Background Options',
                'layout'	=> 'horizontal'
            ])
                ->addChoice('none', 'None')
                ->addChoice('color', 'Color')
                ->addChoice('image', 'Image')
                ->addChoice('video', 'Video')

            ->addRadio('option_background_color', [
                'layout'    => 'horizontal',
                'wrapper'   => [
                    'class' => 'hide-label'
                ]
            ])
                ->addChoice('bg-grey-light', 'Light Grey')
                ->addChoice('bg-grey-dark', 'Dark Grey')
                ->conditional('option_background', '==', 'color')

            ->addImage('option_background_image', [
                'wrapper'       => [
                    'class'	    => 'hide-label'
                ],
                'preview_size'  => 'medium'
            ])
                ->conditional('option_background', '==', 'image')

            ->addFile('option_background_video', [
                'wrapper'   => [
                    'class'	=> 'hide-label'
                ]
            ])
                ->conditional('option_background', '==', 'video');

		return $backgroundOptions;

	}

}