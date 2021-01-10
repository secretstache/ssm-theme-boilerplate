<?php

namespace App\Fields\Lists;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Lists\Buttons;
use App\Fields\Modules\Header;
use App\Fields\Modules\TextEditor;
use App\Fields\Modules\Image;
use App\Fields\Modules\Video;
use App\Fields\Modules\Form;
use App\Fields\Modules\Gallery;
use App\Fields\Modules\Accordion;
use App\Fields\Modules\DataDisplay;
use App\Fields\Modules\Table;

class Modules {

	public static function getFields() {

		/**
         * [List] - Modules
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $modulesList = new FieldsBuilder('modules_list');

        $modulesList

            ->addFlexibleContent('modules')

                ->addLayout(Header::getFields())

                ->addLayout(TextEditor::getFields())

                ->addLayout(Buttons::getFields())

                ->addLayout(Image::getFields())

                ->addLayout(Video::getFields())

                ->addLayout(Form::getFields())

                ->addLayout(Accordion::getFields())

            ->endFlexibleContent();

		return $modulesList;

	}

}