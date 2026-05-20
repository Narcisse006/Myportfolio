#!/bin/sh
set -e

cd /app

if [ -z "$APP_KEY" ]; then
    echo "ERREUR: définissez APP_KEY dans les variables d'environnement Render."
    exit 1
fi

php artisan config:cache
php artisan route:cache
php artisan view:cache

exec php artisan serve --host=0.0.0.0 --port="${PORT:-10000}"
