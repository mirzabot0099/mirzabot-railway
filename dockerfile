FROM php:8.2

RUN apt-get update && apt-get install -y \
    default-mysql-server \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mysqli

COPY . /var/www/html/

COPY start.sh /start.sh
RUN chmod +x /start.sh

WORKDIR /var/www/html

CMD ["/start.sh"]
