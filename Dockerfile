# PHP 8.4 partout : le composer.lock tire Symfony 8.1, qui exige PHP >= 8.4.1.
# L'étape Composer reste sur php:8.4-cli. Le runtime est FrankenPHP (PHP 8.4),
# pour ne plus exposer le serveur de développement `php artisan serve`.

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

FROM dunglas/frankenphp:1-php8.4

RUN install-php-extensions intl pdo_sqlite zip opcache

WORKDIR /app

COPY --from=vendor /app /app
COPY docker/start.sh /usr/local/bin/portfolio-start
COPY docker/php-security.ini /usr/local/etc/php/conf.d/zz-security.ini
# Le binaire officiel a cap_net_bind_service. Sous Render, www-data ne peut
# pas l'exécuter (Operation not permitted). Le port est 10000, cette capacité
# ne sert pas : on la retire avant de passer à www-data.
RUN chmod +x /usr/local/bin/portfolio-start \
    && setcap -r /usr/local/bin/frankenphp \
    && mkdir -p /data /config \
    && chown -R www-data:www-data storage bootstrap/cache database /data /config \
    && chmod -R ug+rwx storage bootstrap/cache database /data /config

USER www-data

ENV PORT=10000
EXPOSE 10000

ENTRYPOINT ["docker-php-entrypoint"]
CMD ["portfolio-start"]
