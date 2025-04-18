FROM php:8.1-apache
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pgsql pdo_pgsql
COPY src/ /var/www/html/
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html