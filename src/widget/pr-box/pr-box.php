<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

class Inc2734_WP_Awesome_Widgets_PR_Box extends Inc2734_WP_Awesome_Widgets_Abstract_Widget {

	protected $_defaults = [
		'title'                  => null,
		'lead'                   => null,
		'bg-color'               => '#fff',
		'items'                  => [],
		'thumbnail-size'         => 'medium',
		'thumbnail-aspect-ratio' => '16to9',
		'sm-columns'             => 1,
		'md-columns'             => 1,
		'lg-columns'             => 3,
		'link-text'              => null,
		'link-url'               => null,
	];

	public function __construct() {
		parent::__construct( false, __( 'WPAW: PR Box', 'inc2734-wp-awesome-widgets' ) );
		$this->_path = __DIR__;

		add_action( 'admin_enqueue_scripts', function() {
			wp_enqueue_script(
				'wp-awesome-widgets-pr-box',
				home_url( str_replace( ABSPATH, '', __DIR__ ) . '/admin.js' ),
				[ 'jquery', 'wp-awesome-widgets-repeater', 'wp-awesome-widgets-thumbnail-field' ],
				false,
				true
			);

			wp_enqueue_style(
				'wp-awesome-widgets-pr-box',
				home_url( str_replace( ABSPATH, '', __DIR__ ) . '/admin.css' )
			);
		} );
	}

	public function update( $new_instance, $old_instance ) {
		$new_instance = shortcode_atts( $this->_defaults, $new_instance );

		if ( ! preg_match( '/^\d+$/', $new_instance['sm-columns'] ) ) {
			$new_instance['sm-columns'] = $this->_defaults['sm-columns'];
		}

		if ( ! preg_match( '/^\d+$/', $new_instance['md-columns'] ) ) {
			$new_instance['md-columns'] = $this->_defaults['md-columns'];
		}

		if ( ! preg_match( '/^\d+$/', $new_instance['lg-columns'] ) ) {
			$new_instance['lg-columns'] = $this->_defaults['lg-columns'];
		}

		$new_instance['items'] = array_values( array_filter( $new_instance['items'] ) );

		return $new_instance;
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'Inc2734_WP_Awesome_Widgets_PR_Box' );
} );
