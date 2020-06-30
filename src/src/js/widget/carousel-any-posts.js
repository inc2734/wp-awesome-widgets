import $ from 'jquery';

import { wpawCarousel } from '../../../widget/carousel-any-posts/_widget.js';

$('.wpaw-carousel__canvas').each((i, e) => {
  wpawCarousel(e);
} );
