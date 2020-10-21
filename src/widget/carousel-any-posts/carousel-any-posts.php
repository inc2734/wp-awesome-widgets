<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\Contract;

class Inc2734_WP_Awesome_Widgets_Carousel_Any_Posts extends Contract\Widget {

	/**
	 * @var array
	 */
	protected $_defaults = [
		'title'     => null,
		'post-type' => 'post',
		'items'     => null,
	];

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct(
			false,
			__( 'WPAW: Carousel ( Any Posts )', 'inc2734-wp-awesome-widgets' ),
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

		$items     = explode( ',', $new_instance['items'] );
		$new_items = [];
		foreach ( $items as $post_id ) {
			if ( get_post( $post_id ) ) {
				$new_items[] = $post_id;
			}
		}
		$new_instance['items'] = implode( ',', $new_items );

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

		if ( ! wp_script_is( 'wp-awesome-widgets-carousel-any-posts', 'registered' ) ) {
			wp_enqueue_script(
				'wp-awesome-widgets-carousel-any-posts',
				get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/widget/carousel-any-posts.js',
				[ 'slick-carousel' ],
				filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/widget/carousel-any-posts.js' ),
				true
			);
		}
	}
}

add_action(
	'widgets_init',
	function() {
		register_widget( 'Inc2734_WP_Awesome_Widgets_Carousel_Any_Posts' );
	}
);
