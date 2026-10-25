<?php
/**
 * Title: Template index
 * Slug: spectra-one/template-index
 * Categories: template
 * Inserter: false
 */

$page_for_posts_id = is_home() ? (int) get_option( 'page_for_posts' ) : 0;

ob_start();

// Title.
if ( is_singular() ) {
	echo '<!-- wp:post-title {"textAlign":"center","level":1} /-->';
} elseif ( is_home() ) {
	echo '<!-- wp:pattern {"slug":"fix-man/blog-page-content"} /-->';
} elseif ( is_404() ) {
	echo '<!-- wp:heading {"level":1} -->';
	echo '<h1 class="wp-block-heading alignwide">' . esc_html( __( 'Page Not Found', 'fix-man' ) ) . '</h1>';
	echo '<!-- /wp:heading -->';
} else {
	echo '<!-- wp:query-title {"type":"archive","showPrefix":false} /-->';
}
// Excerpt / Description.
if ( is_singular() && has_excerpt() ) {
	echo '<!-- wp:post-excerpt {"fontSize":"x-small"} /-->';
} elseif ( is_home() && $page_for_posts_id && has_excerpt( $page_for_posts_id ) ) {
	echo '<div class="wp-block-post-excerpt has-md-font-size"><p class="wp-block-post-excerpt__excerpt">' . esc_html( get_the_excerpt( $page_for_posts_id ) ) . '</p></div>';
} elseif ( is_archive() && get_the_archive_description() ) {
	echo '<!-- wp:term-description {"fontSize":"x-small"} /-->';
}

$inner_content = ob_get_clean();

?>
<!-- wp:group {"metadata":{"categories":["posts"],"patternName":"spectra-one/blog-grid","name":"Blog grid"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|large"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--large)"><?php echo $inner_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"excludeCurrent":null},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"},"layout":{"type":"constrained"}} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","sizeSlug":"thumbnail"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xx-small","margin":{"bottom":"var:preset|spacing|small"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--small)"><!-- wp:post-title {"level":4,"isLink":true,"textColor":"heading"} /-->

<!-- wp:post-excerpt {"moreText":"<?php echo esc_html__( 'Read article', 'fix-man' ); ?>","excerptLength":15} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
