<?php

namespace App\Fields\Modules;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\Video as VideoComponent;
use App\Fields\Options\HtmlAttributes;

class Video {

	public static function getFields() {

		/**
         * [Module] - Video
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $videoModule = new FieldsBuilder('video', [
            'title'	=> 'Video'
        ]);

        $videoModule

            ->addTab('Content')

                ->addFields(VideoComponent::getFields())

            ->addTab('Options')

                ->addFields(HtmlAttributes::getFields());
                
		return $videoModule;

	}

}