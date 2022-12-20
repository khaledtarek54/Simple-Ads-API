<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Simple Ads API

This application aims to deal with advertisers and their advertisments with relations to this advertisments as advertisment category and advertisment tag.
Schedule a daily email at 08:00 PM that will be sent to advertisers who have ads the next day as a remainder. 
Ads filters (by tag, by category).
Showing Advertiser Ads.

Post man collection file name is PostmanCollection.json

## Configuration

Make the database migrations:

```bash
php artisan migrate
```

Seed the database with fake records:

```bash
php artisan db:seed
```

Run the task scheduler to send mails daily at 8:00:

```bash
php artisan schedule:work
```
