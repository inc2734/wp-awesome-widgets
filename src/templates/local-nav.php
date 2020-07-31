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
		class="wpaw-local-nav wpaw-local-nav--<?php echo esc_attr( $instance['direction'] ); ?> wpaw-local-nav--<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		id="wpaw-local-nav-<?php echo esc_attr( $widget_args['widget_id'] ); ?>"
		>

		<?php
		Helper::the_local_nav(
			$founder_id,
			get_the_ID(),
			[
				'list-class'                   => 'wpaw-local-nav__list',
				'item-class'                   => 'wpaw-local-nav__item',
				'sublist-class'                => 'wpaw-local-nav__sublist',
				'subitem-class'                => 'wpaw-local-nav__subitem',
				'limit'                        => 'horizontal' === $instance['direction'] ? 1 : -1,
				'display-top-level-page-title' => $instance['display-top-level-page-title'],
			]
		);
		?>
	</div>

<?php echo wp_kses_post( $widget_args['after_widget'] ); ?>
