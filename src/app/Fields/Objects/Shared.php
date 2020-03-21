<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Templates\Columns;
use App\Fields\Templates\CallToAction;
use App\Fields\Templates\BlockGrid;
use App\Fields\Templates\SplitContent;
use App\Fields\Templates\Gallery;
use App\Fields\Templates\RelatedContent;
use App\Fields\Lists\Buttons;
use App\Fields\Components\Header;
use App\Fields\Options\Background;
use App\Fields\Options\HtmlAttributes;

class Shared {

	public function __construct() {

		/**
		 * Hero Unit
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$heroUnit = new FieldsBuilder('hero_unit', [
			'position' => 'acf_after_title'
		]);
		$heroUnit
			->addTab('Content')
				->addFields(Header::getFields())
				->addFields(Buttons::getFields())
			->addTab('Options')
				->addFields(Background::getFields())
				->addFields(HtmlAttributes::getFields())
			->setLocation('post_type', '==', 'page');

		// Register Hero Unit
		add_action('acf/init', function() use ($heroUnit) {
			acf_add_local_field_group($heroUnit->build());
		});

		/**
		 * Layout Builder
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$layoutBuilder = new FieldsBuilder('layout_builder', [
			'style' => 'seamless'
		]);
		$layoutBuilder
			->addFlexibleContent('templates', [
				'label'					=>	'Layout Builder',
				'button_label'	=>	'Add Template'
			])
				->addLayout(Columns::getFields())
				->addLayout(CallToAction::getFields())
				->addLayout(RelatedContent::getFields())
				->addLayout(BlockGrid::getFields())
				->addLayout(SplitContent::getFields())
				->addLayout(Gallery::getFields())
			->setLocation('post_type', '==', 'page')
				->or('post_type', '==', 'ssm_article');

		// Register Layout Builder
		add_action('acf/init', function() use ($layoutBuilder) {
			acf_add_local_field_group($layoutBuilder->build());
		});

		/**
		 * Inline Styles
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$inlineStyles = new FieldsBuilder('inline_styles', [
			'menu_order'	=>	5
		]);
		$inlineStyles
			->addField('inline_styles', 'acf_code_field', [
				'label'	=>	'CSS Editor',
				'mode' 	=> 'css',
				'theme'	=> 'monokai'
			])
			->setLocation('post_type', '==', 'page')
				->or('post_type', '==', 'ssm_article');

		// Register Inline Styles
		add_action('acf/init', function() use ($inlineStyles) {
			acf_add_local_field_group($inlineStyles->build());
		});


		/**
		 * Inline Scripts
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$inlineScripts = new FieldsBuilder('inline_scripts', [
			'menu_order'	=>	6
		]);
		$inlineScripts
			->addField('inline_scripts', 'acf_code_field', [
				'label'	=>	'JS Editor',
				'mode' 	=> 'js',
				'theme'	=> 'monokai',
			])
			->setLocation('post_type', '==', 'page')
				->or('post_type', '==', 'ssm_article');

		// Register Inline Scripts
		add_action('acf/init', function() use ($inlineScripts) {
			acf_add_local_field_group($inlineScripts->build());
		});


		/**
		 * Facebook Conversion Pixel
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$facebookConversionPixel = new FieldsBuilder('facebook_conversion_pixel', [
			'menu_order'	=>	99,
			'position'		=>	'side'
		]);
		$facebookConversionPixel
			->addSelect('facebook_standard_event', [
				'label'	=>	'Standard Event',
				'default_value' => array(),
				'allow_null' => 1
			])
				->addChoice('fbq("track", "ViewContent");', 'Key Page View')
				->addChoice('fbq("track", "Lead");', 'Lead')
				->addChoice('fbq("track", "CompleteRegistration");', 'Completed Registration')
				->addChoice('fbq("track", "InitiateCheckout");', 'Initiated Checkout')
				->addChoice('fbq("track", "AddPaymentInfo");', 'Added Payment Info')
				->addChoice('fbq("track", "Purchase");', 'Made a Purchase')
			->setLocation('post_type', '==', 'page')
				->or('post_type', '==', 'ssm_article');

		// Register Facebook Conversion Pixel
		add_action('acf/init', function() use ($facebookConversionPixel) {
			acf_add_local_field_group($facebookConversionPixel->build());
		});

	}

}