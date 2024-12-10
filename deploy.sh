#!/bin/bash

# Update and upgrade the system
sudo apt update
sudo apt upgrade -y

# Install PHP and required extensions
sudo apt install -y php php-cli php-fpm php-mbstring php-xml php-curl php-zip php-pgsql

# Install Composer
sudo apt install -y curl
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Node.js and npm
sudo apt install -y nodejs npm

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

php artisan db:seed

# Set permissions
sudo chown -R www-data:www-data storage
sudo chown -R www-data:www-data bootstrap/cache
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache

# Start the development server
php artisan serve &

# Run Vite (if using Vite for asset compilation)
npm run dev &

echo "Laravel setup is complete. The server is running."