'use strict';

import '../../widget/pickup-slider/_widget.js';
import '../../widget/slider/_widget.js';
import '../../widget/carousel-any-posts/_widget.js';

jQuery(($) => {
  $('.wpaw-pickup-slider__canvas').WpawPickupSlider();
  $('.wpaw-slider__canvas').WpawSlider();
  $('.wpaw-carousel__canvas').WpawCarousel();
});
