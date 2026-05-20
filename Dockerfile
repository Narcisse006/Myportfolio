# Build des dépendances PHP (PHP 8.2 requis par Laravel 12)
FROM composer:2-php8.2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --prefer-dist --no-interaction --optimize-autoloader

COPY . .
RUN composer dump-autoload --optimize --classmap-authoritative \
    && php artisan package:discover --ansi

# Image de production
FROM php:8.2-cli-alpine

RUN apk add --no-cache \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    sqlite \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) \
        pdo_sqlite \
        mbstring \
        zip \
        intl \
        opcache \
        bcmath \
    && rm -rf /var/cache/apk/* /tmp/*

WORKDIR /app

COPY --from=vendor /app /app

RUN mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

COPY docker/start.sh /usr/local/bin/start
RUN chmod +x /usr/local/bin/start

ENV PORT=10000
EXPOSE 10000

CMD ["/usr/local/bin/start"]
