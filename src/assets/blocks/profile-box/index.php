<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;
use Inc2734\WP_Awesome_Widgets\Helper;

add_action(
	'init',
	function() {
		$block = \WP_Block_Type_Registry::get_instance()->get_registered( 'wp-awesome-widgets/profile-box' );
		if ( $block ) {
			$block->attributes['anchor'] = array(
				'type' => 'string',
			);
		}
	},
	11
);

register_block_type(
	__DIR__,
	array(
		'render_callback' => function( $attributes ) {
			$widget_id = ! empty( $attributes['clientId'] )
				? 'inc2734_wp_awesome_widgets_profile_box-' . $attributes['clientId']
				: null;

			$widget_args = array(
				'widget_id'     => $widget_id,
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => '',
			);

			$instance = array(
				'title'  => '',
				'anchor' => ! empty( $attributes['anchor'] ) ? $attributes['anchor'] : null,
			);

			return Helper::render_widget( __DIR__ . '/../../../widget/profile-box', $widget_args, $instance );
		},
	)
);
