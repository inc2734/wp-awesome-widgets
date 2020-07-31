<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;

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

View::render(
	'google-adsense',
	null,
	[
		'widget_args' => $widget_args,
		'instance'    => $instance,
	]
);
