<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-carousel-any-posts-widget wpaw-widget-form">
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

	<div class="wpaw-item-selector">
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post-type' ) ); ?>"><?php esc_html_e( 'Post type', 'inc2734-wp-awesome-widgets' ); ?></label><br>
			<select
				name="<?php echo esc_attr( $this->get_field_name( 'post-type' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'post-type' ) ); ?>"
				class="wpaw-item-selector__post-type widefat"
			>
				<?php
				$post_types = get_post_types(
					[
						'public'       => true,
						'show_ui'      => true,
						'show_in_rest' => true,
					],
					'objects'
				);
				unset( $post_types['attachment'] );
				?>
				<?php foreach ( $post_types as $_post_type ) : ?>
					<?php $rest_base = ( ! empty( $_post_type->rest_base ) ) ? $_post_type->rest_base : $_post_type->name; ?>
					<option value="<?php echo esc_attr( $rest_base ); ?>" <?php selected( $rest_base, $instance['post-type'] ); ?>>
						<?php echo esc_html( $_post_type->label ); ?>
					</option>
				<?php endforeach; ?>
			</select>

			<span class="wpaw-item-selector__search">
				<input type="text" class="widefat wpaw-item-selector__search__input" placeholder="<?php esc_html_e( 'Search', 'inc2734-wp-awesome-widgets' ); ?>">
			</span>
		</p>

		<ul class="wpaw-item-selector__selected-items">
			<?php
			$items = $instance['items'];
			if ( empty( $items ) ) {
				$items = [];
			} elseif ( ! is_array( $items ) ) {
				$items = explode( ',', $items );
			}
			?>
			<?php foreach ( $items as $item ) : ?>
				<li class="wpaw-item-selector__selected-item" data-post-id="<?php echo esc_attr( $item ); ?>">
					<span class="dashicons dashicons-minus"></span>
					<?php echo wp_kses_post( get_the_title( $item ) ); ?>
				</li>
			<?php endforeach; ?>
		</ul>

		<ul class="wpaw-item-selector__items" data-offset="0" data-per-page="10" data-loading="false" data-failed="false">
			<li class="wpaw-item-selector__refresh-btn-wrapper">
				<button class="button wpaw-item-selector__refresh-btn"><?php esc_html_e( 'Refresh', 'inc2734-wp-awesome-widgets' ); ?></button>
			</li>
		</ul>

		<input
			class="wpaw-item-selector__input"
			type="hidden"
			name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>"
			value="<?php echo esc_attr( $instance['items'] ); ?>"
		>
	</div>
</div>
