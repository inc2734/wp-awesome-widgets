import $ from 'jquery';

$(() => {
  $(document).on(
    'click',
    '.wpaw-repeaters__add-repeater-btn',
    (event) => {
      event.preventDefault();

      const button = $(event.currentTarget);
      const widget = button.closest('.wpaw-widget-form');
      const clonedRepeater = widget.find('.wpaw-repeaters__item').first().clone(true);

      clonedRepeater.find('input, select, textarea, button').each((i, e) => {
        $(e).on('change', () => {
          const form = clonedRepeater.closest('.form, form');
          form.find('.widget-control-save').css('display', 'inline-block');
          form.find('.widget-control-save').trigger('click');
        });
      });

      widget.find('.wpaw-repeaters__items').append(clonedRepeater);

      widget.find('.wpaw-repeaters__item').each((i, e) => {
        const index    = i;
        const repeater = $(e);

        repeater.find('input, select, textarea, button').each((i, e) => {
          const control = $(e);

          if (typeof control.attr('name') === 'undefined') {
            return true;
          }

          control.attr(
            'name',
            $(e).attr('name').replace(/\[\s*\d+\s*\](\[[^\[\]]+\])$/, '[' + index + ']$1'
          ));

          control.attr(
            'id',
            $(e).attr('id').replace(/\[\s*\d+\s*\](\[[^\[\]]+\])$/, '[' + index + ']$1'
          ));

          control.on('touchstart', () => {
            control.focus();
          });
        });
      });

      $(document).trigger(
        'wpaw-repeaters-add-repeater',
        {
          repeater: clonedRepeater,
          widget  : widget
        }
      );
    }
  );

  $(document).on(
    'click',
    '.wpaw-repeaters__item-controls .button-link-delete',
    (event) => {
      event.preventDefault();

      const button   = $(event.currentTarget);
      const form     = button.closest('.form, form');
      const repeater = button.closest('.wpaw-repeaters__item');

      repeater.remove();

      form.find('.widget-control-save').css('display', 'inline-block');
      form.find('.widget-control-save').trigger('click');
    }
  );

  $(document).on(
    'mouseover',
    '.wpaw-repeaters__items',
    (event) => {
      $(event.currentTarget).sortable();
    }
  );
});
