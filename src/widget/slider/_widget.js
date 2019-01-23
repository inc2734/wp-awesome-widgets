'use strict';

import $ from 'jquery';
import 'slick-carousel';
import {setItemHeight} from '../../src/js/helper/slider.js';

$.fn.WpawSlider = function() {
  let windowWidth = $(window).width();

  return this.each(function(i, e) {
    const slider = $(e);
    let sliderWidth = false;

    slider.on('init', (event, slick) => {
      setTimeout(() => {
        setItemHeight(slider.find('.wpaw-slider__item'));
      }, 0);
    });

    slider.on('setPosition', (event, slick) => {
      if (slick.windowWidth !== windowWidth || slick.slideWidth !== sliderWidth) {
        setItemHeight(slider.find('.wpaw-slider__item'));
        windowWidth = slick.windowWidth;
        sliderWidth = slick.slideWidth;
      }
    });

    slider.slick({
      "speed": parseInt(slider.closest('.wpaw-slider').attr('data-wpaw-slider-duration')),
      "autoplaySpeed": parseInt(slider.closest('.wpaw-slider').attr('data-wpaw-slider-interval')),
      "slidesToShow": parseInt(slider.closest('.wpaw-slider').attr('data-wpaw-slider-slides-to-show')),
      "slidesToScroll": parseInt(slider.closest('.wpaw-slider').attr('data-wpaw-slider-slides-to-scroll')),
      "autoplay": true,
      "fade": 'true' === slider.closest('.wpaw-slider').attr('data-wpaw-slider-fade'),
      "dots": true,
      "infinite": true,
      "arrows": false,
      "responsive": [
        {
          "breakpoint": 1024,
          "settings": {
            "slidesToShow": 1,
            "slidesToScroll": 1
          }
        }
      ]
    });
  });
};
