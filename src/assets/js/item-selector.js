jQuery(function($) {
  /**
   * Add selected item if click the item
   */
  $(document).on('click', '.wpaw-item-selector__item', function(e) {
    var wrapper      = $(this).closest('.wpaw-item-selector');
    var selectedArea = wrapper.find('.wpaw-item-selector__selected-items');
    var input        = wrapper.find('.wpaw-item-selector__input');

    var label        = ($(this).attr('data-post-title')) ? $(this).attr('data-post-title') : '&nbsp';
    var selectedItem = $('<li class="wpaw-item-selector__selected-item" />')
                          .attr('data-post-id', $(this).attr('data-post-id'))
                          .html('<span class="dashicons dashicons-minus" />' + label);
    selectedItem.appendTo(selectedArea);

    _updateInput(selectedArea);
  });

  /**
   * sortable proccesses
   */
  $(document).on('mouseover', '.wpaw-item-selector__selected-items', function(e) {
    var selectedArea = $(this);

    $(this).sortable({
      update: function(event, ui) {
        _updateInput(selectedArea);
      }
    });
    $(this).disableSelection();
  });

  /**
   * Remove the selected-item
   */
  $(document).on('click', '.wpaw-item-selector__selected-item', function(e) {
    var wrapper      = $(this).closest('.wpaw-item-selector');
    var selectedArea = wrapper.find('.wpaw-item-selector__selected-items');

    $(this).remove();

    _updateInput(selectedArea);
  });

  /**
   * Infinit scroll with selected-items-area
   */
  (function() {
    var per_page = 10;
    var offset   = 10;
    var param    = '';

    document.addEventListener('scroll', function (event) {
      if ('wpaw-item-selector__items' !== $(event.target).attr('class')) {
        return;
      }

      if ($(event.target).get(0).scrollHeight - $(event.target).height() > $(event.target).scrollTop()) {
        return;
      }

      var wrapper = $(event.target).closest('.wpaw-item-selector');
      var area    = wrapper.find('.wpaw-item-selector__items');

      param  = '?per_page=' + per_page;
      param += '&offset=' + offset;

      $.ajax({
        dataType: 'json',
        type    : 'GET',
        url     : wp_awesome_widgets_item_selector_wp_api.root + 'wp/v2/posts' + param
      }).then(
        function(data) {
          data.forEach(function(post) {
              var label = (post.title.rendered) ? post.title.rendered : '&nbsp;';
              var item  = $('<li class="wpaw-item-selector__item" />')
                            .attr('data-post-id', post.id)
                            .attr('data-post-title', post.title.rendered)
                            .html('<span class="dashicons dashicons-plus" />' + label);
              item.appendTo(area);
          });
          offset += per_page;
        },
        function() {
          console.error('Read failed!');
        }
      );
    }, true);
  })();

  function _updateInput(selectedArea) {
    var input = selectedArea.closest('.wpaw-item-selector').find('.wpaw-item-selector__input');
    var value = selectedArea.find('.wpaw-item-selector__selected-item').map(function(i, e) {
      return $(e).attr('data-post-id');
    }).get();
    input.val(value).trigger('change');
  }
});
