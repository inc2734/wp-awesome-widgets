<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-taxonomy-posts-widget wpaw-widget-form">
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
		<?php
		$taxonomies = get_taxonomies(
			[
				'public'  => true,
				'show_ui' => true,
			],
			'names'
		);

		$all_terms = [];
		foreach ( $taxonomies as $_taxonomy ) {
			$all_terms[ $_taxonomy ] = get_terms(
				$_taxonomy,
				[
					'parent' => 0,
				]
			);
		}
		?>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Displayed term', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'taxonomy' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'taxonomy' ) ); ?>"
			class="widefat"
		>
			<option value=""></option>
			<?php foreach ( $all_terms as $taxonomy_id => $terms ) : ?>
				<optgroup label="<?php echo esc_attr( get_taxonomy( $taxonomy_id )->label ); ?>">
					<?php
					if ( ! function_exists( 'wpaw_taxonomy_posts_display_children' ) ) {
						/**
						 * Display children.
						 *
						 * @param string $taxonomy_id The taxonomy name.
						 * @param string $term_id     The term ID.
						 * @param string $saved_term  <$taxonomy_id>@<$term->term_id>.
						 * @param int    $hierarchy   Hierarchy level.
						 */
						function wpaw_taxonomy_posts_display_children(
							$taxonomy_id,
							$term_id,
							$saved_term,
							$hierarchy = 0
						) {
							$terms = get_terms(
								$taxonomy_id,
								[
									'parent' => $term_id,
								]
							);
							?>
							<?php foreach ( $terms as $term ) : ?>
								<?php $value = $taxonomy_id . '@' . $term->term_id; ?>
								<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $saved_term, $value ); ?>>
									<?php echo esc_html( str_repeat( '—', $hierarchy ) ); ?> <?php echo esc_html( $term->name ); ?>
								</option>
								<?php wpaw_taxonomy_posts_display_children( $taxonomy_id, $term->term_id, $saved_term, $hierarchy + 1 ); ?>
							<?php endforeach; ?>
							<?php
						}
					}
					wpaw_taxonomy_posts_display_children( $taxonomy_id, 0, $instance['taxonomy'] );
					?>
				</optgroup>
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
</div>
