'use strict';

import $ from 'jquery';
import forEachHtmlNodes from '@inc2734/for-each-html-nodes';

const isIE11 = () => -1 !== navigator.userAgent.indexOf('Trident');

export const setItemsHeight = (items) => {
  forEachHtmlNodes(
    items,
    (item) => {
      item.style.minHeight = '';

      if (isIE11()) {
        item.style.height = '';
      }
    }
  );

  const sliderHeight = (() => {
    let sliderHeight = 0;
    forEachHtmlNodes(
      items,
      (item) => {
        const naturalHeight   = item.offsetHeight;
        const recommendHeight = item.offsetWidth * 0.5625;

        if (sliderHeight < naturalHeight || sliderHeight < recommendHeight) {
          if (recommendHeight < naturalHeight) {
            sliderHeight = naturalHeight;
          } else {
            sliderHeight = recommendHeight;
          }
        }
      }
    );
    return sliderHeight;
  })();

  forEachHtmlNodes(
    items,
    (item) => {
      if (isIE11()) {
        item.style.height = `${sliderHeight}px`;
      }

      item.style.minHeight = `${sliderHeight}px`;
    }
  );
}
