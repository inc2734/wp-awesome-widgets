<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets;

class Awesome_Widgets {

	public function __construct() {
		load_textdomain( 'inc2734-wp-awesome-widgets', __DIR__ . '/languages/' . get_locale() . '.mo' );

		$includes = array(
			'/abstract',
			'/widget/*',
		);
		foreach ( $includes as $include ) {
			foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
				if ( false !== strpos( basename( $file ), '_' ) ) {
					continue;
				}

				require_once( $file );
			}
		}

		add_action( 'admin_enqueue_scripts', [ $this, '_admin_enqueue_scripts' ], 9 );
	}

	public function _admin_enqueue_scripts() {
		if ( ! did_action( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		}

		wp_enqueue_script(
			'wp-awesome-widgets-color-picker-field',
			site_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/js/color-picker-field.js' ),
			[ 'jquery', 'wp-color-picker' ],
			false,
			true
		);

		wp_enqueue_script(
			'wp-awesome-widgets-thumbnail-field',
			site_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/js/thumbnail-field.js' ),
			[ 'jquery' ],
			false,
			true
		);

		wp_enqueue_style(
			'wp-awesome-widgets-thumbnail-field',
			site_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/css/thumbnail-field.css' )
		);

		wp_enqueue_script(
			'wp-awesome-widgets-repeater',
			site_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/js/repeater.js' ),
			[ 'jquery', 'jquery-ui-sortable' ],
			false,
			true
		);

		wp_enqueue_style(
			'wp-awesome-widgets-repeater',
			site_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/css/repeater.css' )
		);

		wp_enqueue_style(
			'wp-awesome-widgets-item-selector',
			site_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/css/item-selector.css' )
		);

		wp_enqueue_script(
			'wp-awesome-widgets-item-selector',
			site_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/js/item-selector.js' ),
			[ 'jquery', 'jquery-ui-sortable' ],
			false,
			true
		);

		wp_localize_script( 'wp-awesome-widgets-item-selector', 'wp_awesome_widgets_item_selector_wp_api', [
			'root' => esc_url_raw( rest_url() ),
		] );

		wp_enqueue_style( 'wp-color-picker' );
	}
}

/**
 * Add safe style attribute for wp_kses
 *
 * @param array $styles
 * @return array
 */
function inc2734_wpaw_safe_style_css_display( $styles ) {
	$styles[] = 'display';
	return $styles;
}

/**
 * Display google adsense
 *
 * @param $code
 * @param $size
 * @return void
 */
function inc2734_wpaw_display_adsense_code( $code, $size = null ) {
	add_filter( 'safe_style_css', __NAMESPACE__ . '\\inc2734_wpaw_safe_style_css_display' );

	if ( ! is_null( $size ) ) {
		if ( in_array( $size, [ 'big-banner', 'large-mobile' ] ) ) {
			$code = preg_replace( '/data-ad-format=[\"|\'][a-z]+?[\"|\']/', 'data-ad-format="horizontal"', $code );
		} elseif ( in_array( $size, [ 'large-sky-scraper' ] ) ) {
			$code = preg_replace( '/data-ad-format=[\"|\'][a-z]+?[\"|\']/', 'data-ad-format="vertical"', $code );
		} elseif ( in_array( $size, [ 'rectangle-big', 'rectangle', 'rectangle-big-2', 'rectangle-2' ] ) ) {
			$code = preg_replace( '/data-ad-format=[\"|\'][a-z]+?[\"|\']/', 'data-ad-format="rectangle"', $code );
		}
	}

	if ( class_exists( 'Jetpack' ) ) {
		// @todo
		// @codingStandardsIgnoreStart
		echo $code;
		// @codingStandardsIgnoreEnd
	} else {
		echo wp_kses( $code, [
			'script' => [
				'async' => [],
				'src'   => [],
			],
			'ins' => [
				'class'          => [],
				'style'          => [],
				'data-ad-client' => [],
				'data-ad-slot'   => [],
				'data-ad-format' => [],
			],
		] );
	}

	remove_filter( 'safe_style_css', __NAMESPACE__ . '\\inc2734_wpaw_safe_style_css_display' );
}
