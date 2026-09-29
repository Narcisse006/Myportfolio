# PHP 8.4 partout : le composer.lock tire Symfony 8.1, qui exige PHP >= 8.4.1.
# Les deux étapes utilisent la même image Debian, pour que Composer et le runtime
# voient les mêmes extensions (intl inclus).

FROM php:8.4-cli AS vendor

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-install intl zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-scripts \
    --no-autoloader \
    --prefer-dist \
    --no-interaction

COPY . .
RUN composer dump-autoload --optimize --no-dev --no-scripts

FROM php:8.4-cli

RUN apt-get update && apt-get install -y --no-install-recommends \
    libzip-dev \
    libicu-dev \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install intl pdo pdo_sqlite zip \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY --from=vendor /app /app
COPY docker/start.sh /usr/local/bin/portfolio-start
RUN chmod +x /usr/local/bin/portfolio-start \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rwx storage bootstrap/cache

USER www-data

ENV PORT=10000
EXPOSE 10000

CMD ["portfolio-start"]
