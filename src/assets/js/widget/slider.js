(()=>{"use strict";var t={n:e=>{var s=e&&e.__esModule?()=>e.default:()=>e;return t.d(s,{a:s}),s},d:(e,s)=>{for(var i in s)t.o(s,i)&&!t.o(e,i)&&Object.defineProperty(e,i,{enumerable:!0,get:s[i]})},o:(t,e)=>Object.prototype.hasOwnProperty.call(t,e)};const e=window.jQuery;var s=t.n(e);const i=function(t,e){0<t.length&&Array.prototype.slice.call(t,0).forEach((function(t,s){e(t,s)}))},o=()=>-1!==navigator.userAgent.indexOf("Trident"),r=t=>{i(t,(t=>{t.style.minHeight="",o()&&(t.style.height="")}));const e=(()=>{let e=0;return i(t,(t=>{const s=t.offsetHeight,i=.5625*t.offsetWidth;(e<s||e<i)&&(e=i<s?s:i)})),e})();i(t,(t=>{o()&&(t.style.height=`${e}px`),t.style.minHeight=`${e}px`}))};s()(".wpaw-slider__canvas").each(((t,e)=>{(t=>{let e=document.documentElement.clientWidth,i=!1;s()(t).on("init",((e,s)=>{setTimeout((()=>{const e=t.querySelectorAll(".wpaw-slider__item");r(e)}),0)})),s()(t).on("setPosition",((s,o)=>{if(o.windowWidth!==e||o.slideWidth!==i){const s=t.querySelectorAll(".wpaw-slider__item");r(s),e=o.windowWidth,i=o.slideWidth}}));const o=s()(t).closest(".wpaw-slider");s()(t).slick({speed:parseInt(o.attr("data-wpaw-slider-duration")),autoplaySpeed:parseInt(o.attr("data-wpaw-slider-interval")),slidesToShow:parseInt(o.attr("data-wpaw-slider-slides-to-show")),slidesToScroll:parseInt(o.attr("data-wpaw-slider-slides-to-scroll")),autoplay:!0,fade:"true"===o.attr("data-wpaw-slider-fade"),dots:!0,infinite:!0,arrows:!1,rows:0,responsive:[{breakpoint:1024,settings:{slidesToShow:1,slidesToScroll:1}}]})})(e)}))})();