<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets;

class Bootstrap {

	/**
	 * Constructor.
	 */
	public function __construct() {
		load_textdomain( 'inc2734-wp-awesome-widgets', __DIR__ . '/languages/' . get_locale() . '.mo' );

		include_once( __DIR__ . '/deprecated/Helper.php' );

		include_once( __DIR__ . '/widget/widget.php' );
		include_once( __DIR__ . '/widget/any-posts/any-posts.php' );
		include_once( __DIR__ . '/widget/carousel-any-posts/carousel-any-posts.php' );
		include_once( __DIR__ . '/widget/contents-outline/contents-outline.php' );
		include_once( __DIR__ . '/widget/google-adsense/google-adsense.php' );
		include_once( __DIR__ . '/widget/local-nav/local-nav.php' );
		include_once( __DIR__ . '/widget/pickup-slider/pickup-slider.php' );
		include_once( __DIR__ . '/widget/pr-box/pr-box.php' );
		include_once( __DIR__ . '/widget/profile-box/profile-box.php' );
		include_once( __DIR__ . '/widget/ranking/ranking.php' );
		include_once( __DIR__ . '/widget/recent-posts/recent-posts.php' );
		include_once( __DIR__ . '/widget/showcase/showcase.php' );
		include_once( __DIR__ . '/widget/site-branding/site-branding.php' );
		include_once( __DIR__ . '/widget/slider/slider.php' );
		include_once( __DIR__ . '/widget/taxonomy-posts/taxonomy-posts.php' );

		add_action(
			'init',
			function() {
				include_once( __DIR__ . '/block/local-nav/index.php' );
				include_once( __DIR__ . '/block/recent-posts/index.php' );
				include_once( __DIR__ . '/block/profile-box/index.php' );
				include_once( __DIR__ . '/block/any-posts/index.php' );
				include_once( __DIR__ . '/block/ranking/index.php' );
				include_once( __DIR__ . '/block/site-branding/index.php' );
			}
		);

		// @todo I want to use enqueue_block_assets, but it is not reflected in the block widget area management screen.
		add_action( 'wp_enqueue_scripts', [ $this, '_enqueue_block_assets' ] );

		add_action( 'wp_enqueue_scripts', [ $this, '_wp_enqueue_scripts' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, '_enqueue_block_editor_assets' ] );
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
	 * Enqueue assets for all.
	 */
	public function _enqueue_block_assets() {
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
	}

	/**
	 * Enqueue assets for front.
	 */
	public function _wp_enqueue_scripts() {
		wp_enqueue_style(
			'wp-awesome-widgets',
			get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/css/app.css',
			[ 'slick-carousel-theme' ],
			filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/css/app.css' )
		);
	}

	/**
	 * Enqueue assets for block editor.
	 */
	public function _enqueue_block_editor_assets() {
		wp_enqueue_style(
			'wp-awesome-widgets',
			get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/css/editor.css',
			[],
			filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/css/editor.css' )
		);

		wp_enqueue_script(
			'wp-awesome-widgets-editor',
			get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/editor/editor.js',
			[],
			filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/editor/editor.js' ),
			true
		);

		wp_set_script_translations(
			'wp-awesome-widgets-editor',
			'inc2734-wp-awesome-widgets',
			__DIR__ . '/languages/'
		);
	}

	/**
	 * Enqueue assets for admin.
	 */
	public function _admin_enqueue_scripts() {
		do_action( 'inc2734_wp_awesome_widgets_before_admin_enqueue_scripts' );

		if ( ! did_action( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		}

		wp_enqueue_style(
			'wp-awesome-widgets-admin',
			get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/css/admin.css',
			[],
			filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/css/admin.css' )
		);

		wp_enqueue_script(
			'wp-awesome-widgets-admin',
			get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/admin/admin.js',
			[ 'jquery', 'jquery-ui-sortable', 'wp-color-picker' ],
			filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/admin/admin.js' ),
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
	 * Enqueue script for customize preview.
	 */
	public function _customize_preview_init() {
		wp_enqueue_script(
			'wp-awesome-widgets-customize-preview',
			get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/admin/customize-preview.js',
			[
				'customize-preview',
				'customize-selective-refresh',
			],
			filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/admin/customize-preview.js' ),
			true
		);
	}

	/**
	 * Enqueue assets for Elementor preview screen.
	 */
	public function _preview_enqueue_scripts_for_elemener() {
		wp_enqueue_script(
			'wp-awesome-widgets-elementor-preview',
			get_template_directory_uri() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/admin/elementor-preview.js',
			[],
			filemtime( get_template_directory() . '/vendor/inc2734/wp-awesome-widgets/src/assets/js/admin/elementor-preview.js' ),
			true
		);
	}

	/**
	 * Deregister slick of Elementor.
	 */
	public function _deregister_elementor_slick() {
		wp_deregister_script( 'jquery-slick' );
	}

	/**
	 * Enqueue assets for Page Builder for SiteOrigin.
	 */
	public function _admin_enqueue_scripts_for_siteorigin_panels() {
		if ( ! class_exists( '\SiteOrigin_Panels' ) ) {
			return;
		}

		add_action( 'admin_enqueue_scripts', [ $this, '_admin_enqueue_scripts' ] );
	}
}
