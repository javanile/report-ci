FROM php:7.3.9-apache

RUN apt-get update && \
    apt-get install -y --no-install-recommends git libzip-dev zlib1g-dev zip unzip && \
    docker-php-ext-install zip

RUN curl -sL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN sed -e 's!DocumentRoot /var/www/html!DocumentRoot /var/www/html/public!' \
        -ri /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite
