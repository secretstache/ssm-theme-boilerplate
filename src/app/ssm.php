<?php

/**
 * SSM Theme Boilerplate
 */

namespace App;

/**
 * Add Required Plugins
 */
add_filter( 'sober/bundle/file', function () {
    return get_template_directory( __FILE__ ) . '/config/json/required-plugins.json';
});

/**
 * Add SSM menu item
 */
add_action( 'admin_menu', function () {

    add_menu_page(
        "Secret Stache",
        "Secret Stache",
        "manage_options",
        "ssm",
        "",
        "dashicons-layout",
        5
    );

});

/**
 * Remove first SSM submenu item
 */
add_action( 'admin_init', function () {
    remove_submenu_page("ssm", "ssm");
}, 99);

/**
 * Create SSM Menu sub items
 */
add_action( 'init', function() {

    if( class_exists("acf") ) {

        // Add Brand Settings Page
        acf_add_options_sub_page( array(
            "page_title"  => "Brand Settings",
            "menu_title"  => "Brand Settings",
            "parent_slug" => "ssm",
		));

    }
    
});

/**
 * Modified Post Excerpt
 */
add_filter('excerpt_more', function( $more ) {
    global $post;
    return '…';
});

add_filter( 'excerpt_length', function( $length ) {
	return 25;
});

/**
 * Assign custom Page Post States
 */
add_filter( 'display_post_states', function( $post_states, $post ) {

    if( get_page_template_slug( $post ) == 'template-legal-page.blade.php' ) {
        $post_states[] = 'Legal Page';
    }

    return $post_states;

 }, 10, 2 );

/**
 * Remove Console Error - "SyntaxError: Unexpected number."
 */
add_action('init', function () {
    remove_filter('script_loader_tag', 'Roots\\Soil\\CleanUp\\clean_script_tag');
});

/**
* Disable Removing P tags on images
*/
add_filter( 'ssm_disable_image_tags', function( $content ) {
    return false;
}, 10 );

/**
 * Remove Block Library Styles
 */
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'wp-block-library' ); // WordPress core
}, 100 );

/**
 * Remove unnecessary item from Admin Bar Menu
 */
add_action( 'admin_bar_menu', function( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wpengine_adminbar' );
}, 999 );

/**
 * Modified Sitemap - Yoast SEO 
 */
add_filter( 'wpseo_sitemap_exclude_taxonomy', function( $value, $taxonomy ) {

    $exclude = []; // Taxonomy Slug;

    if( in_array( $taxonomy, $exclude ) ) return true;

}, 10, 2 );

add_filter( 'wpseo_sitemap_exclude_author', function( $value ) {
    return [];
});

/**
 * Append the template name to the label of a layout builder template
 */ 
add_filter('acf/fields/flexible_content/layout_title/name=templates', function( $title, $field, $layout, $i ) {

    $label = $layout['label'];

    if ( $admin_label = get_sub_field("option_section_label") ) {
        $label = stripslashes( $admin_label ) . " - " . $label;
    }

    if ( get_sub_field("option_status") == false ) {
        $label = "<span class=\"template-inactive\">Inactive</span> - " . $label;
    }

    return $label;

}, 999, 4 );

/**
 * Register Objects
 */
foreach ( glob( get_template_directory( __FILE__ ) . '/app/Objects/*.php') as $file) {    
	require_once( $file );
}

/**
 * Register ACF
 */
foreach( glob( get_template_directory( __FILE__ ) . '/app/Fields/*', GLOB_ONLYDIR ) as $dir ) {

	$namespace = last( explode( "/", $dir ) ); // "Objects"

	if( count(scandir($dir)) > 2 ) {

		foreach ( glob( $dir . '/*.php' ) as $file) {

			$filename = basename( $file, '.php' ); // "Team"
			$class = "App\\Fields\\{$namespace}\\{$filename}"; // "App\Fields\Objects\Team"
			
			$$filename = new $class(); // $Team = new App\Fields\Objects\Team
		
		}
	
	}

}