<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets\Helper;

/**
 * Display google adsense
 *
 * @param $code
 * @param $size
 * @return void
 */
function display_adsense_code( $code, $size = null ) {
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
