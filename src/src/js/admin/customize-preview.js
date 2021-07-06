import $ from 'jquery';
import { wpContentsOutline } from '../../../../vendor/inc2734/wp-contents-outline/src/src/js/module/wp-contents-outline.js';
import { wpawPickupSlider } from '../../../widget/pickup-slider/_widget.js';
import { wpawSlider } from '../../../widget/slider/_widget.js';
import { wpawCarousel } from '../../../widget/carousel-any-posts/_widget.js';

$(() => {
  const api = wp.customize;

  api.selectiveRefresh.bind(
    'partial-content-rendered',
    (partial) => {
      if (partial.container) {
        // Pickup slider widget
        if (partial.container.find('.wpaw-pickup-slider__canvas').length) {
          partial.container.find('.wpaw-pickup-slider__canvas').each((i, e) => wpawPickupSlider(e));
        }

        // Slider widget
        if (partial.container.find('.wpaw-slider__canvas').length) {
          partial.container.find('.wpaw-slider__canvas').each((i, e) => wpawSlider(e));
        }

        // Carousel widget
        if (partial.container.find('.wpaw-carousel__canvas').length) {
          partial.container.find('.wpaw-carousel__canvas').each((i, e) => wpawCarousel(e));
        }

        // Contents outline widget
        if (partial.container.find('.wpco-wrapper').length) {
          partial.container.find('.wpco-wrapper').each((i, e) => wpContentsOutline(e));
        }
      }
    }
  );
});
