<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

class Inc2734_WP_Awesome_Widgets {

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
			home_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/js/color-picker-field.js' ),
			[ 'jquery', 'wp-color-picker' ],
			false,
			true
		);

		wp_enqueue_script(
			'wp-awesome-widgets-thumbnail-field',
			home_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/js/thumbnail-field.js' ),
			[ 'jquery' ],
			false,
			true
		);

		wp_enqueue_style(
			'wp-awesome-widgets-thumbnail-field',
			home_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/css/thumbnail-field.css' )
		);

		wp_enqueue_script(
			'wp-awesome-widgets-repeater',
			home_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/js/repeater.js' ),
			[ 'jquery', 'jquery-ui-sortable' ],
			false,
			true
		);

		wp_enqueue_style(
			'wp-awesome-widgets-repeater',
			home_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/css/repeater.css' )
		);

		wp_enqueue_style(
			'wp-awesome-widgets-item-selector',
			home_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/css/item-selector.css' )
		);

		wp_enqueue_script(
			'wp-awesome-widgets-item-selector',
			home_url( str_replace( ABSPATH, '', __DIR__ ) . '/assets/js/item-selector.js' ),
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
