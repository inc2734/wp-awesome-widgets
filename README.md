# WP Awesome Widgets

![CI](https://github.com/inc2734/wp-awesome-widgets/workflows/CI/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/inc2734/wp-awesome-widgets/v/stable)](https://packagist.org/packages/inc2734/wp-awesome-widgets)
[![License](https://poser.pugx.org/inc2734/wp-awesome-widgets/license)](https://packagist.org/packages/inc2734/wp-awesome-widgets)

## Widgets

* PR Box
* Slider (slick)
* Pickup slider (slick)
* Showcase
* Site branding (Displaying the Logo)
* Recent posts
* Any posts
* Ranking (Self updating)
* Taxonomy posts
* Contents outline
* Profile box
* Carousel (Any posts)
* Local navigation

## Install
```
$ composer require inc2734/wp-awesome-widgets
```

## How to use
```
<?php
new \Inc2734\WP_Awesome_Widgets\Bootstrap();
```

### How to overwite widget templates
You can overwite the widget template.
For example,

```
$ cd wp-content/your-theme
$ mkdir -p templates/widget
$ cp vendor/inc2734/wp-awesome-widgets/src/widget/slider/_widget.php templates/widget/slider.php
$ vi templates/widget/slider.php
```

## Filter hooks

###
```
/**
 * Customize widget options

 * @param array $widget_options
 * @param string The widget class name
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_widget_options',
	function( $widget_options, $classname ) {
		return $widget_options;
	},
	10,
	2
);
```

### inc2734_wp_awesome_widgets_recent_posts_widget_args
```
/**
 * Customize recent posts widget args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_recent_posts_widget_args',
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_recent_posts_widget_args_&lt;$widget_number&gt;
```
/**
 * Customize specific recent posts widget args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_recent_posts_widget_args_'. $widget_number,
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_ranking_widget_args
```
/**
 * Customize ranking widget args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_ranking_widget_args',
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_ranking_widget_args_&lt;$widget_number&gt;
```
/**
 * Customize specific ranking widget args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_ranking_widget_args_' . $widget_number,
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_carousel_any_posts_widget_args

```
/**
 * Customize carousel any posts widget args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_carousel_any_posts_widget_args',
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_carousel_any_posts_widget_args_&lt;$widget_number&gt;
```
/**
 * Customize specific carousel any posts widget args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_carousel_any_posts_widget_args_'. $widget_number,
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_carousel_image_size
```
/**
 * Customize carousel image size
 *
 * @param string $image_size
 * @param boolean $is_mobile
 * @param numeric $widget_id
 * @return string
 */
add_filter(
	'inc2734_wp_awesome_widgets_carousel_image_size',
	function( $image_size, $is_mobile, $widget_id ) {
		return $image_size;
	},
	10,
	3
);
```

### inc2734_wp_awesome_widgets_any_posts_widget_args
```
/**
 * Customize any posts widget args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_any_posts_widget_args',
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_any_posts_widget_args_&lt;$widget_number&gt;
```
/**
 * Customize specific any posts widget args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_any_posts_widget_args_' . $widget_number,
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_showcase_backgroud_image_size
```
/**
 * Customize showcase widget background image size
 *
 * @param string $image_size
 * @param boolean $is_mobile
 * @param numeric $widget_id
 * @return string
 */
add_filter(
	'inc2734_wp_awesome_widgets_showcase_backgroud_image_size',
	function( $image_size, $is_mobile, $widget_id ) {
		return $image_size;
	},
	10,
	3
);
```

### inc2734_wp_awesome_widgets_showcase_image_size
```
/**
 * Customize showcase widget image size
 *
 * @param string $image_size
 * @param boolean $is_mobile
 * @param numeric $widget_id
 * @return string
 */
add_filter(
	'inc2734_wp_awesome_widgets_showcase_image_size',
	function( $image_size, $is_mobile, $widget_id ) {
		return $image_size;
	},
	10,
	3
);
```

### inc2734_wp_awesome_widgets_widget_templates
```
/**
 * Customize custom widget template slug (directory)
 *
 * @param string $slug
 * @return string
 */
add_filter(
	'inc2734_wp_awesome_widgets_widget_templates',
	function( $slug ) {
		return $slug;
	}
);
```

### inc2734_wp_awesome_widgets_render_widget
```
/**
 * Customzie widget html
 *
 * @param string $html
 * @param array $widget_args
 * @param array $instance
 * @return string
 */
add_filter(
	'inc2734_wp_awesome_widgets_render_widget',
	function( $html, $widget_args, $instance ) {
		return $html;
	},
	10,
	3
);
```

### inc2734_wp_awesome_widgets_taxonomy_posts_widget_args
```
/**
 * Customzize taxonomy posts widget args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_taxonomy_posts_widget_args',
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_taxonomy_posts_widget_args_&lt;$widget_number&gt;
```
/**
 * Customize specific taxonomy posts widget args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_taxonomy_posts_widget_args_' . $widget_number,
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_pickup_slider_widget_args
```
/**
 * Customize pickup slider widget args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_pickup_slider_widget_args',
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_pickup_slider_widget_args_&lt;$widget_number&gt;
```
/**
 * Customize specific pickup slider widget args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_pickup_slider_widget_args_' . $widget_number,
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_pickup_slider_image_size
```
/**
 * Customize pickup slider widget image size
 *
 * @param string $image_size
 * @param boolean $is_mobile
 * @param numeric widget_id
 * @return string
 */
add_filter(
	'inc2734_wp_awesome_widgets_pickup_slider_image_size',
	function( $image_size, $is_mobile, $widget_id ) {
		return $image_size;
	},
	10,
	3
);
```

### inc2734_wp_awesome_widgets_child_nav_args
```
/**
 * Customize child nav args
 *
 * @param array $query_args
 * @return array
 */
add_filter(
	'inc2734_wp_awesome_widgets_child_nav_args',
	function( $query_args ) {
		return $query_args;
	}
);
```

### inc2734_wp_awesome_widgets_posts_list_image_size
```
/**
 * Customize posts list widget (recent posts, ranking any posts) image size
 *
 * @param string $image_size
 * @param boolean $is_mobile
 * @param numeric widget_id
 * @return string
 */
add_filter(
	'inc2734_wp_awesome_widgets_posts_list_image_size',
	function( $image_size, $is_mobile, $widget_id ) {
		return $image_size;
	},
	10,
	3
);
```

### inc2734_wp_awesome_widgets_view_args
```
/**
 * @param array $args
 *  @var string $slug
 *  @var string $name
 *  @var array $vars
 * @param array
 */
add_filter(
	'inc2734_wp_awesome_widgets_view_args',
	function( $args ) {
		return $args;
	}
);
```

### inc2734_wp_awesome_widgets_view_render
```
/**
 * @param string $html
 * @param string $slug
 * @param string $name
 * @param array $vars
 * @return string
 */
add_filter(
	'inc2734_wp_awesome_widgets_view_render',
	function( $html, $slug, $name, $vars ) {
		return $html;
	},
	10,
	4
);
```

## Action hooks

### inc2734_wp_awesome_widgets_before_admin_enqueue_scripts

### inc2734_wp_awesome_widgets_after_admin_enqueue_scripts

### inc2734_wp_awesome_widgets_view_pre_render
```
/**
 * @param array $args
 *  @var string $slug
 *  @var string $name
 *  @var array $vars
 */
add_action(
	'inc2734_wp_awesome_widgets_view_pre_render',
	function( $args ) {
	}
);
```

### inc2734_wp_awesome_widgets_view_post_render
```
/**
 * @param array $args
 *  @var string $slug
 *  @var string $name
 *  @var array $vars
 */
add_action(
	'inc2734_wp_awesome_widgets_view_post_render',
	function( $args ) {
	}
);
```

### inc2734_wp_awesome_widgets_view_&lt;slug&gt;
```
/**
 * @param string $name
 * @param array $vars
 */
add_action(
	'inc2734_wp_awesome_widgets_view_<slug>',
	function( $name, $vars ) {
		?>
		HTML
		<?php
	},
	10,
	2
);
```

### inc2734_wp_awesome_widgets_view_&lt;slug&gt;-&lt;name&gt;
```
/**
 * @param array $vars
 */
add_action(
	'inc2734_wp_awesome_widgets_view_<slug>-<name>',
	function( $vars ) {
		?>
		HTML
		<?php
	}
);
```

## Thirt-party resources
### slick
http://kenwheeler.github.io/slick/
