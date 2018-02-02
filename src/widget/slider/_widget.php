<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

$fade = 'false';
if ( 'fade' === $instance['type'] ) {
	$fade = 'true';
}
?>

<?php echo wp_kses_post( $args['before_widget'] ); ?>

	<div class="wpaw-slider" id="wpaw-slider-<?php echo esc_attr( $args['widget_id'] ); ?>">
		<div class="wpaw-slider__inner">
			<div class="wpaw-slider__canvas">
				<?php foreach ( $instance['images'] as $image ) : ?>
					<div>
						<div class="wpaw-slider__item" style="background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $image['src'], 'full' ) ); ?>);">
							<?php if ( 0 < $image['mask-opacity'] ) : ?>
								<div class="wpaw-slider__mask"
									style="background-color: <?php echo esc_attr( sanitize_hex_color( $image['mask-color'] ) ); ?>; opacity: <?php echo esc_attr( $image['mask-opacity'] ); ?>"
								></div>
							<?php endif; ?>

							<?php if ( ! empty( $image['title'] ) || ! empty( $image['summary'] ) || ! empty( $image['link-url'] ) && ! empty( $image['link-text'] ) ) : ?>
								<div class="wpaw-slider__item-body">
									<div class="wpaw-slider__item-content">
										<?php if ( ! empty( $image['title'] ) ) : ?>
											<div class="wpaw-slider__item-title"><?php echo esc_html( $image['title'] ); ?></div>
										<?php endif; ?>

										<?php if ( ! empty( $image['summary'] ) ) : ?>
											<div class="wpaw-slider__item-summary"><?php echo esc_html( $image['summary'] ); ?></div>
										<?php endif; ?>

										<?php if ( ! empty( $image['link-url'] ) && ! empty( $image['link-text'] ) ) : ?>
											<div class="wpaw-slider__item-action">
												<a class="wpaw-slider__item-more" href="<?php echo esc_url( $image['link-url'] ); ?>"><?php echo esc_html( $image['link-text'] ); ?></a>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<script>
	jQuery(function($) {
		$('#wpaw-slider-<?php echo esc_attr( $args['widget_id'] ); ?> .wpaw-slider__canvas').slick({
			"speed": <?php echo esc_js( $instance['duration'] ); ?>,
			"autoplaySpeed": <?php echo esc_js( $instance['interval'] ); ?>,
			"slidesToShow": <?php echo esc_js( $instance['slides-to-show'] ); ?>,
			"slidesToScroll": <?php echo esc_js( $instance['slides-to-scroll'] ); ?>,
			"autoplay": true,
			"fade": <?php echo esc_js( $fade ); ?>,
			"dots": true,
			"infinite": true,
			"adaptiveHeight": true,
			"arrows": false,
			"responsive": [
				{
					"breakpoint": 1024,
					"settings": {
						"slidesToShow": 1,
						"slidesToScroll": 1
					}
				}
			]
		});
	});
	</script>

<?php echo wp_kses_post( $args['after_widget'] ); ?>
