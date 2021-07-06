import $ from 'jquery';
import { wpawPickupSlider } from '../../../widget/pickup-slider/_widget.js';
import { wpawSlider } from '../../../widget/slider/_widget.js';
import { wpawCarousel } from '../../../widget/carousel-any-posts/_widget.js';

$(() => {
  $(window).on(
    'elementor/frontend/init',
    () => {
      elementorFrontend.hooks.addAction(
        'frontend/element_ready/widget',
        (scope) => {
          if (scope.hasClass('elementor-widget-wp-widget-inc2734_wp_awesome_widgets_slider')) {
            scope.find('.wpaw-slider__canvas:not(.slick-initialized)').each((i, e) => wpawSlider(e));
          } else if (scope.hasClass('elementor-widget-wp-widget-inc2734_wp_awesome_widgets_pickup_slider')) {
            scope.find('.wpaw-pickup-slider__canvas:not(.slick-initialized)').each((i, e) => wpawPickupSlider(e));
          } else if (scope.hasClass('elementor-widget-wp-widget-inc2734_wp_awesome_widgets_carousel_any_posts')) {
            scope.find('.wpaw-carousel__canvas:not(.slick-initialized)').each((i, e) => wpawCarousel(e));
          }
        }
      );
    }
  );
});
