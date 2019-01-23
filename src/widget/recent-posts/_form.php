<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-recent-posts-widget wpaw-widget-form">
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
		<label for="<?php echo esc_attr( $this->get_field_id( 'post-type' ) ); ?>"><?php esc_html_e( 'Post type', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'post-type' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'post-type' ) ); ?>"
			class="widefat"
		>
			<?php
			$post_types = get_post_types(
				[
					'public'       => true,
					'show_ui'      => true,
					'hierarchical' => false,
				],
				'objects'
			);
			unset( $post_types['attachment'] );
			?>
			<?php foreach ( $post_types as $_post_type ) : ?>
				<option value="<?php echo esc_attr( $_post_type->name ); ?>" <?php selected( $_post_type->name, $instance['post-type'] ); ?>>
					<?php echo esc_html( $_post_type->label ); ?>
				</option>
			<?php endforeach; ?>
		</select>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'posts-per-page' ) ); ?>"><?php esc_html_e( 'Number of posts', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="number"
			name="<?php echo esc_attr( $this->get_field_name( 'posts-per-page' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'posts-per-page' ) ); ?>"
			value="<?php echo esc_attr( $instance['posts-per-page'] ); ?>"
			step="1"
			min="1"
		>
	</p>

	<p>
		<input type="hidden" name="<?php echo esc_attr( $this->get_field_name( 'show-thumbnail' ) ); ?>" value="0">
		<input
			type="checkbox"
			name="<?php echo esc_attr( $this->get_field_name( 'show-thumbnail' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'show-thumbnail' ) ); ?>"
			value="1"
			<?php checked( $instance['show-thumbnail'], 1 ); ?>
		>
		<label for="<?php echo esc_attr( $this->get_field_id( 'show-thumbnail' ) ); ?>"><?php esc_html_e( 'Show thumbnail', 'inc2734-wp-awesome-widgets' ); ?></label>
	</p>

	<p>
		<input type="hidden" name="<?php echo esc_attr( $this->get_field_name( 'show-taxonomy' ) ); ?>" value="0">
		<input
			type="checkbox"
			name="<?php echo esc_attr( $this->get_field_name( 'show-taxonomy' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'show-taxonomy' ) ); ?>"
			value="1"
			<?php checked( $instance['show-taxonomy'], 1 ); ?>
		>
		<label for="<?php echo esc_attr( $this->get_field_id( 'show-taxonomy' ) ); ?>"><?php esc_html_e( 'Show taxonomy', 'inc2734-wp-awesome-widgets' ); ?></label>
	</p>
</div>
