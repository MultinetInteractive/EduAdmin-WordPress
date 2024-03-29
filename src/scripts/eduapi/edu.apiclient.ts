/** global: wp_edu */
declare var wp_edu: {
    AjaxUrl: string;
    CourseFolder: string;
    BaseUrl: string;
    BaseUrlScripts: string;
    Currency: string;
    ShouldValidateCivRegNo: string;
    SingleParticipant: string;
    RecaptchaEnabled: string;
};

wp_edu = wp_edu ? wp_edu : {
    AjaxUrl: "",
    CourseFolder: "",
    BaseUrl: "",
    BaseUrlScripts: "",
    Currency: "SEK",
    ShouldValidateCivRegNo: "false",
    SingleParticipant: "false",
    RecaptchaEnabled: "false"
};

/** global: edu */

interface eduObject {
    apiclient: {
        baseUrl: string | null;
        courseFolder: string | null;
        authToken: string | null;
        CookieBase: string;
        AfterUpdate: Function | null;
        parseDocument: Function;
        replaceLoginWidget: Function;
        replaceEventListWidget: Function;
        replaceCourseListDates: Function;
        replaceCourseEventList: Function;
        getLoginWidget: Function;
        authJS: Function;
        getEventList: Function;
        getCourseListDates: Function;
        getCourseEventList: Function;
        RunAfterUpdate: Function;
        CheckCouponCode: Function;
        CheckProgrammeCouponCode: Function;
        GetCookie: Function;
        SetCookie: Function;
        CanSetCookies: Function;
        DelCookie: Function;
    };
}

const edu: eduObject = (window as any)["edu"] ? (window as any)["edu"] : {};

