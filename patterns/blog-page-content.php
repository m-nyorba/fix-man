<?php
/**
 * Title: Blog Page Content
 * Slug: fix-man/blog-page-content
 * Categories: fix-man, query, blog
 * Inserter: false
 * Description: Displays the content of the page selected as the posts page.
 *
 * @package fix-man
 * @since 1.0.0
 */

$page_for_posts_id = (int) get_option( 'page_for_posts' );
$content           = $page_for_posts_id ? get_post_field( 'post_content', $page_for_posts_id ) : '';

if ( $content ) {
	?>
	<!-- wp:group {"align":"wide"},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">
		<?php
		echo wp_kses_post( $content );
		?>
	</div>
	<!-- /wp:group -->
	<?php
}
