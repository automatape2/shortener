FROM php:8.2-fpm-alpine

RUN addgroup -S nonroot \
    && adduser -S nonroot -G nonroot

USER nonroot

COPY ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf

COPY ./app /var/www/html/app
COPY ./bootstrap /var/www/html/bootstrap
COPY ./config /var/www/html/config
COPY ./database /var/www/html/database
COPY ./public /var/www/html/public
COPY ./resources /var/www/html/resources
COPY ./routes /var/www/html/routes
COPY ./storage /var/www/html/storage
COPY ./tests /var/www/html/tests
COPY ./composer.json /var/www/html/composer.json
COPY ./composer.lock /var/www/html/composer.lock

RUN addgroup -g 1000 laravel && \
    adduser -G laravel -g laravel -s /bin/sh -D laravel && \
    mkdir -p /var/www/html && \
    docker-php-ext-install pdo pdo_mysql && \
    chown -R laravel:laravel /var/www/html