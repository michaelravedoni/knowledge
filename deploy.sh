#!/bin/sh

# Turn on maintenance mode
echo 'Command: down'
php artisan down

# Pull the latest changes from the git repository
echo 'Command: git pull'
git pull origin main

# Install/update composer dependecies
echo 'Command: composer'
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Run storage link
echo 'Command: storage'
php artisan storage:link

# Run database migrations
echo 'Command: migrate'
php artisan migrate --force

# Clear caches
echo 'Command: cache'
php artisan cache:clear

# Clear and cache routes
php artisan route:cache

# Clear and cache config
php artisan config:cache

# Clear and cache views
php artisan view:cache

# Install node modules
echo 'Command: npm'
npm ci

# Build assets using Laravel Mix
npm run production

# Turn off maintenance mode
echo 'Command: up'
php artisan up

echo '🚀 Deploy finished.'
