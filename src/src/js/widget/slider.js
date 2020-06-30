import $ from 'jquery';

import { wpawSlider } from '../../../widget/slider/_widget.js';

$('.wpaw-slider__canvas').each((i, e) => {
  wpawSlider(e);
} );
