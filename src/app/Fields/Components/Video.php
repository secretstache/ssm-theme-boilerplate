<?php

namespace App\Fields\Components;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Video {

	public static function getFields() {

		/**
         * [Component] - Video
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $videoComponent = new FieldsBuilder('video');

        $videoComponent

            ->addOembed('video', [
                'wrapper'   => [
                    'class'	=>	'hide-label'
                ]
            ]);

		return $videoComponent;

	}

}