<?php

namespace App\Fields\Components;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Button {

	public static function getFields( $is_conditional = false ) {

		/**
         * [Component] - Button
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $buttonComponent = new FieldsBuilder('button');

        $condition_html = '';

        if( $is_conditional ) {

            $buttonComponent
                ->addTrueFalse('include_button', [
                    'label'		=>	'Include Button',
                    'message'	=>	'Include Button',
                    'wrapper'	=>	[
                        'class'	=>	'hide-label'
                    ]	
                ]);

        }

        if( $is_conditional ) {

            $buttonComponent
                ->addRadio('button_source', [
                    'label'		=> 'Source',
                    'layout' 	=> 'horizontal'
                ])
                    ->addChoice('Internal Page')
                    ->addChoice('External URL')
                    ->setDefaultValue('Internal Page')
                ->conditional('include_button', '==', 1);
        
        } else {

            $buttonComponent
                ->addRadio('button_source', [
                    'label'		=> 'Source',
                    'layout' 	=> 'horizontal'
                ])
                    ->addChoice('Internal Page')
                    ->addChoice('External URL')
                    ->setDefaultValue('Internal Page');
        }

        if( $is_conditional ) {

            $buttonComponent
                ->addText('button_label', [
                    'label'		=> 'Label',
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])
                ->conditional('include_button', '==', 1);

        } else {

            $buttonComponent
                ->addText('button_label', [
                    'label'		=> 'Label',
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ]);
        }

        if( $is_conditional ) {

            $buttonComponent
                ->addPostObject('button_page_id', [
                    'label'		=> 'Select a Page',
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])
                    ->conditional('button_source', '==', 'Internal Page')
                        ->and( 'include_button', '==', 1 );
        } else {

            $buttonComponent
                ->addPostObject('button_page_id', [
                    'label'		=> 'Select a Page',
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])
                    ->conditional('button_source', '==', 'Internal Page');

        }

        if( $is_conditional ) {

            $buttonComponent
                ->addText('button_url', [
                    'label'		=>	'URL',
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])
                    ->conditional('button_source', '==', 'External URL')
                        ->and('include_button', '==', 1);
                    
        } else {

            $buttonComponent
                ->addText('button_url', [
                    'label'		=>	'URL',
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])
                    ->conditional('button_source', '==', 'External URL');

        }
        
		return $buttonComponent;

	}

}