<?php

namespace App\Fields\Modules;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\Image as ImageComponent;
use App\Fields\Options\ImageLink;
use App\Fields\Options\HtmlAttributes;

class Image {

	public static function getFields() {

		/**
         * [Module] - Image
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $imageModule = new FieldsBuilder('image', [
            'title'	=> 'Image'
        ]);

        $imageModule

            ->addTab('Content')

                ->addFields(ImageComponent::getFields())

            ->addTab('Options')

                ->addFields(ImageLink::getFields())

                ->addFields(HtmlAttributes::getFields());
                
		return $imageModule;

	}

}