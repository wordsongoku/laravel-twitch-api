# Twitch RESTful API (VERSION 5) for Laravel

This is an easy-to-use RESTful API for Laravel 5 orginally made by zarlach and forked by wordsongoku (me)

This fork's goal was (and still is) to update this library to Twitch's newest API Version 5. Therefore I removed deprecated APIs (e.g. Follow API) and updated everything according to the new Twitch API v5 guidelines.

ATTENTION: Function names were changed to the respective headings of each function in Twitch's API v5 documentation. E.g. a user object can be retrieved by:
```
$user = Twitch::getUserById(123456);
```

Corresponding heading in Twitch's v5 documentation:
[https://dev.twitch.tv/docs/v5/reference/users/#__get-user-by-id__](https://dev.twitch.tv/docs/v5/reference/users/#get-user-by-id)

## v5 Integration

- Authentication API (fully integrated)
- Bits API (fully integrated)
- Channel Feed Api (fully integrated)
- Channels API (fully integrated)
- Chat API (fully integrated)
- Clips API (fully integrated)
- ~~Collections API~~ (coming)
- ~~Communities API~~ (coming)
- Games API (fully integrated)
- Ingests API (fully integrated)
- Search API (fully integrated)
- Streams API (fully integrated)
- Teams API (fully integrated)
- Users API (partially integrated, some features missing, e.g. Create User Connection to Viewer Heartbeat Service (VHS))
- Videos API (partially integrated, some features missing, e.g. VideoUpload)


## Installation

This fork is not yet on packagist.org, if you want to try it (on your own risk) you have to add the following to your `composer.json` file before `"require"`:
```
"repositories":
    [
            {
                "type": "git",
                "url": "https://github.com/wordsongoku/laravel-twitch-api.git"
            }
    ]
```
Then open a Terminal and type:	
```bash
composer require zarlach/laravel-twitch-api:dev-master
```

In `config/app.php`, add this provider in `providers`

```php
Zarlach\TwitchApi\Providers\TwitchApiServiceProvider::class,
```

Add this facade in `aliases`

```php
'TwitchApi' => Zarlach\TwitchApi\Facades\TwitchApiServiceFacade::class,
```

Publish config, then configure your `config/twitch-api.php`

```php
php artisan vendor:publish
```

## Laravel environment variables

It's recommended to add these variables in your `.env` file.

```bash
TWITCH_KEY=
TWITCH_SECRET=
TWITCH_REDIRECT_URI=
```

## Documentation

Docs is under construction, first goal was to update the main functionalities to v5 standard. Docs will be added accordingly.

## Changelog

NOTE: newest changes that were made in this fork are not yet included in this file.

A list of changes is found in `changelog.md`