<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Any Posts widget
 */
class Inc2734_WP_Awesome_Widgets_Any_Posts extends Inc2734_WP_Awesome_Widgets_Abstract_Widget {

	/**
	 * @var array
	 */
	protected $_defaults = [
		'title'          => null,
		'post-type'      => 'post',
		'items'          => null,
		'show-thumbnail' => 1,
		'show-taxonomy'  => 1,
	];

	public function __construct() {
		parent::__construct(
			false,
			__( 'WPAW: Any Posts', 'inc2734-wp-awesome-widgets' ),
			[
				'customize_selective_refresh' => true,
			]
		);
	}

	public function update( $new_instance, $old_instance ) {
		$new_instance = shortcode_atts( $this->_defaults, $new_instance );

		$items = explode( ',', $new_instance['items'] );
		$new_items = [];
		foreach ( $items as $post_id ) {
			if ( get_post( $post_id ) ) {
				$new_items[] = $post_id;
			}
		}
		$new_instance['items'] = implode( ',', $new_items );

		return $new_instance;
	}
}

add_action(
	'widgets_init',
	function() {
		register_widget( 'Inc2734_WP_Awesome_Widgets_Any_Posts' );
	}
);
