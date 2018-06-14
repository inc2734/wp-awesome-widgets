'use strict';

import $ from 'jquery';

$.fn.WpawSlider = function() {
  const methods = {
    setItemHeight: function(items) {
      let sliderHeight = 0;
      items.css('min-height', '');

      if (methods.isIE11()) {
        items.css('height', '');
      }

      items.each((i, e) => {
        const slide = $(e);
        const naturalHeight   = slide.outerHeight();
        const recommendHeight = slide.outerWidth() * 0.5625;
        if (sliderHeight < naturalHeight || sliderHeight < recommendHeight) {
          if (recommendHeight < naturalHeight) {
            sliderHeight = naturalHeight;
          } else {
            sliderHeight = recommendHeight;
          }
        }
      });

      if (methods.isIE11()) {
        items.css('height', sliderHeight);
      }

      items.css('min-height', sliderHeight);
    },
    isIE11: function() {
      const ua = navigator.userAgent;
      return ua.indexOf('Trident') !== -1;
    }
  };

  let windowWidth = $(window).width();

  return this.each(function(i, e) {
    const slider = $(e);
    let sliderWidth = false;

    slider.on('init', (event, slick) => {
      setTimeout(() => {
        methods.setItemHeight(slider.find('.wpaw-slider__item'));
      }, 0);
    });

    slider.on('setPosition', (event, slick) => {
      if (slick.windowWidth !== windowWidth || slick.slideWidth !== sliderWidth) {
        methods.setItemHeight(slider.find('.wpaw-slider__item'));
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
