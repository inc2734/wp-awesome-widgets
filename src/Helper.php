<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Awesome_Widgets;

use Inc2734\WP_Adsense;
use WP_Query;

class Helper {

	/**
	 * Display google adsense.
	 *
	 * @param string      $code The adsense code.
	 * @param string|null $size Size of the adsense code.
	 */
	public static function the_adsense_code( $code, $size = null ) {
		WP_Adsense\Helper::the_adsense_code( $code, $size );
	}

	/**
	 * Display descendant pages of specified page.
	 *
	 * @param int   $parent_id       Target page ID.
	 * @param int   $current_page_id Current page ID.
	 * @param array $args            Argments.
	 */
	public static function the_child_nav( $parent_id, $current_page_id, $args ) {
		if ( wp_get_post_parent_id( get_the_ID() ) === $current_page_id ) {
			return;
		}

		if ( get_the_id() !== $current_page_id
				&& ! in_array( (int) $current_page_id, get_post_ancestors( get_the_id() ), true )
				&& ! in_array( (int) get_the_ID(), get_post_ancestors( $current_page_id ), true )
		) {
			return;
		}

		$args = wp_parse_args(
			$args,
			[
				'sublist-class' => '',
				'subitem-class' => '',
				'limit'         => -1,
			]
		);

		$query_args = [
			'posts_per_page'   => 50,
			'suppress_filters' => false,
			'orderby'          => [
				'menu_order' => 'ASC',
				'ID'         => 'DESC',
			],
		];
		$query_args = apply_filters( 'inc2734_wp_awesome_widgets_child_nav_args', $query_args );

		$children_query = new WP_Query(
			array_merge(
				$query_args,
				[
					'post_type'           => get_post_type(),
					'post_parent'         => $parent_id,
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				]
			)
		);
		if ( ! $children_query->have_posts() ) {
			return;
		}
		?>
		<ul class="<?php echo esc_attr( $args['sublist-class'] ); ?>">
			<?php while ( $children_query->have_posts() ) : ?>
				<?php $children_query->the_post(); ?>
				<li class="<?php echo esc_attr( $args['subitem-class'] ); ?>">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php
					if ( -1 >= $args['limit'] || 0 < $args['limit'] ) {
						$args['limit'] --;
						static::the_child_nav( get_the_ID(), $current_page_id, $args );
					}
					?>
				</li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul>
		<?php
	}

	/**
	 * Display local navigation.
	 * It can stop with child's display.
	 *
	 * @param int   $founder_id      Target page ID.
	 * @param int   $current_page_id Current page ID.
	 * @param array $args            Argments.
	 */
	public static function the_local_nav( $founder_id, $current_page_id, $args = [] ) {
		$args = wp_parse_args(
			$args,
			[
				'list-class'                   => '',
				'item-class'                   => '',
				'sublist-class'                => '',
				'subitem-class'                => '',
				'limit'                        => -1,
				'display-top-level-page-title' => 1,
			]
		);
		?>
		<ul class="<?php echo esc_attr( $args['list-class'] ); ?>">
			<li class="<?php echo esc_attr( $args['item-class'] ); ?>">
				<?php if ( $args['display-top-level-page-title'] ) : ?>
					<a href="<?php the_permalink( $founder_id ); ?>">
						<?php echo esc_html( get_the_title( $founder_id ) ); ?>
					</a>
				<?php endif; ?>

				<?php static::the_child_nav( $founder_id, $current_page_id, $args ); ?>
			</li>
		</ul>
		<?php
	}

	/**
	 * Render widget.
	 *
	 * @param string $path        Full path to widget.php.
	 * @param array  $widget_args The widget argments.
	 * @param array  $instance    The widget instance.
	 * @return string
	 */
	public static function render_widget( $path, $widget_args, $instance ) {
		$widget_templates = apply_filters( 'inc2734_wp_awesome_widgets_widget_templates', 'templates/widget' );
		$default_template = $path . '/_widget.php';
		$custom_template  = $widget_templates . '/' . basename( $path );

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

		return apply_filters(
			'inc2734_wp_awesome_widgets_render_widget',
			$widget,
			$widget_args,
			$instance
		); // xss ok.
	}
}
