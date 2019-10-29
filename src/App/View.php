<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets\App;

use Inc2734\WP_Plugin_View_Controller\Bootstrap;

class View {
	public static function render( $slug, $name, $args ) {
		$bootstrap = new Bootstrap(
			[
				'prefix' => 'inc2734_wp_awesome_widgets_',
				'path'   => __DIR__ . '/../templates/',
			]
		);

		$bootstrap->render( $slug, $name, $args );
	}
}
