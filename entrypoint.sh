#!/bin/sh
set -e

echo "Waiting for database..."
sleep 10

php artisan key:generate --force || true

php artisan config:clear
php artisan config:cache

php artisan migrate --force

exec "$@"
