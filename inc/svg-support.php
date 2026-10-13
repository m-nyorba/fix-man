<?php
/**
 * SVG support for Fix Man.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add SVG support to the media library.
 *
 * @param array $mimes Array of allowed mime types.
 * @return array
 */
function fix_man_add_svg_support( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'fix_man_add_svg_support' );

/**
 * Correct SVG mime type for uploaded files.
 *
 * @param array  $data     File type data.
 * @param string $file     Full path to file.
 * @param string $filename File name.
 * @param array  $mimes    Allowed mime types.
 * @return array
 */
function fix_man_fix_svg_mime_type( $data, $file, $filename, $mimes ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed -- required callback signature.
	$ext = pathinfo( $filename, PATHINFO_EXTENSION );
	if ( 'svg' === $ext ) {
		$data['type'] = 'image/svg+xml';
		$data['ext']  = 'svg';
	}
	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_man_fix_svg_mime_type', 10, 4 );
