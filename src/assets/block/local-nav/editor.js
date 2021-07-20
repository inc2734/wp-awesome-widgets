!function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=9)}([function(e,t){e.exports=window.wp.element},function(e,t){e.exports=window.wp.i18n},function(e,t){e.exports=window.wp.components},function(e){e.exports=JSON.parse('{"name":"wp-awesome-widgets/local-nav","title":"[WPAW] Local navigation","description":"","category":"widgets","textdomain":"inc2734-wp-awesome-widgets","attributes":{"direction":{"type":"string","default":"vertical"},"displayTopLevelPageTitle":{"type":"boolean","default":true},"displayOnlyHaveDescendants":{"type":"boolean","default":false}},"supports":{"anchor":true,"customClassName":false}}')},function(e,t){e.exports=window.wp.primitives},function(e,t){e.exports=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e},e.exports.default=e.exports,e.exports.__esModule=!0},function(e,t){e.exports=window.wp.blocks},function(e,t){e.exports=window.wp.serverSideRender},function(e,t){e.exports=window.wp.blockEditor},function(e,t,n){"use strict";n.r(t);var o={};n.r(o),n.d(o,"metadata",(function(){return d})),n.d(o,"name",(function(){return y})),n.d(o,"settings",(function(){return v}));var r=n(5),i=n.n(r),c=n(6),a=n(1);function l(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}var s=n(0),u=n(4),p=Object(s.createElement)(u.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},Object(s.createElement)(u.Path,{d:"M7 13.8h6v-1.5H7v1.5zM18 16V4c0-1.1-.9-2-2-2H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2zM5.5 16V4c0-.3.2-.5.5-.5h10c.3 0 .5.2.5.5v12c0 .3-.2.5-.5.5H6c-.3 0-.5-.2-.5-.5zM7 10.5h8V9H7v1.5zm0-3.3h8V5.8H7v1.4zM20.2 6v13c0 .7-.6 1.2-1.2 1.2H8v1.5h11c1.5 0 2.7-1.2 2.7-2.8V6h-1.5z"})),d=n(3),w=n(7),b=n.n(w),f=n(2),m=n(8),y=d.name,v={icon:p,edit:function(e){var t=e.attributes,n=e.setAttributes,o=t.direction,r=t.displayTopLevelPageTitle,i=t.displayOnlyHaveDescendants;return Object(s.createElement)(s.Fragment,null,Object(s.createElement)(m.InspectorControls,null,Object(s.createElement)(f.PanelBody,{title:Object(a.__)("Block Settings","inc2734-wp-awesome-widgets")},Object(s.createElement)(f.SelectControl,{label:Object(a.__)("Direction","inc2734-wp-awesome-widgets"),value:o,onChange:function(e){return n({direction:e})},options:[{label:Object(a.__)("Vertical","inc2734-wp-awesome-widgets"),value:"vertical"},{label:Object(a.__)("Horizontal","inc2734-wp-awesome-widgets"),value:"horizontal"}]}),Object(s.createElement)(f.ToggleControl,{label:Object(a.__)("Display the page title of the top-level","inc2734-wp-awesome-widgets"),checked:r,onChange:function(e){return n({displayTopLevelPageTitle:e})}}),Object(s.createElement)(f.ToggleControl,{label:Object(a.__)("Display only when you have descendants","inc2734-wp-awesome-widgets"),checked:i,onChange:function(e){return n({displayOnlyHaveDescendants:e})}}))),Object(s.createElement)(f.Disabled,null,Object(s.createElement)(b.a,{block:"wp-awesome-widgets/local-nav",attributes:t})))},save:function(){return Object(s.createElement)("div",{"data-dynamic-block":"wp-awesome-widgets/local-nav","data-version":"1"})}};!function(e){if(e){var t=e.metadata,n=e.settings,o=e.name;t&&(t.title&&(t.title=Object(a.__)(t.title,"snow-monkey-blocks"),n.title=t.title),t.description&&(t.description=Object(a.__)(t.description,"snow-monkey-blocks"),n.description=t.description),t.keywords&&(t.keywords=Object(a.__)(t.keywords,"inc2734-wp-awesome-widgets"),n.keywords=t.keywords)),Object(c.registerBlockType)(function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?l(Object(n),!0).forEach((function(t){i()(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):l(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}({name:o},t),n)}}(o)}]);