<?php
if ( ! function_exists( 'pll_the_languages' ) ) {
		return;
}

add_filter(
	'pll_the_languages_args',
	function ( $args ) {
		$args['display_names_as'] = 'slug';
		return $args;
	}
);
