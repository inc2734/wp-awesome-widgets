!function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=10)}([function(e,t){e.exports=window.wp.element},function(e,t){e.exports=window.wp.i18n},function(e,t){e.exports=window.wp.components},function(e){e.exports=JSON.parse('{"name":"wp-awesome-widgets/recent-posts","title":"[WPAW] Recent posts","description":"","category":"widgets","textdomain":"inc2734-wp-awesome-widgets","attributes":{"postType":{"type":"string","default":"post"},"postsPerPage":{"type":"number","default":6},"showThumbnail":{"type":"boolean","default":true},"showTaxonomy":{"type":"boolean","default":true}},"supports":{"anchor":true,"customClassName":false}}')},function(e,t){e.exports=window.wp.primitives},function(e,t){e.exports=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=window.wp.blocks},function(e,t){e.exports=window.wp.serverSideRender},function(e,t){e.exports=window.wp.data},function(e,t){e.exports=window.wp.blockEditor},function(e,t,n){"use strict";n.r(t);var o={};n.r(o),n.d(o,"metadata",(function(){return w})),n.d(o,"name",(function(){return y})),n.d(o,"settings",(function(){return j}));var r=n(5),c=n.n(r),i=n(6),s=n(1);function a(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}var l=function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null;return e=Number(e),(isNaN(e)||e<t)&&(e=t),null!==n&&e>n&&(e=n),e},u=n(0),p=n(4),b=Object(u.createElement)(p.SVG,{viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},Object(u.createElement)(p.Path,{d:"M18 4H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm.5 14c0 .3-.2.5-.5.5H6c-.3 0-.5-.2-.5-.5V6c0-.3.2-.5.5-.5h12c.3 0 .5.2.5.5v12zM7 11h2V9H7v2zm0 4h2v-2H7v2zm3-4h7V9h-7v2zm0 4h7v-2h-7v2z"})),w=n(3),d=n(7),f=n.n(d),m=n(8),g=n(2),O=n(9),y=w.name,j={icon:b,edit:function(e){var t=e.attributes,n=e.setAttributes,o=t.postType,r=t.postsPerPage,c=t.showThumbnail,i=t.showTaxonomy,a=Object(m.useSelect)((function(e){return(0,e("core").getPostTypes)({per_page:-1})||[]}),[]),p=Object(u.useMemo)((function(){return a.filter((function(e){return e.viewable&&!e.hierarchical&&"media"!==e.rest_base}))}),[a]);return Object(u.createElement)(u.Fragment,null,Object(u.createElement)(O.InspectorControls,null,Object(u.createElement)(g.PanelBody,{title:Object(s.__)("Block Settings","inc2734-wp-awesome-widgets")},Object(u.createElement)(g.SelectControl,{label:Object(s.__)("Post Type","inc2734-wp-awesome-widgets"),value:o,onChange:function(e){return n({postType:e})},options:p.map((function(e){return{label:e.name,value:e.slug}}))}),Object(u.createElement)(g.RangeControl,{label:Object(s.__)("Number of posts","inc2734-wp-awesome-widgets"),value:r,onChange:function(e){return n({postsPerPage:l(e,1,12)})},min:"1",max:"12"}),Object(u.createElement)(g.ToggleControl,{label:Object(s.__)("Display thumbnail","inc2734-wp-awesome-widgets"),checked:c,onChange:function(e){return n({showThumbnail:e})}}),Object(u.createElement)(g.ToggleControl,{label:Object(s.__)("Display taxonomy","inc2734-wp-awesome-widgets"),checked:i,onChange:function(e){return n({showTasonomy:e})}}))),a?Object(u.createElement)(g.Disabled,null,Object(u.createElement)(f.a,{block:"wp-awesome-widgets/recent-posts",attributes:t})):Object(u.createElement)(g.Placeholder,{icon:"editor-ul",label:Object(s.__)("Recent posts","inc2734-wp-awesome-widgets")},Object(u.createElement)(g.Spinner,null)))},save:function(){return Object(u.createElement)("div",{"data-dynamic-block":"wp-awesome-widgets/recent-posts","data-version":"1"})}};!function(e){if(e){var t=e.metadata,n=e.settings,o=e.name;t&&(t.title&&(t.title=Object(s.__)(t.title,"snow-monkey-blocks"),n.title=t.title),t.description&&(t.description=Object(s.__)(t.description,"snow-monkey-blocks"),n.description=t.description),t.keywords&&(t.keywords=Object(s.__)(t.keywords,"inc2734-wp-awesome-widgets"),n.keywords=t.keywords)),Object(i.registerBlockType)(function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?a(Object(n),!0).forEach((function(t){c()(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):a(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}({name:o},t),n)}}(o)}]);