jQuery(function($) {
  $(document).on('widget-added widget-updated', function(event, widget) {
    _initColorPicker(widget);
  });

  $(document).on('wpaw-repeaters-add-repeater', function (event, data) {
    var repeater  = data.repeater;
    repeater.find('.wpaw-color-picker-field').each(function(i, e) {
      var input       = $(e).find('.wpaw-color-picker-field__input').clone(false);
      var colorPicker = $(e).find('.wp-picker-container');
      colorPicker.before(input);
      colorPicker.remove();
    });
    _initColorPicker(repeater);
  });

  $(document).ready(function() {
    $('#widgets-right .widget:has(.wpaw-color-picker-field__input) .widget-inside').each(function(i, e) {
      _initColorPicker($(e));
    });
  });

  function _initColorPicker(widget) {
    widget.find('.wpaw-color-picker-field__input').each(function(i, e) {
      var input = $(e);
      input.wpColorPicker({
        change: function() {
          input.trigger('input');
        }
      });
    });
  }
});
