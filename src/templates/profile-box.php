<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<?php echo wp_kses_post( $widget_args['before_widget'] ); ?>

	<div
		class="wpaw-profile-box wpaw-profile-box--<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		id="wpaw-profile-box-<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		>

		<?php echo do_shortcode( '[wp_profile_box title="' . $instance['title'] . '"]' ); ?>
	</div>

<?php echo wp_kses_post( $widget_args['after_widget'] ); ?>
