FROM dunglas/frankenphp

ENV SERVER_NAME=:80

RUN install-php-extensions \
    pdo_pgsql \
    gd \
    intl \
    zip \
    opcache

COPY . /app
