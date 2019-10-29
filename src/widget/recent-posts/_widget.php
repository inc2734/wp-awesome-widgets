<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;

if ( 0 === strpos( $args['widget_id'], 'inc2734_wp_awesome_widgets_recent_posts-' ) ) {
	$widget_number = explode( '-', $args['widget_id'] );
	$widget_number = end( $widget_number );
} else {
	$widget_number = $args['widget_id'];
}

$query_args = [
	'post_type'        => $instance['post-type'],
	'posts_per_page'   => $instance['posts-per-page'],
	'suppress_filters' => true,
];
$query_args = apply_filters( 'inc2734_wp_awesome_widgets_recent_posts_widget_args', $query_args );
$query_args = apply_filters( 'inc2734_wp_awesome_widgets_recent_posts_widget_args_' . $widget_number, $query_args );

$recent_posts_query = new WP_Query(
	array_merge(
		$query_args,
		[
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		]
	)
);

View::render(
	'recent-posts',
	null,
	[
		'args'     => $args,
		'instance' => $instance,
		'query'    => $recent_posts_query,
	]
);
