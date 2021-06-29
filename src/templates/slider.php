<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<?php echo wp_kses_post( $widget_args['before_widget'] ); ?>
	<style>
		<?php foreach ( $instance['images'] as $key => $image ) : ?>
			.wpaw-slider--<?php echo esc_attr( $widget_args['widget_id'] ); ?> .wpaw-slider__item--<?php echo esc_html( $key ); ?> .wpaw-slider__item-title,
			.wpaw-slider--<?php echo esc_attr( $widget_args['widget_id'] ); ?> .wpaw-slider__item--<?php echo esc_html( $key ); ?> .wpaw-slider__item-summary,
			.wpaw-slider--<?php echo esc_attr( $widget_args['widget_id'] ); ?> .wpaw-slider__item--<?php echo esc_html( $key ); ?> .wpaw-slider__item-summary a {
				color: <?php echo esc_html( $image['text-color'] ); ?>;
			}
			.wpaw-slider--<?php echo esc_attr( $widget_args['widget_id'] ); ?> .wpaw-slider__item--<?php echo esc_html( $key ); ?> .wpaw-slider__item-more--ghost {
				border-color: <?php echo esc_html( $image['text-color'] ); ?>;
				color: <?php echo esc_html( $image['text-color'] ); ?>;
			}
		<?php endforeach; ?>
	</style>

	<div
		class="wpaw-slider wpaw-slider--<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		id="wpaw-slider-<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		data-wpaw-slider-duration="<?php echo esc_attr( $instance['duration'] ); ?>"
		data-wpaw-slider-interval="<?php echo esc_attr( $instance['interval'] ); ?>"
		data-wpaw-slider-slides-to-show="<?php echo esc_attr( $instance['slides-to-show'] ); ?>"
		data-wpaw-slider-slides-to-scroll="<?php echo esc_attr( $instance['slides-to-scroll'] ); ?>"
		data-wpaw-slider-fade="<?php echo esc_attr( 'fade' === $instance['type'] ? 'true' : 'false' ); ?>"
		>

		<div class="wpaw-slider__inner">
			<div class="wpaw-slider__canvas">
				<?php foreach ( $instance['images'] as $key => $image ) : ?>
					<?php
					$thumbnail_size = apply_filters( 'inc2734_wp_awesome_widgets_slider_image_size', 'full', wp_is_mobile(), $widget_args['widget_id'] );
					$is_block_link  = ! empty( $image['link-url'] ) && empty( $image['link-text'] );
					$wrapper_tag    = $is_block_link ? 'a' : 'div';
					?>
					<div>
						<<?php echo esc_attr( $wrapper_tag ); ?>
							<?php if ( $is_block_link ) : ?>
								href="<?php echo esc_url( $image['link-url'] ); ?>"
							<?php endif; ?>
							class="wpaw-slider__item wpaw-slider__item--<?php echo esc_attr( $key ); ?>"
							>

							<div class="wpaw-slider__figure">
								<?php echo wp_get_attachment_image( $image['src'], $thumbnail_size ); ?>
							</div>

							<?php if ( 0 < $image['mask-opacity'] ) : ?>
								<div class="wpaw-slider__mask"
									style="background-color: <?php echo esc_attr( sanitize_hex_color( $image['mask-color'] ) ); ?>; opacity: <?php echo esc_attr( $image['mask-opacity'] ); ?>"
								></div>
							<?php endif; ?>

							<?php if ( ! empty( $image['title'] ) || ! empty( $image['summary'] ) || ! empty( $image['link-url'] ) && ! empty( $image['link-text'] ) ) : ?>
								<div class="wpaw-slider__item-body">
									<div class="wpaw-slider__item-content">
										<?php if ( ! empty( $image['title'] ) ) : ?>
											<div class="wpaw-slider__item-title">
												<?php echo wp_kses_post( $image['title'] ); ?>
											</div>
										<?php endif; ?>

										<?php if ( ! empty( $image['summary'] ) ) : ?>
											<div class="wpaw-slider__item-summary">
												<?php echo wp_kses_post( wpautop( $image['summary'] ) ); ?>
											</div>
										<?php endif; ?>

										<?php if ( ! empty( $image['link-url'] ) && ! empty( $image['link-text'] ) ) : ?>
											<div class="wpaw-slider__item-action">
												<?php
												$classes = [ 'wpaw-slider__item-more' ];
												if ( 'ghost' === $image['btn-type'] ) {
													$classes[] = 'wpaw-slider__item-more--ghost';
												}
												?>
												<a class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>" href="<?php echo esc_url( $image['link-url'] ); ?>"><?php echo esc_html( $image['link-text'] ); ?></a>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
						</<?php echo esc_attr( $wrapper_tag ); ?>>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

<?php echo wp_kses_post( $widget_args['after_widget'] ); ?>
