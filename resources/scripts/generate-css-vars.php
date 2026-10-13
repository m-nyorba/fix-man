<?php
/**
 * Generate CSS variables from theme.json palette.
 */

declare(strict_types=1);

$root          = dirname( __DIR__, 2 );
$themeJsonPath = $root . '/theme.json';
$outPath       = $root . '/src/css/generated-theme-vars.css';

if ( ! file_exists( $themeJsonPath ) ) {
	fwrite( STDERR, "theme.json not found: {$themeJsonPath}\n" );
	exit( 1 );
}

$raw = file_get_contents( $themeJsonPath );
if ( $raw === false ) {
	fwrite( STDERR, "Unable to read theme.json\n" );
	exit( 1 );
}

$data = json_decode( $raw, true );
if ( ! is_array( $data ) ) {
	fwrite( STDERR, "Invalid JSON in theme.json\n" );
	exit( 1 );
}

$palette = $data['settings']['color']['palette'] ?? array();
$lines   = array();
$lines[] = '/* Auto-generated from theme.json. Do not edit manually. */';
$lines[] = ':root {';

if ( is_array( $palette ) ) {
	foreach ( $palette as $item ) {
		if ( ! is_array( $item ) ) {
			continue;
		}
		$slug  = isset( $item['slug'] ) ? (string) $item['slug'] : '';
		$color = isset( $item['color'] ) ? (string) $item['color'] : '';
		if ( $slug === '' || $color === '' ) {
			continue;
		}
		$safeSlug = preg_replace( '/[^a-z0-9-]/', '-', strtolower( $slug ) );
		$lines[]  = "\t--fix-man-color-{$safeSlug}: {$color};";
	}
}

$lines[] = '}';
$lines[] = '';

$result = file_put_contents( $outPath, implode( PHP_EOL, $lines ) );
if ( $result === false ) {
	fwrite( STDERR, "Failed writing {$outPath}\n" );
	exit( 1 );
}

echo "Generated {$outPath}\n";
