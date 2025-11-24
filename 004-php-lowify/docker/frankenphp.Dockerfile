FROM dunglas/frankenphp:php8.3

RUN set -eux; \
    install-php-extensions \
    pdo_mysql \
    ;