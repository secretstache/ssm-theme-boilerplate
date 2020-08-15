<?php

namespace App\Fields\SettingsPages;

use StoutLogic\AcfBuilder\FieldsBuilder;

class BrandSettings {

	public function __construct() {

		/**
		 * Logo Assets
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$logoAssets = new FieldsBuilder('logo_assets', [
			'title'			=> 'Logo Assets',
			'menu_order'	=>	1
		]);

		$logoAssets

			->addImage('brand_icon', [
				'label' 		=> 'Icon',
				'preview_size'	=> 'medium'
			])

			->addImage('brand_logo', [
				'label'			=> 'Full Logo',
				'preview_size'	=> 'medium'
			])

			->addImage('favicon', [
				'label'			=> 'Favicon',
				'preview_size'	=> 'medium',
				'mime_types' 	=> 'png, svg, ico'
			])

			->setLocation('options_page', '==', 'acf-options-brand-settings');

		// Register Logo Assets
		add_action('acf/init', function() use ($logoAssets) {
			acf_add_local_field_group($logoAssets->build());
		});


		/**
		 * Business Information
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$businessInformation = new FieldsBuilder('business_information', [
			'title'			=> 'Business Information',
			'menu_order'	=>	5
		]);

		$businessInformation

			->addField('primary_phone_number', 'phone', [
				'label' 			=> 'Primary Phone Number',
				'initial_country' 	=> 'US',
				'return_format'		=> 'array',
				'wrapper'			=> [
					'width'			=> '33'
				]
			])

			->addField('primary_fax_number', 'phone', [
				'label' 			=> 'Primary Fax Number',
				'initial_country' 	=> 'US',
				'return_format' 	=> 'array',
				'wrapper'			=> [
					'width'			=>	'34'
				]
			])

			->addEmail('primary_email_address', [
				'label' 	=> 'Primary Email Address',
				'wrapper'	=> [
					'width'	=> '33'
				]
			])
			
			->addField('physical_address', 'address', [
				'label' 			=> 'Physical Address',
				'output_type' 		=> 'object',
				'address_layout' 	=> '[[{"id":"street1","label":"Street 1"}],[{"id":"street2","label":"Street 2"}],[],[{"id":"city","label":"City"},{"id":"state","label":"State"},{"id":"zip","label":"Postal Code"},{"id":"country","label":"Country"}],[]]',
				'address_options'	=> '{"street1":{"id":"street1","label":"Street 1","defaultValue":"","enabled":true,"cssClass":"street1","separator":""},"street2":{"id":"street2","label":"Street 2","defaultValue":"","enabled":true,"cssClass":"street2","separator":""},"street3":{"id":"street3","label":"Street 3","defaultValue":"","enabled":false,"cssClass":"street3","separator":""},"city":{"id":"city","label":"City","defaultValue":"","enabled":true,"cssClass":"city","separator":","},"state":{"id":"state","label":"State","defaultValue":"","enabled":true,"cssClass":"state","separator":""},"zip":{"id":"zip","label":"Postal Code","defaultValue":"","enabled":true,"cssClass":"zip","separator":""},"country":{"id":"country","label":"Country","defaultValue":"","enabled":true,"cssClass":"country","separator":""}}',
			])

			->setLocation('options_page', '==', 'acf-options-brand-settings');

		// Register Business Information
		add_action('acf/init', function() use ($businessInformation) {
			acf_add_local_field_group($businessInformation->build());
		});


		/**
		 * Social Networks
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$socialNetworks = new FieldsBuilder('social_networks', [
			'title'			=> 'Social Networks',
			'menu_order'	=>	10
		]);

		$socialNetworks

			->addText('facebook', [
				'label' 	=> 'Facebook',
				'prepend' 	=> 'URL',
			])
			
			->addText('twitter', [
				'label' 	=> 'Twitter',
				'prepend' 	=> 'URL',
			])
			
			->addText('linkedin', [
				'label' 	=> 'Linkedin',
				'prepend' 	=> 'URL',
			])
			
			->addText('instagram', [
				'label' 	=> 'Instagram',
				'prepend' 	=> 'URL',
			])
			
			->setLocation('options_page', '==', 'acf-options-brand-settings');

		// Register Social Networks
		add_action('acf/init', function() use ($socialNetworks) {
			acf_add_local_field_group($socialNetworks->build());
		});

		/**
		 * Global Footer
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$globalFooter = new FieldsBuilder('global_footer', [
			'title'			=> 'Footer',
			'menu_order'	=>	15
		]);

		$globalFooter

			->addWysiwyg('footer_copyright', [
				'label'			=> 'Copyright',
				'tabs'			=> 'all',
				'toolbar'		=> 'full',
				'media_upload' 	=> 0
			])

			->setLocation('options_page', '==', 'acf-options-brand-settings');

		// Register Global Footer
		add_action('acf/init', function() use ($globalFooter) {
			acf_add_local_field_group($globalFooter->build());
		});

		/**
		 * Analytics
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$analytics = new FieldsBuilder('analytics', [
			'title'			=> 'Analytics',
			'menu_order'	=>	20
		]);

		$analytics

			->addText('google_tag_manager_id', [
				'label'	=> 'Google Tag Manager ID' 
			])

			->addText('google_site_verification_id', [
				'label'	=> 'Google Site Verification ID'
			])

			->addText('facebook_account_id', [
				'label'	=> 'Facebook Account ID'
			])

			->addRepeater('custom_tracking_scripts', [
				'layout'		=> 'block',
				'button_label'	=> 'Add Tracking Script'
			])

				->addText('title', [
					'label' => 'Title'
				])

				->addField('script', 'acf_code_field', [
					'label' => 'Script',
					'mode'	=> 'htmlmixed',
					'theme'	=> 'monokai',
				])

				->addRadio('location', [
					'label' 		=> 'Location',
					'choices'		=> [
						'header' 	=> 'Header',
						'footer' 	=> 'Footer'
					],
					'layout' 		=> 'horizontal'
				])

			->endRepeater()

			->setLocation('options_page', '==', 'acf-options-brand-settings');

		// Register Analytics
		add_action('acf/init', function() use ($analytics) {
			acf_add_local_field_group($analytics->build());
		});


		/**
		 * Global Inline Styles
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$globalInlineStyles = new FieldsBuilder('global_inline_styles', [
			'title'			=> 'Global Inline Styles',
			'menu_order'	=>	25
		]);

		$globalInlineStyles

			->addField('global_inline_styles', 'acf_code_field', [
				'label'	=>	'CSS Editor',
				'mode' 	=>	'css',
				'theme' =>	'monokai'
			])
			
			->setLocation('options_page', '==', 'acf-options-brand-settings');

		// Register Analytics
		add_action('acf/init', function() use ($globalInlineStyles) {
			acf_add_local_field_group($globalInlineStyles->build());
		});

	}

}