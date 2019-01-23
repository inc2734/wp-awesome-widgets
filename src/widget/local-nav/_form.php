<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-local-nav-widget wpaw-widget-form">
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'direction' ) ); ?>"><?php esc_html_e( 'Direction', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'direction' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'direction' ) ); ?>"
			class="widefat"
		>
			<?php
			$directions = [
				'vertical'   => __( 'Vertical', 'inc2734-wp-awesome-widgets' ),
				'horizontal' => __( 'Horizontal', 'inc2734-wp-awesome-widgets' ),
			];
			?>
			<?php foreach ( $directions as $key => $label ) : ?>
				<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['direction'], $key ); ?>>
					<?php echo esc_html( $label ); ?>
				</option>
			<?php endforeach; ?>
		</select>
	</p>

	<p>
		<input type="hidden" name="<?php echo esc_attr( $this->get_field_name( 'display-top-level-page-title' ) ); ?>" value="0">
		<input
			type="checkbox"
			name="<?php echo esc_attr( $this->get_field_name( 'display-top-level-page-title' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'display-top-level-page-title' ) ); ?>"
			value="1"
			<?php checked( $instance['display-top-level-page-title'], 1 ); ?>
		>
		<label for="<?php echo esc_attr( $this->get_field_id( 'display-top-level-page-title' ) ); ?>"><?php esc_html_e( 'Display the page title of the top-level', 'inc2734-wp-awesome-widgets' ); ?></label>
	</p>

	<p>
		<input type="hidden" name="<?php echo esc_attr( $this->get_field_name( 'display-only-have-descendants' ) ); ?>" value="0">
		<input
			type="checkbox"
			name="<?php echo esc_attr( $this->get_field_name( 'display-only-have-descendants' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'display-only-have-descendants' ) ); ?>"
			value="1"
			<?php checked( $instance['display-only-have-descendants'], 1 ); ?>
		>
		<label for="<?php echo esc_attr( $this->get_field_id( 'display-only-have-descendants' ) ); ?>"><?php esc_html_e( 'Display only when you have descendants', 'inc2734-wp-awesome-widgets' ); ?></label>
	</p>
</div>
