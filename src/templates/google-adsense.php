<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\Helper;
?>

<?php echo wp_kses_post( $widget_args['before_widget'] ); ?>

	<div
		class="wpaw-google-adsense wpaw-google-adsense--<?php echo esc_attr( $widget_args['widget_id'] ); ?> wpaw-google-adsense--<?php echo esc_attr( $instance['size'] ); ?>"
		id="wpaw-google-adsense-<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		>

		<div class="wpaw-google-adsense__row">
			<?php if ( preg_match( '/-2$/', $instance['size'] ) ) : ?>
				<div class="wpaw-google-adsense__col">
					<div class="wpaw-google-adsense__ad wpaw-google-adsense__ad--<?php echo esc_attr( $instance['size'] ); ?>">
						<?php Helper::the_adsense_code( $instance['code'], $instance['size'] ); ?>
					</div>
				</div>
				<div class="wpaw-google-adsense__col">
					<div class="wpaw-google-adsense__ad wpaw-google-adsense__ad--<?php echo esc_attr( $instance['size'] ); ?>">
						<?php Helper::the_adsense_code( $instance['code'], $instance['size'] ); ?>
					</div>
				</div>
			<?php else : ?>
				<div class="wpaw-google-adsense__col">
					<div class="wpaw-google-adsense__ad wpaw-google-adsense__ad--<?php echo esc_attr( $instance['size'] ); ?>">
						<?php Helper::the_adsense_code( $instance['code'], $instance['size'] ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php echo wp_kses_post( $widget_args['after_widget'] ); ?>
