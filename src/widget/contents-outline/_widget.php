<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! is_singular() ) {
	return;
}

global $post;
?>

<?php echo wp_kses_post( $args['before_widget'] ); ?>

	<div
		class="wpaw-contents-outline"
		id="wpaw-contents-outline-<?php echo esc_attr( $args['widget_id'] ); ?>"
		>

		<?php
		echo do_shortcode( sprintf(
			'[wp_contents_outline post_id="%1$d" selector=".c-entry__content" display_before_first_heading="false"]',
			get_the_ID()
		) );
		?>
	</div>

<?php echo wp_kses_post( $args['after_widget'] ); ?>
