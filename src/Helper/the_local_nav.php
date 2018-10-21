<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets\Helper;

/**
 * Display local navigation.
 * It can stop with child's display.
 *
 * @param int $founder_id
 * @param int $current_page_id
 * @param array $args
 * @return void
 */
function the_local_nav( $founder_id, $current_page_id, $args = [] ) {
	$args = wp_parse_args(
		$args,
		[
			'list-class'                   => '',
			'item-class'                   => '',
			'sublist-class'                => '',
			'subitem-class'                => '',
			'limit'                        => -1,
			'display-top-level-page-title' => 1,
		]
	);
	?>
	<ul class="<?php echo esc_attr( $args['list-class'] ); ?>">
		<li class="<?php echo esc_attr( $args['item-class'] ); ?>">
			<?php if ( $args['display-top-level-page-title'] ) : ?>
				<a href="<?php the_permalink( $founder_id ); ?>">
					<?php echo esc_html( get_the_title( $founder_id ) ); ?>
				</a>
			<?php endif; ?>

			<?php the_child_nav( $founder_id, $current_page_id, $args ); ?>
		</li>
	</ul>
	<?php
}
