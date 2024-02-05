<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Includes\Walker;
use Roots\Acorn\View\Composers\Concerns\AcfFields;

class SSM extends Composer
{
    use AcfFields;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'builder' => $this->getBuilder(),
            'is_landing_page' => is_page_template('template-landing-page.blade.php')
        ];
    }

    /**
     * Returns builder
     *
     * @return object
     */
    public function getBuilder() {
        return $this;
    }

    public static function getCustomID($html_id)
    {
        return (!empty($html_id)) ? " id=\"". sanitize_html_class(strtolower($html_id)) ."\"" : "";
    }

    public static function setSpacingSize($value)
    {
        switch ($value) {
            case 0:
                $spacing_size = 'none';
                break;
            case 1:
                $spacing_size = 'small';
                break;
            case 2:
                $spacing_size = 'normal';
                break;
            case 3:
                $spacing_size = 'large';
                break;
        }

        return $spacing_size ?? '';
    }

    public static function getCustomClasses($custom_classes = null, $args)
    {
        $response = "";

        if (!empty($args['background_color'])) {
            $response .= ($args['background_color'] == 'black') ? " bg-dark bg-" . $args['background_color'] : " bg-" . $args['background_color'];
        }

        $response .= (isset($args['option_top_margin']) && $args['option_top_margin'] != 2) ? ' mt-' . self::setSpacingSize($args['option_top_margin']) : '';
        $response .= (isset($args['option_bottom_margin']) && $args['option_bottom_margin'] != 0) ? ' mb-' . self::setSpacingSize($args['option_bottom_margin']) : '';
        $response .= (isset($args['option_top_padding']) && $args['option_top_padding'] != 2) ? ' pt-' . self::setSpacingSize($args['option_top_padding']) : '';
        $response .= (isset($args['option_bottom_padding']) && $args['option_bottom_padding'] != 2) ? ' pb-' . self::setSpacingSize($args['option_bottom_padding']) : '';

        $response .= (!empty($custom_classes)) ? " " . $custom_classes : "";
        $response .= (!empty($args['option_html_classes'])) ? " " . $args['option_html_classes'] : "";

        // Module Options
        if (!empty($args['option_text_alignment'])) {
            $response .= ($args['option_text_alignment'] != 'align-left') ? ' ' . $args['option_text_alignment'] : '';
        }

        if (!empty($args['option_button_alignment'])) {
            $response .= ($args['option_button_alignment'] != 'align-left') ? ' ' . $args['option_button_alignment'] : '';
        }

        return $response;
    }

	public static function getMenuArgs( $context, $menu_id = null )
	{

        $response = [];

        if ( $context == "offcanvas") {

            $response = [
                "theme_location" => "offcanvas_navigation",
                "container"      => FALSE,
				"items_wrap"     => '<ul class="vertical menu accordion-menu" data-accordion-menu>%3$s</ul>',
                "walker"         => new Walker()
            ];

        } elseif ( $context == "primary_navigation" ) {

            $response = [
                "theme_location" => "primary_navigation",
                "container"      => FALSE,
                "items_wrap"     => '<ul class="dropdown menu show-for-medium" data-dropdown-menu>%3$s</ul>',
                "walker"         => new Walker()
            ];

        } elseif ( $context == "footer_navigation" ) {

            $response = [
                "theme_location" => "footer_navigation",
                "container"      => FALSE,
                "items_wrap"     => '<ul class="menu vertical">%3$s</ul>',
                "walker"         => new Walker()
            ];

        } elseif ( $menu_id ) {

            $response = [
                "menu"           => $menu_id,
                "container"      => FALSE,
                "items_wrap"     => '<ul>%3$s</ul>',
                "walker"         => new Walker()
            ];

        }

        return $response;

    }

    public static function getAddress( $address )
	{
        $response = "";

        $street1 = $address['street1'];
        $street2 = $address['street2'];
        $city    = $address['city'];
        $state   = $address['state'];
        $zip     = $address['zip'];

        if ( $street1 || $street2 || $city || $state || $zip ) {
            $response .= ( $street1 ) ? $street1 . ", " : "";
            $response .= ( $street2 ) ? $street2 : "";
            $response .= ( $city ) ? "<br />" . $city : "";
            $response .= ( $state ) ? ", " . $state : "";
            $response .= ( $zip ) ? " " . $zip : "";
        }

        return $response;
    }

	public static function getMapAddress( $address )
	{
        $prepared_url  = $address['street1'];
        $prepared_url .= $address['street2'] ?: "";
        $prepared_url .= " " . $address['city'];
        $prepared_url .= " " . $address['state'];
        $prepared_url .= " " . $address['zip'];
        $prepared_url  = urlencode($prepared_url);

        return $prepared_url;
    }

    public static function getPhoneNumber( $phone )
	{
        $formatted = '';

        if( preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $phone['national'], $pieces ) ) {
            return $pieces[1] . '-' . $pieces[2] . '-' . $pieces[3];
        }

        return $formatted;
    }

    public static function getPageTemplateID($page_template)
    {
        $post = get_posts(['post_type' => 'page', 'meta_key' => '_wp_page_template', 'meta_value' => $page_template]);
        if ($post) return array_shift($post)->ID;
    }

    public static function getColorChoices($colors)
    {
        if (!empty($colors)) {
            foreach ($colors as $color) {
                $choices[$color] = get_stylesheet_directory_uri(__FILE__) . '/resources/assets/swatches/' . $color . '.png';
            }
        }

        return $choices ?? [];
    }
}
