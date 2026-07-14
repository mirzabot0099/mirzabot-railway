FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    default-mysql-server \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mysqli

COPY . /app/
WORKDIR /app

CMD service mysql start && php -S 0.0.0.0:8080 -t /app
