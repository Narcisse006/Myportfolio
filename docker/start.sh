#!/usr/bin/env sh
set -eu

cd /app

if [ -z "${APP_KEY:-}" ]; then
  echo "APP_KEY manquante — génération temporaire (définir APP_KEY sur Render)."
  export APP_KEY="$(php artisan key:generate --show --no-ansi)"
fi

php artisan config:cache

if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
  mkdir -p database
  touch database/database.sqlite
fi

php artisan migrate --force --no-interaction
php artisan db:seed --class=Database\\Seeders\\AdminUserSeeder --force --no-interaction
php artisan db:seed --class=Database\\Seeders\\ProjectSeeder --force --no-interaction

php artisan route:cache
php artisan view:cache

exec frankenphp run --config /app/docker/Caddyfile
