# Eskimi SSP Task

## Table of contents
- [About Application](#about-application)
- [Technologies](#technologies)
- [API Endpoints](#api-endpoints)
- [Setup Docker](#setup-docker)
- [Run Migration](#run-migration)
- [Install Dependencies](#install-dependencies)
- [Run Application](#run-application)
- [Testing](#testing)

## About Application

- Create and edit an advertising campaign
- See all created advertising campaigns: name, date, daily budget, total budget, and a creative preview button on a single web page
- Creative preview button should show advertising campaign’s uploaded creatives in a popup (same page)
- Navigate from campaign create/edit to campaign listing page and the other way around


## Technologies

- [Laravel](https://laravel.com/)
- [Vue.js](https://vuejs.org/)
- [jQuery](https://jquery.com/)
- [MySQL](https://www.mysql.com/)
- [PHPUnit](https://phpunit.de/)
- [Docker](https://www.docker.com/)

## API Endpoints
Method | Route | Description
--- | --- | ---
`GET` | `/api/ads` | Fetch all the advertising campaigns
`GET` | `/api/ads` | Create an advertising campaign
`POST` | `/api/ads/:id` | Update the advertising campaign
`PUT` | `/api/ads:id` | Fetch a single advertising campaign

## Setup Docker

```
$ git clone https://github.com/orkhanigidov/Eskimi-SSP-Task.git
$ cd Eskimi-SSP-Task
$ docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
$ cp .env.example .env
```

## Run Migration

```
$ php artisan migrate
```

## Install Dependencies

```
$ composer install
$ npm install
```

## Run Application

```
$ php artisan serve
$ npm run watch
```
Open http://127.0.0.1:8000/ in the browser

## Testing

```
$ ./vendor/bin/phpunit
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
