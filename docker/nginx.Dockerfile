FROM nginx:stable-alpine

RUN addgroup -S nonroot && \
    adduser -S nonroot -G nonroot && \
    mkdir -p /var/www/html

USER nonroot

COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
