<?php
/**
 * Fix Man theme functions.
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const FIX_MAN_VER = '1.0.0';

/**
 * Load child stylesheet after parent assets.
 */
function fix_man_enqueue_styles(): void {
	wp_enqueue_style(
		'fix-man',
		get_stylesheet_uri(),
		array( 'spectra-one' ),
		FIX_MAN_VER
	);

	wp_enqueue_script(
		'fix-man-global',
		get_stylesheet_directory_uri() . '/assets/js/global.js',
		array(),
		FIX_MAN_VER,
		true
	);

	wp_enqueue_script(
		'fix-man-spectra-slider',
		get_stylesheet_directory_uri() . '/assets/js/spectra-slider.js',
		array(),
		FIX_MAN_VER,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'fix_man_enqueue_styles', 20 );

add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'ct-core-integration' );
		add_editor_style( 'assets/css/editor-style.css' );
	},
	11
);

require_once get_stylesheet_directory() . '/inc/load-theme-includes.php';
