'use strict';

import forEachHtmlNodes from '@inc2734/for-each-html-nodes';
import {wpawPickupSlider} from '../../widget/pickup-slider/_widget.js';
import {wpawSlider} from '../../widget/slider/_widget.js';
import {wpawCarousel} from '../../widget/carousel-any-posts/_widget.js';

window.addEventListener(
  'DOMContentLoaded',
  () => {
    const pickupSliderCanvases = document.querySelectorAll('.wpaw-pickup-slider__canvas');
    forEachHtmlNodes(pickupSliderCanvases, (canvas) => wpawPickupSlider(canvas));

    const sliderCanvases = document.querySelectorAll('.wpaw-slider__canvas');
    forEachHtmlNodes(sliderCanvases, (canvas) => wpawSlider(canvas));

    const carouselCanvas = document.querySelectorAll('.wpaw-carousel__canvas');
    forEachHtmlNodes(carouselCanvas, (canvas) => wpawCarousel(canvas));
  },
  false
);
