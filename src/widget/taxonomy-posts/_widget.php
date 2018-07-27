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
$taxonomy    = get_taxonomy( $taxonomy_id );
$post_types  = empty( $taxonomy->object_type ) ? 'post' : $taxonomy->object_type;

$taxonomy_posts_query = new WP_Query( [
	'post_type'      => $post_types,
	'posts_per_page' => $instance['posts-per-page'],
	'tax_query'      => [
		[
			'taxonomy' => $taxonomy_id,
			'terms'    => $term_id,
		],
	],
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
	'suppress_filters'    => true,
] );

if ( ! $taxonomy_posts_query->have_posts() ) {
	return;
}
?>

<?php echo wp_kses_post( $args['before_widget'] ); ?>

	<?php if ( $instance['title'] ) : ?>
		<?php echo wp_kses_post( $args['before_title'] ); ?>
			<?php echo esc_html( $instance['title'] ); ?>
		<?php echo wp_kses_post( $args['after_title'] ); ?>
	<?php endif; ?>

	<div
		class="wpaw-taxonomy-posts wpaw-taxonomy-posts--<?php echo esc_attr( $args['widget_id'] ); ?>"
		id="wpaw-taxonomy-posts-<?php echo esc_attr( $args['widget_id'] ); ?>"
		>

		<ul class="wpaw-taxonomy-posts__list">
			<?php while ( $taxonomy_posts_query->have_posts() ) : ?>
				<?php $taxonomy_posts_query->the_post(); ?>
				<li class="wpaw-taxonomy-posts__item">
					<a href="<?php the_permalink(); ?>">

						<?php if ( $instance['show-thumbnail'] ) : ?>
							<div class="wpaw-taxonomy-posts__figure"
								style="background-image: url(<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), 'thumbnail' ) ); ?> )"
							></div>
						<?php endif; ?>

						<div class="wpaw-taxonomy-posts__body">
							<div class="wpaw-taxonomy-posts__title"><?php the_title(); ?></div>
							<div class="wpaw-taxonomy-posts__date"><?php the_time( get_option( 'date_format' ) ); ?></div>
						</div>

					</a>
				</li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul>
	</div>

<?php echo wp_kses_post( $args['after_widget'] ); ?>
