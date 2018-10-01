<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

$items = explode( ',', $instance['items'] );
if ( ! $items ) {
	return;
}

$carousel_any_posts_query = new WP_Query(
	[
		'post_type'           => 'any',
		'posts_per_page'      => count( $items ),
		'post__in'            => $items,
		'orderby'             => 'post__in',
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
		'suppress_filters'    => true,
	]
);

if ( ! $carousel_any_posts_query->have_posts() ) {
	return;
}
?>

<?php echo wp_kses_post( $args['before_widget'] ); ?>

	<div
		class="wpaw-carousel wpaw-carousel-any-posts wpaw-carousel-any-posts--<?php echo esc_attr( $args['widget_id'] ); ?>"
		id="wpaw-carousel-any-posts-<?php echo esc_attr( $args['widget_id'] ); ?>"
		>
		<div class="wpaw-carousel__inner">
			<div class="wpaw-carousel__canvas">
				<?php while ( $carousel_any_posts_query->have_posts() ) : ?>
					<?php
					$carousel_any_posts_query->the_post();
					$thumbnail_size = wp_is_mobile() ? 'large' : 'full';
					$thumbnail_size = apply_filters( 'inc2734_wp_awesome_widgets_carousel_image_size', $thumbnail_size, wp_is_mobile(), $args['widget_id'] );
					?>
					<a
						class="wpaw-carousel__item"
						href="<?php the_permalink(); ?>"
						>
						<div class="wpaw-carousel__figure">
							<?php the_post_thumbnail( $thumbnail_size ); ?>
						</div>
						<div class="wpaw-carousel__item-body">
							<?php
							$taxonomies = get_post_taxonomies( get_the_ID() );
							$_taxonomy  = ! empty( $taxonomies[0] ) ? $taxonomies[0] : false;
							$terms      = ( $_taxonomy ) ? get_the_terms( get_the_ID(), $_taxonomy ) : [];
							?>
							<?php if ( $terms ) : ?>
								<div class="wpaw-carousel__taxonomy">
									<?php foreach ( $terms as $_term ) : ?>
										<span class="wpaw-term wpaw-term--<?php echo esc_attr( $_taxonomy ); ?>-<?php echo esc_attr( $_term->term_id ); ?> wpaw-carousel__term">
											<?php echo esc_html( $_term->name ); ?>
										</span>
										<?php break; ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

							<div class="wpaw-carousel__item-title">
								<?php
								$num_words = class_exists( 'multibyte_patch' ) ? 40 : 80;
								if ( $num_words ) {
									ob_start();
									the_title();
									$_title = wp_trim_words( ob_get_clean(), $num_words );
									echo esc_html( $_title );
								} else {
									the_title();
								}
								?>
							</div>
						</div>
					</a>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>

<?php echo wp_kses_post( $args['after_widget'] ); ?>
