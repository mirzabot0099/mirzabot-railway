#!/bin/bash

service mysql start

DB_PASS=${DB_PASSWORD:-"default_pass"}
mysql -e "CREATE DATABASE IF NOT EXISTS mirzabot;"
mysql -e "CREATE USER IF NOT EXISTS 'mirza'@'localhost' IDENTIFIED BY '$DB_PASS';"
mysql -e "GRANT ALL PRIVILEGES ON mirzabot.* TO 'mirza'@'localhost';"
mysql -e "FLUSH PRIVILEGES;"

if [ -f /var/www/html/database.sql ]; then
    mysql -u mirza -p$DB_PASS mirzabot < /var/www/html/database.sql
fi

apache2-foreground