<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets;

use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class Bootstrap {

	/**
	 * Constructor
	 */
	public function __construct() {
		load_textdomain( 'inc2734-wp-awesome-widgets', __DIR__ . '/languages/' . get_locale() . '.mo' );

		$includes = [
			'/deprecated',
			'/widget',
		];
		foreach ( $includes as $include ) {
			$iterator = new RecursiveDirectoryIterator( __DIR__ . $include, FilesystemIterator::SKIP_DOTS );
			$iterator = new RecursiveIteratorIterator( $iterator );

			foreach ( $iterator as $file ) {
				if ( ! $file->isFile() ) {
					continue;
				}

				if ( 'php' !== $file->getExtension() ) {
					continue;
				}

				if ( 0 === strpos( $file->getBasename(), '_' ) ) {
					continue;
				}

				include_once( realpath( $file->getPathname() ) );
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
		if ( ! wp_style_is( 'slick-carousel', 'registered' ) ) {
			wp_register_style(
				'slick-carousel',
				get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/packages/slick-carousel/slick/slick.css',
				[],
				filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/packages/slick-carousel/slick/slick.css' )
			);
		}

		if ( ! wp_style_is( 'slick-carousel-theme', 'registered' ) ) {
			wp_register_style(
				'slick-carousel-theme',
				get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/packages/slick-carousel/slick/slick-theme.css',
				[ 'slick-carousel' ],
				filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/packages/slick-carousel/slick/slick-theme.css' )
			);
		}

		wp_enqueue_style(
			'wp-awesome-widgets',
			get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/css/wp-awesome-widgets.min.css',
			[ 'slick-carousel-theme' ],
			filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/css/wp-awesome-widgets.min.css' )
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

		$relative_path = '/vendor/inc2734/wp-awesome-widgets/src/assets/admin-js/wp-awesome-widgets-admin.js';
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
		$relative_path = '/vendor/inc2734/wp-awesome-widgets/src/assets/admin-js/customize-preview.js';

		wp_enqueue_script(
			'wp-awesome-widgets-customize-preview',
			get_template_directory_uri() . $relative_path,
			[
				'customize-preview',
				'customize-selective-refresh',
			],
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
		$relative_path = '/vendor/inc2734/wp-awesome-widgets/src/assets/admin-js/elementor-preview.js';
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
