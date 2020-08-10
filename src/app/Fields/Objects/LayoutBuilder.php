<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Templates\Columns;
use App\Fields\Templates\CallToAction;
use App\Fields\Templates\BlockGrid;
use App\Fields\Templates\SplitContent;

class LayoutBuilder {

	public function __construct() {

		/**
		 * Layout Builder
		 */
        
		$layoutBuilder = new FieldsBuilder('layout_builder', [
			'style' => 'seamless'
        ]);
        
        $layoutBuilder
        
			->addFlexibleContent('templates', [
				'label'			=> 'Layout Builder',
				'button_label'	=> 'Add Template'
            ])
            
                ->addLayout(Columns::getFields())
                
                ->addLayout(CallToAction::getFields())
                
			->setLocation('post_type', '==', 'page')
				->or('post_type', '==', 'post')
				->or('post_type', '==', 'ssm_team_member');

		// Register Layout Builder
		add_action('acf/init', function() use ($layoutBuilder) {
			acf_add_local_field_group($layoutBuilder->build());
		});

	}

}