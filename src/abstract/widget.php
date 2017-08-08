<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

class Inc2734_WP_Awesome_Widgets_Abstract_Widget extends WP_Widget {

	protected $_defaults = [];
	protected $_path;

	public function __construct( $id_base, $name ) {
		$this->_path = __DIR__;
		parent::__construct( false, $name );
	}

	public function widget( $args, $instance ) {
		$instance = shortcode_atts( $this->_defaults, $instance );
		$this->_render_widget( $args, $instance );
	}

	public function form( $instance ) {
		$instance = shortcode_atts( $this->_defaults, $instance );
		$this->_render_form( $instance );
	}

	protected function _render_widget( $args, $instance ) {
		$file = $this->_path . '/_widget.php';
		if ( ! file_exists( $file ) ) {
			return;
		}

		include( $file );
	}

	protected function _render_form( $instance ) {
		$file = $this->_path . '/_form.php';
		if ( ! file_exists( $file ) ) {
			return;
		}

		include( $file );
	}
}
