<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;

$query_args = [
	'post_type'        => 'any',
	'posts_per_page'   => -1,
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

if ( 0 === strpos( $args['widget_id'], 'inc2734_wp_awesome_widgets_pickup_slider-' ) ) {
	$widget_number = explode( '-', $args['widget_id'] );
	$widget_number = end( $widget_number );
} else {
	$widget_number = $args['widget_id'];
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
