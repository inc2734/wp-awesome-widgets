<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;

/**
 * editor_script
 */
$asset = include( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/block/profile-box/editor.asset.php' );
wp_register_script(
	'wp-awesome-widgets/profile-box/editor',
	get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/block/profile-box/editor.js',
	array_merge( $asset['dependencies'], [ 'wp-awesome-widgets-editor' ] ),
	filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/block/profile-box/editor.js' ),
	true
);

register_block_type_from_metadata(
	__DIR__,
	[
		'editor_script'   => 'wp-awesome-widgets/profile-box/editor',
		'render_callback' => function( $attributes ) {
			$widget_args = [
				'widget_id'     => null,
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h3 class="c-widget__title">',
				'after_title'   => '</h3>',
			];
			$instance    = [
				'title' => $attributes['title'],
			];

			ob_start();
			include( __DIR__ . '/../../widget/profile-box/_widget.php' );
			return ob_get_clean();
		},
	]
);
