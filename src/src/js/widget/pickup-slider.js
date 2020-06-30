import $ from 'jquery';

import { wpawPickupSlider } from '../../../widget/pickup-slider/_widget.js';

$('.wpaw-pickup-slider__canvas').each((i, e) => {
  wpawPickupSlider(e);
} );
