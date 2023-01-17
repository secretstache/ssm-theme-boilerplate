<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Includes\Walker;

class SSM extends Composer
{
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

    public static function getCustomID( $args )
    {

        $response = "";

        $inline_id = $args['option_html_id'];
        $response .= ( $inline_id ) ? " id=\"" . sanitize_html_class( strtolower( $inline_id ) ) . "\"" : "";

        return $response;

    }

    public static function getCustomClasses( $context, $custom_classes = null, $column_index, $args )
    {

        $response = "";

        $inline_classes = $args['option_html_classes'];
        $column_index++;
        $odd = ( !empty( $column_index ) && $column_index % 2 == 0 ) ? "even" : "odd";

        switch ( $context ) {

            case "template":
                $response .= " class=\"content-block";
                break;

            case "hero-unit":
                $response .= " class=\"hero-unit";
                break;

            case "module":
                $response .= " class=\"module " . $args['acf_fc_layout'];
                break;

        }
        switch ( $args['option_background'] ) {

            case "color":
                $response .= " bg-dark " . sanitize_html_class( $args['option_background_color'] );
                break;

            case "image":
                $response .= " bg-image bg-dark";
                break;

            case "video":
                $response .= " bg-video";
                break;

        }

        if ( $context == "module" && !is_null( $args['option_text_alignment'] ) ) {
            $response .= " " . $args['option_text_alignment'];
        }

        $response .= ( !empty( $custom_classes ) ) ? " " . $custom_classes : "";
        $response .= ( !empty( $inline_classes ) ) ? " " . $inline_classes : "";
        $response .= "\"";

        return $response;

    }

    public static function getColumnsWidth( $column_index, $template_page_id )
	{

        global $post;

        $post_id = ( $template_page_id ) ? $template_page_id : $post->ID;

        return get_post_meta( $post_id, "custom_columns_width_" . $column_index, true);

    }

	public static function getMenuArgs( $context, $menu_id = null )
	{

        $response = array();

        if ( $context == "offcanvas") {

            $response = array(
                "theme_location" => "offcanvas_navigation",
                "container" => FALSE,
				"items_wrap" => '<ul class="vertical menu accordion-menu" data-accordion-menu>%3$s</ul>',
                "walker" => new Walker()
            );

        } elseif ( $context == "primary_navigation" ) {

            $response = array(
                "theme_location" => "primary_navigation",
                "container" => FALSE,
                "items_wrap" => '<ul class="dropdown menu show-for-medium" data-dropdown-menu>%3$s</ul>',
                "walker" => new Walker()
            );

        } elseif ( $context == "footer_navigation" ) {

            $response = array(
                "theme_location" => "footer_navigation",
                "container" => FALSE,
                "items_wrap" => '<ul class="menu vertical">%3$s</ul>',
                "walker" => new Walker()
            );

        } elseif ( $menu_id ) {

            $response = array(
                "menu" => $menu_id,
                "container" => FALSE,
                "items_wrap" => '<ul>%3$s</ul>',
                "walker" => new Walker()
            );

        }

        return $response;

    }

	public static function getAddress( $address )
	{

        $response = "";

        $street1 = $address->street1;
        $street2 = $address->street2;
        $city = $address->city;
        $state = $address->state;
        $zip = $address->zip;

        if ( $street1 || $street2 || $city || $state || $zip ) {
            $response .= ( $street1 ) ? $street1 : "";
            $response .= ( $street2 ) ? ", " . $street2 : "";
            $response .= ( $city ) ? "<br />" . $city : "";
            $response .= ( $state ) ? ", " . $state : "";
            $response .= ( $zip ) ? " " . $zip : "";
        }

        return $response;

    }

	public static function getMapAddress( $address )
	{

        $prepared_url = $address->street1;
        $prepared_url .= ( $address->street2 ) ? $address->street2 : "";
        $prepared_url .= " " . $address->city;
        $prepared_url .= " " . $address->state;
        $prepared_url .= " " . $address->zip;
        $prepared_url = urlencode($prepared_url);

        return $prepared_url;

    }

	public static function getPhoneNumber( $number )
	{

        $formatted = "";

        $pieces = explode(" ", $number );

        $formatted = "(" . $pieces[0] . ") " . $pieces[1];
        $formatted .= ( isset( $pieces[2] ) ) ? $pieces[2] : "";
        $formatted .= ( isset( $pieces[3] ) ) ? $pieces[3] : "";

        return $formatted;

    }

}
