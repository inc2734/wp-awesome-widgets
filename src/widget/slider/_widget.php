<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;

View::render(
	'slider',
	null,
	[
		'args'     => $args,
		'instance' => $instance,
	]
);

if ( ! wp_script_is( 'slick-carousel' ) ) {
	wp_enqueue_script(
		'slick-carousel',
		get_theme_file_uri( '/assets/packages/slick-carousel/slick/slick.min.js' ),
		[ 'jquery' ],
		filemtime( get_theme_file_path( '/assets/packages/slick-carousel/slick/slick.min.js' ) ),
		true
	);
}

if ( ! wp_script_is( 'wp-awesome-widgets-slider' ) ) {
	wp_enqueue_script(
		'wp-awesome-widgets-slider',
		get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/widget/slider.js',
		[ 'slick-carousel' ],
		filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/widget/slider.js' ),
		true
	);
}
