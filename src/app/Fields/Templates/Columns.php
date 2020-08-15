<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Lists\Modules;
use App\Fields\Components\TemplateHeader;
use App\Fields\Options\Background;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\MobileSortOrder;
use App\Fields\Options\ColumnLayout;
use App\Fields\Options\ColumnAlignment;
use App\Fields\Options\Admin;

class Columns {

	public static function getFields() {

        /**
         * [Template] - Columns
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $columnsTemplate = new FieldsBuilder('columns', [
            'title'	=> 'Column(s)'
        ]);

        $columnsTemplate

            ->addTab('Content')

                ->addFields(TemplateHeader::getFields())

                ->addRepeater('columns', [
                    'layout'		=> 'block',
                    'min'			=> 1,
                    'max'			=> 4,
                    'button_label'	=> 'Add Column',
                    'wrapper'		=> [
                        'class'		=> 'hide-label'
                    ]
                ])

                    ->addTab('Content', [
                        'placement'	=>	'left'
                    ])

                        ->addFields(Modules::getFields())

                    ->addTab('Options')

                        ->addFields(HtmlAttributes::getFields())

                ->endRepeater()

            ->addTab('Options')

                ->addFields(Background::getFields())

                ->addFields(ColumnLayout::getFields())

                ->addFields(ColumnAlignment::getFields())

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')

                ->addFields(Admin::getFields());
            
        return $columnsTemplate;

	}

}
