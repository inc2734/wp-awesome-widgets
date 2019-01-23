<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-pr-box-widget wpaw-widget-form">
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

	<p class="wpaw-color-picker-field">
		<label for="<?php echo esc_attr( $this->get_field_id( 'bg-color' ) ); ?>"><?php esc_html_e( 'Background color', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			class="wpaw-color-picker-field__input"
			type="text"
			name="<?php echo esc_attr( $this->get_field_name( 'bg-color' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'bg-color' ) ); ?>"
			value="<?php echo esc_attr( $instance['bg-color'] ); ?>"
		>
	</p>

	<div class="wpaw-repeaters">
		<div class="wpaw-repeaters__items">
			<?php foreach ( $instance['items'] as $key => $item ) : ?>
				<div class="wpaw-repeaters__item">
					<div class="wpaw-thumbnail-field">
						<span class="wpaw-thumbnail-field__thumbnail">
							<?php echo wp_get_attachment_image( $item['src'], 'medium' ); ?>
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
							name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][src]"
							id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][src]"
							value="<?php echo esc_attr( $item['src'] ); ?>"
						>
					</div>

					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][title]"><?php esc_html_e( 'Title', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<input
							class="wpaw-pr-box-widget__input-title widefat"
							type="text"
							name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][title]"
							id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][title]"
							value="<?php echo esc_attr( $item['title'] ); ?>"
						>
					</p>

					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][summary]"><?php esc_html_e( 'Summary', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<textarea
							class="wpaw-pr-box-widget__input-summary widefat"
							name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][summary]"
							id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][summary]"
							rows="5"
						><?php echo esc_textarea( $item['summary'] ); ?></textarea>
					</p>

					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][link-url]"><?php esc_html_e( 'Link URL', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<input
							type="text"
							name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][link-url]"
							id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][link-url]"
							class="widefat"
							value="<?php echo esc_attr( $item['link-url'] ); ?>"
						>
					</p>

					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][link-text]"><?php esc_html_e( 'Link text', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<input
							type="text"
							name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][link-text]"
							id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][link-text]"
							class="widefat"
							value="<?php echo esc_attr( $item['link-text'] ); ?>"
						>
					</p>

					<div class="wpaw-repeaters__item-controls">
						<a class="button-link button-link-delete"><?php esc_html_e( 'Delete', 'inc2734-wp-awesome-widgets' ); ?></a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<button class="button wpaw-repeaters__add-repeater-btn">
			<?php esc_html_e( 'Add Item', 'inc2734-wp-awesome-widgets' ); ?>
		</button>
	</div>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'thumbnail-aspect-ratio' ) ); ?>"><?php esc_html_e( 'Thumbnail aspect ratio', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'thumbnail-aspect-ratio' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'thumbnail-aspect-ratio' ) ); ?>"
			class="widefat"
		>
			<?php
			$aspect_ratios = [
				'4to3'  => '4:3',
				'16to9' => '16:9',
			];
			?>
			<?php foreach ( $aspect_ratios as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['thumbnail-aspect-ratio'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'sm-columns' ) ); ?>"><?php esc_html_e( 'Column size for mobile', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'sm-columns' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'sm-columns' ) ); ?>"
			class="widefat"
		>
			<?php
			$types = [
				'1' => __( '1 column', 'inc2734-wp-awesome-widgets' ),
				'2' => __( '2 columns', 'inc2734-wp-awesome-widgets' ),
				'3' => __( '3 columns', 'inc2734-wp-awesome-widgets' ),
				'4' => __( '4 columns', 'inc2734-wp-awesome-widgets' ),
				'5' => __( '5 columns', 'inc2734-wp-awesome-widgets' ),
			];
			?>
			<?php foreach ( $types as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['sm-columns'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'md-columns' ) ); ?>"><?php esc_html_e( 'Column size for tablet', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'md-columns' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'md-columns' ) ); ?>"
			class="widefat"
		>
			<?php
			$types = [
				'1' => __( '1 column', 'inc2734-wp-awesome-widgets' ),
				'2' => __( '2 columns', 'inc2734-wp-awesome-widgets' ),
				'3' => __( '3 columns', 'inc2734-wp-awesome-widgets' ),
				'4' => __( '4 columns', 'inc2734-wp-awesome-widgets' ),
				'5' => __( '5 columns', 'inc2734-wp-awesome-widgets' ),
			]
			?>
			<?php foreach ( $types as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['md-columns'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'md-columns' ) ); ?>"><?php esc_html_e( 'Column size for PC', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'lg-columns' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'lg-columns' ) ); ?>"
			class="widefat"
		>
			<?php
			$types = [
				'1' => __( '1 column', 'inc2734-wp-awesome-widgets' ),
				'2' => __( '2 columns', 'inc2734-wp-awesome-widgets' ),
				'3' => __( '3 columns', 'inc2734-wp-awesome-widgets' ),
				'4' => __( '4 columns', 'inc2734-wp-awesome-widgets' ),
				'5' => __( '5 columns', 'inc2734-wp-awesome-widgets' ),
			]
			?>
			<?php foreach ( $types as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['lg-columns'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>

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

	<p>
		<input type="hidden" name="<?php echo esc_attr( $this->get_field_name( 'chameleon' ) ); ?>" value="0">
		<input
			type="checkbox"
			name="<?php echo esc_attr( $this->get_field_name( 'chameleon' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'chameleon' ) ); ?>"
			value="1"
			<?php checked( $instance['chameleon'], 1 ); ?>
		>
		<label for="<?php echo esc_attr( $this->get_field_id( 'chameleon' ) ); ?>"><?php esc_html_e( 'Remove side padding', 'inc2734-wp-awesome-widgets' ); ?></label>
	</p>
</div>
