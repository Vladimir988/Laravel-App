# Create final app image
FROM trafex/alpine-nginx-php7:1.4.0

USER root

# Install dependencies
RUN apk --no-cache add \
  curl \
  nginx \
  php7 \
  php7-simplexml \
  php7-tokenizer \
  php7-exif \
  php7-fileinfo \
  php7-xmlwriter \
  php7-ctype \
  php7-curl \
  php7-dom \
  php7-fpm \
  php7-gd \
  php7-intl \
  php7-json \
  php7-mbstring \
  php7-pdo \
  php7-mysqli \
  php7-pgsql \
  php7-pdo_pgsql \
  php7-opcache \
  php7-openssl \
  php7-phar \
  php7-session \
  php7-xml \
  php7-xmlreader \
  php7-zlib \
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
RUN composer install

USER nobody
