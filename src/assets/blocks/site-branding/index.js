(()=>{"use strict";var e={n:t=>{var n=t&&t.__esModule?()=>t.default:()=>t;return e.d(n,{a:n}),n},d:(t,n)=>{for(var i in n)e.o(n,i)&&!e.o(t,i)&&Object.defineProperty(t,i,{enumerable:!0,get:n[i]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t)};const t=window.wp.blocks,n=window.wp.element,i=window.wp.primitives,o=(0,n.createElement)(i.SVG,{viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},(0,n.createElement)(i.Path,{d:"M18 4H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm.5 14c0 .3-.2.5-.5.5H6c-.3 0-.5-.2-.5-.5V6c0-.3.2-.5.5-.5h12c.3 0 .5.2.5.5v12zM7 11h2V9H7v2zm0 4h2v-2H7v2zm3-4h7V9h-7v2zm0 4h7v-2h-7v2z"})),r=JSON.parse('{"u2":"wp-awesome-widgets/site-branding"}'),s=window.wp.serverSideRender;var a=e.n(s);const c=window.wp.blockEditor,w=window.wp.components,l=window.wp.i18n;(0,t.registerBlockType)(r.u2,{icon:o,edit:function({setAttributes:e,attributes:t,clientId:i}){const{description:o}=t;return(0,n.useEffect)((()=>{t.clientId||e({clientId:i})}),[i]),(0,n.createElement)(n.Fragment,null,(0,n.createElement)(c.InspectorControls,null,(0,n.createElement)(w.PanelBody,{title:(0,l.__)("Block Settings","inc2734-wp-awesome-widgets")},(0,n.createElement)(w.TextareaControl,{label:(0,l.__)("Site description","inc2734-wp-awesome-widgets"),help:(0,l.__)("HTML use allowed.","inc2734-wp-awesome-widgets"),value:o,onChange:t=>e({description:t})}))),(0,n.createElement)("div",{...(0,c.useBlockProps)()},(0,n.createElement)(w.Disabled,null,(0,n.createElement)(a(),{block:"wp-awesome-widgets/site-branding",attributes:t}))))},save:function({attributes:e}){const{anchor:t}=e;return(0,n.createElement)("div",{...c.useInnerBlocksProps.save({className:"wp-block-wp-awesome-widgets-site-branding"}),"data-dynamic-block":"wp-awesome-widgets/site-branding","data-version":"1",id:t||void 0})}})})();