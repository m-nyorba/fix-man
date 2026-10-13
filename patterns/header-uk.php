<?php
/**
 * Title: Header (UA)
 * Slug: fix-man/header-uk
 * Categories: header, fix-man
 * Block Types: core/template-part/header
 */

$get_url = trailingslashit( get_theme_file_uri() );

$images = array(
	$get_url . 'assets/images/logo-white.svg',
);

?>
<!-- wp:group {"metadata":{"categories":["header"],"patternName":"fix-man/header-uk","name":"Header center menu"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small-plus","bottom":"var:preset|spacing|x-small-plus"}}},"backgroundColor":"foreground","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-foreground-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-small-plus);padding-bottom:var(--wp--preset--spacing--x-small-plus)"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|0","left":"var:preset|spacing|0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--0);padding-left:var(--wp--preset--spacing--0)"><!-- wp:image {"id":193,"sizeSlug":"full","linkDestination":"custom","className":"site-logo-img","style":{"layout":{"selfStretch":"fixedNoShrink","flexSize":"4rem"}},"spectraId":"spectra-mtvfjy74-j658vy"} -->
<figure class="wp-block-image size-full site-logo-img"><a href="/uk"><img src="<?php echo esc_url( $images[0] ); ?>" alt="Home" class="wp-image-193"/></a></figure>
<!-- /wp:image -->

<!-- wp:navigation {"ref":333,"textColor":"white","overlay":"overlay-ua","icon":"menu","overlayBackgroundColor":"dark-blue","style":{"layout":{"selfStretch":"fill","flexSize":null},"spacing":{"blockGap":"var:preset|spacing|x-small"}},"fontSize":"small","layout":{"type":"flex","justifyContent":"right"},"SWTHideMob":true} /-->

<!-- wp:group {"layout":{"type":"constrained"},"SWTHideTab":true,"SWTHideMob":true} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxx-small","padding":{"right":"var:preset|spacing|0","left":"var:preset|spacing|0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--0);padding-left:var(--wp--preset--spacing--0)"><!-- wp:spectra/icons {"spectraId":"spectra-mtvenjn2-hmr9xs"} -->
<!-- wp:spectra/icon {"icon":"phone","size":"1.25rem","textColor":"#ffffff","style":{"size":"1.25rem"},"spectraId":"spectra-mtvenjw8-lpp3h2"} /-->
<!-- /wp:spectra/icons -->

<!-- wp:heading {"level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"layout":{"selfStretch":"fit","flexSize":null}},"textColor":"white"} -->
<h5 class="wp-block-heading has-white-color has-text-color has-link-color"><a href="tel:0980556028">098 05 56 028</a></h5>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|quaternary"}}},"typography":{"fontSize":"0.63rem"}},"textColor":"quaternary"} -->
<p class="has-quaternary-color has-text-color has-link-color" style="font-size:0.63rem"><?php esc_html_e( 'We accept requests around the clock', 'fix-man' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|0","left":"var:preset|spacing|0"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--0);padding-left:var(--wp--preset--spacing--0)"><!-- wp:polylang/language-switcher {"dropdown":false,"show_names":true,"show_flags":false,"force_home":false,"hide_current":false,"hide_if_no_translation":false} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|x-small","right":"var:preset|spacing|0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--0);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:navigation {"ref":333,"textColor":"white","submenuVisibility":"click","overlayMenu":"always","overlay":"overlay-ua","icon":"menu","overlayBackgroundColor":"foreground","overlayTextColor":"white","layout":{"type":"flex","justifyContent":"left"},"SWTHideDesktop":true} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->