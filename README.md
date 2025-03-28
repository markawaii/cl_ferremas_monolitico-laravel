# cl_ferremas_monolitico-laravel
 
Levantar el proyecto

copiar el .env.example y luego cambiar el nombre de la a .env
docker compose up -d
docker exec -it ferremas_app /bin/bash
composer install
php artisan migrate:fresh --seed
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear
