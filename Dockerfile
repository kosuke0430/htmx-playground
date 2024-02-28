FROM php:8.2-apache

RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    unzip \
    git \
    npm

RUN docker-php-ext-install pdo pdo_mysql zip
RUN a2enmod rewrite

# LaravelのインストールにComposerが必要です。
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
WORKDIR /var/app
COPY . /var/app/
RUN composer install
RUN chown -R www-data:www-data /var/app
RUN chmod -R 755 /var/app/storage

ENV APACHE_DOCUMENT_ROOT /var/app/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
