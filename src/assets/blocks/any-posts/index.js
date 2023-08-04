(()=>{"use strict";var e={n:t=>{var s=t&&t.__esModule?()=>t.default:()=>t;return e.d(s,{a:s}),s},d:(t,s)=>{for(var n in s)e.o(s,n)&&!e.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:s[n]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t)};const t=window.wp.blocks,s=window.wp.element,n=window.wp.primitives,o=(0,s.createElement)(n.SVG,{viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},(0,s.createElement)(n.Path,{d:"M18 4H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm.5 14c0 .3-.2.5-.5.5H6c-.3 0-.5-.2-.5-.5V6c0-.3.2-.5.5-.5h12c.3 0 .5.2.5.5v12zM7 11h2V9H7v2zm0 4h2v-2H7v2zm3-4h7V9h-7v2zm0 4h7v-2h-7v2z"})),i=JSON.parse('{"u2":"wp-awesome-widgets/any-posts"}'),l=window.wp.serverSideRender;var a=e.n(l);const c=window.wp.blockEditor,w=window.wp.components,r=window.wp.i18n;(0,t.registerBlockType)(i.u2,{icon:o,edit:function({attributes:e,setAttributes:t,clientId:n}){const{showThumbnail:i,showTaxonomy:l,items:m}=e;let d=m;d=JSON.parse(d),(0,s.useEffect)((()=>{e.clientId||t({clientId:n})}),[n]);const p=d.filter((e=>!!e.id&&0<e.id));return(0,s.createElement)(s.Fragment,null,(0,s.createElement)(c.InspectorControls,null,(0,s.createElement)(w.PanelBody,{title:(0,r.__)("Block Settings","inc2734-wp-awesome-widgets")},(0,s.createElement)(w.ToggleControl,{label:(0,r.__)("Display thumbnail","inc2734-wp-awesome-widgets"),checked:i,onChange:e=>t({showThumbnail:e})}),(0,s.createElement)(w.ToggleControl,{label:(0,r.__)("Display taxonomy","inc2734-wp-awesome-widgets"),checked:l,onChange:e=>t({showTasonomy:e})}),(0,s.createElement)(w.BaseControl,{label:(0,r.__)("Search post","inc2734-wp-awesome-widgets"),id:"wp-awesome-widgets/any-posts/linkcontrol",className:"wp-awesome-widgests-posts-list-linkcontrols"},d.map(((e,n)=>(0,s.createElement)("div",{className:"wp-awesome-widgests-posts-list-linkcontrols__item",key:`item-${n}`},(0,s.createElement)("div",{className:"wp-awesome-widgests-posts-list-linkcontrol"},(0,s.createElement)("span",{className:"wp-awesome-widgests-posts-list-linkcontrol__label"},n+1),(0,s.createElement)(w.Button,{isSecondary:!0,isSmall:!0,onClick:()=>{d.splice(n,1),t({items:JSON.stringify(d)})},"aria-label":(0,r.__)("Remove this item","inc2734-wp-awesome-widgets"),className:"wp-awesome-widgests-posts-list-linkcontrol__remove-button"},"-"),(0,s.createElement)(c.__experimentalLinkControl,{settings:[],value:{url:e.url,title:e.title},onChange:e=>{d[n]={id:e.id,title:e.title,url:e.url},t({items:JSON.stringify(d)})}}))))),(0,s.createElement)("div",{className:"wp-awesome-widgests-posts-list-linkcontrols__action"},(0,s.createElement)(w.Button,{isPrimary:!0,onClick:()=>{d.push({id:0,title:"",url:""}),t({items:JSON.stringify(d)})}},(0,r.__)("Add new item","inc2734-wp-awesome-widgets")))))),(0,s.createElement)("div",{...(0,c.useBlockProps)()},1>p.length?(0,s.createElement)(w.Placeholder,{icon:o,label:(0,r.__)("Any posts","inc2734-wp-awesome-widgets")},(0,r.__)("No posts found.","inc2734-wp-awesome-widgets")):(0,s.createElement)(w.Disabled,null,(0,s.createElement)(a(),{block:"wp-awesome-widgets/any-posts",attributes:e}))))},save:function({attributes:e}){const{anchor:t}=e;return(0,s.createElement)("div",{...c.useInnerBlocksProps.save({className:"wp-block-wp-awesome-widgets-any-posts"}),"data-dynamic-block":"wp-awesome-widgets/any-posts","data-version":"1",id:t||void 0})}})})();