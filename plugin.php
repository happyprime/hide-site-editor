<?php
/**
 * Plugin Name:  Hide Site Editor
 * Description:  Remove site editor capabilities from administrators.
 * Version:      1.0.0
 * Plugin URI:   https://github.com/happyprime/hide-site-editor/
 * Author:       Happy Prime
 * Author URI:   https://happyprime.co
 * Text Domain:  hide-site-editor
 * Requires PHP: 5.6
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

namespace HideSiteEditor;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'init', __NAMESPACE__ . '\hide_site_editor' );

/**
 * Remove the edit_theme_options capability from the administrator
 * role so that the Edit Site interface in WordPress is effectively
 * hidden.
 */
function hide_site_editor() {
	$administrator = get_role( 'administrator' );

	if ( $administrator->has_cap( 'edit_theme_options' ) ) {
		$administrator->remove_cap( 'edit_theme_options' );
	}
}
