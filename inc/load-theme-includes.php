<?php
/**
 * Load theme include files from the child theme /inc directory.
 *
 * This file is required from functions.php and excludes itself to avoid
 * recursive loading.
 */

$fix_man_inc_files = glob( get_stylesheet_directory() . '/inc/*.php' );

if ( $fix_man_inc_files ) {
	foreach ( $fix_man_inc_files as $file ) {
		if ( $file === __FILE__ ) {
			continue;
		}

		require_once $file;
	}
}
