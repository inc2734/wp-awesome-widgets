import $ from 'jquery';

$(() => {
  $(document).on(
    'wpaw-repeaters-add-repeater',
    (event, data) => {
      const repeater = data.repeater;

      repeater.find('.wpaw-thumbnail-field__thumbnail').empty();
      repeater.find('.wpaw-thumbnail-field__input-image').val('');
    }
  );

  $(document).on(
    'change',
    '.js-wpaw-slider-widget-type',
    (event) => {
      const widget = $(event.currentTarget).closest('.wpaw-widget-form');

      if ('slide' === $(event.currentTarget).val()) {
        widget.find('.js-wpaw-slider-widget-only-slide').attr('aria-hidden', 'false');
      } else {
        widget.find('.js-wpaw-slider-widget-only-slide').attr('aria-hidden', 'true');
      }
    }
  );

  $('[id*="inc2734_wp_awesome_widgets_slider"]').on(
    'click',
    (event) => {
      const typeField = $(event.currentTarget).find('.js-wpaw-slider-widget-type');

      if ('slide' === typeField.val()) {
        $(event.currentTarget).find('.js-wpaw-slider-widget-only-slide').attr('aria-hidden', 'false');
      } else {
        $(event.currentTarget).find('.js-wpaw-slider-widget-only-slide').attr('aria-hidden', 'true');
      }
    }
  );
});
