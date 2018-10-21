<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets\Helper;

/**
 * Display descendant pages of specified page
 *
 * @param int $parent_id
 * @param int $current_page_id
 * @param array $args
 * @return void
 */
function the_child_nav( $parent_id, $current_page_id, $args ) {
	if ( wp_get_post_parent_id( get_the_ID() ) === $current_page_id ) {
		return;
	}

	if ( get_the_id() !== $current_page_id
			 && ! in_array( $current_page_id, get_post_ancestors( get_the_id() ) )
			 && ! in_array( get_the_ID(), get_post_ancestors( $current_page_id ) ) ) {
		return;
	}

	$args = wp_parse_args(
		$args,
		[
			'sublist-class' => '',
			'subitem-class' => '',
			'limit'         => -1,
		]
	);

	$children_query = new \WP_Query(
		[
			'post_type'           => get_post_type(),
			'posts_per_page'      => 50,
			'post_parent'         => $parent_id,
			'orderby'             => 'menu_order',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
			'suppress_filters'    => true,
		]
	);
	if ( ! $children_query->have_posts() ) {
		return;
	}
	?>
	<ul class="<?php echo esc_attr( $args['sublist-class'] ); ?>">
		<?php while ( $children_query->have_posts() ) : ?>
			<?php $children_query->the_post(); ?>
			<li class="<?php echo esc_attr( $args['subitem-class'] ); ?>">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php
				if ( -1 >= $args['limit'] || 0 < $args['limit'] ) {
					$args['limit'] --;
					the_child_nav( get_the_ID(), $current_page_id, $args );
				}
				?>
			</li>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</ul>
	<?php
}
