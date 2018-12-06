<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets;

class Bootstrap {

	public function __construct() {
		load_textdomain( 'inc2734-wp-awesome-widgets', __DIR__ . '/languages/' . get_locale() . '.mo' );

		$includes = [
			'/Helper',
			'/widget',
			'/widget/*',
		];
		foreach ( $includes as $include ) {
			foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
				if ( '_' === substr( basename( $file ), 0, 1 ) ) {
					continue;
				}

				require_once( $file );
			}
		}

		add_action( 'wp_enqueue_scripts', [ $this, '_wp_enqueue_scripts' ] );
		add_action( 'load-widgets.php', [ $this, '_admin_enqueue_scripts' ], 9 );
		add_action( 'load-customize.php', [ $this, '_admin_enqueue_scripts' ], 9 );
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
		do_action( 'inc2734_wp_awesome_widgets_before_admin_enqueue_scripts' );

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

		do_action( 'inc2734_wp_awesome_widgets_after_admin_enqueue_scripts' );
	}
}
