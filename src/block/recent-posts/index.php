<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\View;
use Inc2734\WP_Awesome_Widgets\Helper;

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

add_action(
	'init',
	function() {
		$block = \WP_Block_Type_Registry::get_instance()->get_registered( 'wp-awesome-widgets/recent-posts' );
		if ( $block ) {
			$block->attributes['anchor'] = '';
		}
	},
	11
);

register_block_type(
	__DIR__,
	[
		'editor_script'   => 'wp-awesome-widgets/recent-posts/editor',
		'render_callback' => function( $attributes ) {
			$widget_id = ! empty( $attributes['clientId'] )
				? 'inc2734_wp_awesome_widgets_recent_posts-' . $attributes['clientId']
				: null;

			$widget_args = [
				'widget_id'     => $widget_id,
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

			return Helper::render_widget( __DIR__ . '/../../widget/recent-posts', $widget_args, $instance );
		},
	]
);
