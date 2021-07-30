<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets\App\Contract;

use WP_Widget;
use Inc2734\WP_Awesome_Widgets\Helper;

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
	 * Constructor.
	 *
	 * @param string $id_base         Optional. Base ID for the widget, lowercase and unique.
	 *                                If left empty, a portion of the widget's class name will be used.*                                Has to be unique.
	 * @param string $name            Name for the widget displayed on the configuration page.
	 * @param array  $widget_options  Optional. Widget options. See wp_register_sidebar_widget() for
	 *                                information on accepted arguments. Default empty array.
	 */
	public function __construct( $id_base, $name, $widget_options = [] ) {
		$reflection  = new \ReflectionClass( $this );
		$this->_path = dirname( $reflection->getFileName() );

		$widget_options['widget_name'] = $name;
		$widget_options                = apply_filters( 'inc2734_wp_awesome_widgets_widget_options', $widget_options, $reflection->getName() );
		$name                          = $widget_options['widget_name'];
		unset( $widget_options['widget_name'] );

		parent::__construct( false, $name, $widget_options );
	}

	/**
	 * Render widget.
	 *
	 * @param array $widget_args The widget argments.
	 * @param array $instance    The widget instance.
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

		if ( ! isset( $widget_args['widget_id'] ) ) {
			$widget_args['widget_id'] = $this->id_base . '-0';
		}

		if ( ! isset( $widget_args['id'] ) ) {
			$widget_args['id'] = false;
		}

		$this->_render_widget( $widget_args, $instance );
	}

	/**
	 * Render form.
	 *
	 * @param array $instance The widget instance.
	 */
	public function form( $instance ) {
		if ( wp_use_widgets_block_editor() ) {
			echo sprintf(
				// translators: %1$s: The start tag of the a element, %2$s: The end tag of the a element
				__(
					'This can only be edited if the %1$sClassic Widgets%2$s plugin is enabled.',
					'inc2734-wp-awesome-widgets'
				),
				'<a href="https://ja.wordpress.org/plugins/classic-widgets/" target="_blank" rel="noopener">',
				'</a>'
			);
			return;
		}

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
	 * Render widget.
	 *
	 * @param array $widget_args The widget argments.
	 * @param array $instance    The widget instance.
	 */
	protected function _render_widget( $widget_args, $instance ) {
		echo Helper::render_widget( $this->_path, $widget_args, $instance ); // xss ok.
	}

	/**
	 * Render form.
	 *
	 * @param array $instance The widget instance.
	 */
	protected function _render_form(
		// phpcs:disable VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
		$instance
		// phpcs:enable
	) {
		$file = $this->_path . '/_form.php';
		if ( ! file_exists( $file ) ) {
			return;
		}

		include( $file );
	}
}
