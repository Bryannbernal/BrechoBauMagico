FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    zip \
    libzip-dev \
    libpq-dev \
    npm \
    && docker-php-ext-install pdo_pgsql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install
RUN npm run build

RUN mkdir -p storage/framework/{cache,sessions,views}
RUN chmod -R 777 storage bootstrap/cache

EXPOSE 10000

CMD sh -c "php artisan serve --host=0.0.0.0 --port=$PORT"