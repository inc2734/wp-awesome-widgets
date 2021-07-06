import $ from 'jquery';

$(() => {
  const _initColorPicker = (widget) => {
    widget.find('.wpaw-color-picker-field__input').each((i, e) => {
      var input = $(e);
      input.wpColorPicker(
        {
          change: function() {
            input.trigger('input');
          }
        }
      );
    });
  };

  $(document).on(
    'widget-added widget-updated',
    (event, widget) => {
      _initColorPicker(widget);
    }
  );

  $(document).on(
    'wpaw-repeaters-add-repeater',
    (event, data) => {
      const repeater = data.repeater;

      repeater.find('.wpaw-color-picker-field').each((i, e) => {
        const input       = $(e).find('.wpaw-color-picker-field__input').clone(false);
        const colorPicker = $(e).find('.wp-picker-container');
        colorPicker.before(input);
        colorPicker.remove();
      });

      _initColorPicker(repeater);
    }
  );


  $('#widgets-right .widget:has(.wpaw-color-picker-field__input) .widget-inside').each((i, e) => {
    _initColorPicker($(e));
  });
});
