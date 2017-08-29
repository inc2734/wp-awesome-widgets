<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

class Inc2734_WP_Awesome_Widgets_Slider extends Inc2734_WP_Awesome_Widgets_Abstract_Widget {

	protected $_defaults = [
		'images'           => [],
		'type'             => 'slide',
		'duration'         => 500,
		'interval'         => 3000,
		'slides-to-show'   => 1,
		'slides-to-scroll' => 1,
	];

	public function __construct() {
		parent::__construct( false, __( 'WPAW: Slider', 'inc2734-wp-awesome-widgets' ) );
		$this->_path = __DIR__;

		add_action( 'admin_enqueue_scripts', function() {
			if ( ! did_action( 'wp_enqueue_media' ) ) {
				wp_enqueue_media();
			}

			wp_enqueue_script(
				'wp-awesome-widgets-slider',
				home_url( str_replace( ABSPATH, '', __DIR__ ) . '/admin.js' ),
				[ 'jquery', 'wp-awesome-widgets-repeater', 'wp-awesome-widgets-thumbnail-field' ],
				false,
				true
			);

			wp_enqueue_style(
				'wp-awesome-widgets-slider',
				home_url( str_replace( ABSPATH, '', __DIR__ ) . '/admin.css' )
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

		$new_instance['images'] = array_values( array_filter( $new_instance['images'] ) );

		return $new_instance;
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'Inc2734_WP_Awesome_Widgets_Slider' );
} );

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_script(
		'slick-caroucel',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js',
		[ 'jquery' ],
		null,
		true
	);

	wp_enqueue_style(
		'slick-caroucel',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css',
		[],
		null
	);

	wp_enqueue_style(
		'slick-caroucel-theme',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css',
		[ 'slick-caroucel' ],
		null
	);
} );
