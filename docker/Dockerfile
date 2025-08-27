# Use Ubuntu-based PHP image which has better IMAP support
FROM ubuntu:22.04

# Set environment variables to avoid interactive prompts
ENV DEBIAN_FRONTEND=noninteractive

# Install PHP and required packages
RUN apt-get update && apt-get install -y \
    software-properties-common \
    && add-apt-repository ppa:ondrej/php \
    && apt-get update && apt-get install -y \
    php8.3-fpm \
    php8.3-cli \
    php8.3-common \
    php8.3-mysql \
    php8.3-zip \
    php8.3-gd \
    php8.3-mbstring \
    php8.3-curl \
    php8.3-xml \
    php8.3-bcmath \
    php8.3-soap \
    php8.3-intl \
    php8.3-readline \
    php8.3-ldap \
    php8.3-msgpack \
    php8.3-igbinary \
    php8.3-redis \
    php8.3-memcached \
    php8.3-pcov \
    php8.3-xdebug \
    php8.3-imap \
    php8.3-imagick \
    imagemagick \
    cron \
    supervisor \
    unzip \
    git \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Configure PHP-FPM to listen on a TCP socket
RUN printf '[www]\nlisten = 9000\n' > /etc/php/8.3/fpm/pool.d/zz-docker.conf


# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Configure PHP settings
RUN { \
        echo 'upload_max_filesize = 30M'; \
        echo 'post_max_size = 30M'; \
        echo 'max_execution_time = 300'; \
        echo 'memory_limit = 512M'; \
        echo 'opcache.enable = 1'; \
        echo 'opcache.enable_cli = 1'; \
        echo 'opcache.memory_consumption = 128'; \
        echo 'opcache.interned_strings_buffer = 8'; \
        echo 'opcache.max_accelerated_files = 4000'; \
        echo 'opcache.revalidate_freq = 2'; \
        echo 'opcache.fast_shutdown = 1'; \
    } > /etc/php/8.3/fpm/conf.d/99-custom.ini

# Copy PHP-FPM configuration to CLI as well
RUN cp /etc/php/8.3/fpm/conf.d/99-custom.ini /etc/php/8.3/cli/conf.d/99-custom.ini

# Install unrar
RUN apt-get update && apt-get install -y unrar-free && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html

# Copy composer files first (for better caching)
COPY composer.json composer.lock ./

# Install Composer dependencies
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --optimize-autoloader

# Add crontab file
COPY ./docker/laravel_cron /etc/cron.d/laravel_cron
RUN chmod 0644 /etc/cron.d/laravel_cron && crontab /etc/cron.d/laravel_cron

# Ensure cron logs are shown
RUN touch /var/log/cron.log

# Copy application files
COPY . .

# Re-dump autoloader
RUN composer dump-autoload --optimize

# Create necessary directories and set permissions
RUN mkdir -p /var/www/html/storage/logs \
    && mkdir -p /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Copy supervisor configuration
COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy the custom entrypoint script
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expose port 9000
EXPOSE 9000

# Use the entrypoint script
ENTRYPOINT ["/entrypoint.sh"]