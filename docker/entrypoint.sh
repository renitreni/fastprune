#!/bin/bash

echo "Starting Laravel bootstrap process..."

# Clear and cache config
php artisan config:clear
php artisan config:cache

# Run migrations (optional, comment out if not desired)
php artisan migrate --force

# Create storage symlink
php artisan storage:link || echo "Symlink already exists or failed"

# Start cron
service cron start

# Start PHP-FPM
service php8.3-fpm start

# Start Supervisor
echo "Starting Supervisor..."
exec /usr/bin/supervisord -n -c /etc/supervisor/conf.d/supervisord.conf
