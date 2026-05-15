FROM php:8.3-cli

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev

RUN docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --ignore-platform-reqs

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD php artisan optimize:clear && php artisan serve --host=0.0.0.0 --port=$PORT