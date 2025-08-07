## Feature

Laravel 10

## Installation

git clone https://github.com/tepern/enterprise-api.git

cd enterprise-api

Create .env from .env.example

docker-compose up --build -d

## Migrating

docker-compose exec php bash

php artisan migrate

## Seeding

docker-compose exec php bash

php artisan migrate:fresh --seed