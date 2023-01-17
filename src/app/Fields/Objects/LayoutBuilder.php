<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Templates\Columns;
use App\Fields\Templates\CallToAction;
use App\Fields\Templates\BlockGrid;
use App\Fields\Templates\SplitContent;
use App\Fields\Templates\ContentBlockTemplate;

class LayoutBuilder {

	public function __construct() {

		/**
		 * Layout Builder
		 */
        
		$layoutBuilder = new FieldsBuilder('layout_builder', [
			'style' 	 => 'seamless',
        ]);
        
        $layoutBuilder
        
			->addFlexibleContent('templates', [
				'label'			=> 'Layout Builder',
				'button_label'	=> 'Add Template',
				'max'           => ( $_GET['post_type'] == 'cb_template' || get_post_type( $_GET['post'] ) == 'cb_template' ) ? 1 : ''
            ])
            
                ->addLayout(Columns::getFields())
                
                ->addLayout(CallToAction::getFields())

				->addLayout(ContentBlockTemplate::getFields())
                
			->setLocation('post_type', '==', 'page')
				->or('post_type', '==', 'post')
				->or('post_type', '==', 'cb_template');

		// Register Layout Builder
		add_action('acf/init', function() use ($layoutBuilder) {
			acf_add_local_field_group($layoutBuilder->build());
		});

	}

}