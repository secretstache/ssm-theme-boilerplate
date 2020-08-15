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
                    'layout' 	=> 'horizontal',
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])
                    ->addChoice( 'internal', 'Internal Page')
                    ->addChoice( 'external', 'External URL')
                ->conditional('include_button', '==', 1)

                ->addRadio('option_button_target', [
                        'label'		=> 'Target',
                        'layout'	=> 'horizontal',
                        'wrapper'	=> [
                            'width'	=> '50'
                        ]
                    ])
                    ->addChoice('_self', 'Default')
                    ->addChoice('_blank', 'New Tab')
                ->conditional('include_button', '==', 1);
        
        } else {

            $buttonComponent

                ->addRadio('button_source', [
                    'label'		=> 'Source',
                    'layout' 	=> 'horizontal',
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                    
                ])
                    ->addChoice( 'internal', 'Internal Page')
                    ->addChoice( 'external', 'External URL')

                ->addRadio('option_button_target', [
                    'label'		=> 'Target',
                    'layout'	=> 'horizontal',
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])
                    ->addChoice('_self', 'Default')
                    ->addChoice('_blank', 'New Tab');
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
                    'post_type' => ['page'],
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])
                    ->conditional('button_source', '==',  'internal')
                        ->and( 'include_button', '==', 1 );

        } else {

            $buttonComponent

                ->addPostObject('button_page_id', [
                    'label'		=> 'Select a Page',
                    'post_type' => ['page'],
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])
                    ->conditional('button_source', '==',  'internal');

        }

        if( $is_conditional ) {

            $buttonComponent

                ->addText('button_url', [
                    'label'		=> 'URL',
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])
                    ->conditional('button_source', '==', 'external')
                        ->and('include_button', '==', 1);
                    
        } else {

            $buttonComponent

                ->addText('button_url', [
                    'label'		=> 'URL',
                    'wrapper'	=> [
                        'width'	=> '50'
                    ]
                ])
                    ->conditional('button_source', '==', 'external');

        }
        
		return $buttonComponent;

	}

}