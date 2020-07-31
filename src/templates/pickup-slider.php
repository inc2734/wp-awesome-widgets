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

	<?php
	$is_block_link = 'overall' === $instance['link-type'];
	$wrapper_tag   = $is_block_link ? 'a' : 'div';
	$button_tag    = $is_block_link ? 'span' : 'a';
	?>

	<div
		class="wpaw-pickup-slider wpaw-pickup-slider--<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		id="wpaw-pickup-slider-<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		>
		<div class="wpaw-pickup-slider__inner">
			<div class="wpaw-pickup-slider__canvas">
				<?php while ( $query->have_posts() ) : ?>
					<?php
					$query->the_post();
					$thumbnail_size = wp_is_mobile() ? 'large' : 'full';
					$thumbnail_size = apply_filters( 'inc2734_wp_awesome_widgets_pickup_slider_image_size', $thumbnail_size, wp_is_mobile(), $widget_args['widget_id'] );
					?>
					<div>
						<<?php echo esc_attr( $wrapper_tag ); ?>
							class="wpaw-pickup-slider__item"
							<?php if ( $is_block_link ) : ?>
								href="<?php the_permalink(); ?>"
							<?php endif; ?>
							>
							<div class="wpaw-pickup-slider__figure">
								<?php the_post_thumbnail( $thumbnail_size ); ?>
							</div>
							<div class="wpaw-pickup-slider__item-body">
								<div class="wpaw-pickup-slider__item-content">
									<div class="wpaw-pickup-slider__item-title">
										<?php the_title(); ?>
									</div>
									<ul class="wpaw-pickup-slider__item-meta c-meta">
										<li class="c-meta__item c-meta__item--author"><?php echo get_avatar( get_post()->post_author ); ?><?php echo esc_html( get_the_author() ); ?></li>
										<li class="c-meta__item"><?php echo esc_html( get_the_time( get_option( 'date_format' ) ) ); ?></li>
									</ul>

									<<?php echo esc_attr( $button_tag ); ?>
										class="wpaw-pickup-slider__item-more"
										<?php if ( ! $is_block_link ) : ?>
											href="<?php the_permalink(); ?>"
										<?php endif; ?>
										>
										<?php esc_html_e( 'READ MORE', 'inc2734-wp-awesome-widgets' ); ?>
									</<?php echo esc_attr( $button_tag ); ?>>
								</div>
							</div>
						</<?php echo esc_attr( $wrapper_tag ); ?>>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>

<?php echo wp_kses_post( $widget_args['after_widget'] ); ?>
