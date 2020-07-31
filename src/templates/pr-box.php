<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<?php echo wp_kses_post( $widget_args['before_widget'] ); ?>

	<?php
	$classes = [
		'wpaw-pr-box',
		'wpaw-pr-box--' . $widget_args['widget_id'],
	];

	if ( $instance['chameleon'] ) {
		$classes[] = 'wpaw-pr-box--chameleon';
	}
	?>

	<div
		class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"
		id="wpaw-pr-box-<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		style="background-color: <?php echo esc_attr( $instance['bg-color'] ); ?>"
		>

		<div class="wpaw-pr-box__inner">

			<?php if ( ! empty( $instance['title'] ) ) : ?>
				<h2 class="wpaw-pr-box__title"><?php echo wp_kses_post( $instance['title'] ); ?></h2>
			<?php endif; ?>

			<?php if ( ! empty( $instance['lead'] ) ) : ?>
				<div class="wpaw-pr-box__lead">
					<?php echo wp_kses_post( wpautop( $instance['lead'] ) ); ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $instance['items'] ) ) : ?>
				<div class="wpaw-pr-box__row wpaw-pr-box__row--<?php echo esc_attr( $instance['sm-columns'] ); ?> wpaw-pr-box__row--md-<?php echo esc_attr( $instance['md-columns'] ); ?>  wpaw-pr-box__row--lg-<?php echo esc_attr( $instance['lg-columns'] ); ?>">
					<?php foreach ( $instance['items'] as $item ) : ?>
						<div class="wpaw-pr-box__item">
							<?php if ( ! empty( $item['src'] ) ) : ?>
								<?php
								$aspect_ratio   = $instance['thumbnail-aspect-ratio'];
								$thumbnail_size = apply_filters( 'inc2734_wp_awesome_widgets_pr_box_thumbnail_size', 'xlarge', wp_is_mobile(), $widget_args['widget_id'] );
								?>
								<?php if ( ! empty( $item['link-url'] ) ) : ?>
									<a href="<?php echo esc_html( $item['link-url'] ); ?>">
										<div class="wpaw-pr-box__item-figure wpaw-pr-box__item-figure--<?php echo esc_attr( $aspect_ratio ); ?>">
											<?php echo wp_get_attachment_image( $item['src'], $thumbnail_size ); ?>
										</div>
									</a>
								<?php else : ?>
									<div class="wpaw-pr-box__item-figure wpaw-pr-box__item-figure--<?php echo esc_attr( $aspect_ratio ); ?>">
										<?php echo wp_get_attachment_image( $item['src'], $thumbnail_size ); ?>
									</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( ! empty( $item['title'] ) ) : ?>
								<div class="wpaw-pr-box__item-title"><?php echo wp_kses_post( $item['title'] ); ?></div>
							<?php endif; ?>

							<?php if ( ! empty( $item['summary'] ) ) : ?>
								<div class="wpaw-pr-box__item-summary">
									<?php echo wp_kses_post( wpautop( $item['summary'] ) ); ?>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $item['link-url'] ) && ! empty( $item['link-text'] ) ) : ?>
								<div class="wpaw-pr-box__item-action">
									<a class="wpaw-pr-box__item-more" href="<?php echo esc_url( $item['link-url'] ); ?>">
										<?php echo esc_html( $item['link-text'] ); ?>
									</a>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $instance['link-url'] ) && ! empty( $instance['link-text'] ) ) : ?>
				<div class="wpaw-pr-box__action">
					<a class="wpaw-pr-box__more" href="<?php echo esc_url( $instance['link-url'] ); ?>">
						<?php echo esc_html( $instance['link-text'] ); ?>
					</a>
				</div>
			<?php endif; ?>

		</div>
	</div>

<?php echo wp_kses_post( $widget_args['after_widget'] ); ?>
