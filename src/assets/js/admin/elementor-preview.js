!function(){"use strict";var e={n:function(t){var i=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(i,{a:i}),i},d:function(t,i){for(var n in i)e.o(i,n)&&!e.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:i[n]})},o:function(e,t){return Object.prototype.hasOwnProperty.call(e,t)}},t=window.jQuery,i=e.n(t),n=function(e,t){0<e.length&&Array.prototype.slice.call(e,0).forEach((function(e,i){t(e,i)}))},o=function(){return-1!==navigator.userAgent.indexOf("Trident")},s=function(e){n(e,(function(e){e.style.minHeight="",o()&&(e.style.height="")}));var t=function(){var t=0;return n(e,(function(e){var i=e.offsetHeight,n=.5625*e.offsetWidth;(t<i||t<n)&&(t=n<i?i:n)})),t}();n(e,(function(e){o()&&(e.style.height="".concat(t,"px")),e.style.minHeight="".concat(t,"px")}))};i()((function(){i()(window).on("elementor/frontend/init",(function(){elementorFrontend.hooks.addAction("frontend/element_ready/widget",(function(e){e.hasClass("elementor-widget-wp-widget-inc2734_wp_awesome_widgets_slider")?e.find(".wpaw-slider__canvas:not(.slick-initialized)").each((function(e,t){return function(e){var t=document.documentElement.clientWidth,n=!1;i()(e).on("init",(function(t,i){setTimeout((function(){var t=e.querySelectorAll(".wpaw-slider__item");s(t)}),0)})),i()(e).on("setPosition",(function(i,o){if(o.windowWidth!==t||o.slideWidth!==n){var r=e.querySelectorAll(".wpaw-slider__item");s(r),t=o.windowWidth,n=o.slideWidth}}));var o=i()(e).closest(".wpaw-slider");i()(e).slick({speed:parseInt(o.attr("data-wpaw-slider-duration")),autoplaySpeed:parseInt(o.attr("data-wpaw-slider-interval")),slidesToShow:parseInt(o.attr("data-wpaw-slider-slides-to-show")),slidesToScroll:parseInt(o.attr("data-wpaw-slider-slides-to-scroll")),autoplay:!0,fade:"true"===o.attr("data-wpaw-slider-fade"),dots:!0,infinite:!0,arrows:!1,rows:0,responsive:[{breakpoint:1024,settings:{slidesToShow:1,slidesToScroll:1}}]})}(t)})):e.hasClass("elementor-widget-wp-widget-inc2734_wp_awesome_widgets_pickup_slider")?e.find(".wpaw-pickup-slider__canvas:not(.slick-initialized)").each((function(e,t){return n=t,o=document.documentElement.clientWidth,r=!1,i()(n).on("init",(function(e,t){setTimeout((function(){var e=n.querySelectorAll(".wpaw-pickup-slider__item");s(e)}),0)})),i()(n).on("setPosition",(function(e,t){if(t.windowWidth!==o||t.slideWidth!==r){var i=n.querySelectorAll(".wpaw-pickup-slider__item");s(i),o=t.windowWidth,r=t.slideWidth}})),void i()(n).slick({speed:500,autoplaySpeed:4e3,slidesToShow:1,fade:!0,autoplay:!0,dots:!1,infinite:!0,rows:0,pauseOnFocus:!1,pauseOnHover:!1});var n,o,r})):e.hasClass("elementor-widget-wp-widget-inc2734_wp_awesome_widgets_carousel_any_posts")&&e.find(".wpaw-carousel__canvas:not(.slick-initialized)").each((function(e,t){return n=t,void i()(n).slick({speed:500,autoplaySpeed:4e3,slidesToShow:3,autoplay:!0,arrows:!1,dots:!0,infinite:!0,rows:0,responsive:[{breakpoint:768,settings:{slidesToShow:1}}]});var n}))}))}))}))}();