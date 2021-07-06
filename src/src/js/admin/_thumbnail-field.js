import $ from 'jquery';

$(() => {
  $(document).on(
    'click',
    '.wpaw-thumbnail-field__set-image-btn',
    (event) => {
      event.preventDefault();
      const button  = $(event.currentTarget);
      const form    = button.closest('.form, form');
      const wrapper = button.closest('.wpaw-thumbnail-field');

      const custom_uploader = wp.media(
        {
          title: 'Insert image',
          library : {
            type : 'image'
          },
          button: {
            text: 'Use this image'
          },
          multiple: false
        }
      );

      custom_uploader.on(
        'select',
        () => {
          const attachment    = custom_uploader.state().get('selection').first().toJSON();
          const thumbnail_url = typeof attachment.sizes.medium !== 'undefined' ? attachment.sizes.medium.url : attachment.sizes.full.url;
          const thumbnail = $('<img/>').attr('src', thumbnail_url);

          wrapper.find('.wpaw-thumbnail-field__thumbnail').empty().append(thumbnail);
          wrapper.find('.wpaw-thumbnail-field__input-image').val(attachment.id);

          form.find('.widget-control-save').css('display', 'inline-block');
          form.find('.widget-control-save').trigger('click');
        }
      ).open();
    }
  );

  $(document).on(
    'click',
    '.wpaw-thumbnail-field__unset-image-btn',
    (event) => {
      event.preventDefault();

      const button  = $(event.currentTarget);
      const form    = button.closest('.form, form');
      const wrapper = button.closest('.wpaw-thumbnail-field');

      wrapper.find('.wpaw-thumbnail-field__thumbnail').empty();
      wrapper.find('.wpaw-thumbnail-field__input-image').val('');

      form.find('.widget-control-save').css('display', 'inline-block');
      form.find('.widget-control-save').trigger('click');
    }
  );
});
