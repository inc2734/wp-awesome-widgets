<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-pickup-slider-widget">
	<p>
		<?php esc_html_e( 'Posts tagged as "pickup" are displayed as slider.', 'inc2734-wp-awesome-widgets' ); ?>
	</p>

	<p>
		<input type="hidden" name="<?php echo esc_attr( $this->get_field_name( 'random' ) ); ?>" value="0">
		<input
			type="checkbox"
			name="<?php echo esc_attr( $this->get_field_name( 'random' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'random' ) ); ?>"
			value="1"
			<?php checked( $instance['random'], 1 ); ?>
		>
		<label for="<?php echo esc_attr( $this->get_field_id( 'random' ) ); ?>"><?php esc_html_e( 'Display in random order', 'inc2734-wp-awesome-widgets' ); ?></label>
	</p>
</div>
