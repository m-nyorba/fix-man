<?php
/**
 * Configuration for theme image sizes.
 */

add_action(
	'after_setup_theme',
	/**
	 * Set the thumbnail, medium, and large image dimensions.
	 */
	function () {
		// 1. Thumbnail — 3:2 (480x320)
		update_option( 'thumbnail_size_w', 480 );
		update_option( 'thumbnail_size_h', 320 );
		update_option( 'thumbnail_crop', 1 );

		// 2. Medium — 4:3 (576)
		update_option( 'medium_size_w', 768 );
		update_option( 'medium_size_h', 576 );
		update_option( 'medium_crop', 1 );

		// 3. Large — 16:9 (1440x810)
		update_option( 'large_size_w', 1440 );
		update_option( 'large_size_h', 810 );
		update_option( 'large_crop', 0 );
	}
);
