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
$asset = include( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/block/recent-posts/editor.asset.php' );
wp_register_script(
	'wp-awesome-widgets/recent-posts/editor',
	get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/block/recent-posts/editor.js',
	array_merge( $asset['dependencies'], [ 'wp-awesome-widgets-editor' ] ),
	filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/block/recent-posts/editor.js' ),
	true
);

register_block_type(
	__DIR__,
	[
		'editor_script'   => 'wp-awesome-widgets/recent-posts/editor',
		'render_callback' => function( $attributes ) {
			$widget_args = [
				'widget_id'     => null,
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => '',
			];

			$instance = [
				'title'          => '',
				'post-type'      => $attributes['postType'],
				'posts-per-page' => $attributes['postsPerPage'],
				'show-thumbnail' => $attributes['showThumbnail'],
				'show-taxonomy'  => $attributes['showTaxonomy'],
			];

			ob_start();
			include( __DIR__ . '/../../widget/recent-posts/_widget.php' );
			return ob_get_clean();
		},
	]
);
