<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;

$query_args = [
	'post_type'        => 'any',
	'posts_per_page'   => empty( $instance['posts_per_page'] ) ? -1 : $instance['posts_per_page'],
	'suppress_filters' => true,
	'tax_query'        => [
		[
			'taxonomy' => 'post_tag',
			'terms'    => [ 'pickup' ],
			'field'    => 'slug',
		],
	],
];

if ( ! empty( $instance['random'] ) ) {
	$query_args = array_merge(
		$query_args,
		[
			'orderby' => 'rand',
		]
	);
}

$widget_number = explode( '-', $args['widget_id'] );
if ( 1 < count( $widget_number ) ) {
	array_shift( $widget_number );
	$widget_number = implode( '-', $widget_number );
} else {
	$widget_number = $widget_number[0];
}

$query_args = apply_filters( 'inc2734_wp_awesome_widgets_pickup_slider_widget_args', $query_args );
$query_args = apply_filters( 'inc2734_wp_awesome_widgets_pickup_slider_widget_args_' . $widget_number, $query_args );

$pickup_posts_query = new WP_Query(
	array_merge(
		$query_args,
		[
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		]
	)
);

View::render(
	'pickup-slider',
	null,
	[
		'args'     => $args,
		'instance' => $instance,
		'query'    => $pickup_posts_query,
	]
);

if ( ! wp_script_is( 'slick-carousel' ) ) {
	wp_enqueue_script(
		'slick-carousel',
		get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/packages/slick-carousel/slick/slick.min.js',
		[ 'jquery' ],
		filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/packages/slick-carousel/slick/slick.min.js' ),
		true
	);
}

if ( ! wp_script_is( 'wp-awesome-widgets-pickup-slider' ) ) {
	wp_enqueue_script(
		'wp-awesome-widgets-pickup-slider',
		get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/widget/pickup-slider.js',
		[ 'slick-carousel' ],
		filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/widget/pickup-slider.js' ),
		true
	);
}
