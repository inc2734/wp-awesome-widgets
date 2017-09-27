jQuery(function($) {
  $(document).on('click', '.wpaw-repeaters__add-repeater-btn', function(e) {
    e.preventDefault();
    var button   = $(this);
    var widget   = button.closest('.widget-inside');
    var repeater = widget.find('.wpaw-repeaters__item').first().clone(true);
    widget.find('.wpaw-repeaters__items').append(repeater);

    widget.find('.wpaw-repeaters__item').each(function(i, e) {
      var _index    = i;
      var _repeater = $(e);
      _repeater.find('input, select, textarea').each(function(i, e) {
        $(e)
          .attr(
            'name',
            $(e).attr('name').replace(/\[\s*\d+\s*\](\[[^\[\]]+\])$/, '[' + _index + ']$1'
          ))
          .attr(
            'id',
            $(e).attr('id').replace(/\[\s*\d+\s*\](\[[^\[\]]+\])$/, '[' + _index + ']$1'
          ));
      });
    });

    widget.find('.widget-control-save').css('display', 'none');

    $(document).trigger('wpaw-repeaters-add-repeater', {
      repeater: repeater,
      widget  : widget
    });
  });

  $(document).on('click', '.wpaw-repeaters__item-controls .button-link-delete', function(e) {
    e.preventDefault();
    var button   = $(this);
    var widget   = button.closest('.widget-inside');
    var repeater = button.closest('.wpaw-repeaters__item');

    repeater.remove();
    widget.find('.widget-control-save').css('display', 'inline-block');
    widget.find('.widget-control-save').trigger('click');
  });

  $(document).on('mouseover', '.wpaw-repeaters', function(e) {
    $(this).sortable();
    $(this).disableSelection();
  });
});
