(function($) {
  $('.wpaw-slider__canvas').each((i, e) => {
    const slider = $(e);

    slider.on('init setPosition', (event, slick) => {
      setSliderHeight();
    });

    function setSliderHeight() {
      let sliderHeight = 0;
      slider.find('.wpaw-slider__item')
        .css('min-height', '')
        .each((i, e) => {
          const slide = $(e);
          const recommendHeight = slide.outerWidth() * 0.5625;
          const naturalHeight = slide.outerHeight();
          let height = recommendHeight;
          if (recommendHeight < naturalHeight) {
            height = naturalHeight;
          }
          if (sliderHeight < height) {
            sliderHeight = height;
          }
        })
        .css('min-height', sliderHeight);
    }
  });
})(jQuery);
