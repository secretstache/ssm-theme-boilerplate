<?php

namespace App\Fields\Templates;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\Header;
use App\Fields\Components\TemplateHeader;
use App\Fields\Components\TextEditor;
use App\Fields\Components\Button;
use App\Fields\Options\ColumnsPerRow;
use App\Fields\Options\Background;
use App\Fields\Options\HtmlAttributes;
use App\Fields\Options\Admin;

class BlockGrid {

	public static function getFields() {

        /**
         * [Template] - Block Grid
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $blockGridTemplate = new FieldsBuilder('block-grid', [
            'label'	=> 'Block Grid'
        ]);

        $blockGridTemplate

            ->addTab('Content')

                ->addFields(TemplateHeader::getFields())

                ->addRepeater('block_grid_items', [
                    'layout'	    => 'block',
                    'button_label'	=> 'Add Item',
                    'min'			=> 1,
                    'collapsed'	    => 'block_grid_title',
                    'wrapper'		=> [
                        'class'	    => 'hide-label'
                    ]
                ])

                    ->addImage('block_grid_icon', [
                        'label'	=> 'Icon'
                    ])

                    ->addText('block_grid_title', [
                        'label'	=> 'Title'
                    ])

                    ->addFields(TextEditor::getFields( $type = 'simple', $label = 'Short Description' ))

                    ->addFields(Button::getFields( $is_conditional = true ))

                ->endRepeater()

            ->addTab('Options')

                ->addFields(Background::getFields())

                ->addFields(ColumnsPerRow::getFields())

                ->addFields(HtmlAttributes::getFields())

            ->addTab('Admin')
            
                ->addFields(Admin::getFields());
        
        return $blockGridTemplate;

	}

}