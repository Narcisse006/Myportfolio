# Étape 1 — installer les dépendances avec PHP 8.2
FROM php:8.2-cli-alpine AS vendor

RUN apk add --no-cache \
    git \
    unzip \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) zip intl mbstring \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && rm -rf /var/cache/apk/* /tmp/*

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --prefer-dist --no-interaction --optimize-autoloader

COPY . .
RUN composer dump-autoload --optimize --classmap-authoritative \
    && php artisan package:discover --ansi

# Étape 2 — image de production
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
