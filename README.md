# WP Awesome Widgets

[![Build Status](https://travis-ci.org/inc2734/wp-awesome-widgets.svg?branch=master)](https://travis-ci.org/inc2734/wp-awesome-widgets)
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

## Install
```
$ composer require inc2734/wp-awesome-widgets
$ npm install --save slick-caroucel
```

## How to use
```
<?php
// When Using composer auto loader
new Inc2734\WP_Awesome_Widgets\Awesome_Widgets();
```

```
// Using default styles (.scss)
@import 'vendor/inc2734/wp-awesome-widgets/src/assets/scss/wp-awesome-widgets';
```

```
// Using default styles (.js)
import 'vendor/inc2734/wp-awesome-widgets/src/assets/js/wp-awesome-widgets.js';
$('.wpaw-pickup-slider__canvas').WpawPickupSlider();
$('.wpaw-slider__canvas').WpawSlider();
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
http://kenwheeler.github.io/slick/
