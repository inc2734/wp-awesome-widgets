'use strict';

import '../../widget/pickup-slider/_widget.js';
import '../../widget/slider/_widget.js';
import '../../widget/carousel-any-posts/_widget.js';

jQuery(($) => {
  const pickupSliderCanvas = $('.wpaw-pickup-slider__canvas');
  if (0 < pickupSliderCanvas.length) {
    pickupSliderCanvas.WpawPickupSlider();
  }

  const sliderCanvas = $('.wpaw-slider__canvas');
  if (0 < sliderCanvas.length) {
    sliderCanvas.WpawSlider();
  }

  const carouselCanvas = $('.wpaw-carousel__canvas');
  if (0 < carouselCanvas.length) {
    carouselCanvas.WpawCarousel();
  }
});
