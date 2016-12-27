<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mobiusZero
 */

/* Hide WP version strings from scripts and styles
 * @return {string} $src
 * @filter script_loader_src
 * @filter style_loader_src
 * @link https://www.webhostinghero.com/remove-wordpress-version-number/
 */
function remove_wp_version_strings( $src ) {
    $mobius0 = wp_get_theme();
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) ){
        // Remove wordpress version number to script and style links        
        $src = remove_query_arg( 'ver', $src );
        // Add Theme's current version number
        $src = add_query_arg( 'v', $mobius0->get('Version') , $src );
    }
    return $src;
}
add_filter( 'script_loader_src', 'remove_wp_version_strings' );
add_filter( 'style_loader_src', 'remove_wp_version_strings' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mobiuszero_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'mobiuszero_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function mobiuszero_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'mobiuszero_pingback_header' );
