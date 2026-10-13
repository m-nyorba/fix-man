<?php
/**
 * Title: Latest Post
 * Slug: fix-man/post-latest
 * Categories: posts, fix-man
 * Keywords: post
 */
$blog_page_id = (int) get_option( 'page_for_posts' );

if ( $blog_page_id && function_exists( 'pll_get_post' ) && function_exists( 'pll_current_language' ) ) {
	$translated_blog_page_id = pll_get_post(
		$blog_page_id,
		pll_current_language()
	);

	if ( $translated_blog_page_id ) {
		$blog_page_id = (int) $translated_blog_page_id;
	}
}

$blog_url = $blog_page_id
	? get_permalink( $blog_page_id )
	: home_url( '/' );
?>
<!-- wp:group {"metadata":{"categories":["fix-man"],"patternName":"fix-man/post-latest","name":"Latest Post"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","left":"var:preset|spacing|0","right":"var:preset|spacing|0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--xx-large);padding-right:var(--wp--preset--spacing--0);padding-left:var(--wp--preset--spacing--0)"><!-- wp:group {"align":"wide","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group alignwide"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Useful Articles', 'fix-man' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Tips on using and caring for home appliances.', 'fix-man' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:query {"query":{"perPage":3,"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"excludeCurrent":null},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-query alignfull"><!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","sizeSlug":"thumbnail"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xx-small","margin":{"bottom":"var:preset|spacing|small"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--small)"><!-- wp:post-title {"level":4,"isLink":true,"textColor":"heading"} /-->

<!-- wp:post-excerpt {"moreText":"<?php echo esc_html__( 'Read article', 'fix-man' ); ?>","excerptLength":15} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:spectra/buttons {"layout":{"type":"flex","justifyContent":"center"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|large"}},"layout":{"type":"flex","justifyContent":"center"}},"spectraId":"spectra-mu70m8rz-j719av"} -->
<!-- wp:spectra/button {"text":"<?php echo esc_html__( 'View all articles', 'fix-man' ); ?>","linkURL":"<?php echo esc_url( $blog_url ); ?>","linkRel":[null,null,null],"linkTarget":"_self","icon":"arrow-right","backgroundColorHover":"#D7601C","backgroundColor":"foreground","spectraId":"spectra-mu70m94v-xrwz9v"} /-->
<!-- /wp:spectra/buttons --></div>
<!-- /wp:group -->
