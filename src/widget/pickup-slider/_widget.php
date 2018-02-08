<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

$pickup_posts = get_posts( [
	'post_type'      => 'any',
	'posts_per_page' => -1,
	'tax_query'      => [
		[
			'taxonomy' => 'post_tag',
			'terms'    => [ 'pickup' ],
			'field'    => 'slug',
		],
	],
] );

if ( ! $pickup_posts ) {
	return;
}

global $post;
?>

<?php echo wp_kses_post( $args['before_widget'] ); ?>

	<div
		class="wpaw-pickup-slider wpaw-pickup-slider--<?php echo esc_attr( $args['widget_id'] ); ?>"
		id="wpaw-pickup-slider-<?php echo esc_attr( $args['widget_id'] ); ?>"
		>
		<div class="wpaw-pickup-slider__inner">
			<div class="wpaw-pickup-slider__canvas">
				<?php foreach ( $pickup_posts as $post ) : ?>
					<?php setup_postdata( $post ); ?>
					<?php $thumbnail_size = wp_is_mobile() ? 'large' : 'full'; ?>
					<div class="wpaw-pickup-slider__item">
						<div class="wpaw-pickup-slider__figure"
							style="background-image: url(<?php echo esc_url( wp_get_attachment_image_url( get_post_thumbnail_id(), $thumbnail_size ) ); ?>);">
						</div>
						<div class="wpaw-pickup-slider__item-body">
							<div class="wpaw-pickup-slider__item-title">
								<?php the_title(); ?>
							</div>
							<ul class="wpaw-pickup-slider__item-meta c-meta">
								<li class="c-meta__item c-meta__item--author"><?php echo get_avatar( $post->post_author ); ?><?php echo esc_html( get_the_author() ); ?></li>
								<li class="c-meta__item"><?php echo esc_html( get_the_time( get_option( 'date_format' ) ) ); ?></li>
							</ul>

							<a class="wpaw-pickup-slider__item-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'READ MORE', 'inc2734-wp-awesome-widgets' ); ?></a>
						</div>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>

	<script>
	jQuery(function($) {
		var slider = $('#wpaw-pickup-slider-<?php echo esc_attr( $args['widget_id'] ); ?> .wpaw-pickup-slider__canvas');

		slider.slick({
			"speed": 500,
			"autoplaySpeed": 4000,
			"slidesToShow": 1,
			"fade": true,
			"autoplay": true,
			"dots": false,
			"infinite": true,
			"adaptiveHeight": true
		});
	});
	</script>

<?php echo wp_kses_post( $args['after_widget'] ); ?>
