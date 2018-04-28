<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

add_action( 'wp_footer', function() use ( $args, $instance ) {
	$fade = 'false';
	if ( 'fade' === $instance['type'] ) {
		$fade = 'true';
	}
	?>
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
	<?php
}, 9999 );
?>

<?php echo wp_kses_post( $args['before_widget'] ); ?>
	<style>
		<?php foreach ( $instance['images'] as $key => $image ) : ?>
			.wpaw-slider--<?php echo esc_attr( $args['widget_id'] ); ?> .wpaw-slider__item--<?php echo esc_html( $key ); ?> .wpaw-slider__item-title,
			.wpaw-slider--<?php echo esc_attr( $args['widget_id'] ); ?> .wpaw-slider__item--<?php echo esc_html( $key ); ?> .wpaw-slider__item-summary,
			.wpaw-slider--<?php echo esc_attr( $args['widget_id'] ); ?> .wpaw-slider__item--<?php echo esc_html( $key ); ?> .wpaw-slider__item-summary a {
				color: <?php echo esc_html( $image['text-color'] ); ?>;
			}
			.wpaw-slider--<?php echo esc_attr( $args['widget_id'] ); ?> .wpaw-slider__item--<?php echo esc_html( $key ); ?> .wpaw-slider__item-more {
				border-color: <?php echo esc_html( $image['text-color'] ); ?>;
				color: <?php echo esc_html( $image['text-color'] ); ?>;
			}
		<?php endforeach; ?>
	</style>

	<div class="wpaw-slider wpaw-slider--<?php echo esc_attr( $args['widget_id'] ); ?>" id="wpaw-slider-<?php echo esc_attr( $args['widget_id'] ); ?>" data-wpaw-slide-slides-to-show="<?php echo esc_attr( $instance['slides-to-show'] ); ?>">
		<div class="wpaw-slider__inner">
			<div class="wpaw-slider__canvas">
				<?php foreach ( $instance['images'] as $key => $image ) : ?>
					<div>
						<div class="wpaw-slider__item wpaw-slider__item--<?php echo esc_attr( $key ); ?>" style="background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $image['src'], 'full' ) ); ?>);">
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
												<?php echo esc_html( $image['title'] ); ?>
											</div>
										<?php endif; ?>

										<?php if ( ! empty( $image['summary'] ) ) : ?>
											<div class="wpaw-slider__item-summary">
												<?php echo wp_kses_post( wpautop( $image['summary'] ) ); ?>
											</div>
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

<?php echo wp_kses_post( $args['after_widget'] ); ?>
