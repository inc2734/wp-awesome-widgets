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

<?php echo $args['before_widget']; ?>

	<div class="wpaw-slider" id="wpaw-slider-<?php echo esc_attr( $args['widget_id'] ); ?>">
		<div class="wpaw-slider__inner">
			<div class="wpaw-slider__canvas">
				<?php foreach( $instance['images'] as $image ) : ?>
					<div class="slick-slide" style="background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $image['src'], 'full' ) ); ?>);"></div>
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
			"arrows": false
		});
	});
	</script>

<?php echo $args['after_widget']; ?>
