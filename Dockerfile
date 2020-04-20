FROM php:7.2-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN pecl install apcu && docker-php-ext-enable apcu

ADD . /var/www/html
