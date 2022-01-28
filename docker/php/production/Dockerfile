FROM php:8.1-cli
RUN apt-get -y update && apt-get install -y zlib1g-dev libonig-dev libxml2-dev libzip-dev git curl zip unzip && rm -rf /var/lib/apt/lists/*

RUN pecl install redis-5.3.6 xdebug-3.1.2 && docker-php-ext-enable redis xdebug

RUN docker-php-ext-install sockets mbstring xml pdo pdo_mysql opcache zip && docker-php-ext-enable sockets mbstring xml pdo pdo_mysql opcache zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/app

WORKDIR /var/www/app

COPY .env.example .env

RUN composer install
