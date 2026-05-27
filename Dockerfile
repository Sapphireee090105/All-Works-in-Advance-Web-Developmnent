FROM php:8.2-apache

# 1. I-install ang mga kailangang system tools at PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    unzip \
    zip \
    git \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl mysqli \
    && docker-php-ext-enable intl mysqli

# 2. I-download at i-install si Composer sa loob ng server
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 3. Ituro ang Apache root sa public folder
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 4. Kopyahin ang project files at patakbuhin ang composer install
WORKDIR /var/www/html
COPY . /var/www/html/
RUN composer install --no-dev --prefer-dist --optimize-autoloader

# 5. I-activate ang rewrite module ng Apache para sa CodeIgniter routing
RUN a2enmod rewrite

# 6. I-force ang permissions para sa writable at cache folder
RUN mkdir -p /var/www/html/writable/cache \
    && chmod -R 777 /var/www/html/writable \
    && chown -R www-data:www-data /var/www/html/writable