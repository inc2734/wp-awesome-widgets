<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets\Helper;

/**
 * Display google adsense.
 *
 * @param string      $code The adsense code.
 * @param string|null $size Size of the adsense code.
 */
function display_adsense_code( $code, $size = null ) {
	\Inc2734\WP_Awesome_Widgets\Helper::the_adsense_code( $code, $size );
}

/**
 * Display descendant pages of specified page.
 *
 * @param int   $parent_id       Target page ID.
 * @param int   $current_page_id Current page ID.
 * @param array $args            Argments.
 */
function the_child_nav( $parent_id, $current_page_id, $args ) {
	\Inc2734\WP_Awesome_Widgets\Helper::the_child_nav( $parent_id, $current_page_id, $args );
}

/**
 * Display local navigation.
 * It can stop with child's display.
 *
 * @param int   $founder_id      Target page ID.
 * @param int   $current_page_id Current page ID.
 * @param array $args            Argments.
 */
function the_local_nav( $founder_id, $current_page_id, $args = [] ) {
	\Inc2734\WP_Awesome_Widgets\Helper::the_local_nav( $founder_id, $current_page_id, $args );
}
