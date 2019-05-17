<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

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

$widget_id = explode( '-', $args['widget_id'] );
$widget_id = end( $widget_id );

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
$query_args = apply_filters( 'inc2734_wp_awesome_widgets_taxonomy_posts_widget_args_' . $widget_id, $query_args );

$taxonomy_posts_query = new WP_Query(
	array_merge(
		$query_args,
		[
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		]
	)
);

if ( ! $taxonomy_posts_query->have_posts() ) {
	return;
}
?>

<?php echo wp_kses_post( $args['before_widget'] ); ?>

	<?php if ( $instance['title'] ) : ?>
		<?php echo wp_kses_post( $args['before_title'] ); ?>
			<?php echo wp_kses_post( $instance['title'] ); ?>
		<?php echo wp_kses_post( $args['after_title'] ); ?>
	<?php endif; ?>

	<div
		class="wpaw-taxonomy-posts wpaw-taxonomy-posts--<?php echo esc_attr( $args['widget_id'] ); ?>"
		id="wpaw-taxonomy-posts-<?php echo esc_attr( $args['widget_id'] ); ?>"
		>

		<ul class="wpaw-taxonomy-posts__list wpaw-posts-list">
			<?php while ( $taxonomy_posts_query->have_posts() ) : ?>
				<?php $taxonomy_posts_query->the_post(); ?>
				<li class="wpaw-taxonomy-posts__item wpaw-posts-list__item">
					<a href="<?php the_permalink(); ?>">

						<?php if ( $instance['show-thumbnail'] ) : ?>
							<div class="wpaw-taxonomy-posts__figure wpaw-posts-list__figure">
								<?php the_post_thumbnail( 'thumbnail' ); ?>
							</div>
						<?php endif; ?>

						<div class="wpaw-taxonomy-posts__body wpaw-posts-list__body">
							<div class="wpaw-taxonomy-posts__title wpaw-posts-list__title"><?php the_title(); ?></div>
							<div class="wpaw-taxonomy-posts__date wpaw-posts-list__date"><?php the_time( get_option( 'date_format' ) ); ?></div>
						</div>

					</a>
				</li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul>
	</div>

<?php echo wp_kses_post( $args['after_widget'] ); ?>
