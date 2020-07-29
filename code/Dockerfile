FROM php:7.2-fpm
#FROM php:7.2-fpm-alpine

#RUN docker-php-ext-install pdo pdo_postgres

RUN apt update && apt install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql


COPY . /app/

WORKDIR /app/public/
ENTRYPOINT ["php", "-S" , "0.0.0.0:8080"]