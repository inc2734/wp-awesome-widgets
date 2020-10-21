<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Awesome_Widgets\App\Contract;

class Inc2734_WP_Awesome_Widgets_Ranking extends Contract\Widget {

	/**
	 * @var array
	 */
	protected $_defaults = [
		'title'          => null,
		'post-type'      => 'post',
		'items'          => null,
		'show-thumbnail' => 1,
		'show-taxonomy'  => 1,
	];

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct(
			false,
			__( 'WPAW: Ranking (Manual update)', 'inc2734-wp-awesome-widgets' ),
			[
				'customize_selective_refresh' => true,
			]
		);
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
		$new_instance = shortcode_atts( $this->_defaults, $new_instance );

		$items     = explode( ',', $new_instance['items'] );
		$new_items = [];
		foreach ( $items as $post_id ) {
			if ( get_post( $post_id ) ) {
				$new_items[] = $post_id;
			}
		}
		$new_instance['items'] = implode( ',', $new_items );

		return $new_instance;
	}
}

add_action(
	'widgets_init',
	function() {
		register_widget( 'Inc2734_WP_Awesome_Widgets_Ranking' );
	}
);
