FROM composer:2.5 AS composer
FROM php:8.1-fpm

RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql

EXPOSE 9000
EXPOSE 8000

COPY --from=composer /usr/bin/composer /usr/bin/composer