jQuery(function($) {
  $(document).on('wpaw-repeaters-add-repeater', function (event, data) {
    var repeater  = data.repeater;

    repeater.find('.wpaw-thumbnail-field__thumbnail').empty();
    repeater.find('.wpaw-thumbnail-field__input-image').val('');
  });

  $(document).on('change', '.js-wpaw-slider-widget-type', function() {
    var widget = $(this).closest('.widget-inside');
    if ('slide' === $(this).val()) {
      widget.find('.js-wpaw-slider-widget-only-slide').attr('aria-hidden', 'false');
    } else {
      widget.find('.js-wpaw-slider-widget-only-slide').attr('aria-hidden', 'true');
    }
  });

  $('[id*="inc2734_wp_awesome_widgets_slider"]').click(function() {
    var typeField = $(this).find('.js-wpaw-slider-widget-type');
    if ('slide' === typeField.val()) {
      $(this).find('.js-wpaw-slider-widget-only-slide').attr('aria-hidden', 'false');
    } else {
      $(this).find('.js-wpaw-slider-widget-only-slide').attr('aria-hidden', 'true');
    }
  });
});
