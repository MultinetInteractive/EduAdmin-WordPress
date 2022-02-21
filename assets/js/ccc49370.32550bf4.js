"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[103],{8665:(e,t,a)=>{a.d(t,{Z:()=>b});var n=a(102),l=a(7294),r=a(6010),i=a(2434),s=a(9960);const o="sidebar_a9qW",m="sidebarItemTitle_uKok",c="sidebarItemList_Kvuv",d="sidebarItem_CF0Q",g="sidebarItemLink_miNk",u="sidebarItemLinkActive_RRTD";var v=a(5999);function p(e){var t=e.sidebar;return 0===t.items.length?null:l.createElement("nav",{className:(0,r.Z)(o,"thin-scrollbar"),"aria-label":(0,v.I)({id:"theme.blog.sidebar.navAriaLabel",message:"Blog recent posts navigation",description:"The ARIA label for recent posts in the blog sidebar"})},l.createElement("div",{className:(0,r.Z)(m,"margin-bottom--md")},t.title),l.createElement("ul",{className:c},t.items.map((function(e){return l.createElement("li",{key:e.permalink,className:d},l.createElement(s.Z,{isNavLink:!0,to:e.permalink,className:g,activeClassName:u},e.title))}))))}var h=["sidebar","toc","children"];const b=function(e){var t=e.sidebar,a=e.toc,s=e.children,o=(0,n.Z)(e,h),m=t&&t.items.length>0;return l.createElement(i.Z,o,l.createElement("div",{className:"container margin-vert--lg"},l.createElement("div",{className:"row"},m&&l.createElement("aside",{className:"col col--3"},l.createElement(p,{sidebar:t})),l.createElement("main",{className:(0,r.Z)("col",{"col--7":m,"col--9 col--offset-1":!m}),itemScope:!0,itemType:"http://schema.org/Blog"},s),a&&l.createElement("div",{className:"col col--2"},a))))}},8561:(e,t,a)=>{a.d(t,{Z:()=>k});var n=a(7294),l=a(6010),r=a(3905),i=a(5999),s=a(9960),o=a(4996),m=a(5773),c=a(8780),d=a(4689),g=a(6753);const u="blogPostTitle_rzP5",v="blogPostData_Zg1s",p="blogPostDetailsFull_h6_j";var h=a(62);const b="image_o0gy";const E=function(e){var t=e.author,a=t.name,l=t.title,r=t.url,i=t.imageURL;return n.createElement("div",{className:"avatar margin-bottom--sm"},i&&n.createElement(s.Z,{className:"avatar__photo-link avatar__photo",href:r},n.createElement("img",{className:b,src:i,alt:a})),a&&n.createElement("div",{className:"avatar__intro",itemProp:"author",itemScope:!0,itemType:"https://schema.org/Person"},n.createElement("div",{className:"avatar__name"},n.createElement(s.Z,{href:r,itemProp:"url"},n.createElement("span",{itemProp:"name"},a))),l&&n.createElement("small",{className:"avatar__subtitle",itemProp:"description"},l)))},N="authorCol_FlmR",_="imageOnlyAuthorRow_trpF",f="imageOnlyAuthorCol_S2np";function Z(e){var t=e.authors,a=e.assets;if(0===t.length)return null;var r=t.every((function(e){return!e.name}));return n.createElement("div",{className:(0,l.Z)("margin-top--md margin-bottom--sm",r?_:"row")},t.map((function(e,t){var i;return n.createElement("div",{className:(0,l.Z)(!r&&"col col--6",r?f:N),key:t},n.createElement(E,{author:Object.assign({},e,{imageURL:null!=(i=a.authorsImageUrls[t])?i:e.imageURL})}))})))}const k=function(e){var t,a,b,E=(b=(0,m.c2)().selectMessage,function(e){var t=Math.ceil(e);return b(t,(0,i.I)({id:"theme.blog.post.readingTime.plurals",description:'Pluralized label for "{readingTime} min read". Use as much plural forms (separated by "|") as your language support (see https://www.unicode.org/cldr/cldr-aux/charts/34/supplemental/language_plural_rules.html)',message:"One min read|{readingTime} min read"},{readingTime:t}))}),N=(0,o.C)().withBaseUrl,_=e.children,f=e.frontMatter,k=e.assets,P=e.metadata,C=e.truncated,L=e.isBlogPostPage,T=void 0!==L&&L,y=P.date,w=P.formattedDate,I=P.permalink,x=P.tags,A=P.readingTime,H=P.title,M=P.editUrl,R=P.authors,U=null!=(t=k.image)?t:f.image,B=!T&&C,D=x.length>0,O=T?"h1":"h2";return n.createElement("article",{className:T?void 0:"margin-bottom--xl",itemProp:"blogPost",itemScope:!0,itemType:"http://schema.org/BlogPosting"},n.createElement("header",null,n.createElement(O,{className:u,itemProp:"headline"},T?H:n.createElement(s.Z,{itemProp:"url",to:I},H)),n.createElement("div",{className:(0,l.Z)(v,"margin-vert--md")},n.createElement("time",{dateTime:y,itemProp:"datePublished"},w),void 0!==A&&n.createElement(n.Fragment,null," \xb7 ",E(A))),n.createElement(Z,{authors:R,assets:k})),U&&n.createElement("meta",{itemProp:"image",content:N(U,{absolute:!0})}),n.createElement("div",{id:T?c.blogPostContainerID:void 0,className:"markdown",itemProp:"articleBody"},n.createElement(r.Zo,{components:d.Z},_)),(D||C)&&n.createElement("footer",{className:(0,l.Z)("row docusaurus-mt-lg",(a={},a[p]=T,a))},D&&n.createElement("div",{className:(0,l.Z)("col",{"col--9":B})},n.createElement(h.Z,{tags:x})),T&&M&&n.createElement("div",{className:"col margin-top--sm"},n.createElement(g.Z,{editUrl:M})),B&&n.createElement("div",{className:(0,l.Z)("col text--right",{"col--3":D})},n.createElement(s.Z,{to:P.permalink,"aria-label":"Read more about "+H},n.createElement("b",null,n.createElement(i.Z,{id:"theme.blog.post.readMore",description:"The label used in blog post item excerpts to link to full blog posts"},"Read More"))))))}},9360:(e,t,a)=>{a.r(t),a.d(t,{default:()=>u});var n=a(7294),l=a(1217),r=a(8665),i=a(8561),s=a(3117),o=a(5999),m=a(1750);const c=function(e){var t=e.nextItem,a=e.prevItem;return n.createElement("nav",{className:"pagination-nav docusaurus-mt-lg","aria-label":(0,o.I)({id:"theme.blog.post.paginator.navAriaLabel",message:"Blog post page navigation",description:"The ARIA label for the blog posts pagination"})},n.createElement("div",{className:"pagination-nav__item"},a&&n.createElement(m.Z,(0,s.Z)({},a,{subLabel:n.createElement(o.Z,{id:"theme.blog.post.paginator.newerPost",description:"The blog post button label to navigate to the newer/previous post"},"Newer Post")}))),n.createElement("div",{className:"pagination-nav__item pagination-nav__item--next"},t&&n.createElement(m.Z,(0,s.Z)({},t,{subLabel:n.createElement(o.Z,{id:"theme.blog.post.paginator.olderPost",description:"The blog post button label to navigate to the older/next post"},"Older Post")}))))};var d=a(5773),g=a(1575);const u=function(e){var t,a=e.content,s=e.sidebar,o=a.assets,m=a.metadata,u=m.title,v=m.description,p=m.nextItem,h=m.prevItem,b=m.date,E=m.tags,N=m.authors,_=m.frontMatter,f=_.hide_table_of_contents,Z=_.keywords,k=_.toc_min_heading_level,P=_.toc_max_heading_level,C=null!=(t=o.image)?t:_.image;return n.createElement(r.Z,{wrapperClassName:d.kM.wrapper.blogPages,pageClassName:d.kM.page.blogPostPage,sidebar:s,toc:!f&&a.toc&&a.toc.length>0?n.createElement(g.Z,{toc:a.toc,minHeadingLevel:k,maxHeadingLevel:P}):void 0},n.createElement(l.Z,{title:u,description:v,keywords:Z,image:C},n.createElement("meta",{property:"og:type",content:"article"}),n.createElement("meta",{property:"article:published_time",content:b}),N.some((function(e){return e.url}))&&n.createElement("meta",{property:"article:author",content:N.map((function(e){return e.url})).filter(Boolean).join(",")}),E.length>0&&n.createElement("meta",{property:"article:tag",content:E.map((function(e){return e.label})).join(",")})),n.createElement(i.Z,{frontMatter:_,assets:o,metadata:m,isBlogPostPage:!0},n.createElement(a,null)),(p||h)&&n.createElement(c,{nextItem:p,prevItem:h}))}},6753:(e,t,a)=>{a.d(t,{Z:()=>g});var n=a(7294),l=a(5999),r=a(3117),i=a(102),s=a(6010);const o="iconEdit_dcUD";var m=["className"];const c=function(e){var t=e.className,a=(0,i.Z)(e,m);return n.createElement("svg",(0,r.Z)({fill:"currentColor",height:"20",width:"20",viewBox:"0 0 40 40",className:(0,s.Z)(o,t),"aria-hidden":"true"},a),n.createElement("g",null,n.createElement("path",{d:"m34.5 11.7l-3 3.1-6.3-6.3 3.1-3q0.5-0.5 1.2-0.5t1.1 0.5l3.9 3.9q0.5 0.4 0.5 1.1t-0.5 1.2z m-29.5 17.1l18.4-18.5 6.3 6.3-18.4 18.4h-6.3v-6.2z"})))};var d=a(5773);function g(e){var t=e.editUrl;return n.createElement("a",{href:t,target:"_blank",rel:"noreferrer noopener",className:d.kM.common.editThisPage},n.createElement(c,null),n.createElement(l.Z,{id:"theme.common.editThisPage",description:"The link label to edit the current page"},"Edit this page"))}},1750:(e,t,a)=>{a.d(t,{Z:()=>r});var n=a(7294),l=a(9960);const r=function(e){var t=e.permalink,a=e.title,r=e.subLabel;return n.createElement(l.Z,{className:"pagination-nav__link",to:t},r&&n.createElement("div",{className:"pagination-nav__sublabel"},r),n.createElement("div",{className:"pagination-nav__label"},a))}},1575:(e,t,a)=>{a.d(t,{Z:()=>c});var n=a(3117),l=a(102),r=a(7294),i=a(6010),s=a(5002);const o="tableOfContents_cNA8";var m=["className"];const c=function(e){var t=e.className,a=(0,l.Z)(e,m);return r.createElement("div",{className:(0,i.Z)(o,"thin-scrollbar",t)},r.createElement(s.Z,(0,n.Z)({},a,{linkClassName:"table-of-contents__link toc-highlight",linkActiveClassName:"table-of-contents__link--active"})))}},5002:(e,t,a)=>{a.d(t,{Z:()=>m});var n=a(3117),l=a(102),r=a(7294),i=a(5773),s=["toc","className","linkClassName","linkActiveClassName","minHeadingLevel","maxHeadingLevel"];function o(e){var t=e.toc,a=e.className,n=e.linkClassName,l=e.isChild;return t.length?r.createElement("ul",{className:l?void 0:a},t.map((function(e){return r.createElement("li",{key:e.id},r.createElement("a",{href:"#"+e.id,className:null!=n?n:void 0,dangerouslySetInnerHTML:{__html:e.value}}),r.createElement(o,{isChild:!0,toc:e.children,className:a,linkClassName:n}))}))):null}function m(e){var t=e.toc,a=e.className,m=void 0===a?"table-of-contents table-of-contents__left-border":a,c=e.linkClassName,d=void 0===c?"table-of-contents__link":c,g=e.linkActiveClassName,u=void 0===g?void 0:g,v=e.minHeadingLevel,p=e.maxHeadingLevel,h=(0,l.Z)(e,s),b=(0,i.LU)(),E=null!=v?v:b.tableOfContents.minHeadingLevel,N=null!=p?p:b.tableOfContents.maxHeadingLevel,_=(0,i.DA)({toc:t,minHeadingLevel:E,maxHeadingLevel:N}),f=(0,r.useMemo)((function(){if(d&&u)return{linkClassName:d,linkActiveClassName:u,minHeadingLevel:E,maxHeadingLevel:N}}),[d,u,E,N]);return(0,i.Si)(f),r.createElement(o,(0,n.Z)({toc:_,className:m,linkClassName:d},h))}},7774:(e,t,a)=>{a.d(t,{Z:()=>m});var n=a(7294),l=a(6010),r=a(9960);const i="tag_hD8n",s="tagRegular_D6E_",o="tagWithCount_i0QQ";const m=function(e){var t,a=e.permalink,m=e.name,c=e.count;return n.createElement(r.Z,{href:a,className:(0,l.Z)(i,(t={},t[s]=!c,t[o]=c,t))},m,c&&n.createElement("span",null,c))}},62:(e,t,a)=>{a.d(t,{Z:()=>m});var n=a(7294),l=a(6010),r=a(5999),i=a(7774);const s="tags_XVD_",o="tag_JSN8";function m(e){var t=e.tags;return n.createElement(n.Fragment,null,n.createElement("b",null,n.createElement(r.Z,{id:"theme.tags.tagsListLabel",description:"The label alongside a tag list"},"Tags:")),n.createElement("ul",{className:(0,l.Z)(s,"padding--none","margin-left--sm")},t.map((function(e){var t=e.label,a=e.permalink;return n.createElement("li",{key:a,className:o},n.createElement(i.Z,{name:t,permalink:a}))}))))}}}]);