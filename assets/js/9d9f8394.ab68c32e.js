"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[360],{3905:(e,t,n)=>{n.d(t,{Zo:()=>p,kt:()=>m});var o=n(7294);function r(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function i(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);t&&(o=o.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,o)}return n}function a(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?i(Object(n),!0).forEach((function(t){r(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):i(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function s(e,t){if(null==e)return{};var n,o,r=function(e,t){if(null==e)return{};var n,o,r={},i=Object.keys(e);for(o=0;o<i.length;o++)n=i[o],t.indexOf(n)>=0||(r[n]=e[n]);return r}(e,t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(e);for(o=0;o<i.length;o++)n=i[o],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(r[n]=e[n])}return r}var u=o.createContext({}),l=function(e){var t=o.useContext(u),n=t;return e&&(n="function"==typeof e?e(t):a(a({},t),e)),n},p=function(e){var t=l(e.components);return o.createElement(u.Provider,{value:t},e.children)},h="mdxType",c={inlineCode:"code",wrapper:function(e){var t=e.children;return o.createElement(o.Fragment,{},t)}},d=o.forwardRef((function(e,t){var n=e.components,r=e.mdxType,i=e.originalType,u=e.parentName,p=s(e,["components","mdxType","originalType","parentName"]),h=l(n),d=r,m=h["".concat(u,".").concat(d)]||h[d]||c[d]||i;return n?o.createElement(m,a(a({ref:t},p),{},{components:n})):o.createElement(m,a({ref:t},p))}));function m(e,t){var n=arguments,r=t&&t.mdxType;if("string"==typeof e||r){var i=n.length,a=new Array(i);a[0]=d;var s={};for(var u in t)hasOwnProperty.call(t,u)&&(s[u]=t[u]);s.originalType=e,s[h]="string"==typeof e?e:r,a[1]=s;for(var l=2;l<i;l++)a[l]=n[l];return o.createElement.apply(null,a)}return o.createElement.apply(null,n)}d.displayName="MDXCreateElement"},9222:(e,t,n)=>{n.r(t),n.d(t,{assets:()=>p,contentTitle:()=>u,default:()=>m,frontMatter:()=>s,metadata:()=>l,toc:()=>h});var o=n(3117),r=n(102),i=(n(7294),n(3905)),a=["components"],s={id:"troubleshooting",title:"Troubleshooting",sidebar_label:"How to troubleshoot"},u=void 0,l={unversionedId:"troubleshooting",id:"troubleshooting",title:"Troubleshooting",description:"Common issues",source:"@site/docs/troubleshooting.md",sourceDirName:".",slug:"/troubleshooting",permalink:"/docs/troubleshooting",draft:!1,editUrl:"https://github.com/MultinetInteractive/EduAdmin-WordPress/edit/master/new_website/docs/troubleshooting.md",tags:[],version:"current",lastUpdatedBy:"NoLifeKing",lastUpdatedAt:1730729333,formattedLastUpdatedAt:"Nov 4, 2024",frontMatter:{id:"troubleshooting",title:"Troubleshooting",sidebar_label:"How to troubleshoot"},sidebar:"docs",previous:{title:"WordPress Actions",permalink:"/docs/wordpress-actions"},next:{title:"Cookies",permalink:"/docs/cookies"}},p={},h=[{value:"Common issues",id:"common-issues",level:2},{value:"The website is showing old data",id:"the-website-is-showing-old-data",level:3},{value:"Nothing happens when I click anything",id:"nothing-happens-when-i-click-anything",level:3},{value:"It&#39;s not showing in the correct language",id:"its-not-showing-in-the-correct-language",level:3},{value:"Whenever I try to complete a booking, an unexpected error occurs",id:"whenever-i-try-to-complete-a-booking-an-unexpected-error-occurs",level:3},{value:"The dates shown on my website are wrong",id:"the-dates-shown-on-my-website-are-wrong",level:3}],c={toc:h},d="wrapper";function m(e){var t=e.components,n=(0,r.Z)(e,a);return(0,i.kt)(d,(0,o.Z)({},c,n,{components:t,mdxType:"MDXLayout"}),(0,i.kt)("h2",{id:"common-issues"},"Common issues"),(0,i.kt)("p",null,"These issues have been reported most of all,\nand is likely a configuration problem,\nor compatibility problem with other WordPress plugins."),(0,i.kt)("admonition",{title:"Missing features are not bugs",type:"info"},(0,i.kt)("p",{parentName:"admonition"},"If a feature is missing, it's probably because no one have asked for it, so it's not a bug.\nIf you want to request a feature, you can do so by creating an\n",(0,i.kt)("a",{parentName:"p",href:"https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/new/choose"},"issue"),"\nor contacting our ",(0,i.kt)("a",{parentName:"p",href:"https://support.eduadmin.se/en/support/tickets/new"},"support"))),(0,i.kt)("h3",{id:"the-website-is-showing-old-data"},"The website is showing old data"),(0,i.kt)("p",null,"If the data on the web page isn't updating after you have updated the information in ",(0,i.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,i.kt)("strong",{parentName:"a"},"EduAdmin")),",\nyou might want to clear any eventual cache plugins, and the internal cache in our plugin."),(0,i.kt)("p",null,"We cache some data for a period, to make the website as fast as possible."),(0,i.kt)("p",null,"If you need to check if it's our plugin that is caching something, you can add ",(0,i.kt)("inlineCode",{parentName:"p"},"?edu-showtransients=1")," to the url,\nand it will output some comments in the source code, that will tell you everything that we cache."),(0,i.kt)("p",null,"The output will look something like this"),(0,i.kt)("pre",null,(0,i.kt)("code",{parentName:"pre",className:"language-html",metastring:'title="Example output from plugin when showing transients"',title:'"Example',output:!0,from:!0,plugin:!0,when:!0,showing:!0,'transients"':!0},"\n\x3c!-- EduAdmin Booking (<version>) Transients \n eduadmin-locations_<hash>__<version>: Expires in: 24 hours \n eduadmin-categories_<hash>__<version>: Expires in: 24 hours \n eduadmin-levels_<hash>__<version>: Expires in: 24 hours \n eduadmin-listcourses-courses_<hash>__<version>: Expires in: 5 minutes \n eduadmin-organization_<hash>__<version>: Expires in: 24 hours \n eduadmin-newapi-token__<version>: Expires in: 7 days \n eduadmin-subjects_<hash>__<version>: Expires in: 1 day \n eduadmin-regions_<hash>__<version>: Expires in: 1 day \n /EduAdmin Booking Transients --\x3e\n\n")),(0,i.kt)("h3",{id:"nothing-happens-when-i-click-anything"},"Nothing happens when I click anything"),(0,i.kt)("p",null,"Make sure you are not using any plugins that combine/rearrange stylesheets or javascripts,\nor put our scripts in a whitelist, so they are not combined. Many of these plugins are not\nchecking in what order they should be loaded and might put the scripts in the wrong order."),(0,i.kt)("h3",{id:"its-not-showing-in-the-correct-language"},"It's not showing in the correct language"),(0,i.kt)("p",null,"By default, WordPress will download language files for plugins,\nbut we have noticed in some instances that it either fails to do so,\nor another translation plugin is prohibiting the translation to work properly."),(0,i.kt)("p",null,'You can always check the "Settings ',">",' General" and see what "Site Language" is set to.'),(0,i.kt)("h3",{id:"whenever-i-try-to-complete-a-booking-an-unexpected-error-occurs"},"Whenever I try to complete a booking, an unexpected error occurs"),(0,i.kt)("p",null,"Most of the time, when the plugin connects to ",(0,i.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,i.kt)("strong",{parentName:"a"},"EduAdmin"))," to complete the booking,\nwe get back either a success, or an array of errors."),(0,i.kt)("p",null,"The unexpected error means something went wrong, that we do not have a classification for,\nso please ",(0,i.kt)("strong",{parentName:"p"},"contact us")," at our support portal whenever this occurs."),(0,i.kt)("admonition",{title:"Want support? Find us here!",type:"tip"},(0,i.kt)("p",{parentName:"admonition"},"You can find the support portal at ",(0,i.kt)("a",{parentName:"p",href:"https://support.eduadmin.se/en/support/tickets/new"},(0,i.kt)("strong",{parentName:"a"},"https://support.eduadmin.se/en/support/tickets/new")),".")),(0,i.kt)("h3",{id:"the-dates-shown-on-my-website-are-wrong"},"The dates shown on my website are wrong"),(0,i.kt)("p",null,"Make sure you have set the correct timezone in your WordPress instance,\nwe try to convert the dates from the EduAdmin API, to fit your WordPress settings."),(0,i.kt)("p",null,"And if you want to check how we handle the dates, you can append ",(0,i.kt)("inlineCode",{parentName:"p"},"?edu-debugdates=1")," to the URL,\nand then you will see (in the source), something like this:"),(0,i.kt)("pre",null,(0,i.kt)("code",{parentName:"pre",className:"language-html",metastring:'title="Example output from plugin when debugging dates"',title:'"Example',output:!0,from:!0,plugin:!0,when:!0,debugging:!0,'dates"':!0},"\n\x3c!-- Array\n(\n    [0] => Y-m-d                        // The format of the date\n    [1] => 2020-09-01T17:00:00+02:00    // The original input to the method\n    [2] => 2020-09-01T17:00:00+02:00    // If we don't send any input, we calculate a new input to be used\n    [3] => 2020-09-01                   // This is what will be outputted into the website\n    [4] => +02:00                       // This is the calculated timezone offset\n    [5] => 7200                         // This is the timezone offset, in seconds\n    [6] => include                      // This is an approximation of where the code is used\n)\n--\x3e\n\n")))}m.isMDXComponent=!0}}]);