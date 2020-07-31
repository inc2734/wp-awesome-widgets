<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets\App\Contract;

use WP_Widget;

/**
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class Widget extends WP_Widget {

	/**
	 * @var array
	 */
	protected $_defaults = [];

	/**
	 * @var string
	 */
	protected $_path;

	/**
	 * @SuppressWarnings(PHPMD.MissingImport)
	 */
	public function __construct( $id_base, $name, $widget_options = [] ) {
		$reflection  = new \ReflectionClass( $this );
		$this->_path = dirname( $reflection->getFileName() );

		$widget_options['widget_name'] = $name;
		$widget_options = apply_filters( 'inc2734_wp_awesome_widgets_widget_options', $widget_options, $reflection->getName() );
		$name = $widget_options['widget_name'];
		unset( $widget_options['widget_name'] );

		parent::__construct( false, $name, $widget_options );
	}

	/**
	 * Render widget
	 *
	 * @param array $widget_args
	 * @param array $instance
	 * @return void
	 */
	public function widget( $widget_args, $instance ) {
		$instance = shortcode_atts( $this->_defaults, $instance );
		foreach ( $instance as $key => $value ) {
			if ( is_array( $this->_defaults[ $key ] ) && isset( $this->_defaults[ $key ][0] ) && is_array( $this->_defaults[ $key ][0] ) ) {
				foreach ( array_keys( $value ) as $repeater_key ) {
					$instance[ $key ][ $repeater_key ] = shortcode_atts( $this->_defaults[ $key ][0], $instance[ $key ][ $repeater_key ] );
				}
			}
		}
		$this->_render_widget( $widget_args, $instance );
	}

	/**
	 * Render form
	 *
	 * @param array $instance
	 * @return void
	 */
	public function form( $instance ) {
		$instance = shortcode_atts( $this->_defaults, $instance );
		foreach ( $instance as $key => $value ) {
			if ( is_array( $this->_defaults[ $key ] ) && isset( $this->_defaults[ $key ][0] ) && is_array( $this->_defaults[ $key ][0] ) ) {
				foreach ( array_keys( $value ) as $repeater_key ) {
					$instance[ $key ][ $repeater_key ] = shortcode_atts( $this->_defaults[ $key ][0], $instance[ $key ][ $repeater_key ] );
				}
				array_unshift( $instance[ $key ], $this->_defaults[ $key ][0] );
			}
		}
		$this->_render_form( $instance );
	}

	/**
	 * Render widget
	 *
	 * @param array $widget_args
	 * @param array $instance
	 * @return void
	 */
	protected function _render_widget( $widget_args, $instance ) {
		$widget_templates = apply_filters( 'inc2734_wp_awesome_widgets_widget_templates', 'templates/widget' );
		$default_template = $this->_path . '/_widget.php';
		$custom_template  = $widget_templates . '/' . basename( $this->_path );

		ob_start();

		if ( file_exists( get_theme_file_path( $custom_template . '.php' ) ) ) {
			include( get_theme_file_path( $custom_template . '.php' ) );
		} elseif ( file_exists( $default_template ) ) {
			include( $default_template );
		}

		$widget = ob_get_clean();

		if ( empty( $widget ) ) {
			return;
		}

		// @codingStandardsIgnoreStart
		echo apply_filters( 'inc2734_wp_awesome_widgets_render_widget', $widget, $widget_args, $instance );
		// @codingStandardsIgnoreEnd
	}

	/**
	 * Render form
	 *
	 * @param array $instance
	 * @return void
	 */
	protected function _render_form( $instance ) {
		$file = $this->_path . '/_form.php';
		if ( ! file_exists( $file ) ) {
			return;
		}

		include( $file );
	}
}
