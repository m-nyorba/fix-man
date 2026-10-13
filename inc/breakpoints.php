<?php
/**
 * Change breakpoints in Spectra One theme to match Fix Man.
 */
add_filter(
	'swt_dynamic_theme_css',
	function ( string $css ): string {
		$replacements = array(
			'/\(min-width:\s*1025px\)/' => '(min-width: 1200px)', // desktop breakpoint
			'/\(min-width:\s*768px\)/'  => '(min-width: 920px)',  // tablet min
			'/\(max-width:\s*1024px\)/' => '(max-width: 1199px)', // tablet max
			'/\(max-width:\s*767px\)/'  => '(max-width: 919px)',  // mobile max
		);

		return preg_replace( array_keys( $replacements ), array_values( $replacements ), $css );
	},
	20
);
