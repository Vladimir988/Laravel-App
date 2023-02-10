# Create final app image
FROM allisa/php8.1-fpm

USER root

# Install dependencies
RUN apk --no-cache add \
  curl \
  nginx \
  supervisor \
  nano

# Prepare Laravel app
WORKDIR /var/www

# Copy files
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/prod.conf /etc/nginx/conf.d/default.conf
COPY docker/php-fpm.d/www.conf /etc/php7/php-fpm.d/www.conf
COPY --chown=nobody . .
RUN rm -rf docker devops Dockerfile READMY.md
RUN chown nobody.nobody .env

#Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer self-update --2

#### Better do the following on the init ####
RUN composer install --ignore-platform-req=ext-zip

USER nobody
