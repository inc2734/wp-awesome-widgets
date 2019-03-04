import $ from 'jquery';

$(() => {
  $(document).on(
    'wpaw-repeaters-add-repeater', (event, data) => {
      const repeater = data.repeater;

      repeater.find('.wpaw-thumbnail-field__thumbnail').empty();
      repeater.find('.wpaw-thumbnail-field__input-image').val('');
      repeater.find('.wpaw-pr-box-widget__input-title').val('');
      repeater.find('.wpaw-pr-box-widget__input-summary').val('');
    }
  );
});
