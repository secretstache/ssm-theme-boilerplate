<?php

namespace App\Fields\Options;

use StoutLogic\AcfBuilder\FieldsBuilder;

class MobileSortOrder {

	public static function getFields() {

		/**
         * [Option] - Mobile Sort Order
         * @author Rich Staats <rich@secretstache.com>
         * @since 3.0.0
         * @todo Link to Team Snippet Code
         */
        $mobileSortOrderOptions = new FieldsBuilder('mobile_sort_order_options');
        $mobileSortOrderOptions
            ->addRadio('option_mobile_sort_order', [
                'label'		=>	'Mobile Sort Order',
                'layout'	=>	'horizontal'
            ])
                ->addChoice('medium-order-1', 'First')
                ->addChoice('medium-order-2', 'Last');

		return $mobileSortOrderOptions;

	}

}