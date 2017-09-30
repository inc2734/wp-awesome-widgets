jQuery(function($) {
  $(document).on('widget-added widget-updated', function(event, widget) {
    _initColorPicker(widget);
  });

  $(document).ready(function() {
    $('#widgets-right .widget:has(.wpaw-color-picker-field__input) .widget-inside').each(function(i, e) {
      _initColorPicker($(e));
    });
  });

  function _initColorPicker(widget) {
    widget.find('.wpaw-color-picker-field__input').wpColorPicker( {
      change: _.throttle(function() {
        $(this).trigger('change');
      }, 3000)
    });
  }
});
