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

	<?php if ( $instance['title'] ) : ?>
		<?php echo wp_kses_post( $widget_args['before_title'] ); ?>
			<?php echo wp_kses_post( $instance['title'] ); ?>
		<?php echo wp_kses_post( $widget_args['after_title'] ); ?>
	<?php endif; ?>

	<div
		class="wpaw-recent-posts wpaw-recent-posts--<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		id="wpaw-recent-posts-<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		>

		<ul class="wpaw-recent-posts__list wpaw-posts-list">
			<?php while ( $query->have_posts() ) : ?>
				<?php $query->the_post(); ?>
				<li class="wpaw-recent-posts__item wpaw-posts-list__item">
					<a href="<?php the_permalink(); ?>">

						<?php if ( $instance['show-thumbnail'] ) : ?>
							<div class="wpaw-recent-posts__figure wpaw-posts-list__figure">
								<?php
								$thumbnail_size = apply_filters( 'inc2734_wp_awesome_widgets_posts_list_image_size', 'thumbnail', wp_is_mobile(), $widget_args['widget_id'] );
								the_post_thumbnail( $thumbnail_size );
								?>
							</div>
						<?php endif; ?>

						<div class="wpaw-recent-posts__body wpaw-posts-list__body">
							<?php
							$taxonomies = get_post_taxonomies( get_the_ID() );
							$_taxonomy  = ! empty( $taxonomies[0] ) ? $taxonomies[0] : false;
							$terms      = ( $_taxonomy ) ? get_the_terms( get_the_ID(), $_taxonomy ) : [];
							?>
							<?php if ( $instance['show-taxonomy'] && $terms ) : ?>
								<div class="wpaw-recent-posts__taxonomy wpaw-posts-list__taxonomy">
									<?php foreach ( $terms as $_term ) : ?>
										<span class="wpaw-term wpaw-term--<?php echo esc_attr( $_taxonomy ); ?>-<?php echo esc_attr( $_term->term_id ); ?> wpaw-recent-posts__term">
											<?php echo esc_html( $_term->name ); ?>
										</span>
										<?php break; ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

							<div class="wpaw-recent-posts__title wpaw-posts-list__title"><?php the_title(); ?></div>
							<div class="wpaw-recent-posts__date wpaw-posts-list__date"><?php the_time( get_option( 'date_format' ) ); ?></div>
						</div>

					</a>
				</li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul>
	</div>

<?php echo wp_kses_post( $widget_args['after_widget'] ); ?>
