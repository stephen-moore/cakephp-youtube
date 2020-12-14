# CakePHP Youtube Application
A Youtube Application using youtubes api v3 built with [CakePHP](https://cakephp.org) 4.x.

An Introduction to the app features can be seen here: https://www.youtube.com/watch?v=q_dOHYeWr0E
## Installation

Clone the repository
```bash
git clone https://github.com/stephen-moore/cakephp-youtube.git
```

Switch to the repo folder
```bash
cd cakephp-youtube
```

Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
If Composer is installed globally, run

Install all the dependencies using composer
```bash
composer install
```

Configure your API settings in the config/app.php file
```bash
    'YoutubeConfig' => [
        'api_key' => 'INSERT_YOUR_API_KEY',
        'endpoint' => 'https://www.googleapis.com/youtube/v3'
    ]
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the Youtube page.

## Requirements

#### An Internet connection is required to retrieve jQuery and Bootstrap via CDN.

CakePHP has a few system requirements:
 - HTTP Server. For example: Apache. Having mod_rewrite is preferred, but by no means required. You can also use nginx, or Microsoft IIS if you prefer.
 - Minimum PHP 7.2 (7.4 supported).
 - mbstring PHP extension
 - intl PHP extension
 - simplexml PHP extension
 - PDO PHP extension

In XAMPP, intl extension is included but you have to uncomment extension=php_intl.dll (or extension=intl) in php.ini and restart the server through the XAMPP Control Panel.
The curl extension must also be enabled. extension=curl in php.ini

## Configuration

Read and edit the environment specific `config/app_local.php` and setup the
`'YoutubeConfig'` configuration for the application.

    'YoutubeConfig' => [
        'api_key' => 'INSERT_YOUR_API_KEY',
        'endpoint' => 'https://www.googleapis.com/youtube/v3'
    ]

## Layout

The app uses Bootstrap (v3.3.7)  CSS to style the layout.
