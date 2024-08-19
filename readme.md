# EduAdmin Booking
- Requires at least: 6.0
- Tested up to: 6.6
- Stable tag: 5.1.0
- Requires PHP: 8.1
- License: GPL3
- License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

EduAdmin plugin to allow visitors to book courses at your website. Requires EduAdmin-account.

## Description

Plugin that you connect to [EduAdmin](https://www.eduadmin.se) to enable booking on your website.

[<img src="https://img.shields.io/github/commits-since/MultinetInteractive/EduAdmin-WordPress/latest.svg" alt="Commits since latest plugin version" />](https://wordpress.org/plugins/eduadmin-booking/)

Requires the following PHP-modules

- php-curl
- php-mbstring

## Installation

-   Upload the zip-file (or install from WordPress) and activate the plugin
-   Provide the API key from EduAdmin.
-   Create pages for the different views and give them their shortcodes

## Upgrade Notice

### 3.0

Styles have been remade for the end user login page, and the booking list page. Please check that any custom styles are still working, or you might need to fix them.

### 2.0

We have replaced everything with a new API-client, so some things may be broken. If you experience any bugs (not new feature-requests), please contact the MultiNet Support.
If you notice that your API key doesn't work any more, you have to contact us.

## Changelog

The full changelog available on [GitHub](https://github.com/MultinetInteractive/EduAdmin-WordPress/blob/production/CHANGELOG.md)

### [5.1.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.0.1...v5.1.0) (2024-08-19)


#### Features

* Adding new endpoints and classes ([0df472e](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/0df472e7b80f3e1ca8584a3f7b7cbf0c81432dcc))


#### Bug Fixes

* Fixes incorrect encoding after PHP 8.1 changing how things work. ([ff8055d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/ff8055dfda0cb4e805977895136a2a0df6135f33)), closes [#526](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/526)

### [5.0.1](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v5.0.0...v5.0.1) (2024-04-09)


#### Bug Fixes

* Some null handling that is deprecated in newer versions of PHP ([d89c27d](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/d89c27d1dcf6b245ff6fd982ebccdacc1a7a4527))

### [5.0.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.3.0...v5.0.0) (2024-04-08)


#### ⚠ BREAKING CHANGES

* Updated required WP and PHP, changes are already made in code (353e4dd7c1bfa5aa31ee67e0572220acca3a6387)

#### Bug Fixes

* Updated required WP and PHP, changes are already made in code (353e4dd7c1bfa5aa31ee67e0572220acca3a6387) ([29b0adc](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/29b0adc497a8d60d906784dd65ef04c824b42184))

### [4.3.0](https://github.com/MultinetInteractive/EduAdmin-WordPress/compare/v4.2.3...v4.3.0) (2024-04-08)


#### Features

* Support for EduAdmin Form Reserve/Waiting Lists when the event is fully booked. ([3680b47](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/3680b4703298c57210f5d025a70fbbf1f6565a3d)), closes [#455](https://github.com/MultinetInteractive/EduAdmin-WordPress/issues/455)


#### Bug Fixes

* Only check description if it actually contains anything ([33234df](https://github.com/MultinetInteractive/EduAdmin-WordPress/commit/33234dff3445e6642281cb5aa53ef674485a7fe0))



