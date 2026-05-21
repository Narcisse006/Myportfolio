FROM php:8.2-cli

# Installer dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    libicu-dev \
    sqlite3 \
    libsqlite3-dev

# Extensions PHP nécessaires
RUN docker-php-ext-install \
    pdo \
    pdo_sqlite \
    mbstring \
    zip \
    intl \
    bcmath

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Dossier app
WORKDIR /app

# Copier projet
COPY . .

# Installer dépendances Laravel
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Permissions
RUN chmod -R 775 storage bootstrap/cache

# Port Render
ENV PORT=10000

EXPOSE 10000

# Lancement Laravel
CMD php artisan serve --host=0.0.0.0 --port=$PORT