<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-slider-widget">
	<div class="wpaw-repeaters">
		<div class="wpaw-repeaters__items">
			<?php
			$image_template = [
				'src' => '',
			];
			array_unshift( $instance['images'], $image_template );
			?>
			<?php foreach ( $instance['images'] as $key => $image ) : ?>
				<?php $image = shortcode_atts( $image_template, $image ); ?>
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
			class="widefat"
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
		> ms
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'slides-to-show' ) ); ?>"><?php esc_html_e( 'Slides to show', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="number"
			name="<?php echo esc_attr( $this->get_field_name( 'slides-to-show' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'slides-to-show' ) ); ?>"
			value="<?php echo esc_attr( $instance['slides-to-show'] ); ?>"
			style="width: 100px"
		>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'slides-to-scroll' ) ); ?>"><?php esc_html_e( 'Slides to scroll', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="number"
			name="<?php echo esc_attr( $this->get_field_name( 'slides-to-scroll' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'slides-to-scroll' ) ); ?>"
			value="<?php echo esc_attr( $instance['slides-to-scroll'] ); ?>"
			style="width: 100px"
		>
	</p>
</div>
