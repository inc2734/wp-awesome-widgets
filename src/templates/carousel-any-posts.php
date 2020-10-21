<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! $query->have_posts() ) {
	return;
}
?>

<?php echo wp_kses_post( $widget_args['before_widget'] ); ?>

	<div
		class="wpaw-carousel wpaw-carousel-any-posts wpaw-carousel-any-posts--<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		id="wpaw-carousel-any-posts-<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		>
		<div class="wpaw-carousel__inner">

			<?php if ( $instance['title'] ) : ?>
				<?php echo wp_kses_post( $widget_args['before_title'] ); ?>
					<?php echo wp_kses_post( $instance['title'] ); ?>
				<?php echo wp_kses_post( $widget_args['after_title'] ); ?>
			<?php endif; ?>

			<div class="wpaw-carousel__canvas">
				<?php while ( $query->have_posts() ) : ?>
					<?php
					$query->the_post();
					$thumbnail_size = apply_filters( 'inc2734_wp_awesome_widgets_carousel_image_size', 'large', wp_is_mobile(), $widget_args['widget_id'] );
					?>
					<a
						class="wpaw-carousel__item"
						href="<?php the_permalink(); ?>"
						>
						<div class="wpaw-carousel__item-figure">
							<?php the_post_thumbnail( $thumbnail_size ); ?>
						</div>
						<div class="wpaw-carousel__item-body">
							<?php
							$taxonomies = get_post_taxonomies( get_the_ID() );
							$_taxonomy  = ! empty( $taxonomies[0] ) ? $taxonomies[0] : false;
							$terms      = ( $_taxonomy ) ? get_the_terms( get_the_ID(), $_taxonomy ) : [];
							?>
							<?php if ( $terms ) : ?>
								<div class="wpaw-carousel__item-taxonomy">
									<?php foreach ( $terms as $_term ) : ?>
										<span class="wpaw-term wpaw-term--<?php echo esc_attr( $_taxonomy ); ?>-<?php echo esc_attr( $_term->term_id ); ?> wpaw-carousel__item-term">
											<?php echo esc_html( $_term->name ); ?>
										</span>
										<?php break; ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

							<div class="wpaw-carousel__item-title">
								<?php
								// phpcs:disable WordPress.WP.I18n.MissingArgDomain
								$num_words            = 80;
								$excerpt_length_ratio = 55 / _x( '55', 'excerpt_length' );
								$num_words            = $num_words * $excerpt_length_ratio;
								// phpcs:enable
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

<?php echo wp_kses_post( $widget_args['after_widget'] ); ?>
