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