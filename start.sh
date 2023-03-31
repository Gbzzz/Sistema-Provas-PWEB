#!/bin/bash
#Ajuste de permissões
usermod -a -G www-data application
find /app -type f -exec chmod 644 '{}' \;
find /app -type d -exec chmod 755 '{}' \;
chgrp -R www-data storage bootstrap/cache && chmod -R ug+rwx storage bootstrap/cache

#instalar dependências da aplicação via composer
cd /app && composer install --no-interaction --optimize-autoloader --no-dev && \
#gerar variável app key
php artisan key:generate && \
# Optimizing Route loading
php artisan route:cache && \
# Optimizing View loading
php artisan view:cache && \
#atualização da base de dados
php artisan migrate --force