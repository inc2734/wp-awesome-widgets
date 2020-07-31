<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;

if ( ! is_singular() ) {
	return;
}

if ( ! is_post_type_hierarchical( get_post_type() ) ) {
	return;
}

$founder_id = get_the_ID();
$ancestors  = get_post_ancestors( get_the_ID() );
if ( $ancestors ) {
	$founder_id = end( $ancestors );
}

if ( $instance['display-only-have-descendants'] ) {
	$descendants_query = new \WP_Query(
		[
			'post_type'           => get_post_type(),
			'posts_per_page'      => 50,
			'post_parent'         => $founder_id,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
			'suppress_filters'    => false,
			'orderby'             => [
				'menu_order' => 'ASC',
				'ID'         => 'DESC',
			],
		]
	);

	if ( ! $descendants_query->have_posts() ) {
		return;
	}
}

View::render(
	'local-nav',
	null,
	[
		'widget_args' => $widget_args,
		'instance'    => $instance,
		'founder_id'  => $founder_id,
	]
);
