"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[90],{9390:(e,t,n)=>{n.r(t),n.d(t,{frontMatter:()=>r,contentTitle:()=>d,metadata:()=>l,toc:()=>u,default:()=>p});var a=n(7462),i=n(3366),o=(n(7294),n(3905)),s=["components"],r={id:"getting-started",title:"Getting started",sidebar_label:"First time setup",slug:"/"},d=void 0,l={unversionedId:"getting-started",id:"getting-started",isDocsHomePage:!1,title:"Getting started",description:"This guide will focus on get you started with the EduAdmin WordPress Plugin, with default templates and settings so your visitors can start booking directly from your WordPress webpage.",source:"@site/docs/getting-started.md",sourceDirName:".",slug:"/",permalink:"/docs/",editUrl:"https://github.com/MultinetInteractive/EduAdmin-WordPress/edit/master/new_website/docs/getting-started.md",tags:[],version:"current",lastUpdatedBy:"Chris G\xe5rdenberg",lastUpdatedAt:1633684996,formattedLastUpdatedAt:"10/8/2021",frontMatter:{id:"getting-started",title:"Getting started",sidebar_label:"First time setup",slug:"/"},sidebar:"docs",next:{title:"Shortcodes",permalink:"/docs/shortcodes"}},u=[{value:"Installing the plugin",id:"installing-the-plugin",children:[]},{value:"Setting the API key",id:"setting-the-api-key",children:[]},{value:"Creating all the required pages",id:"creating-all-the-required-pages",children:[{value:"<code>[eduadmin-listview]</code>",id:"eduadmin-listview",children:[]},{value:"<code>[eduadmin-detailview]</code>",id:"eduadmin-detailview",children:[]},{value:"<code>[eduadmin-bookingview]</code> (or use the EduAdmin Booking Forms)",id:"eduadmin-bookingview-or-use-the-eduadmin-booking-forms",children:[]},{value:"Thank you-page",id:"thank-you-page",children:[]}]},{value:"Wrapping it up",id:"wrapping-it-up",children:[]}],h={toc:u};function p(e){var t=e.components,n=(0,i.Z)(e,s);return(0,o.kt)("wrapper",(0,a.Z)({},h,n,{components:t,mdxType:"MDXLayout"}),(0,o.kt)("p",null,"This guide will focus on get you started with the ",(0,o.kt)("a",{parentName:"p",href:"https://wordpress.org/plugins/eduadmin-booking/"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin WordPress Plugin")),", with default templates and settings so your visitors can start booking directly from your ",(0,o.kt)("a",{parentName:"p",href:"https://www.wordpress.org"},(0,o.kt)("strong",{parentName:"a"},"WordPress"))," webpage."),(0,o.kt)("blockquote",null,(0,o.kt)("p",{parentName:"blockquote"},"If you do not have an API key for ",(0,o.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin"))," yet,\nconsider contacting our support."),(0,o.kt)("p",{parentName:"blockquote"},(0,o.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin"))," is not a free service,\nand the API key comes with a monthly fee.")),(0,o.kt)("p",null,"If you have your API key ready, let us go through the steps below!"),(0,o.kt)("blockquote",null,(0,o.kt)("p",{parentName:"blockquote"},"If you need the ability to customize things more than we have the ability to,\nwe recommend that you look into creating your own integration with our API.")),(0,o.kt)("h2",{id:"installing-the-plugin"},"Installing the plugin"),(0,o.kt)("p",null,"Make sure you are logged in to WordPress with a user, that has access to install new plugins.\nFrom the plugin view, click ",(0,o.kt)("strong",{parentName:"p"},"Add New")," and search for ",(0,o.kt)("em",{parentName:"p"},"EduAdmin"),', the one you want is "',(0,o.kt)("a",{parentName:"p",href:"https://wordpress.org/plugins/eduadmin-booking/"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin Booking")),'" by ',(0,o.kt)("a",{parentName:"p",href:"https://www.multinet.com"},(0,o.kt)("strong",{parentName:"a"},"MultiNet Interactive AB")),"."),(0,o.kt)("blockquote",null,(0,o.kt)("p",{parentName:"blockquote"},"Don't forget to activate the newly installed plugin")),(0,o.kt)("h2",{id:"setting-the-api-key"},"Setting the API key"),(0,o.kt)("p",null,"When you activate the plugin, a new menu item (",(0,o.kt)("em",{parentName:"p"},"EduAdmin"),") will appear in the left menu,\nto set your API key, navigate to the ",(0,o.kt)("em",{parentName:"p"},"Api Authentication")," and enter the API key you got from ",(0,o.kt)("a",{parentName:"p",href:"https://www.multinet.com"},(0,o.kt)("strong",{parentName:"a"},"MultiNet Interactive AB")),"\n(or if you got one from the company you're building the website for.)"),(0,o.kt)("h2",{id:"creating-all-the-required-pages"},"Creating all the required pages"),(0,o.kt)("p",null,"After setting the API key, we now need to create the bare minimum of required pages and set some settings,\nso your customers can browse the available courses and if available book themselves."),(0,o.kt)("blockquote",null,(0,o.kt)("p",{parentName:"blockquote"},"For all pages to work, you have to select them in the proper setting on ",(0,o.kt)("em",{parentName:"p"},"General settings"),",\nand set which URL/folder the plugin should work under.")),(0,o.kt)("p",null,"The shortcodes we go through below can be viewed in detail on the ",(0,o.kt)("a",{parentName:"p",href:"/docs/shortcodes"},"shortcode"),"-page"),(0,o.kt)("p",null,"The pages that we recommend that you create are as follows"),(0,o.kt)("h3",{id:"eduadmin-listview"},(0,o.kt)("inlineCode",{parentName:"h3"},"[eduadmin-listview]")),(0,o.kt)("p",null,"This page will show the available courses that you have published through ",(0,o.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin")),",\nand depending on what settings it can show different information."),(0,o.kt)("h3",{id:"eduadmin-detailview"},(0,o.kt)("inlineCode",{parentName:"h3"},"[eduadmin-detailview]")),(0,o.kt)("p",null,"The details view, will show the course information and the available course dates (if there are any available)."),(0,o.kt)("p",null,"It is also possible to build a custom template to use, instead of the two default themes we have."),(0,o.kt)("h3",{id:"eduadmin-bookingview-or-use-the-eduadmin-booking-forms"},(0,o.kt)("inlineCode",{parentName:"h3"},"[eduadmin-bookingview]")," (or use the EduAdmin Booking Forms)"),(0,o.kt)("p",null,"This page is probably the most important one, since it's the page used to post the bookings into ",(0,o.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin")),"."),(0,o.kt)("p",null,"The form is automatically built by the plugin, and handles custom fields and questions that you can setup in ",(0,o.kt)("a",{parentName:"p",href:"https://www.eduadmin.se"},(0,o.kt)("strong",{parentName:"a"},"EduAdmin")),",\nthe elements have CSS classes, so it's easy to style the form, the way you want it to be."),(0,o.kt)("hr",null),(0,o.kt)("p",null,'And as stated in the header, you can also check the box in the top of "Booking settings", to use the booking forms from EduAdmin instead.'),(0,o.kt)("p",null,"All customization for these forms are made directly in EduAdmin, so that you don't have to work inside of WordPress to modify them."),(0,o.kt)("h3",{id:"thank-you-page"},"Thank you-page"),(0,o.kt)("p",null,"This is a static page that you create as a ",(0,o.kt)("em",{parentName:"p"},"Thank you"),"-page, whenever someone completes a booking."),(0,o.kt)("p",null,"It will also run the javascript specified in the ",(0,o.kt)("em",{parentName:"p"},"Booking settings"),"-section, if anything is specified,\nthis is normally used to complete goals in Analytic-systems."),(0,o.kt)("h2",{id:"wrapping-it-up"},"Wrapping it up"),(0,o.kt)("p",null,"We went through the guide, created some pages, added the appropriate shortcodes."),(0,o.kt)("p",null,"If everything is setup correctly, you should now be able to view your new,\nfully integrated web booking in the directory you selected during the setup."),(0,o.kt)("p",null,"If you are experiencing some kind  or problems,\ncheck the ",(0,o.kt)("a",{parentName:"p",href:"/docs/troubleshooting"},"Troubleshooting"),"-page to see\nif the issue you are experiencing is listed there."))}p.isMDXComponent=!0}}]);