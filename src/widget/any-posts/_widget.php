<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;

$items = explode( ',', $instance['items'] );

$widget_number = explode( '-', $widget_args['widget_id'] );
if ( 1 < count( $widget_number ) ) {
	array_shift( $widget_number );
	$widget_number = implode( '-', $widget_number );
} else {
	$widget_number = $widget_number[0];
}

$query_args = array(
	'post_type'        => 'any',
	'posts_per_page'   => count( $items ),
	'post__in'         => $items,
	'orderby'          => 'post__in',
	'suppress_filters' => false,
);
$query_args = apply_filters( 'inc2734_wp_awesome_widgets_any_posts_widget_args', $query_args );
$query_args = apply_filters( 'inc2734_wp_awesome_widgets_any_posts_widget_args_' . $widget_number, $query_args );

if ( empty( $query_args['post__in'] ) ) {
	return;
}

$any_posts_query = new WP_Query(
	array_merge(
		$query_args,
		array(
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	)
);

View::render(
	'any-posts',
	null,
	array(
		'widget_args' => $widget_args,
		'instance'    => $instance,
		'query'       => $any_posts_query,
	)
);
