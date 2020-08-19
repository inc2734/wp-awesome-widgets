<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<?php echo wp_kses_post( $widget_args['before_widget'] ); ?>

	<div
		class="wpaw-contents-outline wpaw-contents-outline--<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		id="wpaw-contents-outline-<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		>

		<?php if ( empty( $instance['show-mobile'] ) ) : ?>
			<style>
			.wpaw-contents-outline--<?php echo esc_attr( $widget_args['widget_id'] ); ?> {
				display: none;
			}

			@media (min-width: 64em) {
				.wpaw-contents-outline--<?php echo esc_attr( $widget_args['widget_id'] ); ?> {
					display: block;
				}
			}
			</style>
		<?php endif; ?>

		<?php
		echo do_shortcode(
			sprintf(
				'[wp_contents_outline post_id="%1$d" selector=".c-entry__content, .c-entry__content .wp-block-group__inner-container" display_before_first_heading="false" headings="%2$s" title="%3$s"]',
				get_the_ID(),
				implode( ',', array_filter( $instance['headings'] ) ),
				$instance['title']
			)
		);
		?>
	</div>

<?php echo wp_kses_post( $widget_args['after_widget'] ); ?>
