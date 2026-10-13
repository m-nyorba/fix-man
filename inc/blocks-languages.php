<?php
/**
 * Dynamic language switcher for Fix-Man Template Parts.
 *
 * @package Fix_Man
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Replace a template part with its language-specific variant.
 *
 * @since 1.0.0
 *
 * @param array $parsed_block Parsed block data.
 * @return array Filtered block data.
 */
function fix_man_filter_template_part_language( $parsed_block ) {
	// Check that the block is a template part and has a slug attribute.
	if ( isset( $parsed_block['blockName'] ) && 'core/template-part' === $parsed_block['blockName'] ) {

		if ( ! empty( $parsed_block['attrs']['slug'] ) && function_exists( 'pll_current_language' ) ) {

			$current_slug = $parsed_block['attrs']['slug'];

			// Define the template parts that support language substitution.
			$multilingual_parts = array( 'header', 'footer' );

			if ( in_array( $current_slug, $multilingual_parts, true ) ) {
				$default_lang = function_exists( 'pll_default_language' ) ? pll_default_language() : '';
				$current_lang = pll_current_language();

				// Use a localized variant only when the current language differs from the default.
				if ( $current_lang && $current_lang !== $default_lang ) {
					$target_slug = $current_slug . '-' . $current_lang;

					$stylesheet_file = get_stylesheet_directory() . '/parts/' . $target_slug . '.html';
					$template_file   = get_template_directory() . '/parts/' . $target_slug . '.html';

					// Check whether the localized template part exists in either theme.
					if ( file_exists( $stylesheet_file ) || file_exists( $template_file ) ) {
						$parsed_block['attrs']['slug'] = $target_slug;
					}
				}
			}
		}
	}

	return $parsed_block;
}

add_filter(
	'render_block_data',
	'fix_man_filter_template_part_language',
	10,
	1
);
