<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\Contract;

class Inc2734_WP_Awesome_Widgets_Slider extends Contract\Widget {

	/**
	 * @var array
	 */
	protected $_defaults = [
		'images'           => [
			[
				'src'          => '',
				'title'        => '',
				'summary'      => '',
				'link-url'     => '',
				'link-text'    => '',
				'mask-color'   => '#000',
				'mask-opacity' => 0,
				'text-color'   => '#fff',
				'btn-type'     => 'ghost',
			],
		],
		'type'             => 'slide',
		'duration'         => 500,
		'interval'         => 3000,
		'slides-to-show'   => 1,
		'slides-to-scroll' => 1,
	];

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct(
			false,
			__( 'WPAW: Slider', 'inc2734-wp-awesome-widgets' ),
			[
				'customize_selective_refresh' => true,
			]
		);

		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_scripts' ] );
		}
	}

	/**
	 * Updates a particular instance of a widget.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array
	 */
	public function update(
		$new_instance,
		// phpcs:disable VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
		$old_instance
		// phpcs:enable
	) {
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

	/**
	 * Enqueue assets.
	 */
	public static function enqueue_scripts() {
		if ( ! wp_script_is( 'slick-carousel', 'registered' ) ) {
			wp_enqueue_script(
				'slick-carousel',
				get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/packages/slick-carousel/slick/slick.min.js',
				[ 'jquery' ],
				filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/packages/slick-carousel/slick/slick.min.js' ),
				true
			);
		}

		if ( ! wp_script_is( 'wp-awesome-widgets-slider', 'registered' ) ) {
			wp_enqueue_script(
				'wp-awesome-widgets-slider',
				get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/widget/slider.js',
				[ 'slick-carousel' ],
				filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/widget/slider.js' ),
				true
			);
		}
	}
}

add_action(
	'widgets_init',
	function() {
		register_widget( 'Inc2734_WP_Awesome_Widgets_Slider' );
	}
);
