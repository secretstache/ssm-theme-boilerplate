<?php

namespace App\Fields\Components;

use StoutLogic\AcfBuilder\FieldsBuilder;

class TemplateHeader {

	public static function getFields() {

		/**
         * [Option] - Template Header
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Extract Headline / Subheadline into a Header Snippet
         * @todo Link to Team Snippet Code
         */
        $templateHeaderOptions = new FieldsBuilder('template-header');

        $templateHeaderOptions

            ->addTrueFalse('include_template_header', [
                'message'	=> 'Include Template Header',
                'wrapper'	=> [
                    'class'	=> 'hide-label'
                ]
            ])

            ->addText('template_headline', [
                'label'	=> 'Headline'
            ])
                ->conditional('include_template_header', '==', 1)

            ->addText('template_subheadline', [
                'label'	=> 'Subheadline'
            ])
                ->conditional('include_template_header', '==', 1);

		return $templateHeaderOptions;

	}

}