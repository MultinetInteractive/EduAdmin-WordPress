"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[162],{6005:(e,t,n)=>{n.r(t),n.d(t,{frontMatter:()=>l,contentTitle:()=>d,metadata:()=>u,toc:()=>r,default:()=>c});var i=n(7462),a=n(3366),o=(n(7294),n(3905)),s=["components"],l={id:"your-first-custom-template",title:"Your first custom template",sidebar_label:"Your first custom template"},d=void 0,u={unversionedId:"your-first-custom-template",id:"your-first-custom-template",isDocsHomePage:!1,title:"Your first custom template",description:"This guide will show how you can build the template_A-template, but as a custom template.",source:"@site/docs/custom-template.md",sourceDirName:".",slug:"/your-first-custom-template",permalink:"/docs/your-first-custom-template",editUrl:"https://github.com/MultinetInteractive/EduAdmin-WordPress/edit/master/new_website/docs/custom-template.md",tags:[],version:"current",lastUpdatedBy:"Chris G\xe5rdenberg",lastUpdatedAt:1645176026,formattedLastUpdatedAt:"2/18/2022",frontMatter:{id:"your-first-custom-template",title:"Your first custom template",sidebar_label:"Your first custom template"},sidebar:"docs",previous:{title:"Shortcodes",permalink:"/docs/shortcodes"},next:{title:"How to troubleshoot",permalink:"/docs/troubleshooting"}},r=[],m={toc:r};function c(e){var t=e.components,n=(0,a.Z)(e,s);return(0,o.kt)("wrapper",(0,i.Z)({},m,n,{components:t,mdxType:"MDXLayout"}),(0,o.kt)("p",null,"This guide will show how you can build the ",(0,o.kt)("inlineCode",{parentName:"p"},"template_A"),"-template, but as a custom template."),(0,o.kt)("hr",null),(0,o.kt)("p",null,"This is how the default detail view is implemented"),(0,o.kt)("pre",null,(0,o.kt)("code",{parentName:"pre",className:"language-php"},"\n[eduadmin-detailview]\n\n")),(0,o.kt)("p",null,"That's basically all you need for the detail view to start working,\nand then you can change some settings and add some attributes to modify the default appearance."),(0,o.kt)("p",null,"Now, the first modification we will do to make it possible to use custom templates,\nwill be adding the attribute ",(0,o.kt)("inlineCode",{parentName:"p"},"customtemplate"),". Doing this will disable the regular templates."),(0,o.kt)("pre",null,(0,o.kt)("code",{parentName:"pre",className:"language-php"},"\n[eduadmin-detailview customtemplate]\n\n")),(0,o.kt)("p",null,"So, if you reload the detail view of a course template now, it should not show anything at all.\nDon't worry, it is to be expected, since we told the plugin that we are going to use a custom template,\nand didn't add anything else to the page."),(0,o.kt)("p",null,"So, let's go recreate the ",(0,o.kt)("inlineCode",{parentName:"p"},"template_A"),"-template, so we get to know the custom templating."),(0,o.kt)("p",null,"All the code below should go into a single code block.\nWe won't be using the image, because we can only get the image URL,\nnot see if it actually contains anything, and we don't want to render broken images."),(0,o.kt)("pre",null,(0,o.kt)("code",{parentName:"pre",className:"language-html"},'\n[eduadmin-detailview customtemplate]\n\n<div class="eduadmin">\n    <a href="javascript://" onclick="eduGlobalMethods.GoBack(\'../\', event);" class="backLink">\n        \xab Go back\n    </a>\n    <div class="title">\n        <h1 class="courseTitle">\n            [eduadmin-detailinfo coursepublicname]\n            <small class="courseLevel">\n                [eduadmin-detailinfo courselevel]\n            </small>\n        </h1>\n    </div>\n    <hr />\n    <div class="textblock">\n        <h3>Course description</h3>\n        <div>[eduadmin-detailinfo coursedescription]</div>\n\n        <h3>Course goal</h3>\n        <div>[eduadmin-detailinfo coursegoal]</div>\n  \n        <h3>Target group</h3>\n        <div>[eduadmin-detailinfo coursetarget]</div>\n  \n        <h3>Prerequisites</h3>\n        <div>[eduadmin-detailinfo courseprerequisites]</div>\n  \n        <h3>After the course</h3>\n        <div>[eduadmin-detailinfo courseafter]</div>\n  \n        <h3>Quotes</h3>\n        <div>[eduadmin-detailinfo coursequote]</div>\n  \n    </div>\n    <div class="eventInformation">\n        <h3>Time</h3>\n        [eduadmin-detailinfo coursedays], \n        [eduadmin-detailinfo coursestarttime] - [eduadmin-detailinfo courseendtime]\n\n        <h3>Price</h3>\n        [eduadmin-detailinfo courseprice]\n    </div>\n</div>\n\n[eduadmin-detailinfo courseeventlist]\n\n<div class="eduadmin">\n    <div class="inquiry">\n        <a class="inquiry-link" href="[eduadmin-detailinfo courseinquiryurl]">\n            Send inquiry about this course\n        </a>\n    </div>\n</div>\n\n')))}c.isMDXComponent=!0}}]);