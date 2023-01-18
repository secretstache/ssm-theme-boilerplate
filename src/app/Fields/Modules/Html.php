<?php

namespace App\Fields\Modules;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Options\HtmlAttributes;

class Html {

	public static function getFields() {

		/**
         * [Module] - HTML
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $htmlModule = new FieldsBuilder('html', [
            'title'	=> 'HTML'
        ]);

        $htmlModule

            ->addTab('Content')

                ->addField('inline_html', 'acf_code_field', [
                    'label'	    => false,
                    'mode' 	    => 'htmlmixed',
                    'theme'	    => 'monokai',
                ])

            ->addTab('Options')

                ->addFields(HtmlAttributes::getFields());

		return $htmlModule;

	}

}