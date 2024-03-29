"use strict";
/** global: edu */
var eduBookingView = {
    ProgrammeBooking: false,
    Customer: null,
    ContactPerson: null,
    Participants: [],
    SingleParticipant: JSON.parse(window.wp_edu.SingleParticipant),
    ForceContactCivicRegNo: false,
    MaxParticipants: 0,
    CurrentParticipants: 0,
    DiscountPercent: 0,
    AddParticipant: function () {
        if (!eduBookingView.SingleParticipant || eduBookingView.ProgrammeBooking) {
            if (eduBookingView.MaxParticipants === -1 ||
                eduBookingView.CurrentParticipants <
                    eduBookingView.MaxParticipants) {
                var holder = document.getElementById("edu-participantHolder");
                var tmpl = document.querySelector(".eduadmin .participantItem.template");
                var cloned = tmpl.cloneNode(true);
                cloned.style.display = "block";
                cloned.className = cloned.className.replace(" template", "");
                var requiredFields_1 = cloned.querySelectorAll("[data-required]");
                for (var index = 0; index < requiredFields_1.length; index++) {
                    requiredFields_1[index].setAttribute("required", "");
                    requiredFields_1[index].required = true;
                }
                holder.appendChild(cloned);
            }
            else {
                var partWarning = document.getElementById("edu-warning-participants");
                if (partWarning) {
                    partWarning.style.display = "block";
                    setTimeout(function () {
                        var partWarning = document.getElementById("edu-warning-participants");
                        partWarning.style.display = "";
                    }, 5000);
                }
            }
        }
        else if (eduBookingView.SingleParticipant || eduBookingView.ProgrammeBooking) {
            var bookingForm = document.querySelector('.eduadmin.booking-page');
            var requiredFields_2 = bookingForm.querySelectorAll("[data-required]");
            for (var index = 0; index < requiredFields_2.length; index++) {
                requiredFields_2[index].setAttribute("required", "");
                requiredFields_2[index].required = true;
            }
        }
        var questionPanel = document.querySelector('.eduadmin .questionPanel');
        var requiredFields = questionPanel.querySelectorAll("[data-required]");
        for (var index = 0; index < requiredFields.length; index++) {
            requiredFields[index].setAttribute("required", "");
            requiredFields[index].required = true;
        }
        this.CheckPrice(false);
    },
    RemoveParticipant: function (obj) {
        var participantHolder = document.getElementById("edu-participantHolder");
        participantHolder.removeChild(obj.parentNode.parentNode);
        this.CheckPrice(false);
    },
    SelectEvent: function (obj) {
        var eventid = obj.value;
        if (eventid !== "-1") {
            location.href = "?eid=" + eventid;
        }
    },
    CheckParticipantCount: function () {
        var participants = eduBookingView.SingleParticipant
            ? 1
            : document.querySelectorAll(".eduadmin .participantItem:not(.template):not(.contactPerson)").length - 1;
        return !(participants >= eduBookingView.MaxParticipants &&
            eduBookingView.MaxParticipants >= 0);
    },
    CheckNumberOfParticipants: function () {
        return eduBookingView.SingleParticipant
            ? 1
            : document.querySelectorAll(".eduadmin .participantItem:not(.template):not(.contactPerson)").length;
    },
    UpdatePrice: function () {
        this.CheckPrice(true);
    },
    UpdateInvoiceCustomer: function (checkboxElem) {
        var invoiceView = document.getElementById("invoiceView");
        if (invoiceView) {
            jQuery(invoiceView).slideToggle();
            if (checkboxElem.checked) {
                var customerName = document.querySelector("input[name='invoiceName']");
                customerName.focus();
            }
        }
    },
    ContactAsParticipant: function () {
        var contactParticipant = document.getElementById("contactIsAlsoParticipant");
        var contact = 0;
        if (contactParticipant) {
            if (contactParticipant.checked) {
                contact = 1;
            }
            else {
                contact = 0;
            }
        }
        var contactParticipantItem = document.getElementById("contactPersonParticipant");
        if (contactParticipantItem) {
            contactParticipantItem.style.display =
                contact === 1 ? "block" : "none";
            var cFirstName = document.getElementById("edu-contactFirstName").value;
            var cLastName = document.getElementById("edu-contactLastName").value;
            var cEmail = document.getElementById("edu-contactEmail").value;
            var cPhone = document.getElementById("edu-contactPhone").value;
            var cMobile = document.getElementById("edu-contactMobile").value;
            document.querySelector(".contactFirstName").value = cFirstName;
            document.querySelector(".contactLastName").value = cLastName;
            document.querySelector(".contactEmail").value = cEmail;
            document.querySelector(".contactPhone").value = cPhone;
            document.querySelector(".contactMobile").value = cMobile;
            var tCivReg = document.querySelector(".contactCivReg");
            if (tCivReg) {
                document.getElementById("edu-contactCivReg").required = false;
                if (this.ForceContactCivicRegNo && contact == 1) {
                    tCivReg.required = true;
                    document.getElementById("edu-contactCivReg").required = true;
                }
                tCivReg.value = document.getElementById("edu-contactCivReg").value;
            }
            var requiredFields = contactParticipantItem.querySelectorAll('[data-required]');
            requiredFields.forEach(function (el) {
                var element = el;
                element.required = contact == 1;
            });
            if (contact == 1 && !this.AddedContactPerson) {
                var freeParticipant = document.querySelector(".eduadmin .participantItem:not(.template):not(.contactPerson)");
                if (freeParticipant) {
                    var freeFirstName = freeParticipant.querySelector(".participantFirstName");
                    if (freeFirstName) {
                        if (freeFirstName.value === "") {
                            var removeButton = freeParticipant.querySelector(".removeParticipant");
                            var participantHolder = document.getElementById("edu-participantHolder");
                            participantHolder.removeChild(removeButton.parentNode.parentNode);
                        }
                    }
                }
                this.AddedContactPerson = true;
            }
        }
        this.CheckPrice(false);
    },
    AddedContactPerson: false,
    ValidateDiscountCode: function () {
        edu.apiclient.CheckCouponCode(jQuery("#edu-discountCode").val(), jQuery(".validateDiscount").data("eventid"), function (data) {
            if (data) {
                eduBookingView.UpdatePrice();
            }
            else {
                // Invalid code
                var codeWarning = document.getElementById("edu-warning-discount");
                if (codeWarning) {
                    codeWarning.style.display = "block";
                    setTimeout(function () {
                        var codeWarning = document.getElementById("edu-warning-discount");
                        codeWarning.style.display = "";
                    }, 5000);
                }
            }
        });
    },
    ValidateProgrammeDiscountCode: function () {
        edu.apiclient.CheckProgrammeCouponCode(jQuery("#edu-discountCode").val(), jQuery(".validateDiscount").data("programmestartid"), function (data) {
            if (data) {
                eduBookingView.UpdatePrice();
            }
            else {
                // Invalid code
                var codeWarning = document.getElementById("edu-warning-discount");
                if (codeWarning) {
                    codeWarning.style.display = "block";
                    setTimeout(function () {
                        var codeWarning = document.getElementById("edu-warning-discount");
                        codeWarning.style.display = "";
                    }, 5000);
                }
            }
        });
    },
    CheckValidation: function (ignoreTerms, ignoreCaptcha) {
        if (!ignoreCaptcha) {
            if (wp_edu.RecaptchaEnabled === 'true' && window.grecaptcha && window.grecaptcha.getResponse) {
                var captchaResponse = window.grecaptcha.getResponse();
                if (captchaResponse == '') {
                    var noCaptcha = document.getElementById("edu-warning-recaptcha");
                    if (noCaptcha) {
                        noCaptcha.style.display = "block";
                        setTimeout(function () {
                            var noCaptcha = document.getElementById("edu-warning-recaptcha");
                            noCaptcha.style.display = "";
                        }, 5000);
                    }
                    return false;
                }
            }
        }
        var terms = document.getElementById("confirmTerms");
        if (terms) {
            if (!ignoreTerms && !terms.checked) {
                var termWarning = document.getElementById("edu-warning-terms");
                if (termWarning) {
                    termWarning.style.display = "block";
                    setTimeout(function () {
                        var termWarning = document.getElementById("edu-warning-terms");
                        termWarning.style.display = "";
                    }, 5000);
                }
                return false;
            }
        }
        var participants = document.querySelectorAll(".eduadmin .participantItem:not(.template):not(.contactPerson)");
        var requiredFieldsToCreateParticipants = [
            "participantFirstName[]",
            "participantCivReg[]"
        ];
        if (JSON.parse(window.wp_edu.ShouldValidateCivRegNo) && !eduBookingView.ValidateCivicRegNo()) {
            return false;
        }
        var contactParticipant = document.getElementById("contactIsAlsoParticipant");
        var contact = 0;
        if (contactParticipant) {
            contact = contactParticipant.checked ? 1 : 0;
        }
        if (eduBookingView.SingleParticipant) {
            contact = 1;
        }
        if (participants.length + contact === 0) {
            var noPartWarning = document.getElementById("edu-warning-no-participants");
            if (noPartWarning) {
                noPartWarning.style.display = "block";
                setTimeout(function () {
                    var noPartWarning = document.getElementById("edu-warning-no-participants");
                    noPartWarning.style.display = "";
                }, 5000);
            }
            return false;
        }
        for (var i = 0; i < participants.length; i++) {
            var participant = participants[i];
            var fields = participant.querySelectorAll("input");
            for (var f = 0; f < fields.length; f++) {
                if (requiredFieldsToCreateParticipants.indexOf(fields[f].name) >= 0) {
                    if (fields[f].value.replace(/ /i, "") === "") {
                        /* Show missing participant-name warning */
                        if (fields[f].name === "participantFirstName[]") {
                            var partWarning = document.getElementById("edu-warning-missing-participants");
                            if (partWarning) {
                                partWarning.style.display = "block";
                                setTimeout(function () {
                                    var partWarning = document.getElementById("edu-warning-missing-participants");
                                    partWarning.style.display = "";
                                }, 5000);
                            }
                        }
                        else if (fields[f].name === "participantCivReg[]") {
                            var civicWarning = document.getElementById("edu-warning-missing-civicregno");
                            if (civicWarning) {
                                civicWarning.style.display = "block";
                                setTimeout(function () {
                                    var civicWarning = document.getElementById("edu-warning-missing-civicregno");
                                    civicWarning.style.display = "";
                                }, 5000);
                            }
                        }
                        return false;
                    }
                }
            }
            var replaceFields = participant.querySelectorAll("[data-replace]");
            for (var index = 0; index < replaceFields.length; index++) {
                var replaceItems = replaceFields[index].attributes["data-replace"].value.split(",");
                for (var x = 0; x < replaceItems.length; x++) {
                    var replaceItem = replaceItems[x].split("|");
                    var replaceTemplate = replaceFields[index]
                        .attributes["data-" + replaceItem[0] + "-template"]
                        .value;
                    replaceFields[index][replaceItem[0]] = replaceTemplate.replace("{{" + replaceItem[1] + "}}", i + 1);
                }
            }
        }
        return true;
    },
    CheckPrice: function (validate) {
        if (eduBookingView.PriceCheckThrottle) {
            clearTimeout(eduBookingView.PriceCheckThrottle);
        }
        if (eduBookingView.ProgrammeBooking) {
            eduBookingView.PriceCheckThrottle = setTimeout(function () {
                var validation = true;
                if (validate) {
                    validation = eduBookingView.CheckValidation(true, true);
                }
                if (validation) {
                    var form = jQuery("#edu-booking-form").serialize();
                    form = form.replace("act=bookProgramme", "act=checkProgrammePrice");
                    jQuery.ajax({
                        type: "POST",
                        url: "",
                        data: form,
                        success: function (data) {
                            eduBookingView.SetPriceField(data);
                        }
                    });
                }
            }, 100);
        }
        else {
            eduBookingView.PriceCheckThrottle = setTimeout(function () {
                var validation = true;
                if (validate) {
                    validation = eduBookingView.CheckValidation(true, true);
                }
                if (validation) {
                    var form = jQuery("#edu-booking-form").serialize();
                    form = form.replace("act=bookCourse", "act=checkPrice");
                    jQuery.ajax({
                        type: "POST",
                        url: "",
                        data: form,
                        success: function (data) {
                            eduBookingView.SetPriceField(data);
                        }
                    });
                }
            }, 100);
        }
    },
    PriceCheckThrottle: null,
    ValidateCivicRegNo: function () {
        function __isValid(civRegField) {
            var civReg = civRegField.value;
            if (!civReg || civReg.length === 0) {
                return false;
            }
            if (!civReg.match(/^(\d{2,4})-?(\d{2})-?(\d{2})-?(\d{4})$/i)) {
                return false;
            }
            var date = new Date();
            var year = RegExp.$1, month = RegExp.$2, day = RegExp.$3, unique = RegExp.$4;
            if (year.toString().length <= 2) {
                year =
                    date
                        .getFullYear()
                        .toString()
                        .substring(0, 2) +
                        "" +
                        year;
                while (parseInt(year) > date.getFullYear()) {
                    year = (parseInt(year) - 100).toString();
                }
            }
            var checkDate = new Date(parseInt(year), parseInt(month) - 1, parseInt(day));
            if (Object.prototype.toString.call(checkDate) !== "[object Date]" ||
                isNaN(checkDate.getTime())) {
                return false;
            }
            if (month.toString().length === 1) {
                month = "0" + month;
            }
            if (day.toString().length === 1) {
                day = "0" + day;
            }
            var formattedCivReg = year + "" + month + "" + day + "-" + unique;
            civRegField.value = formattedCivReg;
            var cleanCivReg = formattedCivReg.replace(/-/gi, "").substr(2), parity = cleanCivReg.length % 2, sum = 0;
            for (var i = 0; i < cleanCivReg.length; i++) {
                var d = parseInt(cleanCivReg.charAt(i), 10);
                if (i % 2 === parity) {
                    d *= 2;
                }
                if (d > 9) {
                    d -= 9;
                }
                sum += d;
            }
            return sum % 10 === 0;
        }
        var civicRegNoFields = jQuery("div:not(.template) .eduadmin-civicRegNo[required]");
        for (var i = 0; i < civicRegNoFields.length; i++) {
            var field = civicRegNoFields[i];
            var p = jQuery(field)
                .parent()
                .parent()
                .parent();
            if (p.hasClass("template"))
                continue;
            if (!__isValid(field)) {
                field.focus();
                return false;
            }
        }
        return true;
    },
    SetPriceField: function (data) {
        var priceCheckError = jQuery('#edu-warning-pricecheck');
        priceCheckError.hide();
        var d = JSON.parse(data);
        var showVatText = JSON.parse(window.wp_edu.ShowVatTexts);
        if (d.hasOwnProperty("TotalPriceExVat")) {
            if (d["TotalPriceExVat"] === 0 &&
                d["TotalPriceIncVat"] === 0) {
                jQuery("#sumValue").text(numberWithSeparator(d["TotalPriceExVat"], " ") +
                    " " +
                    window.wp_edu.Currency);
            }
            else {
                if (d["TotalPriceExVat"] ===
                    d["TotalPriceIncVat"]) {
                    jQuery("#sumValue").text(numberWithSeparator(d["TotalPriceExVat"], " ") +
                        " " +
                        window.wp_edu.Currency +
                        (showVatText ? " " +
                            edu_i18n_strings.VAT.free : ''));
                }
                else {
                    jQuery("#sumValue").text(numberWithSeparator(d["TotalPriceExVat"], " ") +
                        " " +
                        window.wp_edu.Currency +
                        " " +
                        edu_i18n_strings.VAT.ex +
                        " (" +
                        numberWithSeparator(d["TotalPriceIncVat"], " ") +
                        " " +
                        window.wp_edu.Currency +
                        " " +
                        edu_i18n_strings.VAT.inc +
                        ")");
                }
            }
        }
        if (d.hasOwnProperty("Message")) {
            var errorHeader = document.createElement('h3');
            errorHeader.innerText = d["Message"];
            priceCheckError.empty();
            priceCheckError.append(errorHeader);
            var listOfErrors = document.createElement('ul');
            for (var _i = 0, _a = d["ErrorMessages"]; _i < _a.length; _i++) {
                var error = _a[_i];
                var _errorItem = document.createElement('li');
                _errorItem.innerText = error;
                listOfErrors.appendChild(_errorItem);
            }
            priceCheckError.append(listOfErrors);
            priceCheckError.show();
        }
        var getUserFriendlyErrorMessage = function getUserFriendlyErrorMessage(statusCode, originalMessage) {
            if (edu_i18n_strings.ErrorMessages[statusCode.toString()])
                return edu_i18n_strings.ErrorMessages[statusCode.toString()];
            return originalMessage;
        };
        if (d.hasOwnProperty("Errors")) {
            var errorHeader = document.createElement('h3');
            errorHeader.innerText = edu_i18n_strings.Generic.ValidationError;
            priceCheckError.empty();
            priceCheckError.append(errorHeader);
            var listOfErrors = document.createElement('ul');
            for (var _b = 0, _c = d["Errors"]; _b < _c.length; _b++) {
                var error = _c[_b];
                var _errorItem = document.createElement('li');
                _errorItem.innerText = getUserFriendlyErrorMessage(error["ErrorCode"], error["ErrorText"]);
                listOfErrors.appendChild(_errorItem);
            }
            priceCheckError.append(listOfErrors);
            priceCheckError.show();
        }
        var getUserFriendlyErrorMessageValidation = function getUserFriendlyErrorMessageValidation(errorKey, errorMessages) {
            if (edu_i18n_strings.ValidationErrors[errorKey]) {
                return "".concat(edu_i18n_strings.ValidationErrors[errorKey], ": ").concat(errorMessages.join(", "));
            }
            return "".concat(errorKey, ": ").concat(errorMessages.join(", "));
        };
        if (d.hasOwnProperty("errors")) {
            if (d.hasOwnProperty("title")) {
                var errorHeader = document.createElement('h3');
                errorHeader.innerText = edu_i18n_strings.Generic.ValidationError;
                priceCheckError.empty();
                priceCheckError.append(errorHeader);
                var listOfErrors = document.createElement('ul');
                for (var errorKey in d["errors"]) {
                    var error = d["errors"][errorKey];
                    var _errorItem = document.createElement('li');
                    _errorItem.innerText = getUserFriendlyErrorMessageValidation(errorKey, error);
                    listOfErrors.appendChild(_errorItem);
                }
                priceCheckError.append(listOfErrors);
                priceCheckError.show();
            }
        }
    }
};
function edu_openDatePopup(obj) {
    jQuery(".edu-DayPopup.cloned").remove();
    var pos = jQuery(obj.parentElement).offset();
    var width = jQuery(obj).outerWidth();
    var pop = jQuery(obj.nextSibling)
        .clone()
        .appendTo("body");
    pop.addClass("cloned");
    pop.css({
        display: "block",
        opacity: 1,
        top: pos.top + "px",
        left: pos.left + width + 10 + "px"
    });
}
function edu_OpenEduBookingFormModal(url) {
    if (!url || url.length == 0) {
        alert(edu_i18n_strings.ErrorMessages.MissingSetupForBookingForm);
        return;
    }
    if (document.querySelectorAll('.edu-bookingform-modal').length == 0) {
        edu_createBookingFormModal();
    }
    var bookingFrame = document.querySelector('#eduadmin-booking-frame');
    if (bookingFrame) {
        bookingFrame.src = url;
    }
}
function edu_createBookingFormModal() {
    var modal = jQuery("<div class=\"edu-bookingform-modal-backdrop\"></div>\n<div class=\"edu-bookingform-modal\">\n    <div class=\"edu-bookingform-close\">\n        <a href=\"javascript://\" onclick=\"edu_closeBookingModal()\">X</a>\n    </div>\n    <iframe id=\"eduadmin-booking-frame\"></iframe>\n</div>");
    modal.appendTo('body');
}
function edu_closeBookingModal() {
    var modal = document.querySelector('.edu-bookingform-modal');
    var modalBackdrop = document.querySelector('.edu-bookingform-modal-backdrop');
    if (modal) {
        modal.remove();
        if (modalBackdrop) {
            modalBackdrop.remove();
        }
    }
}
function edu_closeDatePopup(e, obj) {
    var pop = jQuery(obj.parentElement);
    pop.remove();
    e.cancelBubble = true;
    e.preventDefault();
}
var eduDetailView = {
    ShowAllEvents: function (filter, me) {
        me.parentNode.parentNode.removeChild(me.parentNode);
        jQuery('.showMoreHidden[data-groupid="' + filter + '"]')
            .slideDown()
            .css("display", "flex");
    }
};
var eduGlobalMethods = {
    GoBack: function (fallBackUrl, event) {
        if (window.history.length > 1) {
            event.preventDefault();
            window.history.go(-1);
            return false;
        }
        location.href = fallBackUrl;
    },
    GetBookingExport: function (bookingId) {
        var exportData = [];
        function getRowData(row) {
            if (!!row && !!row.dataset.courseData) {
                return JSON.parse(row.dataset.courseData);
            }
            return null;
        }
        function getExcelRows(dataObject) {
            var rows = [];
            for (var _i = 0, _a = dataObject.Participants; _i < _a.length; _i++) {
                var participant = _a[_i];
                var row = {
                    CourseName: dataObject.Event.EventName,
                    BookingDate: dataObject.Created,
                    OnDemand: dataObject.Event.OnDemand,
                    StartDate: dataObject.Event.OnDemand ? null : dataObject.Event.StartDate,
                    EndDate: dataObject.Event.OnDemand ? null : dataObject.Event.EndDate,
                    ParticipantName: "".concat(participant.FirstName, " ").concat(participant.LastName).trim(),
                    ParticipantGrade: participant.GradeName,
                    ParticipantArrived: participant.Arrived
                };
                rows.push(row);
            }
            var unnamedParticipantCount = 0;
            dataObject.UnnamedParticipants.forEach(function (unnamedParticipant) {
                unnamedParticipantCount += unnamedParticipant.Quantity;
            });
            if (unnamedParticipantCount > 0) {
                var row = {
                    CourseName: dataObject.Event.EventName,
                    BookingDate: dataObject.Created,
                    OnDemand: dataObject.Event.OnDemand,
                    StartDate: dataObject.Event.OnDemand ? null : dataObject.Event.StartDate,
                    EndDate: dataObject.Event.OnDemand ? null : dataObject.Event.EndDate,
                    ParticipantName: edu_i18n_strings.Generic.UnnamedParticipant(unnamedParticipantCount),
                    ParticipantGrade: null,
                    ParticipantArrived: null
                };
                rows.push(row);
            }
            return rows;
        }
        if (bookingId === -1) {
            // Export all the things
            var bookingInfos = document.querySelectorAll("tr[data-bookingid]");
            bookingInfos.forEach(function (bookingInfo) {
                var bookingData = getRowData(bookingInfo);
                if (!!bookingData) {
                    exportData.push.apply(exportData, getExcelRows(bookingData));
                }
            });
        }
        else {
            // Export a single booking
            var bookingInfo = document.querySelector("tr[data-bookingid=\"".concat(bookingId, "\"]"));
            var bookingData = getRowData(bookingInfo);
            if (!!bookingData) {
                exportData.push.apply(exportData, getExcelRows(bookingData));
            }
        }
        function getCsvBase64Data(dataRows) {
            var exportCsv = '\uFEFF' +
                '"' + csvEscape(edu_i18n_strings.ExportTable.CourseName) + '";' +
                '"' + csvEscape(edu_i18n_strings.ExportTable.StartDate) + '";' +
                '"' + csvEscape(edu_i18n_strings.ExportTable.EndDate) + '";' +
                '"' + csvEscape(edu_i18n_strings.ExportTable.ParticipantName) + '";' +
                '"' + csvEscape(edu_i18n_strings.ExportTable.BookingDate) + '";' +
                '"' + csvEscape(edu_i18n_strings.ExportTable.Arrived) + '";' +
                '"' + csvEscape(edu_i18n_strings.ExportTable.Grade) + "\"\n";
            function csvEscape(data) {
                return '=""' + (data !== null && data !== void 0 ? data : "").replace(/"/g, '""""') + '""';
            }
            dataRows.forEach(function (row) {
                var _a, _b, _c, _d;
                exportCsv += '"' + csvEscape(row.CourseName) + '";' +
                    '"' + ((_a = row.StartDate) !== null && _a !== void 0 ? _a : (row.OnDemand ? csvEscape(edu_i18n_strings.ExportTable.OnDemand) : "")) + '";' +
                    '"' + ((_b = row.EndDate) !== null && _b !== void 0 ? _b : "") + '";' +
                    '"' + csvEscape(row.ParticipantName) + '";' +
                    '"' + row.BookingDate + '";' +
                    '"' + ((_c = row.ParticipantArrived) !== null && _c !== void 0 ? _c : "") + '";' +
                    '"' + ((_d = csvEscape(row.ParticipantGrade)) !== null && _d !== void 0 ? _d : "") + "\"\n";
            });
            return window.btoa(unescape(encodeURIComponent(exportCsv)));
        }
        var uri = 'data:text/csv;charset=utf-8;base64,';
        var downloadLink = document.createElement('a');
        downloadLink.download = 'BookingExport.csv';
        downloadLink.href = "".concat(uri).concat(getCsvBase64Data(exportData));
        downloadLink.click();
    }
};
function numberWithSeparator(x, sep) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, sep);
}
window.addEventListener('message', function (event) {
    if (!event.data.type) {
        return;
    }
});
var oldonload = window.onload;
window.onload = function (ev) {
    if (oldonload) {
        oldonload(ev);
    }
};
