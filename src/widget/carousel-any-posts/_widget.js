import $ from 'jquery';

export const wpawCarousel = (carousel) => {
  $(carousel).slick(
    {
      speed: 500,
      autoplaySpeed: 4000,
      slidesToShow: 3,
      autoplay: true,
      arrows: false,
      dots: true,
      infinite: true,
      rows: 0,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    }
  );
};
