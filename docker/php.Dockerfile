FROM php:8.2-fpm-alpine

COPY ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf

COPY ./ /var/www/html

RUN addgroup -g 1000 laravel && \
    adduser -G laravel -g laravel -s /bin/sh -D laravel && \
    mkdir -p /var/www/html && \
    docker-php-ext-install pdo pdo_mysql && \
    chown -R laravel:laravel /var/www/html