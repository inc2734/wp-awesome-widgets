<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\Contract;

class Inc2734_WP_Awesome_Widgets_Profile_Box extends Contract\Widget {

	/**
	 * @var array
	 */
	protected $_defaults = [];

	public function __construct() {
		parent::__construct(
			false,
			__( 'WPAW: Profile box', 'inc2734-wp-awesome-widgets' ),
			[
				'customize_selective_refresh' => false,
			]
		);
	}

	public function update( $new_instance, $old_instance ) {
		$new_instance = shortcode_atts( $this->_defaults, $new_instance );
		return $new_instance;
	}
}

add_action(
	'widgets_init',
	function() {
		register_widget( 'Inc2734_WP_Awesome_Widgets_Profile_Box' );
	}
);
