'use strict';

import $ from 'jquery';

export function setItemHeight(items) {
  let sliderHeight = 0;
  items.css('min-height', '');

  if (isIE11()) {
    items.css('height', '');
  }

  items.each((i, e) => {
    const slide = $(e);
    const naturalHeight   = slide.outerHeight();
    const recommendHeight = slide.outerWidth() * 0.5625;
    if (sliderHeight < naturalHeight || sliderHeight < recommendHeight) {
      if (recommendHeight < naturalHeight) {
        sliderHeight = naturalHeight;
      } else {
        sliderHeight = recommendHeight;
      }
    }
  });

  if (isIE11()) {
    items.css('height', sliderHeight);
  }

  items.css('min-height', sliderHeight);
}

function isIE11() {
  const ua = navigator.userAgent;
  return ua.indexOf('Trident') !== -1;
}
