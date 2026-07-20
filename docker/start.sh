#!/usr/bin/env sh
set -eu

cd /app

if [ -z "${APP_KEY:-}" ]; then
  echo "APP_KEY manquante — génération temporaire (définir APP_KEY sur Render)."
  export APP_KEY="$(php artisan key:generate --show --no-ansi)"
fi

php artisan config:cache
php artisan route:cache
php artisan view:cache

exec php artisan serve --host=0.0.0.0 --port="${PORT:-10000}"
