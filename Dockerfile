FROM php:7.2-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN apt-get update && apt-get install -y libmemcached-dev zlib1g-dev && \
    pecl install memcached && \
    docker-php-ext-enable memcached

ADD . /var/www/html
