<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! $query->have_posts() ) {
	return;
}
?>

<?php echo wp_kses_post( $widget_args['before_widget'] ); ?>

	<?php if ( $instance['title'] ) : ?>
		<?php echo wp_kses_post( $widget_args['before_title'] ); ?>
			<?php echo wp_kses_post( $instance['title'] ); ?>
		<?php echo wp_kses_post( $widget_args['after_title'] ); ?>
	<?php endif; ?>

	<div
		class="wpaw-taxonomy-posts wpaw-taxonomy-posts--<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		id="wpaw-taxonomy-posts-<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		>

		<ul class="wpaw-taxonomy-posts__list wpaw-posts-list">
			<?php while ( $query->have_posts() ) : ?>
				<?php $query->the_post(); ?>
				<li class="wpaw-taxonomy-posts__item wpaw-posts-list__item">
					<a href="<?php the_permalink(); ?>">

						<?php if ( $instance['show-thumbnail'] ) : ?>
							<div class="wpaw-taxonomy-posts__figure wpaw-posts-list__figure">
								<?php the_post_thumbnail( 'thumbnail' ); ?>
							</div>
						<?php endif; ?>

						<div class="wpaw-taxonomy-posts__body wpaw-posts-list__body">
							<div class="wpaw-taxonomy-posts__title wpaw-posts-list__title"><?php the_title(); ?></div>
							<div class="wpaw-taxonomy-posts__date wpaw-posts-list__date"><?php the_time( get_option( 'date_format' ) ); ?></div>
						</div>

					</a>
				</li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul>
	</div>

<?php echo wp_kses_post( $widget_args['after_widget'] ); ?>
