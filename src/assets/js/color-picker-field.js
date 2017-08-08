jQuery(function($) {
  $(document).on('widget-added widget-updated', function(event, widget) {
    widget.find('.wpaw-color-picker-field__input').wpColorPicker( {
      change: _.throttle(function() {
        $(this).trigger('change');
      }, 200)
    });
  });
});
