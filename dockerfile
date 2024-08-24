FROM php:8.3-fpm-alpine AS php

RUN apk add -U --no-cache curl-dev
RUN docker-php-ext-install curl

RUN docker-php-ext-install exif

RUN apk add autoconf g++ make
RUN pecl install apcu && docker-php-ext-enable apcu

RUN echo -e "http://nl.alpinelinux.org/alpine/v3.13/main\nhttp://nl.alpinelinux.org/alpine/v3.13/community" > /etc/apk/repositories;
RUN apk add --no-cache gd;

RUN docker-php-ext-install gd

