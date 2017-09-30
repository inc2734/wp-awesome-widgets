jQuery(function($) {
  $(document).on('widget-added widget-updated', function(event, widget) {
    _initColorPicker(widget);
  });

  $(function() {
    $('#widgets-right .widget:has(.color-picker)').each(function() {
      _initColorPicker($('.widget-inside'));
    });
  });

  function _initColorPicker(widget) {
    widget.find('.wpaw-color-picker-field__input').wpColorPicker( {
      change: _.throttle(function() {
        $(this).trigger('change');
      }, 200)
    });
  }
});
