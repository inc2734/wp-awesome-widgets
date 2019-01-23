<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-slider-widget wpaw-widget-form">
	<div class="wpaw-repeaters">
		<div class="wpaw-repeaters__items">
			<?php foreach ( $instance['images'] as $key => $image ) : ?>
				<div class="wpaw-repeaters__item">
					<div class="wpaw-thumbnail-field">
						<span class="wpaw-thumbnail-field__thumbnail">
							<?php echo wp_get_attachment_image( $image['src'], 'medium' ); ?>
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
							name="<?php echo esc_attr( $this->get_field_name( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][src]"
							id="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][src]"
							value="<?php echo esc_attr( $image['src'] ); ?>"
						>
					</div>

					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][title]"><?php esc_html_e( 'Title', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<input
							class="widefat"
							type="text"
							name="<?php echo esc_attr( $this->get_field_name( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][title]"
							id="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][title]"
							value="<?php echo esc_attr( $image['title'] ); ?>"
						>
					</p>

					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][summary]"><?php esc_html_e( 'Summary', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<textarea
							class="widefat"
							name="<?php echo esc_attr( $this->get_field_name( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][summary]"
							id="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][summary]"
							rows="5"
						><?php echo esc_textarea( $image['summary'] ); ?></textarea>
					</p>

					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][link-url]"><?php esc_html_e( 'Link URL', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<input
							class="widefat"
							type="text"
							name="<?php echo esc_attr( $this->get_field_name( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][link-url]"
							id="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][link-url]"
							value="<?php echo esc_attr( $image['link-url'] ); ?>"
						>
					</p>

					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][link-text]"><?php esc_html_e( 'Link text', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<input
							class="widefat"
							type="text"
							name="<?php echo esc_attr( $this->get_field_name( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][link-text]"
							id="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][link-text]"
							value="<?php echo esc_attr( $image['link-text'] ); ?>"
						>
					</p>

					<p class="wpaw-color-picker-field">
						<label for="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][mask-color]"><?php esc_html_e( 'Background mask color', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<input
							class="wpaw-color-picker-field__input"
							type="text"
							name="<?php echo esc_attr( $this->get_field_name( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][mask-color]"
							id="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][mask-color]"
							value="<?php echo esc_attr( $image['mask-color'] ); ?>"
						>
					</p>

					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][mask-opacity]"><?php esc_html_e( 'Background mask transparency', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<input
							type="number"
							name="<?php echo esc_attr( $this->get_field_name( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][mask-opacity]"
							id="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][mask-opacity]"
							value="<?php echo esc_attr( $image['mask-opacity'] ); ?>"
							step="0.1"
							max="1"
							min="0"
							style="width: 100px"
						>
					</p>

					<p class="wpaw-color-picker-field">
						<label for="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][text-color]"><?php esc_html_e( 'Text color', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<input
							class="wpaw-color-picker-field__input"
							type="text"
							name="<?php echo esc_attr( $this->get_field_name( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][text-color]"
							id="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][text-color]"
							value="<?php echo esc_attr( $image['text-color'] ); ?>"
						>
					</p>

					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][btn-type]"><?php esc_html_e( 'Button type', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<select
							class="widefat"
							name="<?php echo esc_attr( $this->get_field_name( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][btn-type]"
							id="<?php echo esc_attr( $this->get_field_id( 'images' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][btn-type]"
						>
							<?php
							$btn_types = [
								'normal' => __( 'Normal button', 'inc2734-wp-awesome-widgets' ),
								'ghost'  => __( 'Ghost button', 'inc2734-wp-awesome-widgets' ),
							]
							?>
							<?php foreach ( $btn_types as $value => $label ) : ?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $image['btn-type'], true ); ?>><?php echo esc_html( $label ); ?></option>
							<?php endforeach; ?>
						</select>
					</p>

					<div class="wpaw-repeaters__item-controls">
						<a class="button-link button-link-delete"><?php esc_html_e( 'Delete', 'inc2734-wp-awesome-widgets' ); ?></a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<button class="button wpaw-repeaters__add-repeater-btn">
			<?php esc_html_e( 'Add slider', 'inc2734-wp-awesome-widgets' ); ?>
		</button>
	</div>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>"><?php esc_html_e( 'Slider type', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'type' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>"
			class="widefat js-wpaw-slider-widget-type"
		>
			<?php
			$types = [
				'fade'  => __( 'Fade', 'inc2734-wp-awesome-widgets' ),
				'slide' => __( 'Slide', 'inc2734-wp-awesome-widgets' ),
			]
			?>
			<?php foreach ( $types as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['type'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'duration' ) ); ?>"><?php esc_html_e( 'Animation time', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="number"
			name="<?php echo esc_attr( $this->get_field_name( 'duration' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'duration' ) ); ?>"
			value="<?php echo esc_attr( $instance['duration'] ); ?>"
			style="width: 100px"
			step="1"
			min="1"
		> ms
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'interval' ) ); ?>"><?php esc_html_e( 'Interval time', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="number"
			name="<?php echo esc_attr( $this->get_field_name( 'interval' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'interval' ) ); ?>"
			value="<?php echo esc_attr( $instance['interval'] ); ?>"
			style="width: 100px"
			step="1"
			min="1"
		> ms
	</p>

	<p class="js-wpaw-slider-widget-only-slide" aria-hidden="true">
		<label for="<?php echo esc_attr( $this->get_field_id( 'slides-to-show' ) ); ?>"><?php esc_html_e( 'Number of slides to display at once(PC)', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="number"
			name="<?php echo esc_attr( $this->get_field_name( 'slides-to-show' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'slides-to-show' ) ); ?>"
			value="<?php echo esc_attr( $instance['slides-to-show'] ); ?>"
			style="width: 100px"
			step="1"
			min="1"
		>
	</p>

	<p class="js-wpaw-slider-widget-only-slide" aria-hidden="true">
		<label for="<?php echo esc_attr( $this->get_field_id( 'slides-to-scroll' ) ); ?>"><?php esc_html_e( 'Number of slides to slide at once(PC)', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="number"
			name="<?php echo esc_attr( $this->get_field_name( 'slides-to-scroll' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'slides-to-scroll' ) ); ?>"
			value="<?php echo esc_attr( $instance['slides-to-scroll'] ); ?>"
			style="width: 100px"
			step="1"
			min="1"
		>
	</p>
</div>
