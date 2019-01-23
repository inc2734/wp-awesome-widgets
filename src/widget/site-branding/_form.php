<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-site-branding-widget wpaw-widget-form">
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Site description', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<textarea
			name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"
			class="widefat"
			rows="5"
			id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"
			rows="5"
		><?php echo esc_attr( $instance['description'] ); ?></textarea><br>
		<small><?php esc_html_e( 'HTML use allowed.', 'inc2734-wp-awesome-widgets' ); ?></small>
	</p>
</div>
