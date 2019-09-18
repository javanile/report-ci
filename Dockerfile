FROM php:7.3.9-apache

RUN apt-get update && \
    apt-get install -y --no-install-recommends git libsodium-dev libzip-dev zlib1g-dev zip unzip && \
    docker-php-ext-install sodium zip

RUN curl -sL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://github.com/squizlabs/PHP_CodeSniffer/releases/download/2.8.1/phpcs.phar > /usr/local/bin/phpcs \
    && chmod +x /usr/local/bin/phpcs

RUN curl -sL https://github.com/phpmd/phpmd/releases/download/2.7.0/phpmd.phar > /usr/local/bin/phpmd \
    && chmod +x /usr/local/bin/phpmd

RUN sed -e 's!DocumentRoot /var/www/html!DocumentRoot /var/www/html/public!' \
        -ri /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite
