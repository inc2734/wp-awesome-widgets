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
			'/Helper',
			'/abstract',
			'/widget/*',
		);
		foreach ( $includes as $include ) {
			foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
				if ( '_' === substr( basename( $file ), 0, 1 ) ) {
					continue;
				}

				require_once( $file );
			}
		}

		add_action( 'wp_enqueue_scripts', [ $this, '_wp_enqueue_scripts' ] );
		add_action( 'admin_enqueue_scripts', [ $this, '_admin_enqueue_scripts' ], 9 );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, '_admin_enqueue_scripts' ] );
	}

	/**
	 * Enqueue assets
	 *
	 * @return void
	 */
	public function _wp_enqueue_scripts() {
		$relative_path = '/vendor/inc2734/wp-awesome-widgets/src/assets/css/wp-awesome-widgets.min.css';
		$src  = get_template_directory_uri() . $relative_path;
		$path = get_template_directory() . $relative_path;

		wp_enqueue_style(
			'wp-awesome-widgets',
			$src,
			[],
			filemtime( $path )
		);

		$relative_path = '/vendor/inc2734/wp-awesome-widgets/src/assets/js/wp-awesome-widgets.min.js';
		$src  = get_template_directory_uri() . $relative_path;
		$path = get_template_directory() . $relative_path;

		wp_enqueue_script(
			'wp-awesome-widgets',
			$src,
			[ 'jquery' ],
			filemtime( $path ),
			true
		);
	}

	/**
	 * Enqueue assets for admin
	 *
	 * @return void
	 */
	public function _admin_enqueue_scripts() {
		if ( ! did_action( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		}

		$relative_path = '/vendor/inc2734/wp-awesome-widgets/src/assets/admin-css/wp-awesome-widgets-admin.min.css';
		$src  = get_template_directory_uri() . $relative_path;
		$path = get_template_directory() . $relative_path;

		wp_enqueue_style(
			'wp-awesome-widgets-admin',
			$src,
			[],
			filemtime( $path )
		);

		$relative_path = '/vendor/inc2734/wp-awesome-widgets/src/assets/admin-js/wp-awesome-widgets-admin.min.js';
		$src  = get_template_directory_uri() . $relative_path;
		$path = get_template_directory() . $relative_path;

		wp_enqueue_script(
			'wp-awesome-widgets-admin',
			$src,
			[ 'jquery', 'jquery-ui-sortable', 'wp-color-picker' ],
			filemtime( $path ),
			true
		);

		wp_localize_script(
			'wp-awesome-widgets-admin',
			'wp_awesome_widgets_item_selector_wp_api',
			[
				'root' => esc_url_raw( rest_url() ),
			]
		);

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

	if ( ! preg_match( '/<script>/s', $code ) ) {
		if ( ! preg_match( '/<ins /s', $code ) ) {
			// Auto ads.
			$code = '<script>' . $code . '</script>';
		} else {
			// Not auto ads.
			$code .= '<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>';
		}
	}

	// @todo
	// @codingStandardsIgnoreStart
	echo $code;
	// @codingStandardsIgnoreEnd

	remove_filter( 'safe_style_css', __NAMESPACE__ . '\\inc2734_wpaw_safe_style_css_display' );
}
