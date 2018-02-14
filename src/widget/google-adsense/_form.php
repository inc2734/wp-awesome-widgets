<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-google-adsense-widget">
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'code' ) ); ?>"><?php esc_html_e( 'Adsense code', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<textarea
			name="<?php echo esc_attr( $this->get_field_name( 'code' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'code' ) ); ?>"
			class="widefat"
			><?php echo esc_attr( $instance['code'] ); ?></textarea><br>
			<small><?php esc_html_e( 'Past the code of the responsive ad unit.', 'snow-monkey' ); ?></small>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Size', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"
			class="widefat"
		>
			<?php
			$sizes = [
				'auto'              => __( 'Auto', 'snow-monkey' ),
				'big-banner'        => __( 'Big banner (728 x 90)', 'snow-monkey' ),
				'rectangle-big'     => __( 'Rectangle big (336 x 280)', 'snow-monkey' ),
				'large-mobile'      => __( 'Large mobile banner (320 x 100)', 'snow-monkey' ),
				'large-sky-scraper' => __( 'Large skyscraper (300 x 600)', 'snow-monkey' ),
				'rectangle'         => __( 'Rectangle (300 x 250)', 'snow-monkey' ),
				'rectangle-big-2'   => __( 'Rectangle big (336 x 280) two', 'snow-monkey' ),
				'rectangle-2'       => __( 'Rectangle (300 x 250) two', 'snow-monkey' ),
			];
			?>
			<?php foreach ( $sizes as $key => $label ) : ?>
				<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['size'], $key ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>
</div>
