<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\Helper;

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
			'orderby'             => 'menu_order',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
			'suppress_filters'    => true,
		]
	);
	if ( ! $descendants_query->have_posts() ) {
		return;
	}
}
?>

<?php echo wp_kses_post( $args['before_widget'] ); ?>

	<div
		class="wpaw-local-nav wpaw-local-nav--<?php echo esc_attr( $instance['direction'] ); ?> wpaw-local-nav--<?php echo esc_attr( $args['widget_id'] ); ?>"
		id="wpaw-local-nav-<?php echo esc_attr( $args['widget_id'] ); ?>"
		>

		<?php
		Helper::the_local_nav(
			$founder_id,
			get_the_ID(),
			[
				'list-class'                   => 'wpaw-local-nav__list',
				'item-class'                   => 'wpaw-local-nav__item',
				'sublist-class'                => 'wpaw-local-nav__sublist',
				'subitem-class'                => 'wpaw-local-nav__subitem',
				'limit'                        => 'horizontal' === $instance['direction'] ? 1 : -1,
				'display-top-level-page-title' => $instance['display-top-level-page-title'],
			]
		);
		?>
	</div>

<?php echo wp_kses_post( $args['after_widget'] ); ?>
