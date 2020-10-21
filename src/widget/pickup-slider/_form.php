<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-pickup-slider-widget wpaw-widget-form">
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

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'link-type' ) ); ?>"><?php esc_html_e( 'Link type', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'link-type' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'link-type' ) ); ?>"
			class="widefat"
		>
			<?php
			$link_types = [
				'button'  => __( 'Button link', 'inc2734-wp-awesome-widgets' ),
				'overall' => __( 'Overall link', 'inc2734-wp-awesome-widgets' ),
			];
			?>
			<?php foreach ( $link_types as $link_type => $label ) : ?>
				<option value="<?php echo esc_attr( $link_type ); ?>" <?php selected( $link_type, $instance['link-type'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ); ?>"><?php esc_html_e( 'Maximum number of displays', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="number"
			name="<?php echo esc_attr( $this->get_field_name( 'posts_per_page' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ); ?>"
			value="<?php echo esc_attr( $instance['posts_per_page'] ); ?>"
			min="0"
		><br>
		<small><?php esc_html_e( 'If "0", all items are displayed.', 'inc2734-wp-awesome-widgets' ); ?></small>
	</p>
</div>
