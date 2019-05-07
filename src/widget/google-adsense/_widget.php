<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\Helper;

if ( empty( $instance['code'] ) ) {
	return;
}

wp_enqueue_script(
	'google-adsense',
	'//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js',
	[],
	1,
	true
);
?>

<?php echo wp_kses_post( $args['before_widget'] ); ?>

	<div
		class="wpaw-google-adsense wpaw-google-adsense--<?php echo esc_attr( $args['widget_id'] ); ?>"
		id="wpaw-google-adsense-<?php echo esc_attr( $args['widget_id'] ); ?>"
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

<?php echo wp_kses_post( $args['after_widget'] ); ?>
