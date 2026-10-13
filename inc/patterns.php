<?php
/**
 * Register Fix-Man block pattern categories.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the Fix-Man pattern category.
 */
function fix_man_pattern_categories() {
	register_block_pattern_category(
		'fix-man',
		array( 'label' => esc_html__( 'Fix-Man', 'fix-man' ) )
	);
	register_block_pattern_category(
		'fix-man-ua',
		array( 'label' => esc_html__( 'Fix-Man UA', 'fix-man' ) )
	);
	register_block_pattern_category(
		'fix-man-ru',
		array( 'label' => esc_html__( 'Fix-Man RU', 'fix-man' ) )
	);
}
add_action( 'init', 'fix_man_pattern_categories' );
