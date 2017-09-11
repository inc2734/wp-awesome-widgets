# WP Awesome Widgets

[![Build Status](https://travis-ci.org/inc2734/wp-awesome-widgets.svg?branch=master)](https://travis-ci.org/inc2734/wp-awesome-widgets)
[![Latest Stable Version](https://poser.pugx.org/inc2734/wp-awesome-widgets/v/stable)](https://packagist.org/packages/inc2734/wp-awesome-widgets)
[![License](https://poser.pugx.org/inc2734/wp-awesome-widgets/license)](https://packagist.org/packages/inc2734/wp-awesome-widgets)

## Widgets

* PR Box
* Slider (slick)
* Showcase

## Install
```
$ composer require inc2734/wp-awesome-widgets
$ npm install --save slick-caroucel
```

## How to use
```
<?php
// When Using composer auto loader
// new Inc2734\WP_Awesome_Widgets\Awesome_Widgets();

// When not Using composer auto loader
include_once( get_theme_file_path( '/vendor/inc2734/wp-awesome-widgets/src/wp-awesome-widgets.php' ) );
new Inc2734_WP_Awesome_Widgets();
```

```
// Using default styles (.scss)
@import 'vendor/inc2734/wp-awesome-widgets/src/assets/scss/wp-awesome-widgets';
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

## Thirt-party resources
### slick
* http://kenwheeler.github.io/slick/
