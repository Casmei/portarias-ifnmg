# Base Image
FROM wyveo/nginx-php-fpm:php81 as php

# Install System Environment Reqs
RUN apt-get update \
    && apt install -y curl \
    && apt install -y --no-install-recommends php-pgsql php-mbstring php-xml php-bcmath php-curl php-zip php-cli \
    && apt install -y unzip \
    && apt-get clean; rm -rf /var/lib/apt/lists/*
# Install Composer
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php \
    && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Enable PHP Base Extensions
RUN echo "extension=pdo_pgsql" >> /etc/php/php.ini \
    && echo "extension=gettext" >> /etc/php/php.ini \
    && echo "extension=mbstring" >> /etc/php/php.ini

WORKDIR /usr/share/nginx

COPY . ./

RUN composer update \
    && php artisan key:generate
