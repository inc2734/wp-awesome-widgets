<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Showcase widget
 */
class Inc2734_WP_Awesome_Widgets_Showcase extends Inc2734_WP_Awesome_Widgets_Abstract_Widget {

	/**
	 * @var array
	 */
	protected $_defaults = [
		'title'        => null,
		'lead'         => null,
		'bg-image'     => null,
		'mask-color'   => '#000',
		'mask-opacity' => .7,
		'thumbnail'    => null,
		'link-url'     => null,
		'link-text'    => null,
		'format'       => 'format-1',
	];

	public function __construct() {
		parent::__construct( false, __( 'WPAW: Showcase', 'inc2734-wp-awesome-widgets' ) );
		$this->_path = __DIR__;

		add_action( 'admin_enqueue_scripts', function() {
			wp_enqueue_style(
				'wp-awesome-widgets-showcase',
				home_url( str_replace( ABSPATH, '', __DIR__ ) . '/admin.css' )
			);
		} );
	}

	public function update( $new_instance, $old_instance ) {
		$new_instance = shortcode_atts( $this->_defaults, $new_instance );
		return $new_instance;
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'Inc2734_WP_Awesome_Widgets_Showcase' );
} );
