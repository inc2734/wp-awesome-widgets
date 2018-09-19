jQuery(function($) {
  $(document).on('click', '.wpaw-thumbnail-field__set-image-btn', function(e) {
    e.preventDefault();
    var button  = $(this);
    var widget  = button.closest('.widget-inside');
    var wrapper = button.closest('.wpaw-thumbnail-field');

    var custom_uploader = wp.media({
      title: 'Insert image',
      library : {
        type : 'image'
      },
      button: {
        text: 'Use this image'
      },
      multiple: false
    });

    custom_uploader.on('select', function() {
      var attachment    = custom_uploader.state().get('selection').first().toJSON();
      var thumbnail_url = (typeof attachment.sizes.medium !== 'undefined') ? attachment.sizes.medium.url : attachment.sizes.full.url;
      var thumbnail = $('<img/>').attr('src', thumbnail_url);
      wrapper.find('.wpaw-thumbnail-field__thumbnail').empty().append(thumbnail);
      wrapper.find('.wpaw-thumbnail-field__input-image').val(attachment.id);

      widget.find('.widget-control-save').css('display', 'inline-block');
      widget.find('.widget-control-save').trigger('click');
    }).open();
  });

  $(document).on('click', '.wpaw-thumbnail-field__unset-image-btn', function(e) {
    e.preventDefault();
    var button  = $(this);
    var widget  = button.closest('.widget-inside');
    var wrapper = button.closest('.wpaw-thumbnail-field');

    wrapper.find('.wpaw-thumbnail-field__thumbnail').empty();
    wrapper.find('.wpaw-thumbnail-field__input-image').val('');

    widget.find('.widget-control-save').css('display', 'inline-block');
    widget.find('.widget-control-save').trigger('click');
  });
});
