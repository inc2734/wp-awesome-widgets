(()=>{"use strict";var e={n:t=>{var o=t&&t.__esModule?()=>t.default:()=>t;return e.d(o,{a:o}),o},d:(t,o)=>{for(var r in o)e.o(o,r)&&!e.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:o[r]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t)};const t=window.wp.blocks,o=window.wp.element,r=window.wp.primitives,n=(0,o.createElement)(r.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},(0,o.createElement)(r.Path,{d:"M12 3c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm0 1.5c4.1 0 7.5 3.4 7.5 7.5v.1c-1.4-.8-3.3-1.7-3.4-1.8-.2-.1-.5-.1-.8.1l-2.9 2.1L9 11.3c-.2-.1-.4 0-.6.1l-3.7 2.2c-.1-.5-.2-1-.2-1.5 0-4.2 3.4-7.6 7.5-7.6zm0 15c-3.1 0-5.7-1.9-6.9-4.5l3.7-2.2 3.5 1.2c.2.1.5 0 .7-.1l2.9-2.1c.8.4 2.5 1.2 3.5 1.9-.9 3.3-3.9 5.8-7.4 5.8z"})),i=JSON.parse('{"u2":"wp-awesome-widgets/profile-box"}'),c=window.wp.serverSideRender;var s=e.n(c);const a=window.wp.components;(0,t.registerBlockType)(i.u2,{icon:n,edit:function({setAttributes:e,attributes:t,clientId:r}){return(0,o.useEffect)((()=>{t.clientId||e({clientId:r})}),[r]),(0,o.createElement)(a.Disabled,null,(0,o.createElement)(s(),{block:"wp-awesome-widgets/profile-box",attributes:t}))},save:function({attributes:e}){const{anchor:t}=e;return(0,o.createElement)("div",{"data-dynamic-block":"wp-awesome-widgets/profile-box","data-version":"1",id:t||void 0})}})})();