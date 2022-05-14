FROM php:8.1-fpm

RUN apt-get -y update && apt-get install --no-install-recommends -y zlib1g-dev libonig-dev libxml2-dev libzip-dev git curl zip unzip && rm -rf /var/lib/apt/lists/*

RUN pecl install redis-5.3.6 xdebug-3.1.2 && docker-php-ext-enable redis xdebug

RUN docker-php-ext-install sockets pdo_mysql zip xml && docker-php-ext-enable sockets pdo_mysql zip xml

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/app

EXPOSE 9000