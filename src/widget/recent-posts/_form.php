<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-recent-posts-widget">
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="text"
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			value="<?php echo esc_attr( $instance['title'] ); ?>"
		>
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
		<input
			type="checkbox"
			name="<?php echo esc_attr( $this->get_field_name( 'show-thumbnail' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'show-thumbnail' ) ); ?>"
			value="<?php echo esc_attr( $instance['show-thumbnail'] ); ?>"
			<?php checked( $instance['show-thumbnail'], true ); ?>
		>
		<label for="<?php echo esc_attr( $this->get_field_id( 'show-thumbnail' ) ); ?>"><?php esc_html_e( 'Show thumbnail', 'inc2734-wp-awesome-widgets' ); ?></label>
	</p>

	<p>
		<input
			type="checkbox"
			name="<?php echo esc_attr( $this->get_field_name( 'show-taxonomy' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'show-taxonomy' ) ); ?>"
			value="<?php echo esc_attr( $instance['show-taxonomy'] ); ?>"
			<?php checked( $instance['show-taxonomy'], true ); ?>
		>
		<label for="<?php echo esc_attr( $this->get_field_id( 'show-taxonomy' ) ); ?>"><?php esc_html_e( 'Show taxonomy', 'inc2734-wp-awesome-widgets' ); ?></label>
	</p>
</div>
