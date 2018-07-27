<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Slide widget
 */
class Inc2734_WP_Awesome_Widgets_Slider extends Inc2734_WP_Awesome_Widgets_Abstract_Widget {

	/**
	 * @var array
	 */
	protected $_defaults = [
		'images' => [
			[
				'src'          => '',
				'title'        => '',
				'summary'      => '',
				'link-url'     => '',
				'link-text'    => '',
				'mask-color'   => '#000',
				'mask-opacity' => 0,
				'text-color'   => '#fff',
			],
		],
		'type'             => 'slide',
		'duration'         => 500,
		'interval'         => 3000,
		'slides-to-show'   => 1,
		'slides-to-scroll' => 1,
	];

	public function __construct() {
		parent::__construct( false, __( 'WPAW: Slider', 'inc2734-wp-awesome-widgets' ), [
			'customize_selective_refresh' => true,
		] );

		add_action( 'admin_enqueue_scripts', function() {
			if ( ! did_action( 'wp_enqueue_media' ) ) {
				wp_enqueue_media();
			}

			$abspath = str_replace( '\\', '/', ABSPATH );
			$__dir__ = str_replace( '\\', '/', __DIR__ );

			$relative_path = str_replace( $abspath, '', $__dir__ ) . '/admin.js';
			$src  = site_url( $relative_path );
			$path = $abspath . $relative_path;

			wp_enqueue_script(
				'wp-awesome-widgets-slider',
				$src,
				[ 'jquery', 'wp-awesome-widgets-repeater', 'wp-awesome-widgets-thumbnail-field' ],
				filemtime( $path ),
				true
			);

			$relative_path = str_replace( $abspath, '', $__dir__ ) . '/admin.css';
			$src  = site_url( $relative_path );
			$path = $abspath . $relative_path;

			wp_enqueue_style(
				'wp-awesome-widgets-slider',
				$src,
				[],
				filemtime( $path )
			);
		} );
	}

	public function update( $new_instance, $old_instance ) {
		$new_instance = shortcode_atts( $this->_defaults, $new_instance );

		if ( ! preg_match( '/^\d+$/', $new_instance['duration'] ) ) {
			$new_instance['duration'] = $this->_defaults['duration'];
		}

		if ( ! preg_match( '/^\d+$/', $new_instance['interval'] ) ) {
			$new_instance['interval'] = $this->_defaults['interval'];
		}

		if ( ! preg_match( '/^\d+$/', $new_instance['slides-to-show'] ) ) {
			$new_instance['slides-to-show'] = $this->_defaults['slides-to-show'];
		}

		if ( ! preg_match( '/^\d+$/', $new_instance['slides-to-scroll'] ) ) {
			$new_instance['slides-to-scroll'] = $this->_defaults['slides-to-scroll'];
		}

		if ( 'fade' === $new_instance['type'] ) {
			$new_instance['slides-to-show']   = 1;
			$new_instance['slides-to-scroll'] = 1;
		}

		foreach ( $new_instance['images'] as $key => $image ) {
			if ( ! $image['src'] ) {
				unset( $new_instance['images'][ $key ] );
			}
		}

		return $new_instance;
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'Inc2734_WP_Awesome_Widgets_Slider' );
} );
