FROM php:8.1-fpm-alpine

RUN apk update && apk add --no-cache \
    nginx \
    curl \
    supervisor


RUN docker-php-ext-install pdo pdo_mysql

COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/http.d/default.conf
COPY supervisor.conf /etc/supervisor/conf.d/supervisord.conf
COPY www-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf

WORKDIR /var/www

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN composer install --ignore-platform-req=ext-http


EXPOSE 8100

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
