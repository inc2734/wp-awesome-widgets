import $ from 'jquery';

$(() => {

  /**
   * Add selected item if click the item
   */
  $(document).on(
    'click',
    '.wpaw-item-selector__item',
    (event) => {
      const wrapper      = $(event.currentTarget).closest('.wpaw-item-selector');
      const selectedArea = wrapper.find('.wpaw-item-selector__selected-items');
      const input        = wrapper.find('.wpaw-item-selector__input');

      const postTitle    = $(event.currentTarget).attr('data-post-title');
      const label        = postTitle || '&nbsp';
      const selectedItem = $('<li class="wpaw-item-selector__selected-item" />')
                            .attr('data-post-id', $(event.currentTarget).attr('data-post-id'))
                            .append('<span class="dashicons dashicons-minus" />')
                            .append(label)

      if (selectedArea.find('[data-post-id="' + $(event.currentTarget).attr('data-post-id') + '"]').length) {
        return;
      }

      selectedItem.appendTo(selectedArea);

      _updateInput(selectedArea);
    }
  );

  /**
   * sortable proccesses
   */
  $(document).on(
    'mouseover',
    '.wpaw-item-selector__selected-items',
    (event) => {
      const selectedArea = $(event.currentTarget);

      $(event.currentTarget).sortable(
        {
          update: (event, ui) => {
            _updateInput(selectedArea);
          }
        }
      );

      $(event.currentTarget).disableSelection();
    }
  );

  /**
   * Remove the selected-item
   */
  $(document).on(
    'click',
    '.wpaw-item-selector__selected-item',
    (event) => {
      const wrapper      = $(event.currentTarget).closest('.wpaw-item-selector');
      const selectedArea = wrapper.find('.wpaw-item-selector__selected-items');

      $(event.currentTarget).remove();

      _updateInput(selectedArea);
    }
  );

  /**
   * Add or Update widget
   */
  $(document).on(
    'widget-added widget-updated',
    (event, widget) => {
      const wrapper = widget.find('.wpaw-item-selector');

      if (1 > wrapper.length) {
        return;
      }

      _updateItems(wrapper);
    }
  );

  /**
   * For widget screen
   */
  $('#widgets-right .widget:has(.wpaw-item-selector) .widget-inside').each((i, e) => {
    var wrapper = $(e).find('.wpaw-item-selector');

    if (1 > wrapper.length) {
      return;
    }

    _updateItems(wrapper);
  });

  $(document).on(
    'click',
    '.wpaw-item-selector__refresh-btn',
    (event) => {
      const wrapper      = $(event.currentTarget).closest('.wpaw-item-selector');
      const selectedArea = wrapper.find('.wpaw-item-selector__selected-items');
      const area         = wrapper.find('.wpaw-item-selector__items');

      area.attr('data-offset', 0);

      // Reset area
      area.empty();

      _updateItems(wrapper);
    }
  );

  /**
   * Update post type
   */
  $(document).on(
    'change',
    '.wpaw-item-selector__post-type',
    (event) => {
      const wrapper      = $(event.currentTarget).closest('.wpaw-item-selector');
      const selectedArea = wrapper.find('.wpaw-item-selector__selected-items');
      const area         = wrapper.find('.wpaw-item-selector__items');
      const keywords     = wrapper.find('.wpaw-item-selector__search__input');

      area.attr('data-offset', 0);
      area.attr('data-failed', 'false');

      // Reset selected items
      selectedArea.empty();
      _updateInput(selectedArea);

      // Reset keywords
      keywords.val('');

      // Reset area
      area.empty();
      _updateItems(wrapper);
    }
  );

  /**
   * Search
   */
   $(document).on(
      'input',
      '.wpaw-item-selector__search__input',
      (event) => {
        const wrapper = $(event.currentTarget).closest('.wpaw-item-selector');
        const area    = wrapper.find('.wpaw-item-selector__items');

        area.attr('data-offset', 0);
        area.attr('data-failed', 'false');

        // Reset area
        area.empty();

        setTimeout(() => {
          _updateItems(wrapper);
        }, 2000);
     }
   );

  /**
   * Infinit scroll with selected-items-area
   */
  document.addEventListener(
    'scroll',
    (event) => {
      if (! $(event.target).hasClass('wpaw-item-selector__items')) {
        return;
      }

      if ($(event.target).get(0).scrollHeight - $(event.target).height() > $(event.target).scrollTop()) {
        return;
      }

      var wrapper = $(event.target).closest('.wpaw-item-selector');

      _updateItems(wrapper);
    },
    true
  );

  function _updateInput(selectedArea) {
    const input = selectedArea.closest('.wpaw-item-selector').find('.wpaw-item-selector__input');

    const value = selectedArea.find('.wpaw-item-selector__selected-item').map((i, e) => {
      return $(e).attr('data-post-id');
    }).get();

    input.val(value).trigger('change');
  }

  function _request(restBase, param) {
    const newParam = wp_awesome_widgets_item_selector_wp_api.root.match(/\?/)
      ? param.replace( '?', '&' )
      : param;

    return $.ajax(
      {
        dataType: 'json',
        type    : 'GET',
        url     : wp_awesome_widgets_item_selector_wp_api.root + 'wp/v2/' + restBase + newParam
      }
    );
  }

  function _renderItems(area, data) {
    data.forEach((post) => {
      const label = (post.title.rendered) ? post.title.rendered : '&nbsp;';
      const item  = $('<li class="wpaw-item-selector__item" />')
                    .attr('data-post-id', post.id)
                    .attr('data-post-title', post.title.rendered)
                    .append('<span class="dashicons dashicons-plus" />')
                    .append(label);
      item.appendTo(area);
    });
  }

  function _updateItems(wrapper) {
    const selectedArea = wrapper.find('.wpaw-item-selector__selected-items');
    const area         = wrapper.find('.wpaw-item-selector__items');
    const postType     = wrapper.find('.wpaw-item-selector__post-type').val();
    const keywords     = wrapper.find('.wpaw-item-selector__search__input').val();

    let param = '';
    param  = '?per_page=' + area.attr('data-per-page');
    param += '&offset=' + area.attr('data-offset');

    if (keywords) {
      param += '&search=' + keywords;
    }

    if ('true' === area.attr('data-loading')) {
      return;
    }

    if ('true' === area.attr('data-failed')) {
      return;
    }

    area.append('<span class="spinner"></span>');
    area.attr('data-loading', 'true');

    const jqxhr = _request(postType, param)
      .done((data) => {
        if (0 < data.length) {
          _renderItems(area, data);
          area.attr('data-offset', parseInt(area.attr('data-offset')) + parseInt(area.attr('data-per-page')));
        } else {
          area.attr('data-failed', 'true');
        }
      })
      .fail(() => {
        console.error('Read failed or canceled.');
        area.attr('data-failed', 'true');
      })
      .always(() => {
        area.find('.spinner').remove();
        area.attr('data-loading', 'false');
      });
  }
});
