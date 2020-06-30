<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;

$items = explode( ',', $instance['items'] );

$widget_number = explode( '-', $args['widget_id'] );
if ( 1 < count( $widget_number ) ) {
	array_shift( $widget_number );
	$widget_number = implode( '-', $widget_number );
} else {
	$widget_number = $widget_number[0];
}

$query_args = [
	'post_type'        => 'any',
	'posts_per_page'   => count( $items ),
	'post__in'         => $items,
	'orderby'          => 'post__in',
	'suppress_filters' => true,
];
$query_args = apply_filters( 'inc2734_wp_awesome_widgets_carousel_any_posts_widget_args', $query_args );
$query_args = apply_filters( 'inc2734_wp_awesome_widgets_carousel_any_posts_widget_args_' . $widget_number, $query_args );

if ( empty( $query_args['post__in'] ) ) {
	return;
}

$carousel_any_posts_query = new WP_Query(
	array_merge(
		$query_args,
		[
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		]
	)
);

View::render(
	'carousel-any-posts',
	null,
	[
		'args'     => $args,
		'instance' => $instance,
		'query'    => $carousel_any_posts_query,
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

if ( ! wp_script_is( 'wp-awesome-widgets-carousel-any-posts' ) ) {
	wp_enqueue_script(
		'wp-awesome-widgets-carousel-any-posts',
		get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/widget/carousel-any-posts.js',
		[ 'slick-carousel' ],
		filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/widget/carousel-any-posts.js' ),
		true
	);
}
