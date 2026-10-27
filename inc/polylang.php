<?php
if ( ! function_exists( 'pll_the_languages' ) ) {
		return;
}

add_filter(
	'pll_language_switcher_settings',
	function ( $settings ) {
		$settings['show_labels'] = 'codes';
		return $settings;
	}
);
