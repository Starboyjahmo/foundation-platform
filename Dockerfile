FROM php:8.2-cli

WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libzip-dev

# Install PostgreSQL PHP drivers
RUN docker-php-ext-install pgsql pdo_pgsql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose port
EXPOSE 8000

# Start Laravel
CMD php artisan config:clear && \
    php artisan cache:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan migrate --force && \
    php -S 0.0.0.0:8000 -t public