#!/bin/sh
set -e

until php artisan migrate:status >/dev/null 2>&1; do
  echo "Waiting for database..."
  sleep 5
done

php artisan key:generate --force || true

php artisan config:clear
php artisan config:cache

php artisan migrate --force

if [ "$RUN_SEEDER" = "true" ]; then
  php artisan db:seed --force
fi

exec "$@"
