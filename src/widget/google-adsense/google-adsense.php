<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\Contract;

class Inc2734_WP_Awesome_Widgets_Google_Adsense extends Contract\Widget {

	/**
	 * @var array
	 */
	protected $_defaults = [
		'code' => '',
		'size' => 'auto',
	];

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct( false, __( 'WPAW: Google Adsense', 'inc2734-wp-awesome-widgets' ) );
	}

	/**
	 * Updates a particular instance of a widget.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array
	 */
	public function update(
		$new_instance,
		// phpcs:disable VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
		$old_instance
		// phpcs:enable
	) {
		$new_instance         = shortcode_atts( $this->_defaults, $new_instance );
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
