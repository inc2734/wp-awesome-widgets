<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Recent posts widget
 */
class Inc2734_WP_Awesome_Widgets_Google_Adsense extends Inc2734_WP_Awesome_Widgets_Abstract_Widget {

	/**
	 * @var array
	 */
	protected $_defaults = [
		'code' => '',
		'size' => 'auto',
	];

	public function __construct() {
		parent::__construct( false, __( 'WPAW: Google Adsense', 'inc2734-wp-awesome-widgets' ) );
	}

	public function update( $new_instance, $old_instance ) {
		$new_instance = shortcode_atts( $this->_defaults, $new_instance );
		$new_instance['code'] = preg_replace( '@<script>[^<]*<\/script>@s', '', $new_instance['code'] );
		$new_instance['code'] = strip_tags( $new_instance['code'], '<ins>' );
		return $new_instance;
	}
}

add_action(
	'widgets_init',
	function() {
		register_widget( 'Inc2734_WP_Awesome_Widgets_Google_Adsense' );
	}
);
