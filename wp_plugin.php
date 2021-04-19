<?php

/**
 * Plugin Name:       FLoC disabler
 * Plugin URI:        https://github.com/alekitto/php-floc-disabler
 * Description:       Disables Google FLoX
 * Version:           0.1.0
 * Requires at least: 5.2
 * Requires PHP:      5.3
 * Author:            Alessandro Chitolina
 * Author URI:        https://github.com/alekitto
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 */

use Kcs\FlocDisabler\Wordpress;

if (! function_exists('get_bloginfo') || ! function_exists('add_filter')) {
    return;
}

function __kcs_add_floc_disabler_header(array $headers)
{
    return Wordpress::disable($headers);
}

add_filter( 'wp_headers', '__kcs_add_floc_disabler_header' );
