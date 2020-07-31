<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;

if ( ! is_singular() ) {
	return;
}

View::render(
	'contents-outline',
	null,
	[
		'widget_args' => $widget_args,
		'instance'    => $instance,
	]
);
