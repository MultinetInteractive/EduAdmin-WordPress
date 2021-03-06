# Changelog

All notable changes to this project will be documented in this file. See [standard-version](https://github.com/conventional-changelog/standard-version) for commit guidelines.

## [2.37.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.36.1...v2.37.0) (2021-06-14)


### Features

* Ability to change who gets the booking confirmations after a completed booking ([d36075a](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d36075a4253fd495c2987fabc4891de4fed29596)), closes [#218](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/218)

### [2.36.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.36.0...v2.36.1) (2021-05-06)


### Bug Fixes

* Using percent instead of view-width/height. ([e4e58bb](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e4e58bbf5ce1189bca0b8885555858ab490ef797))

## [2.36.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.35.0...v2.36.0) (2021-04-21)


### Features

* Contain price names in elements for easier styling ([ab700c5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ab700c58c3e68c75c9c25edaf77dbdc42c6180c2)), closes [#264](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/264)


### Bug Fixes

* Remove an `a` that shouldn't have been in the price names. ([45f3ec7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/45f3ec758bb0b81d6b292f65e4b61771acc0c793))

## [2.35.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.34.1...v2.35.0) (2021-04-08)


### Features

* Use SortIndex on custom fields ([2d1c15c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2d1c15c56f3a05d97593d291141e5ccb8c0b232c))

### [2.34.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.34.0...v2.34.1) (2021-04-08)


### Bug Fixes

* Update tested to-variable ([7887b1a](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7887b1a547b3218f7fc2dc0ca8bd00502b64510b))

## [2.34.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.33.1...v2.34.0) (2021-04-08)


### Features

* Book-button now also opens modal with form for programmes ([208d335](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/208d33537ecdb54c3bf0cf6fab4a7addfef63baf))
* Programme booking should use booking form if possible ([3bd9938](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3bd993889d1ec660c7c10ebd1c63c036e014400f))

### [2.33.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.33.0...v2.33.1) (2021-04-07)


### Bug Fixes

* Fixed render info text-function (still not fully converted from old soap) ([4979469](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/49794693913ce6d7c15647f5272572771f279828))
* Remove [@headers](https://github.com/headers) as well ([7567aa5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7567aa53cd13a2aaaf40b32e1372acb2860a2bbe))

## [2.33.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.32.2...v2.33.0) (2021-03-30)


### Features

* Added methods to open/close booking form modals ([ccb9067](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ccb906759fdec21837e143a3e8fbe4f991dcf931))
* Added option to switch out the booking form to one from EduAdmin instead ([915dbbf](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/915dbbf8e07ba8c01b0d1bbcb7bbcf7a9f5cd97b))
* Added PaymentTerms, PriceNames to OData and Consent to REST ([c3f7c15](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c3f7c1551fce9c7aaf81fe0c1359bd15911989a4))
* Added styling for the modal popup + backdrop ([c7e0764](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c7e0764af790423d853ad502696a66352feec326))
* Added support for booking form in API calls, so we can get the URL. ([0b70304](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0b703044558d6378688d9f697fcd1c5d2cc8d99c))
* Added support for event lists (listTemplate) to use the new booking form modal ([2645778](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/264577820ff3860f6f70c48b7b958f3a6e3594b8))
* Added support for the detail view to use the new booking form modal ([fae9d24](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/fae9d2460f7005b71d433ff6f133d1c15f4588c1))
* If the company using the plugin tries to use booking forms without configuring them, show an error in the places that would show the form (Modal variant) ([81fe12a](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/81fe12a2e40902b0e4ed40b2c03e79354940e31d))
* Instead of redirecting the users if they are explicitly linked to the booking form page, we'll shove an iframe in there. ([8d0a4e7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8d0a4e725f5b38b4098d07dd9e4499c4964056b4))
* Making it so that when you activate the plugin, and don't have a booking page selected, we'll set the booking form option to true. ([5b3fe54](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5b3fe54e8d36daaf2599f82571288f7f67176a1d))
* Warn users that booking form needs to be configured in EduAdmin ([9b41947](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9b41947fd7f18c43168c9a3b82eaac75d1bc16e1))

### [2.32.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.32.1...v2.32.2) (2021-02-17)

### [2.32.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.32.0...v2.32.1) (2021-02-17)


### Bug Fixes

* Added extra check for Events in the booking form, so we can detect if there are any available events or not. fixes [#377](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/377) ([ac5df01](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ac5df01b2da5c64d302bbde6af7a9928cdf96b4f))

## [2.32.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.31.0...v2.32.0) (2021-02-09)


### Features

* The return of the Info text-field. fixes [#375](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/375) ([3d4644d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3d4644df31d2013b7ccaa1bc9a943768988160cd))

## [2.31.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.30.1...v2.31.0) (2021-02-08)


### Features

* Added separation of expired/used up limited discount cards. fixes [#373](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/373) ([6aca7d0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6aca7d090a0c07ee6bf6d3972013dc7e9f1c2370))

### [2.30.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.30.0...v2.30.1) (2021-01-15)


### Bug Fixes

* Removed the strange occurrence of a closing div-tag. fixes [#371](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/371) ([b187e1c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b187e1c4dea873d15d0a2eecfbf4512e9fff7df3))

## [2.30.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.29.1...v2.30.0) (2020-12-10)


### Features

* Added some protection against booking events that have already past their start date ([03a5423](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/03a542306926c767d056d7e2001a2d821e51e3a1)), closes [#357](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/357)

### [2.29.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.29.0...v2.29.1) (2020-12-10)


### Bug Fixes

* And same fix for Programme bookings (not being able to create WP-users) ([1b017a7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1b017a780752dc00b7025e65456c16bcb8074713))

## [2.29.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.4...v2.29.0) (2020-12-10)


### Features

* Added another category for date settings ([2d61b08](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2d61b08b01ffeff69d00250dd630bd5840569cd2))
* Added get_option to main class with our request cache, to speed up fetching same option multiple times per execution/page request ([08721f9](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/08721f99f1d0d4d85220bb476935e7330ef74cbc))
* Added way to restore settings to default values for dates ([bd1b062](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bd1b06221fffff13b2d92c851230b45901059de1))
* Adding new Date Settings-page ([f6b3296](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f6b329654faaf9ebd687cb2c9e617da15f0416ed))
* Date formatting in list view (events), template A ([dc52908](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/dc52908aa2f5778b869e9c438819f3c82474f5be))
* Date settings applied for list view (event) ([309398e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/309398eeeab6c949fa6775954954c3085b44b4c0))
* Fixed template B event list. ([783082d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/783082dc52a7c0bc8339ab06ed927de3a1b0a516))
* Remade some options in the date settings page, added method to output event dates that listens to the options ([79482c2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/79482c27335ebd9a086a1ab2a245d62400dffa8a)), closes [#254](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/254) [#356](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/356) [#354](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/354)


### Bug Fixes

* Fixed a bug where the ParticipantVat went missing after an ajax reload in event lists (listview, not detail) ([34d7976](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/34d79768a70eaf8c2ab325c6249a41518fbb65a6))
* Move robot-check into the other checks first, to not block creation of users in WP ([3dbd5e7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3dbd5e75d2a7850a8812b48ffed5ba5e54da5ec0))

### [2.28.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.3...v2.28.4) (2020-12-02)


### Bug Fixes

* Added permission_callback to register_rest_route (Thanks wordpress, I hate you) ([50859d2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/50859d21c7a55b2e49683fbe065328d031eb626d))

### [2.28.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.2...v2.28.3) (2020-11-30)


### Bug Fixes

* Hide the captcha-fields on all devices. ([1def084](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1def0842f4bd0d77c6b61d420f5ba243eef73315))

### [2.28.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.1...v2.28.2) (2020-11-27)


### Bug Fixes

* Added extra check for reCAPTCHA in javascript, since sites can load multiple recaptchas. ([3dd86df](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3dd86dfed1cb22124a77d02c88a4cd0af1f8a999))
* Fixed question handling for radio buttons ([4b61b73](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4b61b73264bb813fd66eb9213c768aaf9e93e634))

### [2.28.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.28.0...v2.28.1) (2020-11-26)


### Bug Fixes

* Removing double output of start/end time if there's an event with a single day ([d91d2e8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d91d2e84783525193c24043c15f791327894c52c))

## [2.28.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.27.0...v2.28.0) (2020-11-23)


### Features

* Added method for MultiNet to fetch diagnostics info ([94e20f1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/94e20f12f1097e5acc15cef61df25f922bff568b))

## [2.27.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.26.2...v2.27.0) (2020-11-19)


### Features

* Added basic support for reCAPTCHA v2 Checkbox. (Only booking form, not interest registration) ref [#157](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/157) ([b357789](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b3577894ba092b5cfad23883ddca58f6b50bfefc))
* Added more honeypots to booking form ([6efadc1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6efadc1c569ff4c01041392a02556ac9fb8f7d62)), closes [#157](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/157)

### [2.26.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.26.1...v2.26.2) (2020-10-26)


### Bug Fixes

* Fixing date output in detail template ([25f64ab](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/25f64abdeddce2e8490ec8774c6f19f281112950))
* Hiding warnings from inability of setting headers ([6557b10](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6557b10f7079cb4ae1ef6a78ed09381f06d1d2a4))

### [2.26.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.26.0...v2.26.1) (2020-09-17)


### Bug Fixes

* Additional fix for old version of PHP cookies. ([118870e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/118870e4d3d06a617366fde19eaa48b83ec1d698))
* Sorting programme events by ProgrammeCourseSortIndex ([b2f7bd4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b2f7bd465f84a857813331d4705ef5e7bea4cdde))


## [2.26.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.25.0...v2.26.0) (2020-09-17)


### Features

* Added support to make the search form react on query parameters as well, and not only posted variables. ([45b3fb2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/45b3fb25d8f2003b942e43e0e8c0b26c956ec337))


### Bug Fixes

* Removed unused $_COOKIE, since everything works through EDU()->session now ([4a31776](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4a31776992adb8b9e36875ca138b15f7dc664d13))
* Rewrote session/cookie lib to work with samesite and other things.. ([47c5fda](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/47c5fda02b9cf20698816a9059e4e884cb25232e))

## [2.25.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.4...v2.25.0) (2020-08-27)


### Features

* Added ability to post coupon codes on programme bookings as well. ([3852568](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3852568443961b1b079bac1e06231c474a59b515)), closes [#349](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/349)


### Bug Fixes

* Fixes missing CSS for required participant fields ([5867ba5](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5867ba500ecc76f99ee0859249529233cfad9fe5)), closes [#350](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/350)

### [2.24.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.3...v2.24.4) (2020-08-24)


### Bug Fixes

* Fixes required-fields-bug that was introduced when we started adding the `data-required` attribute since hidden required-fields was bad practice ([c39bce1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c39bce161cbb8caef3621f7973631edd2e3ccfd5))

### [2.24.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.2...v2.24.3) (2020-08-24)


### Bug Fixes

* If you use SingleParticipant, required fields/questions should now work properly again. ([03d2c37](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/03d2c37529e1ccf38092850cca75236a4d54f84a)), closes [#346](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/346)

### [2.24.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.1...v2.24.2) (2020-08-21)


### Bug Fixes

* Force sort on ProgrammeCourseSortIndex to keep the configured sort index in EduAdmin. ([21f1298](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/21f12987d821b5a7b83316e0d06e7eafdc13fe32)), closes [#344](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/344)
* Send confirmation email options on programme bookings as well. ([41ba93b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/41ba93be71a67e8ce46feb1682c5c715b416054c)), closes [#343](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/343)

### [2.24.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.24.0...v2.24.1) (2020-08-21)


### Bug Fixes

* If the MaxNumberParticipants on a programme is 0, we should let people book. ([37ccfba](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/37ccfbafbb4834e5e6084569677d2872d4912bf8)), closes [#339](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/339)
* ParticipantVat is not available on sessions/sub events ([acbfc94](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/acbfc942670f9798b71fdac120ed1d5834d326fe))

## [2.24.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.23.0...v2.24.0) (2020-08-20)


### Features

* Changing how we output prices in accordance to the new setting ([0d56f66](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0d56f66408c823a392dcdc766d1b7067c62cfc6b)), closes [#327](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/327)


### Bug Fixes

* We should allow the use of AddParticipant if it's a programme. ([7a14206](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7a1420616670c35d3e28c525f29787304e629bc6)), closes [#338](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/338)

## [2.23.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.22.1...v2.23.0) (2020-08-17)


### Features

* Use same method of showing dates for programmes as with course days.master ([9cc1948](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9cc19483695854fd35f72397f7ea968d9c2e7ef2)), closes [#319](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/319)

### [2.22.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.22.0...v2.22.1) (2020-08-17)


### Bug Fixes

* **detail:** Don't use the timezone-reformatting code on the course information time-variables, they don't know what timezone they belong to.master ([0ec92e9](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0ec92e9a128eaa73f6b65a9475145c31e7061ad0)), closes [#335](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/335)

## [2.22.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.21.0...v2.22.0) (2020-08-17)


### Features

* Adds attribute to make the listviews able to show sub-categories by specifying categorydeep. fixes [#303](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/303) ([5f19a6e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5f19a6ee0f7f48cd4442760c145a24a6abbd3e62))


### Bug Fixes

* Disabling all autocomplete ([9080625](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/90806255128748c612c149043002ce51f2ed19de)), closes [#317](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/317)

## [2.21.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.20.0...v2.21.0) (2020-08-10)


### Features

* Added CSS-classes to interest registration pages. ([9916936](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9916936624d542562e2b431b5c6a9038e1786027)), closes [#329](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/329)
* Removed requirement for number of participants on interest registrations. ([3de2847](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3de28470bf3374305094620453b4550ac64e1383)), closes [#328](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/328)

## [2.20.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.7...v2.20.0) (2020-08-06)


### Features

* Added Programme-image to detail view. ([b3cc17c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b3cc17cd0b4aca2ecef508bc3b4a58f4241bad1e)), closes [#330](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/330)

### [2.19.7](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.6...v2.19.7) (2020-07-15)


### Bug Fixes

* Found an instance where we shouldn't add the timezone to the dates, because.. it's impossible. ([29c75df](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/29c75dfe9c45e97ad0356ff3b85ccc3e14740674))

### [2.19.6](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.5...v2.19.6) (2020-07-15)


### Bug Fixes

* Rolling with our own date methods, since the built in didn't do what I expected ([e57e2dc](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e57e2dc5c046edb8127d758078465dc1c215330b))

### [2.19.5](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.4...v2.19.5) (2020-07-14)


### Bug Fixes

* **dates:** Using another method from WP to present dates instead.. ([560df4b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/560df4b25255b56e1d497274ae2960fabfabe6f8))

### [2.19.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.3...v2.19.4) (2020-07-07)


### Bug Fixes

* Use `date_i18n` instead of `date` to get the correct timezone as well! ([7f2083f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7f2083f630048b0eabf78c7af51bab9f4b8e5044))

### [2.19.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.2...v2.19.3) (2020-07-02)


### Bug Fixes

* Fixed so that the booking form cares about MaxParticipantNumber being set to zero (unlimited) ([25017be](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/25017be90314e517d6bba2bb15f71fd70a1739e4))
* Removed the use of setting timezone. ([fa63461](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/fa63461318f564d821afaf4797cb79fe53cced0e))

### [2.19.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.1...v2.19.2) (2020-05-15)


### Bug Fixes

* Correct date format. ([28ab52f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/28ab52f6436e9a16a85f276866fd2c201f6f2030))

### [2.19.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.19.0...v2.19.1) (2020-05-14)


### Bug Fixes

* Changed output for certificate dates into a separate function, to handle missing start and end dates. ([cba1e2b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/cba1e2b539b4f2e18a40809485e7c562903c5fb2))

## [2.19.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.18.1...v2.19.0) (2020-05-13)


### Features

* Added missing method to delete programme bookings ([94f21d2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/94f21d28a1cf22b11c3eb921072556356aba437d))


### Bug Fixes

* Don't show tabs for certificates or discount cards, if the end customer doesn't have one. ([9d67661](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9d67661f842f6868c1a7bd5a8193f0240bdd41af))
* Show certificate dates in YYYY-MM-DD instead. And only show ValidFrom if it's available. ([6f83515](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6f835157a59d647c8ca13575d1bbf4f5ad3f1edb))

### [2.18.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.18.0...v2.18.1) (2020-04-22)


### Bug Fixes

* Changing how we verify the nonce while paying. ([ce6027e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ce6027e287314a8cbb26c87f23e6d34fe904a9dc))

## [2.18.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.17.1...v2.18.0) (2020-04-14)


### Features

* Added canonical URL for programme as well ([9be5bff](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9be5bff2d25dfd67625a2c8a13b0396b4d9ef45d))
* Setting canonical URLs for detail/booking ([cbfec72](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/cbfec7218d5e3d53482f80365ac397eb0104d979))

### [2.17.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.17.0...v2.17.1) (2020-04-06)


### Bug Fixes

* **css:** Changed from `flex: 1` to `flex: auto`, because IE11 broke otherwise. ([76b681b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/76b681b))



## [2.17.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.16.2...v2.17.0) (2020-03-20)


### Features

* Ability to stop sending confirmation emails ([37f9ff6](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/37f9ff6))



### [2.16.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.16.1...v2.16.2) (2020-03-19)


### Bug Fixes

* Wrong translation method used for payment methods ([78216eb](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/78216eb))



### [2.16.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.16.0...v2.16.1) (2020-03-19)


### Bug Fixes

* **payment:** Properly check for PaymentMethodId ([8a526d1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8a526d1))



## [2.16.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.15.1...v2.16.0) (2020-03-04)


### Features

* Added Countries to API Client ([e91f109](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e91f109))
* **changelog:** Added changelog to the readme visible on WordPress with the latest 4 versions ([99890c6](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/99890c6))



### [2.15.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.15.0...v2.15.1) (2020-03-04)



## [2.15.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.14.1...v2.15.0) (2020-03-04)


### Features

* **ci:** Automatic update of checksum to lessen the amount of mishaps. ([d64a6d3](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d64a6d3))



### [2.14.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.14.0...v2.14.1) (2020-03-03)


### Bug Fixes

* Re-added history.go(-1), because some customers used that ([18d62e4](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/18d62e4))



## [2.14.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.13.1...v2.14.0) (2020-02-24)


### Bug Fixes

* Fixed a logic error in the price computation output. ([b7b6211](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b7b6211))


### Features

* Added data-attributes for courseid and eventid on detail and booking views, so they can be targeted by CSS (if needed). fixes [#297](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/297) ([bd541f7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bd541f7))



### [2.13.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.13.0...v2.13.1) (2020-02-06)


### Bug Fixes

* Fixes discount code validation ([0aa14ea](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0aa14ea))



## [2.13.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.12.0...v2.13.0) (2020-01-15)


### Features

* Added code so that we send the CountryCode to EduAdmin ([9096904](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9096904))
* Added country-selector for customer + invoice information (not sending it yet, as it is not supported in the API yet) ([1a98fe6](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1a98fe6))
* Added Country-selector to Single Person-booking ([2216f94](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/2216f94))
* Added CountryCode to ContactPerson-class ([bf40ba7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bf40ba7))
* If the logged in/new customer doesn't have any country code, we will fetch it from the EduAdmin account, and default to SE if it's missing. ([52afa7f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/52afa7f))



## [2.12.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.8...v2.12.0) (2019-12-17)


### Bug Fixes

* Fixes so that programme bookings get a correct price check even if you don't have any participants/contact person details. ([3734187](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3734187))
* Moved payment-methods to root-folder of content, because it's used by both programme and normal events. ([d7d1bfe](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d7d1bfe))
* we fall back to invoice through EduAdmin if there are no available plugins. fix for [#290](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/290) ([e545b4b](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e545b4b))


### Features

* 🎸 Add optional filter for `get_integrations` ([e1fd75d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e1fd75d))
* Added plugin type, and method to return a label for said type ([9bf1804](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9bf1804))
* Do not run payment-plugins if the totalsum is zero ([e2b4493](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e2b4493)), closes [#288](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/288)
* Only send bookings through payment plugins if they are PaymentMethodId 2 (Card payment). ([6917ff0](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6917ff0))
* Setting to enforce use of payment plugin. ([7fd4114](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7fd4114)), closes [#290](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/290)
* Showing plugin type label in list of installed plugins ([bb015a3](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bb015a3))
* The end user now has the possibility to select payment method (if there are multiple available) ([9aaab43](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9aaab43)), closes [#289](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/289)



### [2.11.8](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.7...v2.11.8) (2019-11-22)



### [2.11.7](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.6...v2.11.7) (2019-11-15)


### Bug Fixes

* 🐛 Adding custom CSS in wp_footer instead ([7e725bb](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7e725bb))



### [2.11.6](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.5...v2.11.6) (2019-11-08)


### Bug Fixes

* 🐛 Removing the javascript-version of back (FF-bug) ([f382807](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f382807))



### [2.11.5](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.4...v2.11.5) (2019-11-07)



### [2.11.4](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.3...v2.11.4) (2019-11-07)


### Bug Fixes

* 🐛 Line endings can be troublesome ([b8e1411](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b8e1411))



### [2.11.3](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.2...v2.11.3) (2019-11-07)


### Bug Fixes

* 🐛 Correct path for new submodule ([5d21b42](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5d21b42))
* 🐛 eventinquiry check = 1 ([44ebf33](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/44ebf33))
* 🐛 Sorting all files for int-check, added debug-thing ([12fd9a7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/12fd9a7))



### [2.11.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.1...v2.11.2) (2019-11-07)


### Bug Fixes

* 🐛 Don't output all checked files ([49bc1af](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/49bc1af))



### [2.11.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.11.0...v2.11.1) (2019-11-07)


### Bug Fixes

* 🐛 Removed folder from checksum-check, removed scripts ([1bc3ed1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/1bc3ed1))



## [2.11.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.10.1...v2.11.0) (2019-11-07)


### Bug Fixes

* 🐛 Fix for actions ([72ba312](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/72ba312))


### Features

* 🎸 Plugin integrity check ([d56608e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d56608e)), closes [#280](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/280)



### [2.10.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.10.0...v2.10.1) (2019-09-11)


### Bug Fixes

* 🐛 Correct path for new submodule ([e060f02](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e060f02))
* 🐛 eventinquiry check = 1 ([b8e1fcf](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b8e1fcf))



## [2.10.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.9.1...v2.10.0) (2019-08-29)


### Bug Fixes

* 🐛 If the version supports it, use set_script_translations ([a210b6f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a210b6f))
* 🐛 More aggressive transient deletion ([4612268](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/4612268))


### Features

* 🎸 GLN numbers can now be added to a booking. fixes [#276](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/276) ([e19810c](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/e19810c))
* 🎸 Updated EduAdmin API client ([a8b8edd](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a8b8edd))



### [2.9.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.9.0...v2.9.1) (2019-08-19)


### Bug Fixes

* 🐛 Fix for <5.0 WP that doesn't have set_script_translation ([5e79191](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5e79191))



## [2.9.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.8.0...v2.9.0) (2019-08-08)


### Features

* 🎸 News page with ability to warn if new versions is neede ([a196779](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a196779))



## [2.8.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.7.1...v2.8.0) (2019-08-07)


### Features

* 🎸 Added filtercity-attribute to listview. fixes [#80](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/80) ([bf64a10](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/bf64a10))



### [2.7.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.7.0...v2.7.1) (2019-08-06)


### Bug Fixes

* 🐛 Fix for is_checked if empty option value ([8260dcc](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8260dcc))
* 🐛 Remove debug-info ([f98f480](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f98f480))



## [2.7.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.6.2...v2.7.0) (2019-07-29)


### Features

* 🎸 Setting for showing all certs in a company fixes [#259](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/259) ([64b05be](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/64b05be))



### [2.6.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.6.1...v2.6.2) (2019-07-25)


### Bug Fixes

* 🐛 Multibyte-searches should work now. :( Fixes [#270](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/270) ([f05c0f1](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/f05c0f1))



### [2.6.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.6.0...v2.6.1) (2019-07-22)


### Bug Fixes

* 🐛 Fix for TypeScript type (timeout) ([22cc179](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/22cc179))
* 🐛 Required fields are required, fixes [#268](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/268) ([9604c35](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/9604c35))
* 🐛 Reset required-state if not participant ([d5a4f7d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d5a4f7d))



# [2.6.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.5.1...v2.6.0) (2019-06-28)


### Features

* 🎸 Show prices on programme starts (detail view) ([57c1c26](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/57c1c26))
* 🎸 Showing city (if available) on programme starts ([88f4d3d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/88f4d3d))



## [2.5.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.5.0...v2.5.1) (2019-06-28)


### Bug Fixes

* 🐛 Don't write the debug info in prod ([a809097](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a809097))



# [2.5.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.4.2...v2.5.0) (2019-06-28)


### Features

* 🎸 Category filtering on programme-list ([c722379](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/c722379))



## [2.4.2](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.4.1...v2.4.2) (2019-06-26)


### Bug Fixes

* 🐛 Show questions regardless of eventid in query ([3febc13](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3febc13))



## [2.4.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.4.0...v2.4.1) (2019-06-04)


### Bug Fixes

* 🐛 Only one event = add hidden field ([25c813d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/25c813d))



# [2.4.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.3.1...v2.4.0) (2019-05-31)


### Features

* 🎸 Back-buttons now use history.go(-1) or fallback url ([b3ce1f7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/b3ce1f7))
* 🎸 show/hideimages attribute on listview shortcode ([8480ff2](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/8480ff2))



## [2.3.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.3.0...v2.3.1) (2019-05-01)


### Bug Fixes

* 🐛 Check question if suffix is contact. Skip multiple ([7d98ed7](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/7d98ed7))



# [2.3.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.2.0...v2.3.0) (2019-04-26)


### Bug Fixes

* 🐛 Adding missing CSS class ([19a94f8](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/19a94f8))


### Features

* 🎸 Added data-attributes for dates ([a89753d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/a89753d))



# [2.2.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.1.0...v2.2.0) (2019-04-24)


### Features

* 🎸 Course list can now also be limited by numberofevents ([ffa3b27](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ffa3b27))



## [2.0.47](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.46...v2.0.47) (2019-04-09)



## [2.0.46](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.44...v2.0.46) (2019-04-04)



## [2.0.44](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.43...v2.0.44) (2019-03-14)



## [2.0.43](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.42...v2.0.43) (2019-03-13)



## [2.0.42](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.39...v2.0.42) (2019-03-11)



## [2.0.39](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.38...v2.0.39) (2019-02-21)



## [2.0.38](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.37...v2.0.38) (2019-02-19)



## [2.0.37](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.35...v2.0.37) (2019-02-14)



## [2.0.35](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.34...v2.0.35) (2019-02-12)



## [2.0.34](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.33...v2.0.34) (2019-02-08)



## [2.0.33](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.32...v2.0.33) (2019-01-28)



## [2.0.32](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.31...v2.0.32) (2018-12-05)



## [2.0.31](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.30...v2.0.31) (2018-11-30)



## [2.0.30](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.29...v2.0.30) (2018-11-19)



## [2.0.29](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.28...v2.0.29) (2018-11-19)



## [2.0.28](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.27...v2.0.28) (2018-10-30)



## [2.0.25](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.24...v2.0.25) (2018-10-11)



## [2.0.24](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.21...v2.0.24) (2018-10-10)



## [2.0.21](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.20...v2.0.21) (2018-09-17)



# [2.1.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.49...v2.1.0) (2019-04-23)


### Features

* 🎸 Added support for EDI Reference on bookings ([6e0bc2d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/6e0bc2d))



## [2.0.49](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.48...v2.0.49) (2019-04-12)



## [2.0.48](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.27...v2.0.48) (2019-04-12)


### Bug Fixes

* Don't add temporary participant if you use the contact as participant. Would double the price. :D ([841463f](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/841463f))
* Missing `"` in a class attribute. ([5c81608](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5c81608))



## [2.0.47](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v2.0.46...v2.0.47) (2019-04-09)

### Bug Fixes

- fix: Missing `"` on one class-attribute ([5c81608](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/5c81608))

### 2.0.46
- add: Added invoice organisation number to invoice-section

### 2.0.45
- fix: Don't add temporary participant if you use the contact as participant. Would double the price. :D

### 2.0.44
- add: Added lots of new classes to labels and elements, so that people can find stuff, and customize it.
- chg: Replaced h3 with divs in questions and attributes

### 2.0.43
- chg: When checking price, make sure we have a temporary participant if none are present.

### 2.0.42
- fix: When we load a customer from the session, we should also load the `CustomerGroupId`

### 2.0.41
- If you get to the `/book/` URL on a course template that doesn't have any events, we will now show a label saying `No events planned for this course yet.` 

### 2.0.40
- Don't set the customer group if it's already set.

### 2.0.39
- If the price is zero (no participants added, don't show any text)

### 2.0.38
- fix: Fixing problems with iOS not being able to select second text box within labels.

### 2.0.37
- fix: Logical error when to show invoice information

### 2.0.36
- fix: CSS-fixes, missing css.

### 2.0.35
- add: If it seems like inc/excl VAT is the same price, show as VAT free. [#222](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/222)
- add: Backend setting to allow customers to update their profile while booking (only existing customers) [#219](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/219)
- fix: Adding missing CSS to Programme Detail / Booking
- chg: Rewritten the rewrite rules to all work from the `EduAdminRouter` instead of `edu-rewrites.php`

### 2.0.34
- fix: Using `BuyerReference` when we fetch in profile.
- chg: Switched to SCSS and splitted files into multiple files instead

### 2.0.33
- chg: `BuyerReference` should be saved in `BuyerReference`, not `SellerReference`

### 2.0.32
- add: Allowing HTML (`<p></p>` and `<br />`) in list view

### 2.0.31
- add: Settings page with settings for "My page" / User profiles (Fixes: [#213](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/214))
- fix: Showing both incl. VAT and excl. VAT prices

### 2.0.30
- fix: And actually checking the required-attribute in the validation would help.

### 2.0.29
- fix: [#163](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/163) Civic registration number only required if the contact person is a participant

### 2.0.28
- fix: Interest registration on events, now actually know which event the user selected

### 2.0.27
- add: Better civregno-check for contact persons if the course requires it.

### 2.0.26
- add: Adding automatic pruning of transients that are expired. (Only from EduAdmin)

### 2.0.25
- add: Added query param to view plugin transients to debug caching problems.

### 2.0.24
- removed: Removed client side validation of civic registration numbers.

### 2.0.23
- add: Listview: Allow line breaks in HTML-code from course templates

### 2.0.22
- fix: Setting last admittance date and time to 23:59:59 (since some customers uses that full day)

### 2.0.21
- fix: Added missing `CourseDescriptionShort` in helper-method

### 2.0.20
- chg: Altered the info text you get when you request a password reset.
- chg: Made a new function to group dates, that works better.

### 2.0.19
- add: Added `get_transient` in `eduadmin.php` (`EDU()->get_transient($name, $action, $expiration, ..$args)`)

This method generates a unique transient-name based on the name and the arguments, so that we can cache the same method, multiple times (depending on filters)

- chg: Redoing most of the code fetching data from EduAdmin (Adding `$select`, to decrease the amount of data fetched)
- add: Added new class `EduAdminAPIHelper`, that I'm using to deduplicate code.
- per: Adding more performance fixes, that should solve some issues.
- fix: Fixed a problem with showing price names in the detail view.
- add: Added extra check for regions, so we don't loop over empty objects

### 2.0.18
-   fix: Proper sorting on event dates. (Using `sort` on an `array` was stupid)..

### 2.0.17
-   fix: Code styling and small fixes
-   add: Added a header for the region-filter on the detail view
-   fix: Apperantly the information from the course template and event was merged the wrong way, so some information didn't get through.
-   add: Added debug variables to "free spots"-placeholder

### 2.0.16
-   fix: Validation of answers were changed in the API, so doing change to reflect that

### 2.0.15
-   add: Adding region filtering to detail view
-   add: Adding filter to event and course list.
-   add: Adding styles for region-filter buttons
-   add: Adding timer in event-block-a to see if the rendering takes too long
-   add: Adding base data and template for region filtering
-   add: Adding options in admin to enable region filtering
-   add: Adding support for region filtering in API/Ajax methods
-   add: Adding region-support in API-controller
-   chg: If an event ID is present in the query string on a detail page, we won't show regions.
-   chg: Adding more transients to cache more data.
-   chg: Adding more checks to multiSort to get rid of notices/warnings
-   fix: Adding another filter to get rid of company specific events.
-   chg: Code style

### 2.0.14
-   fix: `courseattributeid`-attribute on `[eduadmin-detailinfo]` didn't work with a strict check

### 2.0.13
-   fix: Sorting on dates even while grouped on city

### 2.0.12
-   fix: We don't need users to accept terms to check prices.. That's just silly.

### 2.0.11
-   fix: Fixed the problems with events on the detail view not grouping by city.

### 2.0.10

-   fix Fixed the settingspage saving "on" instead of true as a settingValue for "eduadmin-useLogin". Coerce the value of eduadmin-useLogin to a bool before posting it to the API

### 2.0.9

-   fix: Added attribute to list of valid attributes, so that `eventprice` works in `[eduadmin-detailinfo]`

### 2.0.8

-   fix: Fixed sort order on event dates ([Issue #178](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/178))
-   fix: Adding extra parameter to links that could contain sensitive information ([Issue #170](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/170))
-   chg: My Bookings now only include non-cancelled events
-   chg: Changing the text for the "Use match"-dropdown, to something the you can understand.
-   chg: Suffix all transients with version of plugin ([Issue #164](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/164))

### 2.0.7

-   fix: Fixed the date format in the event schedule when the event is withing different months
-   fix: The events in the list-view are now sorted by `startDate` when the `Sort order` is set to `Sort index`
-   fix: Events in the event-list can now be sorted with event properties as well as course template properties

### 2.0.6

-   fix: `get_option` does only return booleans when they are empty (fixed on booking page)
-   fix: When checking price on a single-participant-booking, we should fill the participant name if it's empty
-   fix: Fix from clestial that fixes permalink reload when you change settings

### 2.0.5 ###
- fix: Fixed a bug with saving attribute values
- add: More errorhandling to booking handler

### 2.0.4 ###
- fix: Fixed so that strings from the EduAdmin-API also gets captured into `data`
- add: Show price on programme booking-page
- add: Support for programme bookings to be booked (with support for payment plugins)
- chg: Added CTA-class to book-button on detail view for programme starts
- chg: Updating EduAdmin PHP API Client
- chg: Adding escaping of output
- add: Making it easier to add profile-menu items
- add: Support for REST endpoint ProgrammeStart (Get questions)
- add: Support for price check on ProgrammeBooking
- chg: Codestyling to match other pages.
- fix: Checking for existence of the property data before we try to fetch data from it.
- fix: Better check if the person is logged in or not.

### 2.0.3 ###
- add: Ability to view schedule of a programme
- chg: Bugfix where confirmation emails weren't sent for multiple participant bookings
- chg: Bugfix for 2 column detail template
- add: Better error handling when booking a course (At least some handling..)

### 2.0.2 ###
- fix: Adding check for nonces in interest-registration pages
- fix: Checking count in password reset in a different way
- add: When you activate/deactivate the plugin, all transients are now cleaned
- add: Programme start list in detail view
- add: Save `customerId` and `personId` in hidden variables on booking page, so we won't lose logged in users if the session times out.
- add: If we cannot find anything related to `[eduadmin` in the pages, show all pages.

### 2.0.1 ###
- chg: Better check against `customtemplate`
- add: Backend-function to fix old search/sort/display values to the new ones
- fix: Stop setting cookies for while logging in (except the ones from WP_Session), should stop nginx from breaking.
- chg: Validating all fields when you post a booking
- chg: Removed `setcookie( 'eduadmin_loginUser' ...`, since it's not needed by the plugin.
- chg: Fixed line breaks in interest registration in a textarea
- add: Validate what fields are being sorted on (if it's even possible) in course and event lists

### 2.0 ###
- add: Adding page for certificates
- chg: Bumping major version, since we're using a brand new API
- chg: Removing default styles, it will now be emptied when you reset it. (To make sure that you don't have double CSS)
- chg: Making "Forgot password" into a "neutral-btn"
- chg: Making event separators a little bit bigger and bolder
- chg: `showmore` upgrade, available in `[eduadmin-detailinfo]` as attribute
- chg: Two column-template fixed to load templated event list.
- add: Adding nonces to actions/forms
- add: Customer, person and participant CustomFields on booking page
- add: Fixed event inquiries to use the new API
- add: Adding attribute `eventprice` to `[eduadmin-detailinfo]`
- add: Adding cache-break to the new API (OData endpoints)
- add: Adding listview-shortcode for Programmes `[eduadmin-programme-list]`
- add: Creating a new Router-class to handle rewrites and custom post types.
- chg: Changing how we check price (less validation until we actually try to post)
- chg: Added onchange-events to participant-fields (name/email) to update price
- chg: Simplified usage to `wp_kses_post` instead of `wp_kses` with params.
- add: Safeguard against missing courseid from either `query_var` or attributes.
- add: Added support for number, email and phone fields in integrations.
- chg: Fetch option for number of months in ajax-calls instead of hard coded 6 months
- add: Added options for Programme-pages
- chg: Added removal of `&#8221;` and `&#8243;` from courseid-attribute.

### 1.0.28
- If no events are available, load public pricenames from course template

### 1.0.27
- Adding more fields to output when a booking is completed

### 1.0.26
- Some more styles to some buttons
- Making it easier to edit some templates
- If there are no dates provided to the date-function, render an empty string instead of 01 January, 1970
- Adding support for `showmore` in `[eduadmin-detailinfo]` as attribute
- Bugfix: Don't load already loaded classes

### 1.0.25
- Bugfix: Missing styles

### 1.0.24
- Bugfix: Booking button gets disabled, and aborts the form post.. For some reason

### [1.0.23]
- Translations are wiped, so that 3rd-party plugins can translate the plugin better (and language packs for default phrases)
- Adding first version of EduAdmin PHP API Client
- Redoing how template blocks are rendered (now using a single template, instead of 3 separate to update)
- Removed lots of the changelog to a separate file found at https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/master/CHANGELOG.md

### [1.0.22]
- Disabling the book-button when the form is valid and the booking is under way
- Fixes some styles to use `px` instead of `rem`
- Adding `data-price` to the fields that were missing, that (for some reason) the price-calculation wanted

### [1.0.21]
- Lots of design fixes and changes, to make the plugin more mobile friendly
- Login widget bug fixed

### [1.0.20]
- More subject filters to fix.

### [1.0.19]
- More subject filters to fix.

### [1.0.18]
- Bugfix in subject-filter in the ajax method `edu_api_listview_eventlist`, it should check for name, not ID

### [1.0.17]
- Changing user agent in SoapClient to contain the version number of the plugin
- More mobile friendly default CSS (Users will need to reset their style settings, if they have modified anything
- Civic reg no-bugfix.

### [1.0.16]
- Adding missing form-field used by login-code
- Bugfix: Wrong function called in _ajaxFunctions when fetching logical date groups

### [1.0.15]
- Added so that we only display valid discount cards
- Fixing loginproblems. (Sending new passwords also triggered "Wrong password")

### [1.0.14]
- Bugfix: Search not checking if value was empty, which converted some values to `0`, which is bad.

### [1.0.13]
- Hide the course image, if there is no URL available.

### [1.0.12]
- JS-bugfix, the selector for the civic reg numbers should work on any field that has the correct class (and is not a template)

### [1.0.11]
- Bugfix with REST API, we don't need to pass the token now, so we can always get a valid token when needed.

### [1.0.10]
- Rewriting the AJAX-API a third time. This time we use the REST API.
- Increased performance overall by rethinking the localization-functions.
- Added more debugging timers to see if we can catch performance thieves.

### [1.0.9]
- Implementing current ajax-methods as WordPress-ajax-methods instead.
- Removed the whole backend-directory that contained the old AJAX-api.
- Added ability to hide `price,time` from the detail view. (Also fixed the bug that didn't hide the fields)

### [1.0.8]
- Code fixes to remove notices (if warnings are shown)
- Login field is now correctly typed if email is selected.
- Making it possible to hide fields on the default detail templates by using the attribute `hide`
  - Fields that can be hidden: `description,goal,target,prerequisites,after,quote`

### [1.0.7]
- Fixed text domain on three phrases I missed earlier.
- Fixing validation error for civic reg numbers.

### [1.0.6]
- Adding setting to force customers to be registered before being able to book

### [1.0.5]
- Defining `WP_SESSION_COOKIE` so that we won't get warnings/notices.
- Adding script to autodeploy to WordPress when we make new releases (Commits to production-branch)

### [1.0.4]
- Adding action `eduadmin-bookingform-loaded`, so that plugins can fire when the booking form is loaded.

### [1.0.3]
- Removing `.official.plugin` and `auto_update`, since we are running as a normal plugin now.

### [1.0.2]
- Removing internal language files
- Removing `README.md` and `CHANGELOG.md`, these live inside `readme.txt` (this file)
- Bugfix for questions and attributes with only one option (SOAP API gave us an object instead of an array)

### [1.0.1]
- Modified when languages should load (`plugins_loaded` instead of `init`)
- Changing text domain everywhere to `eduadmin-booking` (new WordPress-slug)
- Adding `autocomplete="new-password"` to password-field when you register a new account while booking

### [1.0.0]
#### WordPress-plugin compatibility/requirements
- Removing unnecessary paths (for functions that are never used)
- Fixing the correct way to include files (by path, not function..)
- Sanitizing everything I can think of/find.
- Modifying how pages are outputted.
- Implementing `WP_Session` to get rid of `$_SESSION`-usage
  - Finally found how to get rid of `$_SESSION` in the custom ajax-handlers.

#### Added
- Shortcode attributes on `[eduadmin-listview]`
  - `showsearch`: Overrides settings to show the search
  - `showcity`: Sets if you want to show/hide city from the list
  - `showbookbtn`: Sets if you want to show/hide the book button
  - `showreadmorebtn`: Sets if you want to show/hide the read more button
- Shortcode to show all public pricenames on Course `[eduadmin-coursepublicpricename]`
- Setting to hide invoice email
- Attribute to hide invoice email `[eduadmin-detailview hideinvoiceemailfield="1"]`

### [0.10.24]
#### Added
- Fixed validation-bug in javascript if you only had the contact person as a participant.

### [0.10.23]
#### Added
- Added pluralized text to the shortcode that shows course days `[eduadmin-detailinfo coursedays]`
  Now outputs `1 day` or `2 days`
- Reformatted the HTML for contact/participant names, so we can use 50% width. Works in *most* cases.

### [0.10.22]
#### Added
- Add sorting to pricenames in Eventlists
- Fixed faulty tooltips for `orderby` and `order`

### [0.10.21]
#### Added
- Check if number of free spots is equals or less than 0, instead of only 0.

### [0.10.20]
#### Added
- Added setting for List-views, to show week days (only event lists)

### [0.10.19]
#### Added
- Added support for attribute `courseid` in `[eduadmin-objectinterest]`-shortcode

### [0.10.18]
#### Added
- Added discount card-support, so end customers can use their discount cards when they book a course

### [0.10.17]
#### Added
- Added extra code to prevent bookings to go through when there are no free spots left

### [0.10.16]
#### Added
- Fixing code styles
- Fix sorting in `template_GF_listCourses`, again

### [0.10.15]
#### Added
- Bugfix: Logging in on non-existing contacts activated some kind of warning

### [0.10.14]
#### Added
- Fix in `template_GF_listCourses` to fix sorting

### [0.10.13]
#### Added
- Added new class `EduAdminBookingHandler`, to process bookings from the plugin
- Added span element around event time in booking form, so you can hide it.
- Moved booking handling to `EduAdminBookingHandler`.
- Added custom actions `eduadmin-checkpaymentplugins`, `eduadmin-processbooking` and `eduadmin-bookingcompleted`


### [0.10.12]
#### Added
- Bugfix: Fixed a bug where you were unable to select a single event.

### [0.10.11]
#### Added
- Fixing issues stated by scrutinizer
- Added class `EduAdminBookingInfo` that is passed to action `eduadmin-processbooking`
- Moved the redirect from when you've completed a booking to `createBooking.php`
- Added `NoRedirect`-property to `EduAdminBookingInfo` to skip the redirects after a booking is completed.
- Redid the `EduAdminClient` to conform to coding standards
- Added filter `edu-booking-error` so we can show dynamic errors in booking process.
- Fix: Show start/end-time on events with only one course day

### [0.10.10]
#### Added
- Fixing issues stated by scrutinizer
- Added `exit()` after `wp_redirect()`
- Bugfix: Correctly matching logout with `stristr`

### [0.10.9]
#### Added
- Bugfix: Sessions are now set before the class is loaded
- Changed how we handle redirects (Login/Logout)
- Plugin-support: We can now save plugin-settings
- Added .scrutinizer.yml
- Fixing issues stated by scrutinizer

### [0.10.8]
#### Added
- Trying to build everything as classes instead, just like WooCommerce
- Bugfix: While fetching prices, we should use the same date span as everything else.
- Started coding support for plugins

### [0.10.7]
#### Added
- Default translation is now in Swedish.

### [0.10.6]
#### Added
- Fixes mobile-layout on detail-page (Template-B)

### [0.10.5]
#### Added
- Added better version-check (support-wise)
- Bugfix: civic validation (Do not validate the invisible template)

### [0.10.4]
#### Added
- Added lots of `shield.io`-badges
- Added support to use [GitHub Updater](https://github.com/afragen/github-updater)
- Adding Travis-CI to begin experimenting with tests
- Adding check to `edu.api.authenticate.php` so we don't get warnings in travis
- Adding phpunit-tests to travis
- Added fix to session_start
- Redoing date limits for shown events. (Soon I'll have to make a setting for this)
- Updated readme.txt

### [0.10.3]
#### Added
- Adding span around time in eventlist, so it can be hidden with css `.eduadmin .eventTime` and `.edu-DayPopup .eventTime`

### [0.10.2]
#### Added
- Added option to block editing user fields of they are logged in

### [0.10.1]
#### Added
- Admin notices instead of just blurting the error text into the page.
- Pulled #64 and #63 from @ekandreas to fix composer compatibility and proper way to set access levels in menues.

### [0.10.0]
#### Added
- New date-handling, if there are more than 3 date groups, we show a popup instead
- Bugfix: Added CustomerID-filter to more lists (it flashed some events that were customer related)
- Bugfix: Removed debug info from "Spots left"-text

### [0.9.19]
#### Added
- Added classes to participant-lists, so that the headers can "set" the style easier than using strange CSS-selectors
- Bugfix: Places left didn't account for max spots.

### [0.9.18]
#### Added
- Switched version-numbering to `semver` to make it easier to use with composer
- Added participant-list under "My bookings" as requested by issue #62

### [0.9.17.16]
#### Added
- Bugfix: Pricenames with zero max participants should be selectable

### [0.9.17.15]
#### Added
- Rudimentary support to block people from booking with certain price names (Only when it's selectable)
- Bugfix: Javascript, dates, string. Woe is me.

### [0.9.17.14]
#### Added
- Bugfix: Validation in Javascript is a pain in the rear.

### [0.9.17.13]
#### Added
- Bugfix: Added code to save invoice reference on single participant bookings
- Bugfix: Fixed an JS-error on login pages.

### [0.9.17.12]
#### Added
- Added an extra option in customer groups, and a required flag, so you HAVE to choose a group before saving.
- Added invoice reference field to single person booking

### [0.9.17.11]
#### Added
- Bugfix: Page title must set separator as default parameter, or else things break

### [0.9.17.10]
#### Added
- Why did I change how we check for subjects? We now check against name again
- Bugfix: Page title should not contain object multiple times
- Show an error if you are trying to login with an invalid civic reg no
- Changed serialization of new customers, so it doesn't throw warnings about incomplete classes
- Fixed SingleParticipant-booking so that there will be less duplicates (It actually checks the logged in user customer and contact person)
- Fixed MultipleParticipants-booking so that there will be less duplicates

### [0.9.17.9]
#### Added
- Added `disabled`-filter in customer check (Login), just in case.
- Adding support set page title on detail pages (old wp, new wp and "All in one SEO")
- Added option to set which field you want to use as page title
- Bugfix: Search with category, subject and course level should now be working
- More validation in login-form
- Bugfix: Places-left fix when below zero. It showed "Few spots left", instead of "No spots left"

### [0.9.17.8]
#### Added
- Added warning for missing civic reg.no in booking form (instead of saying they participant is missing their name)
- Bugfix in civregno formatting

### [0.9.17.7]
#### Added
- Readded `flush_rewrite_rules();` when `eduadmin-options_have_changed` is set to true, so we can get rid of the stupid "Go to Settings -> Permalinks and save to fix the paths" (I hate wordpress)
- Removed a lot of `?>` from PHP-files, so we won't output any data where it's unwanted
- Removed dashes except last one in validation
- Added civic reg.no validation to login forms

### [0.9.17.6]
#### Added
- Added link in booking form to log out the current user (if logged in), in format `Not person? Log out`
- Added more phrases to `defaultPhrases.json`
- If you only allow one participant, inquiries also only allow a single participant.
- Added check if `queried_object` is set before checking it.

### [0.9.17.5]
#### Added
- Added LICENSE.md
- Added limitedDiscountView in bookingTemplate to handle limited discount cards
- Added some phrases to defaultPhrases.json (I've got to find a way to do this automagically)
- Bugfix: Fixed date format function on profile -> discount cards. (used an old function)
- Bugfix: Suppressing warnings if `HTTP_REFERER` is missing
- Bugfix: We should use `edu__` in string concatenations instead of `edu_e`
- Bugfix: Event inquiry used the old date function
- Bugfix: We should pass along the settings to use event inquiries all the way..

### [0.9.17.4]
#### Added
- Option to use civic reg.no validation (Swedish) in Booking settings
- Validation support in `frontendjs.js` to validate swedish civic reg.nos
- Added css-style to required input fields (`.eduadmin .inputHolder input[required]`)
- Added `<meta name="robots" content="noindex" />` to detail pages if no `courseid` is present, to prevent broken detail page to be indexed by search engines.
- Bugfix: Booking-form-login now checks the correct field when we try to login

#### Removed
- Removed validation of existing password to enforce password retrieval on contacts with `NULL` passwords.

### [0.9.17.3]
#### Added
- Added option to set how many "few" spots is when you use "Text only"

### [0.9.17.2]
#### Added
- Bugfix: Invoice info should be shown if you don't use the setting from [0.9.17]

### [0.9.17.1]
#### Added
- Bugfix: Search applies to events now as well..

### [0.9.17]
#### Added
- Option to hide invoice information when events are free
- If the above option is used, hides invoice information from free events

### [0.9.16]
#### Added
- `edu.apiclient.AfterUpdate` can be used as a function in javascript to run after the page has loaded all EduAdmin-related things.
- Added automatic focus on searchbox after searching
- Bugfix: It's called `debugTimers` not `debug` :)
- Missed a couple `LastApplicationDate` fix in the code
- Bugfix: It's also commonly known that you should check if all variables are declare
- Fixed date listing in event list templates
- Bugfix: Since you can change login field, we should populate the field used instead of only email.

### [0.9.15]
#### Added
- Added `singlePersonBooking.php` to handle when the participant is customer, contact and participant.
- Added `__bookSingleParticipant.php` and `__bookMultipleParticipants.php` to handle different settings.
- Fixing `frontend.js` to work with single participant-settings.
- Switched to openssl_encrypt/decrypt since mcrypt is deprecated
- Added class name to dates, so you can style them yourself
- Added span around venue name, so you can style it, if you want to
- Adding support to load existing attribute data to customer and contact, when loading the booking form. (Would be bad if we emptied it..)

#### Removed
- `getallheaders` is now gone, forever.

### [0.9.14]
#### Added
- Attributes can now be saved on customers, contacts and participants (person) (Only multiple participants currently)

### [0.9.13]
#### Added
- Added support for attributes (customer, contact and person) in booking form.
- Added functions to render the different attribute types, attributes not supported is multi value attributes, dates, checkbox lists and HTML
- Added: Saving customer attributes
- Bugfix: Phrases
- Booking login form didn't care about what field you chose, it does now.
- Pre-booking form also didn't care about what field you chose, it also does now.

### [0.9.12]
#### Added
- Added option `eduadmin-allowDiscountCode`, to enable the customers to enter a discount code when they book participants for a event.
- Bugfix: When copying contact to participant, correct field is now copied, instead of surname.
- Added backend-api file to handle checking coupon codes
- Added support to validate coupon codes against the api
- Added support to recalculate the price and post the coupon with the Booking

### [0.9.11]
#### Added
- Removed `margin-top: 1.0em; vertical-align: top;` from `.inputLabel` and replaced with `vertical-align: middle;`.
- Bugfix: Search was not respected by ajax-reloads. (Bad, bad JS..)
- Added extra option to show city **AND** venue name.
- Fixed all views and endpoints that show city to include venue name if the setting is on.
- Only show date period in the listview event list, instead of all course days.

### [0.9.10]
#### Added
- If you selected civic registration number as login field, you must now fill it in on your customer contact. It's hard to login otherwise.
- Fixed an error with translations in Booking settings
- Fixing [#48](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/48), to allow users to choose "username" field
- Login-code checks the given login field instead of email.
- It is now possible to add your own translation directly in the plugin. (Again)
- Added extra filter to course list (ajax) to skip "next" event if there isn't a public price name set.
- Changed the filter for LastApplicationDate on events to satisfy the needs (and proper implementation) of being able to book the same day

### [0.9.9.2.40]
#### Added
- Set `date_default_timezone_set` to `UTC` to get rid of warnings instead.

#### Removed
- Removed all error suppression regarding dates.

### [0.9.9.2.39]
#### Added
- More "fixes" for the broken host, only error suppression for `date` and `strtotime`

### [0.9.9.2.38]
#### Added
- Lots, and lots of warning suppression (all `strtotime`)

#### Updated
- `CONTRIBUTING.md` is updated (ripped from [jmaynard](https://medium.com/@jmaynard/a-contribution-policy-for-open-source-that-works-bfc4600c9d83#.c42dikaxi))

### [0.9.9.2.37]
#### Added
- This changelog
- Bugfix: if phrase doesn't exist in our dictionary, it threw an error. It shouldn't do that.
- Bugfix: Some users have a faulty php-config and gives warnings about that we need to set a timezone before we run `strtotime`

### [0.9.9.2.36] - 2017-01-05
#### Removed
- Removing our translation, making it possible for third party plugins to translate the plugin by using standard WordPress-translation

### [0.9.9.2.25] - 2016-12-05
#### Added
- Added GF-course view (Hard coded with cities)
- Added attributes `order`, `orderby` on listview and detail info shortcodes
- Added attribute `mode` to listview shortcode, so you can select mode

### [0.9.9.2.5] - 2016-10-04
#### Added
- Added support for sub events
- Changed links to be absolute
- Added support for event dates

### [0.9.7.5] - 2016-09-13
#### Added
- Added attribute `numberofevents` to shortcode `[eduadmin-listview]`
- Fix in rewrite-script
- Added missing translations
- Also adds event inquiries for fullbooked events

### 0.9.7 - 2016-09-06
#### Added
- Added inquiry support in course

[1.0.23]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.22...v1.0.23
[1.0.22]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.21...v1.0.22
[1.0.21]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.20...v1.0.21
[1.0.20]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.19...v1.0.20
[1.0.19]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.18...v1.0.19
[1.0.18]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.17...v1.0.18
[1.0.17]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.16...v1.0.17
[1.0.16]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.15...v1.0.16
[1.0.15]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.14...v1.0.15
[1.0.14]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.13...v1.0.14
[1.0.13]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.12...v1.0.13
[1.0.12]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.11...v1.0.12
[1.0.11]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.10...v1.0.11
[1.0.10]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.9...v1.0.10
[1.0.9]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.8...v1.0.9
[1.0.8]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.7...v1.0.8
[1.0.7]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.6...v1.0.7
[1.0.6]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.5...v1.0.6
[1.0.5]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.4...v1.0.5
[1.0.4]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.3...v1.0.4
[1.0.3]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.2...v1.0.3
[1.0.2]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.24...v1.0.0
[0.10.24]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.23...v0.10.24
[0.10.23]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.22...v0.10.23
[0.10.22]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.21...v0.10.22
[0.10.21]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.20...v0.10.21
[0.10.20]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.19...v0.10.20
[0.10.19]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.18...v0.10.19
[0.10.18]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.17...v0.10.18
[0.10.17]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.16...v0.10.17
[0.10.16]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.15...v0.10.16
[0.10.15]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.14...v0.10.15
[0.10.14]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.13...v0.10.14
[0.10.13]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.12...v0.10.13
[0.10.12]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.11...v0.10.12
[0.10.11]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.10...v0.10.11
[0.10.10]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.9...v0.10.10
[0.10.9]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.8...v0.10.9
[0.10.8]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.7...v0.10.8
[0.10.7]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.6...v0.10.7
[0.10.6]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.5...v0.10.6
[0.10.5]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.4...v0.10.5
[0.10.4]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.3...v0.10.4
[0.10.3]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.2...v0.10.3
[0.10.2]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.1...v0.10.2
[0.10.1]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.10.0...v0.10.1
[0.10.0]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.18...v0.10.0
[0.9.19]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.18...v0.9.19
[0.9.18]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.16...v0.9.18
[0.9.17.16]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.15...v0.9.17.16
[0.9.17.15]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.14...v0.9.17.15
[0.9.17.14]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.13...v0.9.17.14
[0.9.17.13]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.12...v0.9.17.13
[0.9.17.12]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.11...v0.9.17.12
[0.9.17.11]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.10...v0.9.17.11
[0.9.17.10]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.9...v0.9.17.10
[0.9.17.9]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.8...v0.9.17.9
[0.9.17.8]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.7...v0.9.17.8
[0.9.17.7]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.6...v0.9.17.7
[0.9.17.6]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.5...v0.9.17.6
[0.9.17.5]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.4...v0.9.17.5
[0.9.17.4]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.3...v0.9.17.4
[0.9.17.3]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.2...v0.9.17.3
[0.9.17.2]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17.1...v0.9.17.2
[0.9.17.1]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.17...v0.9.17.1
[0.9.17]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.16...v0.9.17
[0.9.16]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.15...v0.9.16
[0.9.15]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.14...v0.9.15
[0.9.14]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.13...v0.9.14
[0.9.13]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.12...v0.9.13
[0.9.12]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.11...v0.9.12
[0.9.11]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.10...v0.9.11
[0.9.10]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.40...v0.9.10
[0.9.9.2.40]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.39...v0.9.9.2.40
[0.9.9.2.39]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.38...v0.9.9.2.39
[0.9.9.2.38]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.37...v0.9.9.2.38
[0.9.9.2.37]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.36...v0.9.9.2.37
[0.9.9.2.36]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.25...v0.9.9.2.36
[0.9.9.2.25]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.9.2.5...v0.9.9.2.25
[0.9.9.2.5]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.7.5...v0.9.9.2.5
[0.9.7.5]: https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v0.9.7...v0.9.7.5
