Todo:
- [ ] Validation readPage
- [ ] bootstrap css
- [ ] verification email
- [ ] password reset and forgot password
- [ ] user profile
- [ ] user profile image
- [ ] textarea for book summary


Features:
- [x] Koneksi ke database mysql
- [x] Fitur login, logout, register, cookie, session
- [x] Fitur searching title and author book
- [x] Fitur CRUD book
- [x] Frontend dasar



# Bookshelf Web
current version: 0.0.5

## Tambahan:
1. any in query interface
2. test admin ability to manipulate user
3. test admin ability to manipulate book v
4. test numericFilters in book v
5. test sorting, paging, and limit in book v
6. limiting access of return get all books
7. 

## Release Features 0.1.0

1. Koneksi ke database mongodb v
2. Fitur login dan autentikasi (jwt) v
3. Fitur filtering and searching get data v

## Release Features 0.2.0
1. Add fitur sorting, paging, and limit get data v
2. Adding category and other fields for book entity 
3. Add modifier for book entity ('public', 'private') 
<!-- 4. Swagger API -->
5. Upload gambar cover buku dan Pdf buku in local storage 
6. Adding Admin Extra Features - show stats, adding category, edit user role, delete spam/problematic book
7. forgot and reset password 
8. Deploying to 

## Release Features 0.3.0
3. 
4. Another deployment
4. Utilizing cookie, session, and cache v
5. Automated Testing
6. Upload gambar cover buku dan Pdf buku in cloud storage
7. Add searching books by creatorpaging
8. Monitoring and Logging
9. Frontend

## Release Features 0.4.0
9. Improved Frontend

## Next:
1. 











# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> **Warning**
> The end of life date for PHP 7.4 was November 28, 2022. If you are
> still using PHP 7.4, you should upgrade immediately. The end of life date
> for PHP 8.0 will be November 26, 2023.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