edu.apiclient = {
    baseUrl: null,
    courseFolder: null,
    authToken: null,
    CookieBase: "edu_",
    AfterUpdate: null,
    parseDocument: function () {
        if (typeof wp_edu !== "undefined") {
            edu.apiclient.baseUrl = wp_edu.AjaxUrl;
            edu.apiclient.courseFolder = wp_edu.CourseFolder;
            edu.apiclient.authJS(function () {
                edu.apiclient.replaceLoginWidget();
                edu.apiclient.replaceEventListWidget();
                edu.apiclient.replaceCourseListDates();
                edu.apiclient.replaceCourseEventList();
            });
        }
    },
    replaceLoginWidget: function () {
        const lw = document.querySelectorAll('[data-eduwidget="loginwidget"]');
        if (lw) {
            const widgets = lw.length;
            for (let i = 0; i < widgets; i++) {
                edu.apiclient.getLoginWidget(lw[i]);
            }
        }
    },
    replaceEventListWidget: function () {
        const evLists = document.querySelectorAll('[data-eduwidget="eventlist"]');
        for (let i = 0, len = evLists.length; i < len; i++) {
            edu.apiclient.getEventList(evLists[i]);
        }
    },
    replaceCourseListDates: function () {
        const courseDateObjects = document.querySelectorAll(
            '[data-eduwidget="courseitem-date"]'
        );
        const objectIds = [];
        for (let i = 0, len = courseDateObjects.length; i < len; i++) {
            objectIds.push(
                (courseDateObjects[i].attributes as any)["data-objectid"].value
            );
        }
        if (objectIds.length > 0) {
            edu.apiclient.getCourseListDates();
        }
    },
    replaceCourseEventList: function () {
        const eventList = document.querySelectorAll(
            '[data-eduwidget="listview-eventlist"]'
        );
        const eventLength = eventList.length;
        for (let i = 0; i < eventLength; i++) {
            edu.apiclient.getCourseEventList(eventList[i]);
        }
    },
    authJS: function (next: Function) {
        next();
    },
    getCourseListDates: function () {
        const _options = jQuery(".eduadmin-courselistoptions");
        jQuery.ajax({
            url: edu.apiclient.baseUrl + "/courselist",
            type: "POST",
            data: {
                city: _options.data("city"),
                category: _options.data("category"),
                categorydeep: _options.data("categorydeep"),
                subject: _options.data("subject"),
                subjectid: _options.data("subjectid"),
                courselevel: _options.data("courselevel"),
                search: _options.data("search"),
                template: _options.data("template"),
                orderby: _options.data("orderby"),
                order: _options.data("order"),
                numberofevents: _options.data("numberofevents")
            },
            success: function (d) {
                let o = d;
                if (typeof d !== "object") {
                    o = JSON.parse(d);
                }

                for (let k in o) {
                    if (o.hasOwnProperty(k)) {
                        const target = document.querySelector(
                            '[data-eduwidget="courseitem-date"][data-objectid="' +
                            k +
                            '"]'
                        );
                        if (target) {
                            target.innerHTML = o[k];
                        }
                    }
                }
                edu.apiclient.RunAfterUpdate();
            }
        });
    },
    getCourseEventList: function (target: any) {
        jQuery.ajax({
            url: edu.apiclient.baseUrl + "/courselist/events",
            type: "POST",
            data: {
                city: jQuery(target).data("city"),
                category: jQuery(target).data("category"),
                categorydeep: jQuery(target).data("categorydeep"),
                subject: jQuery(target).data("subject"),
                subjectid: jQuery(target).data("subjectid"),
                courselevel: jQuery(target).data("courselevel"),
                search: jQuery(target).data("search"),
                template: jQuery(target).data("template"),
                orderby: jQuery(target).data("orderby"),
                order: jQuery(target).data("order"),
                numberofevents: jQuery(target).data("numberofevents"),
                showmore: jQuery(target).data("showmore"),
                showcity: jQuery(target).data("showcity"),
                showbookbtn: jQuery(target).data("showbookbtn"),
                showreadmorebtn: jQuery(target).data("showreadmorebtn"),
                "edu-region": jQuery(target).data("region"),
                showimages: jQuery(target).data("showimages"),
                hideimages: jQuery(target).data("hideimages"),
                filtercity: jQuery(target).data("filtercity"),
                ondemand: jQuery(target).data('ondemand'),
                allcourses: jQuery(target).data('allcourses'),
            },
            success: function (d) {
                jQuery(target).html(d);
                edu.apiclient.RunAfterUpdate();
            }
        });
    },
    getEventList: function (target: any) {
        jQuery.ajax({
            url: edu.apiclient.baseUrl + "/eventlist",
            type: "POST",
            data: {
                objectid: jQuery(target).data("objectid"),
                city: jQuery(target).data("city"),
                groupbycity: jQuery(target).data("groupbycity"),
                showmore: jQuery(target).data("showmore"),
                spotsleft: jQuery(target).data("spotsleft"),
                fewspots: jQuery(target).data("fewspots"),
                spotsettings: jQuery(target).data("spotsettings"),
                eid: jQuery(target).data("eid"),
                numberofevents: jQuery(target).data("numberofevents"),
                fetchmonths: jQuery(target).data("fetchmonths"),
                showvenue: jQuery(target).data("showvenue"),
                eventinquiry: jQuery(target).data("eventinquiry"),
                "edu-region": jQuery(target).data("region"),
                ondemand: jQuery(target).data('ondemand'),
                allcourses: jQuery(target).data('allcourses'),
            },
            success: function (d) {
                jQuery(target).replaceWith(d);
                edu.apiclient.RunAfterUpdate();
            }
        });
    },
    getLoginWidget: function (target: any) {
        let loginText = "";
        let logoutText = "";
        let guestText = "";
        if (jQuery(target).data("logintext")) {
            loginText = jQuery(target).data("logintext");
        }

        if (jQuery(target).data("logouttext")) {
            logoutText = jQuery(target).data("logouttext");
        }

        if (jQuery(target).data("guesttext")) {
            guestText = jQuery(target).data("guesttext");
        }

        jQuery.ajax({
            url: edu.apiclient.baseUrl + "/loginwidget",
            type: "POST",
            data: {
                logintext: loginText,
                logouttext: logoutText,
                guesttext: guestText
            },
            success: function (d) {
                jQuery(target).replaceWith(d);
                edu.apiclient.RunAfterUpdate();
            }
        });
    },
    RunAfterUpdate: function () {
        if (
            edu.apiclient.AfterUpdate &&
            typeof edu.apiclient.AfterUpdate == "function"
        ) {
            edu.apiclient.AfterUpdate.call(null);
        }
    },
    CheckCouponCode: function (code: string, eventId: number, onData: Function) {
        jQuery.ajax({
            url: edu.apiclient.baseUrl + "/coupon/check",
            type: "POST",
            data: {
                code: code,
                eventId: eventId
            },
            success: function (d) {
                if (onData && typeof onData == "function") {
                    onData(JSON.parse(d.data));
                }
            }
        });
    },
    CheckProgrammeCouponCode: function (code: string, programmeStartId: number, onData: Function) {
        jQuery.ajax({
            url: edu.apiclient.baseUrl + "/coupon/programme/check",
            type: "POST",
            data: {
                code: code,
                programmeStartId: programmeStartId
            },
            success: function (d) {
                if (onData && typeof onData == "function") {
                    onData(JSON.parse(d.data));
                }
            }
        });
    },
    GetCookie: function (name: string) {
        try {
            const cookie = document.cookie;
            name = edu.apiclient.CookieBase + name;
            let valueStart = cookie.indexOf(name + "=") + 1;
            if (valueStart === 0) {
                return null;
            }
            valueStart += name.length;
            let valueEnd = cookie.indexOf(";", valueStart);
            if (valueEnd == -1) {
                valueEnd = cookie.length;
            }

            return decodeURIComponent(cookie.substring(valueStart, valueEnd));
        } catch (e) {
        }
        return null;
    },
    SetCookie: function (name: string, value: string, expire: number) {
        const temp =
            edu.apiclient.CookieBase +
            name +
            "=" +
            encodeURIComponent(value) +
            (expire !== 0
                ? "; path=/; expires=" +
                new Date(new Date().getTime() + expire).toUTCString() +
                ";"
                : "; path=/;");
        document.cookie = temp;
    },
    CanSetCookies: function () {
        edu.apiclient.SetCookie("_eduCookieTest", "true", 0);
        const can = edu.apiclient.GetCookie("_eduCookieTest") != null;
        edu.apiclient.DelCookie("_eduCookieTest");
        return can;
    },
    DelCookie: function (name: string) {
        document.cookie =
            edu.apiclient.CookieBase +
            name +
            "=0; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
    }
};

(function () {
    if (typeof jQuery != "undefined") {
        jQuery("document").ready(function () {
            edu.apiclient.parseDocument();
        });
    } else {
        setTimeout(edu.apiclient.parseDocument, 500);
    }
})();
