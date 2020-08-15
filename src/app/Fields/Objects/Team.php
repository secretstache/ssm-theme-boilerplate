<?php

namespace App\Fields\Objects;

use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Components\TextEditor;

class Team {

	public function __construct() {

        /**
		 * Team Member Info
		 * @author Rich Staats <rich@secretstache.com>
		 * @since 3.0.0
		 * @todo Link to Team Snippet Code
		 */
		$teamMemberInfo = new FieldsBuilder('team_member_info', [
			'position' => 'acf_after_title'
		]);

		$teamMemberInfo

			->addTaxonomy('taxonomy_field', [
				'label' 	 => 'Role',
				'taxonomy'	 => 'ssm_team_member_role',
				'field_type' => 'select',
				'add_term' 	 => 1,
        		'save_terms' => 1,
		        'load_terms' => 1
			])
			
			->addFields(TextEditor::getFields( $type = 'simple', $label = 'Short Bio' ))
			
			->setLocation('post_type', '==', 'ssm_team_member');

		// Register Team Member Info
		add_action('acf/init', function() use ($teamMemberInfo) {
			acf_add_local_field_group($teamMemberInfo->build());
		});

    }

}