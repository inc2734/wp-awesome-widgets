import $ from 'jquery';
import { setItemsHeight } from '../../src/js/helper/slider.js';

export const wpawSlider = (slider) => {
  let windowWidth = document.documentElement.clientWidth;
  let sliderWidth = false;

  $(slider).on(
    'init',
    (event, slick) => {
      setTimeout(
        () => {
          const items = slider.querySelectorAll('.wpaw-slider__item');
          setItemsHeight(items);
        },
        0
      );
    }
  );

  $(slider).on(
    'setPosition',
    (event, slick) => {
      if (slick.windowWidth !== windowWidth || slick.slideWidth !== sliderWidth) {
        const items = slider.querySelectorAll('.wpaw-slider__item');
        setItemsHeight(items);
        windowWidth = slick.windowWidth;
        sliderWidth = slick.slideWidth;
      }
    }
  );

  const $canvasWrapper = $(slider).closest('.wpaw-slider');
  $(slider).slick(
    {
      speed: parseInt($canvasWrapper.attr('data-wpaw-slider-duration')),
      autoplaySpeed: parseInt($canvasWrapper.attr('data-wpaw-slider-interval')),
      slidesToShow: parseInt($canvasWrapper.attr('data-wpaw-slider-slides-to-show')),
      slidesToScroll: parseInt($canvasWrapper.attr('data-wpaw-slider-slides-to-scroll')),
      autoplay: true,
      fade: 'true' === $canvasWrapper.attr('data-wpaw-slider-fade'),
      dots: true,
      infinite: true,
      arrows: false,
      rows: 0,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    }
  );
};
