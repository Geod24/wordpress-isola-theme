<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Isola
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function isola_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'main',
		'render'    => 'isola_infinite_scroll_render',
	) );

	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'isola_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function isola_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) {
			get_template_part( 'template-parts/content', 'search' );
		} else {
			get_template_part( 'template-parts/content', get_post_format() );
		}
	}
}
