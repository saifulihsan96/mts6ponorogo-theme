<?php
/**
 * ACF Compatibility File
 *
 * @link https://www.advancedcustomfields.com/
 *
 * @package cubbex
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'acf/settings/save_json', function( $path ) {
	return FTR_PATH . '/assets/acf-json';
} );

add_filter( 'acf/settings/load_json', function( $paths ) {
	$paths[] = FTR_PATH . '/assets/acf-json';

	return $paths;
} );

acf_add_options_page(array(
	'page_title'    => 'Theme Settings',
	'menu_title'    => 'Theme Settings',
	'menu_slug'     => 'theme-settings',
	'capability'    => 'edit_posts',
	'redirect'      => false
));

acf_add_options_sub_page(array(
	'page_title'    => 'Review Settings',
	'menu_title'    => 'Review',
	'parent_slug'   => 'theme-settings',
));