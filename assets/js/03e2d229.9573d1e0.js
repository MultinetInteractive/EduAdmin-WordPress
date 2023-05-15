"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[585],{3905:(e,t,n)=>{n.d(t,{Zo:()=>p,kt:()=>h});var o=n(7294);function r(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function a(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function i(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?a(Object(n),!0).forEach((function(t){r(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):a(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function l(e,t){if(null==e)return{};var n,o,r=function(e,t){if(null==e)return{};var n,o,r={},a=Object.keys(e);for(o=0;o<a.length;o++)n=a[o],t.indexOf(n)>=0||(r[n]=e[n]);return r}(e,t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);for(o=0;o<a.length;o++)n=a[o],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(r[n]=e[n])}return r}var s=o.createContext({}),g=function(e){var t=o.useContext(s),n=t;return e&&(n="function"==typeof e?e(t):i(i({},t),e)),n},p=function(e){var t=g(e.components);return o.createElement(s.Provider,{value:t},e.children)},c="mdxType",d={inlineCode:"code",wrapper:function(e){var t=e.children;return o.createElement(o.Fragment,{},t)}},u=o.forwardRef((function(e,t){var n=e.components,r=e.mdxType,a=e.originalType,s=e.parentName,p=l(e,["components","mdxType","originalType","parentName"]),c=g(n),u=r,h=c["".concat(s,".").concat(u)]||c[u]||d[u]||a;return n?o.createElement(h,i(i({ref:t},p),{},{components:n})):o.createElement(h,i({ref:t},p))}));function h(e,t){var n=arguments,r=t&&t.mdxType;if("string"==typeof e||r){var a=n.length,i=new Array(a);i[0]=u;var l={};for(var s in t)hasOwnProperty.call(t,s)&&(l[s]=t[s]);l.originalType=e,l[c]="string"==typeof e?e:r,i[1]=l;for(var g=2;g<a;g++)i[g]=n[g];return o.createElement.apply(null,i)}return o.createElement.apply(null,n)}u.displayName="MDXCreateElement"},3521:(e,t,n)=>{n.r(t),n.d(t,{assets:()=>p,contentTitle:()=>s,default:()=>h,frontMatter:()=>l,metadata:()=>g,toc:()=>c});var o=n(3117),r=n(102),a=(n(7294),n(3905)),i=["components"],l={title:"Upgrade to My Profile",authors:"chga",tags:["Breaking Change","My Profile"]},s=void 0,g={permalink:"/blog/2022/02/21/upgrade-to-my-profile",source:"@site/blog/2022-02-21-upgrade-to-my-profile.md",title:"Upgrade to My Profile",description:"Version 3.0.0 gives you new design on login and booking list,",date:"2022-02-21T00:00:00.000Z",formattedDate:"February 21, 2022",tags:[{label:"Breaking Change",permalink:"/blog/tags/breaking-change"},{label:"My Profile",permalink:"/blog/tags/my-profile"}],readingTime:1.07,hasTruncateMarker:!0,authors:[{name:"Chris G\xe5rdenberg",title:"IT-infrastructure / Developer",url:"https://github.com/itssimple",imageURL:"https://github.com/itssimple.png",key:"chga"}],frontMatter:{title:"Upgrade to My Profile",authors:"chga",tags:["Breaking Change","My Profile"]}},p={authorsImageUrls:[void 0]},c=[{value:"Update information",id:"update-information",level:2},{value:"Changes Login form",id:"changes-login-form",level:2},{value:"Changes Booking list",id:"changes-booking-list",level:2}],d={toc:c},u="wrapper";function h(e){var t=e.components,l=(0,r.Z)(e,i);return(0,a.kt)(u,(0,o.Z)({},d,l,{components:t,mdxType:"MDXLayout"}),(0,a.kt)("p",null,'Version 3.0.0 gives you new design on login and booking list,\nunnamed participants and new "Export to Excel"-function added to booking list.'),(0,a.kt)("h2",{id:"update-information"},"Update information"),(0,a.kt)("p",null,"In this new version (",(0,a.kt)("strong",{parentName:"p"},"3.0.0"),") of the WordPress plugin, we have added some new things."),(0,a.kt)("ul",null,(0,a.kt)("li",{parentName:"ul"},"Unnamed participants is now shown under the Bookings tab"),(0,a.kt)("li",{parentName:"ul"},"Export to Excel (CSV) from the Bookings tab"),(0,a.kt)("li",{parentName:"ul"},"Fix for on-demand courses, so they actually show up as on-demand")),(0,a.kt)("p",null,"There has also been changes to the Login Page and Booking page designs,\nto fix certain layout problems when a default theme is applied."),(0,a.kt)("admonition",{title:"Breaking design change!",type:"danger"},(0,a.kt)("p",{parentName:"admonition"},"This ",(0,a.kt)("em",{parentName:"p"},"might")," break some custom designs if you have implemented any custom CSS to the login page and booking list page,\nso be sure to ",(0,a.kt)("strong",{parentName:"p"},"test this in a development environment first"),", before updating to the new version.")),(0,a.kt)("h2",{id:"changes-login-form"},"Changes Login form"),(0,a.kt)("p",null,"Example on how the Login Page form looked before this change (Swedish text):"),(0,a.kt)("p",null,(0,a.kt)("img",{alt:"Login Pre-changed styling",src:n(554).Z,width:"407",height:"320"})),(0,a.kt)("p",null,"And this is how the new form looks:"),(0,a.kt)("p",null,(0,a.kt)("img",{alt:"Login Post-changed styling (Desktop)",src:n(7588).Z,width:"827",height:"297"})),(0,a.kt)("p",null,".. and in mobile layout:"),(0,a.kt)("p",null,(0,a.kt)("img",{alt:"Login Post-changed styling (Mobile)",src:n(7335).Z,width:"442",height:"353"})),(0,a.kt)("h2",{id:"changes-booking-list"},"Changes Booking list"),(0,a.kt)("p",null,"And this is how the booking list used to look before the design overhaul:"),(0,a.kt)("p",null,(0,a.kt)("img",{alt:"Booking list pre-changed styling",src:n(4042).Z,width:"963",height:"884"})),(0,a.kt)("p",null,"Which has been updated, to look like this:"),(0,a.kt)("p",null,(0,a.kt)("img",{alt:"Booking list post-changed styling",src:n(3578).Z,width:"800",height:"750"})))}h.isMDXComponent=!0},3578:(e,t,n)=>{n.d(t,{Z:()=>o});const o=n.p+"assets/images/booking-list-post-580b280914b456e5bec9c064b156de10.png"},4042:(e,t,n)=>{n.d(t,{Z:()=>o});const o=n.p+"assets/images/booking-list-pre-5f2b012c0d4b4cdbee1cf88127747487.png"},554:(e,t,n)=>{n.d(t,{Z:()=>o});const o=n.p+"assets/images/login-pre-change-7d17fa571d19e9234779c8bf1b24efe8.png"},7335:(e,t,n)=>{n.d(t,{Z:()=>o});const o=n.p+"assets/images/post-change-mobile-1acd9a5f78a1035ee0d3b530ae77548a.png"},7588:(e,t,n)=>{n.d(t,{Z:()=>o});const o=n.p+"assets/images/post-change-28ab0dfea925602910b10bd265b76b94.png"}}]);