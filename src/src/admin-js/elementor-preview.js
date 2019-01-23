'use strict';

jQuery(($) => {
  $(window).on('elementor/frontend/init', () => {
    elementorFrontend.hooks.addAction('frontend/element_ready/widget', (scope) => {
      if (scope.hasClass('elementor-widget-wp-widget-inc2734_wp_awesome_widgets_slider')) {
        scope.find('.wpaw-slider__canvas:not(.slick-initialized)').WpawSlider();
      } else if (scope.hasClass('elementor-widget-wp-widget-inc2734_wp_awesome_widgets_pickup_slider')) {
        scope.find('.wpaw-pickup-slider__canvas:not(.slick-initialized)').WpawSlider();
      } else if (scope.hasClass('elementor-widget-wp-widget-inc2734_wp_awesome_widgets_carousel_any_posts')) {
        scope.find('.wpaw-carousel__canvas:not(.slick-initialized)').WpawCarousel();
      }
    });
  });
});
