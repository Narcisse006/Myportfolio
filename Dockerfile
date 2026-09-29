# --- Dépendances Composer ---
# L'image composer:2 est Alpine : elle n'a pas apt-get.
# intl est requis par Filament au runtime (étape php:8.2-cli), pas pendant le téléchargement des paquets.
FROM composer:2 AS vendor

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-scripts \
    --no-autoloader \
    --prefer-dist \
    --no-interaction \
    --ignore-platform-req=ext-intl

COPY . .
RUN composer dump-autoload --optimize --no-dev --no-scripts

# --- Runtime PHP ---
FROM php:8.2-cli

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
