# Test task for Artsoft
***
## Description
Разработано api по задания для Artsoft. 
***
## Stack

1. [Laravel 11.31](https://laravel.com/). 
2. [MySQL 8.0](https://dev.mysql.com/doc/).
***
## Requirements
 - [Docker](https://www.docker.com/)
 - [Docker Compose](https://docs.docker.com/compose/)
 - [PHP 8.3](https://www.php.net/)
 - [Composer](https://getcomposer.org/)

***
## Installation
Для удобства проверки команды запуска добавлены в Makefile
 - `make install` - копирует `.env.example` в `.env` и создает контейнеры. Также запускает `php artisan key:generate` и `php artisan migrate --seed`
 - `make start` - запускает контейнеры (если они не запущены)
 - `make stop` - останавливает контейнеры
***
## Endpoints
  - `http://localhost/api/v1/cars` GET|HEAD - список автомобилей
  - `http://localhost/api/v1/cars/{car}` GET|HEAD - автомобиль
  - `http://localhost/api/v1/credit/calculate` GET|HEAD - расчет кредита
  - `http://localhost/api/v1/request` POST - сохранение кредитной заявки 
