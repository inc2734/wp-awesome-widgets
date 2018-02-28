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
   * Add or Update widget
   */
  $(document).on('widget-added widget-updated', function(event, widget) {
    var wrapper  = widget.find('.wpaw-item-selector');

    if (1 > wrapper.length) {
      return;
    }

    _updateItems(wrapper);
  });

  /**
   * For widget screen
   */
  $(document).ready(function() {
    $('#widgets-right .widget:has(.wpaw-item-selector) .widget-inside').each(function(i, e) {
      var wrapper = $(e).find('.wpaw-item-selector');

      if (1 > wrapper.length) {
        return;
      }

      _updateItems(wrapper);
    });
  });

  /**
   * Update post type
   */
  $(document).on('change', '.wpaw-item-selector__post-type', function(e) {
    var wrapper = $(this).closest('.wpaw-item-selector');
    var selectedArea = wrapper.find('.wpaw-item-selector__selected-items');
    var area         = wrapper.find('.wpaw-item-selector__items');

    area.attr('data-offset', 0);

    // Reset selected items
    selectedArea.empty();
    _updateInput(selectedArea);

    // Reset area
    area.empty();

    _updateItems(wrapper);
  });

  /**
   * Infinit scroll with selected-items-area
   */
  (function() {
    document.addEventListener('scroll', function (event) {
      if (! $(event.target).hasClass('wpaw-item-selector__items')) {
        return;
      }

      if ($(event.target).get(0).scrollHeight - $(event.target).height() > $(event.target).scrollTop()) {
        return;
      }

      var wrapper = $(event.target).closest('.wpaw-item-selector');

      _updateItems(wrapper);
    }, true);
  })();

  function _updateInput(selectedArea) {
    var input = selectedArea.closest('.wpaw-item-selector').find('.wpaw-item-selector__input');
    var value = selectedArea.find('.wpaw-item-selector__selected-item').map(function(i, e) {
      return $(e).attr('data-post-id');
    }).get();
    input.val(value).trigger('change');
  }

  function _request(restBase, param) {
    return $.ajax({
      dataType: 'json',
      type    : 'GET',
      url     : wp_awesome_widgets_item_selector_wp_api.root + 'wp/v2/' + restBase + param
    });
  }

  function _renderItems(area, data) {
    data.forEach(function(post) {
        var label = (post.title.rendered) ? post.title.rendered : '&nbsp;';
        var item  = $('<li class="wpaw-item-selector__item" />')
                      .attr('data-post-id', post.id)
                      .attr('data-post-title', post.title.rendered)
                      .html('<span class="dashicons dashicons-plus" />' + label);
        item.appendTo(area);
    });
  }

  function _updateItems(wrapper) {
    var selectedArea = wrapper.find('.wpaw-item-selector__selected-items');
    var area         = wrapper.find('.wpaw-item-selector__items');
    var postType     = wrapper.find('.wpaw-item-selector__post-type').val();
    var param        = '';

    param  = '?per_page=' + area.attr('data-per-page');
    param += '&offset=' + area.attr('data-offset');

    var jqxhr = area.data('jqxhr');
    if (jqxhr && typeof jqxhr !== 'undefined') {
      jqxhr.abort();
      area.attr('data-loading', 'false');
    }

    if ('true' === area.attr('data-loading')) {
      return;
    }

    area.append('<span class="spinner"></span>');
    area.attr('data-loading', 'true');

    jqxhr = _request(postType, param)
      .done(function(data) {
        _renderItems(area, data);
        area.attr('data-offset', parseInt(area.attr('data-offset')) + parseInt(area.attr('data-per-page')));
      })
      .fail(function() {
        console.error('Read failed or canceled.');
      })
      .always(function() {
        area.find('.spinner').remove();
        area.attr('data-loading', 'false');
      });

    area.data('jqxhr', jqxhr);
  }
});
