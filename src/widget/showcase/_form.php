<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-showcase-widget wpaw-widget-form">
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="text"
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['title'] ); ?>"
		>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'lead' ) ); ?>"><?php esc_html_e( 'Lead', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<textarea
			name="<?php echo esc_attr( $this->get_field_name( 'lead' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'lead' ) ); ?>"
			class="widefat"
			rows="5"
		><?php echo esc_textarea( $instance['lead'] ); ?></textarea>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'format' ) ); ?>"><?php esc_html_e( 'Format', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'format' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'format' ) ); ?>"
			class="widefat"
		>
			<?php
			$formats = [
				'format-1',
				'format-2',
				'format-3',
			];
			?>
			<?php foreach ( $formats as $format ) : ?>
				<option value="<?php echo esc_attr( $format ); ?>" <?php selected( $format, $instance['format'], true ); ?>><?php echo esc_html( $format ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>

	<div class="wpaw-thumbnail-field">
		<label for="<?php echo esc_attr( $this->get_field_id( 'bg-image' ) ); ?>"><?php esc_html_e( 'Background image', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<span class="wpaw-thumbnail-field__thumbnail">
			<?php echo wp_get_attachment_image( $instance['bg-image'], 'medium' ); ?>
		</span>
		<div class="wpaw-thumbnail-field__buttons">
			<button class="button wpaw-thumbnail-field__set-image-btn">
				<?php esc_html_e( 'Set image', 'inc2734-wp-awesome-widgets' ); ?>
			</button>
			<button class="button wpaw-thumbnail-field__unset-image-btn">
				<?php esc_html_e( 'Unset', 'inc2734-wp-awesome-widgets' ); ?>
			</button>
		</div>

		<input
			class="wpaw-thumbnail-field__input-image"
			type="hidden"
			name="<?php echo esc_attr( $this->get_field_name( 'bg-image' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'bg-image' ) ); ?>"
			value="<?php echo esc_attr( $instance['bg-image'] ); ?>"
		>
	</div>

	<p class="wpaw-color-picker-field">
		<label for="<?php echo esc_attr( $this->get_field_id( 'mask-color' ) ); ?>"><?php esc_html_e( 'Background mask color', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			class="wpaw-color-picker-field__input"
			type="text"
			name="<?php echo esc_attr( $this->get_field_name( 'mask-color' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'mask-color' ) ); ?>"
			value="<?php echo esc_attr( $instance['mask-color'] ); ?>"
		>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'mask-opacity' ) ); ?>"><?php esc_html_e( 'Background mask transparency', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="text"
			name="<?php echo esc_attr( $this->get_field_name( 'mask-opacity' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'mask-opacity' ) ); ?>"
			value="<?php echo esc_attr( $instance['mask-opacity'] ); ?>"
		>
	</p>

	<p class="wpaw-color-picker-field">
		<label for="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>"><?php esc_html_e( 'Text color', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			class="wpaw-color-picker-field__input"
			type="text"
			name="<?php echo esc_attr( $this->get_field_name( 'color' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>"
			value="<?php echo esc_attr( $instance['color'] ); ?>"
		>
	</p>

	<div class="wpaw-thumbnail-field">
		<label for="<?php echo esc_attr( $this->get_field_id( 'thumbnail' ) ); ?>"><?php esc_html_e( 'Thumbnail', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<span class="wpaw-thumbnail-field__thumbnail">
			<?php echo wp_get_attachment_image( $instance['thumbnail'], 'medium' ); ?>
		</span>
		<div class="wpaw-thumbnail-field__buttons">
			<button class="button wpaw-thumbnail-field__set-image-btn">
				<?php esc_html_e( 'Set image', 'inc2734-wp-awesome-widgets' ); ?>
			</button>
			<button class="button wpaw-thumbnail-field__unset-image-btn">
				<?php esc_html_e( 'Unset', 'inc2734-wp-awesome-widgets' ); ?>
			</button>
		</div>

		<input
			class="wpaw-thumbnail-field__input-image"
			type="hidden"
			name="<?php echo esc_attr( $this->get_field_name( 'thumbnail' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'thumbnail' ) ); ?>"
			value="<?php echo esc_attr( $instance['thumbnail'] ); ?>"
		>
	</div>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'link-url' ) ); ?>"><?php esc_html_e( 'Link URL', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="text"
			name="<?php echo esc_attr( $this->get_field_name( 'link-url' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'link-url' ) ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['link-url'] ); ?>"
		>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'link-text' ) ); ?>"><?php esc_html_e( 'Link text', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="text"
			name="<?php echo esc_attr( $this->get_field_name( 'link-text' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'link-text' ) ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['link-text'] ); ?>"
		>
	</p>
</div>
