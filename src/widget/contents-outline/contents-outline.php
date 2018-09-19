<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Contents outline widget
 */
class Inc2734_WP_Awesome_Widgets_Contents_Outline extends Inc2734_WP_Awesome_Widgets_Abstract_Widget {

	/**
	 * @var array
	 */
	protected $_defaults = [
		'headings'    => [ 'h2' ],
		'show-mobile' => 0,
	];

	public function __construct() {
		parent::__construct(
			false,
			__( 'WPAW: Contents outline', 'inc2734-wp-awesome-widgets' ),
			[
				'customize_selective_refresh' => true,
			]
		);
	}

	public function update( $new_instance, $old_instance ) {
		$new_instance = shortcode_atts( $this->_defaults, $new_instance );

		$new_instance['headings'] = array_filter( $new_instance['headings'] );

		return $new_instance;
	}
}

add_action(
	'widgets_init',
	function() {
		register_widget( 'Inc2734_WP_Awesome_Widgets_Contents_Outline' );
	}
);
