<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-ranking-widget">
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
					<?php echo get_the_title( $item ); ?>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php
		$recent_posts = get_posts( [
			'post_type'      => 'post',
			'posts_per_page' => 10,
		] );
		?>
		<ul class="wpaw-item-selector__items">
			<?php foreach ( $recent_posts as $_post ) : ?>
				<li class="wpaw-item-selector__item" data-post-id="<?php echo esc_attr( $_post->ID ); ?>" data-post-title="<?php echo esc_attr( $_post->post_title ); ?>">
					<span class="dashicons dashicons-plus"></span>
					<?php echo esc_html( $_post->post_title ); ?>
				</li>
			<?php endforeach; ?>
		</ul>

		<input
			class="wpaw-item-selector__input"
			type="hidden"
			name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>"
			value="<?php echo esc_attr( $instance['items'] ); ?>"
		>
	</div>

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
