!function(){"use strict";var e={n:function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,{a:n}),n},d:function(t,n){for(var i in n)e.o(n,i)&&!e.o(t,i)&&Object.defineProperty(t,i,{enumerable:!0,get:n[i]})},o:function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r:function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}},t={};e.r(t),e.d(t,{metadata:function(){return l},name:function(){return d},settings:function(){return p}});var n=window.wp.blocks,i=window.wp.i18n,s=window.wp.element,o=window.wp.primitives,a=(0,s.createElement)(o.SVG,{viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},(0,s.createElement)(o.Path,{d:"M18 4H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm.5 14c0 .3-.2.5-.5.5H6c-.3 0-.5-.2-.5-.5V6c0-.3.2-.5.5-.5h12c.3 0 .5.2.5.5v12zM7 11h2V9H7v2zm0 4h2v-2H7v2zm3-4h7V9h-7v2zm0 4h7v-2h-7v2z"})),l=JSON.parse('{"name":"wp-awesome-widgets/ranking","title":"[WPAW] Ranking","description":"","category":"widgets","textdomain":"inc2734-wp-awesome-widgets","attributes":{"showThumbnail":{"type":"boolean","default":true},"showTaxonomy":{"type":"boolean","default":true},"items":{"type":"string","default":"[{\\"id\\":0,\\"title\\":\\"\\",\\"url\\":\\"\\"}]"},"clientId":{"type":"string"}},"supports":{"anchor":true,"customClassName":false}}'),r=window.wp.serverSideRender,c=e.n(r),w=window.wp.blockEditor,m=window.wp.components;const{name:d}=l,p={icon:a,edit:function(e){let{attributes:t,setAttributes:n,clientId:o}=e;const{showThumbnail:l,showTaxonomy:r,items:d}=t;let p=d;p=JSON.parse(p),(0,s.useEffect)((()=>{t.clientId||n({clientId:o})}),[o]);const u=p.filter((e=>!!e.id&&0<e.id));return(0,s.createElement)(s.Fragment,null,(0,s.createElement)(w.InspectorControls,null,(0,s.createElement)(m.PanelBody,{title:(0,i.__)("Block Settings","inc2734-wp-awesome-widgets")},(0,s.createElement)(m.ToggleControl,{label:(0,i.__)("Display thumbnail","inc2734-wp-awesome-widgets"),checked:l,onChange:e=>n({showThumbnail:e})}),(0,s.createElement)(m.ToggleControl,{label:(0,i.__)("Display taxonomy","inc2734-wp-awesome-widgets"),checked:r,onChange:e=>n({showTasonomy:e})}),(0,s.createElement)(m.BaseControl,{label:(0,i.__)("Search post","inc2734-wp-awesome-widgets"),id:"wp-awesome-widgets/ranking/linkcontrol",className:"wp-awesome-widgests-posts-list-linkcontrols"},p.map(((e,t)=>(0,s.createElement)("div",{className:"wp-awesome-widgests-posts-list-linkcontrols__item",key:`item-${t}`},(0,s.createElement)("div",{className:"wp-awesome-widgests-posts-list-linkcontrol"},(0,s.createElement)("span",{className:"wp-awesome-widgests-posts-list-linkcontrol__label"},t+1),(0,s.createElement)(m.Button,{isSecondary:!0,isSmall:!0,onClick:()=>{p.splice(t,1),n({items:JSON.stringify(p)})},"aria-label":(0,i.__)("Remove this item","inc2734-wp-awesome-widgets"),className:"wp-awesome-widgests-posts-list-linkcontrol__remove-button"},"-"),(0,s.createElement)(w.__experimentalLinkControl,{settings:[],searchInputPlaceholder:(0,i.__)("Search","inc2734-wp-awesome-widgets"),value:{url:e.url,title:e.title},onChange:e=>{p[t]={id:e.id,title:e.title,url:e.url},n({items:JSON.stringify(p)})}}))))),(0,s.createElement)("div",{className:"wp-awesome-widgests-posts-list-linkcontrols__action"},(0,s.createElement)(m.Button,{isPrimary:!0,onClick:()=>{p.push({id:0,title:"",url:""}),n({items:JSON.stringify(p)})}},(0,i.__)("Add new item","inc2734-wp-awesome-widgets")))))),1>u.length?(0,s.createElement)(m.Placeholder,{icon:a,label:(0,i.__)("Ranking","inc2734-wp-awesome-widgets")},(0,i.__)("No posts found.","inc2734-wp-awesome-widgts")):(0,s.createElement)(m.Disabled,null,(0,s.createElement)(c(),{block:"wp-awesome-widgets/ranking",attributes:t})))},save:function(){return(0,s.createElement)("div",{"data-dynamic-block":"wp-awesome-widgets/ranking","data-version":"1"})}};(e=>{if(!e)return;const{metadata:t,settings:s,name:o}=e;t&&(t.title&&(t.title=(0,i.__)(t.title,"inc2734-wp-awesome-widgets"),s.title=t.title),t.description&&(t.description=(0,i.__)(t.description,"inc2734-wp-awesome-widgets"),s.description=t.description),t.keywords&&(t.keywords=(0,i.__)(t.keywords,"inc2734-wp-awesome-widgets"),s.keywords=t.keywords)),(0,n.registerBlockType)({name:o,...t},s)})(t)}();