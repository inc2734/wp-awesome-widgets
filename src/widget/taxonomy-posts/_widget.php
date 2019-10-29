<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;

if ( empty( $instance['taxonomy'] ) ) {
	return;
}

$_taxonomy = explode( '@', $instance['taxonomy'] );
if ( 2 !== count( $_taxonomy ) ) {
	return;
}

$taxonomy_id = $_taxonomy[0];
$term_id     = $_taxonomy[1];
$_taxonomy   = get_taxonomy( $taxonomy_id );
$post_types  = empty( $_taxonomy->object_type ) ? 'post' : $_taxonomy->object_type;

if ( 0 === strpos( $args['widget_id'], 'inc2734_wp_awesome_widgets_taxonomy_posts-' ) ) {
	$widget_number = explode( '-', $args['widget_id'] );
	$widget_number = end( $widget_number );
} else {
	$widget_number = $args['widget_id'];
}

$query_args = [
	'post_type'        => $post_types,
	'posts_per_page'   => $instance['posts-per-page'],
	'suppress_filters' => true,
	'tax_query'        => [
		[
			'taxonomy' => $taxonomy_id,
			'terms'    => $term_id,
		],
	],
];
$query_args = apply_filters( 'inc2734_wp_awesome_widgets_taxonomy_posts_widget_args', $query_args );
$query_args = apply_filters( 'inc2734_wp_awesome_widgets_taxonomy_posts_widget_args_' . $widget_number, $query_args );

$taxonomy_posts_query = new WP_Query(
	array_merge(
		$query_args,
		[
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		]
	)
);

View::render(
	'taxonomy-posts',
	null,
	[
		'args'     => $args,
		'instance' => $instance,
		'query'    => $taxonomy_posts_query,
	]
);
