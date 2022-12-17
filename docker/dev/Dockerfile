FROM php:7.4-fpm-alpine

# Install dependencies
RUN apk add --update \
    postgresql-dev

# Copy development config
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install exif pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
