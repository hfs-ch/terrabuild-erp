FROM php:8.4-apache

# Installation des dépendances
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libpq-dev

# Extensions PHP
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mysqli \
    zip \
    intl

RUN a2enmod rewrite

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-interaction

RUN chown -R www-data:www-data storage bootstrap/cache

COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80