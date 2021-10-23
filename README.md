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
`GET` | `/api/ads:id` | Fetch a single advertising campaign
`POST` | `/api/ads` | Create an advertising campaign
`PUT` | `/api/ads/:id` | Update the advertising campaign

## Setup Docker

```
$ git clone https://github.com/orkhanigidov/Eskimi-SSP-Task.git
$ cd Eskimi-SSP-Task
$ docker-compose up
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
Open http://127.0.0.1:80/ in the browser

## Testing

```
$ ./vendor/bin/phpunit
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
