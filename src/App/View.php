<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets\App;

use Inc2734\WP_Plugin_View_Controller\Bootstrap;

class View {

	/**
	 * Render the template.
	 *
	 * @param string $slug        Slug of the template.
	 * @param string $name        Name of the template.
	 * @param array  $widget_args Argments of the teplate.
	 */
	public static function render( $slug, $name, $widget_args ) {
		$widget_args = wp_parse_args(
			$widget_args,
			[
				'widget_args' => [],
				'instance'    => [],
			]
		);

		$bootstrap = new Bootstrap(
			[
				'prefix' => 'inc2734_wp_awesome_widgets_',
				'path'   => __DIR__ . '/../templates/',
			]
		);

		$bootstrap->render( $slug, $name, $widget_args );
	}
}
