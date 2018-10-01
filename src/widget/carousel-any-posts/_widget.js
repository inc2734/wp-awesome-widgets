'use strict';

import $ from 'jquery';
import 'slick-carousel';

$.fn.WpawCarousel = function() {
  return this.each((i, e) => {
    const carousel = $(e);

    carousel.slick({
      speed: 500,
      autoplaySpeed: 4000,
      slidesToShow: 3,
      autoplay: true,
      arrows: false,
      dots: true,
      infinite: true,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    });
  });
};
