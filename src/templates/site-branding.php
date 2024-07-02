<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

$anchor = ! empty( $instance['anchor'] )
	? $instance['anchor']
	: 'wpaw-site-branding-' . $widget_args['widget_id'];
?>

<?php echo wp_kses_post( $widget_args['before_widget'] ); ?>

	<div
		class="wpaw-site-branding wpaw-site-branding--<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		id="<?php echo esc_attr( $anchor ); ?>"
		>

		<div class="wpaw-site-branding__logo">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $instance['description'] ) ) : ?>
			<div class="wpaw-site-branding__description">
				<?php echo wp_kses_post( wpautop( $instance['description'] ) ); ?>
			</div>
		<?php endif; ?>
	</div>

<?php echo wp_kses_post( $widget_args['after_widget'] ); ?>
