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
			'/deprecated',
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
		add_action( 'customize_preview_init', [ $this, '_customize_preview_init' ], 9 );

		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, '_admin_enqueue_scripts' ] );
		add_action( 'elementor/preview/init', [ $this, '_preview_enqueue_scripts_for_elemener' ] );
		add_action( 'elementor/frontend/after_register_scripts', [ $this, '_deregister_elementor_slick' ] );

		add_action( 'load-post-new.php', [ $this, '_admin_enqueue_scripts_for_siteorigin_panels' ] );
		add_action( 'load-post.php', [ $this, '_admin_enqueue_scripts_for_siteorigin_panels' ] );
	}

	/**
	 * Enqueue assets
	 *
	 * @return void
	 */
	public function _wp_enqueue_scripts() {
		$relative_path = '/vendor/inc2734/wp-awesome-widgets/src/assets/css/wp-awesome-widgets.min.css';
		wp_enqueue_style(
			'wp-awesome-widgets',
			get_template_directory_uri() . $relative_path,
			[],
			filemtime( get_template_directory() . $relative_path )
		);

		$relative_path = '/vendor/inc2734/wp-awesome-widgets/src/assets/js/wp-awesome-widgets.min.js';
		wp_enqueue_script(
			'wp-awesome-widgets',
			get_template_directory_uri() . $relative_path,
			[ 'jquery' ],
			filemtime( get_template_directory() . $relative_path ),
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
		wp_enqueue_style(
			'wp-awesome-widgets-admin',
			get_template_directory_uri() . $relative_path,
			[],
			filemtime( get_template_directory() . $relative_path )
		);

		$relative_path = '/vendor/inc2734/wp-awesome-widgets/src/assets/admin-js/wp-awesome-widgets-admin.min.js';
		wp_enqueue_script(
			'wp-awesome-widgets-admin',
			get_template_directory_uri() . $relative_path,
			[ 'jquery', 'jquery-ui-sortable', 'wp-color-picker' ],
			filemtime( get_template_directory() . $relative_path ),
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

	/**
	 * Enqueue script for customize preview
	 *
	 * @return void
	 */
	public function _customize_preview_init() {
		$relative_path = '/vendor/inc2734/wp-awesome-widgets/src/assets/admin-js/customize-preview.min.js';

		wp_enqueue_script(
			'wp-awesome-widgets-customize-preview',
			get_template_directory_uri() . $relative_path,
			[ 'customize-preview' ],
			filemtime( get_template_directory() . $relative_path ),
			true
		);
	}

	/**
	 * Enqueue assets for Elementor preview screen
	 *
	 * @return void
	 */
	public function _preview_enqueue_scripts_for_elemener() {
		$relative_path = '/vendor/inc2734/wp-awesome-widgets/src/assets/admin-js/elementor-preview.min.js';
		wp_enqueue_script(
			'wp-awesome-widgets-elementor-preview',
			get_template_directory_uri() . $relative_path,
			[],
			filemtime( get_template_directory() . $relative_path ),
			true
		);
	}

	/**
	 * Deregister slick of Elementor
	 *
	 * @return void
	 */
	public function _deregister_elementor_slick() {
		wp_deregister_script( 'jquery-slick' );
	}

	/**
	 * Enqueue assets for Page Builder for SiteOrigin
	 *
	 * @return void
	 */
	public function _admin_enqueue_scripts_for_siteorigin_panels() {
		if ( ! class_exists( '\SiteOrigin_Panels' ) ) {
			return;
		}

		add_action( 'admin_enqueue_scripts', [ $this, '_admin_enqueue_scripts' ] );
	}
}
