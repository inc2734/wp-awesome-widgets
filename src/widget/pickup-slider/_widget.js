import $ from 'jquery';
import { setItemsHeight } from '../../src/js/helper/slider.js';

export const wpawPickupSlider = (slider) => {
  let windowWidth = document.documentElement.clientWidth;
  let sliderWidth = false;

  $(slider).on(
    'init',
    (event, slick) => {
      setTimeout(
        () => {
          const items = slider.querySelectorAll('.wpaw-pickup-slider__item');
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
        const items = slider.querySelectorAll('.wpaw-pickup-slider__item');
        setItemsHeight(items);
        windowWidth = slick.windowWidth;
        sliderWidth = slick.slideWidth;
      }
    }
  );

  $(slider).slick(
    {
      speed: 500,
      autoplaySpeed: 4000,
      slidesToShow: 1,
      fade: true,
      autoplay: true,
      dots: false,
      infinite: true,
      rows: 0,
      pauseOnFocus: false,
      pauseOnHover: false,
    }
  );
};
