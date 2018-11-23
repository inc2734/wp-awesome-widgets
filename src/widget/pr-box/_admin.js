jQuery(function($) {
  $(document).on('wpaw-repeaters-add-repeater', function (event, data) {
    var repeater  = data.repeater;

    repeater.find('.wpaw-thumbnail-field__thumbnail').empty();
    repeater.find('.wpaw-thumbnail-field__input-image').val('');
    repeater.find('.wpaw-pr-box-widget__input-title').val('');
    repeater.find('.wpaw-pr-box-widget__input-summary').val('');
  });
});
