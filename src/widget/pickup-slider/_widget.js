'use strict';

import $ from 'jquery';
import 'slick-carousel';
import {setItemHeight} from '../../src/js/helper/slider.js';

$.fn.WpawPickupSlider = function() {
  let windowWidth = $(window).width();

  return this.each((i, e) => {
    const slider = $(e);
    let sliderWidth = false;

    slider.on('init', (event, slick) => {
      setTimeout(() => {
        setItemHeight(slider.find('.wpaw-pickup-slider__item'));
      }, 0);
    });

    slider.on('setPosition', (event, slick) => {
      if (slick.windowWidth !== windowWidth || slick.slideWidth !== sliderWidth) {
        setItemHeight(slider.find('.wpaw-pickup-slider__item'));
        windowWidth = slick.windowWidth;
        sliderWidth = slick.slideWidth;
      }
    });

    slider.slick({
      "speed": 500,
      "autoplaySpeed": 4000,
      "slidesToShow": 1,
      "fade": true,
      "autoplay": true,
      "dots": false,
      "infinite": true
    });
  });
};
