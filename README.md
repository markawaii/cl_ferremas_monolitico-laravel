# README

## ¿Qué es este repositorio?

Este repositorio es un proyecto diseñado para obtener conocimientos. En particular, se centra en el desarrollo de una aplicación utilizando el framework PHP Laravel y contenedores Docker.

## Estructura de los directorios

El repositorio contiene los siguientes directorios:

- docker: Este directorio contiene los archivos necesarios para ejecutar el proyecto en contenedores Docker.
- laravel: Este directorio contiene el código fuente de la aplicación Laravel.



## Extensiones recomendadas

- 1 [Auto Close Tag](https://marketplace.visualstudio.com/items?itemName=formulahendry.auto-close-tag)
- 2 [Beautify css/sass/scss/less](https://marketplace.visualstudio.com/items?itemName=michelemelluso.code-beautifier)
- 3 [Bracket Pair Color DLW](https://marketplace.visualstudio.com/items?itemName=BracketPairColorDLW.bracket-pair-color-dlw)
- 4 [Docker](https://marketplace.visualstudio.com/items?itemName=ms-azuretools.vscode-docker)
- 5 [GitLens — Git supercharged](https://marketplace.visualstudio.com/items?itemName=eamodio.gitlens)
- 6 [JavaScript (ES6) code snippets](https://marketplace.visualstudio.com/items?itemName=xabikos.JavaScriptSnippets)
- 7 [Laravel Blade formatter](https://marketplace.visualstudio.com/items?itemName=shufo.vscode-blade-formatter)
- 8 [Laravel Blade Snippets](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-blade)
- 9 [Laravel Blade Spacer](https://marketplace.visualstudio.com/items?itemName=austenc.laravel-blade-spacer)
- 10 [Laravel Snippets](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel5-snippets)
- 11 [Material Icon Theme](https://marketplace.visualstudio.com/items?itemName=PKief.material-icon-theme)
- 12 [PHP Debug](https://marketplace.visualstudio.com/items?itemName=xdebug.php-debug)
- 13 [PHP IntelliSense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)
- 14 [PHP Namespace Resolver](https://marketplace.visualstudio.com/items?itemName=MehediDracula.php-namespace-resolver)
- 15 [Prettier - Code formatter](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)
- 16 [Dev Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers)
- 17 [Panda Dark II](https://marketplace.visualstudio.com/items?itemName=PandaDigitalLLC.panda-dark-ii)
- 18 [vs-docblock](https://marketplace.visualstudio.com/items?itemName=jeremyljackson.vs-docblock)
- 19 [EditorConfig](https://marketplace.visualstudio.com/items?itemName=EditorConfig.EditorConfig)


## Cómo ejecutar este proyecto

- 1 Descargue el proyecto de GitHub.
- 2 Asegúrese de tener instalado Docker
- 3 Abra una terminal y navegue hasta la carpeta del proyecto.
- 4 Copiar los archivos .env example `.env.example`
- 5 Ejecute el comando `docker-compose up -d` Esto levantará los contenedores necesarios para ejecutar el proyecto.
- 6 Ejecute el comando `docker exec -it ferremas_app /bin/bash`.
- 7 Dentro del contenedor, ejecute el comando `composer install`.
- 8 Dentro del contenedor, ejecute el comando `php artisan migrate:fresh --seed`.
- 9 Dentro del contenedor, ejecute el comando `php artisan optimize`. 
- 10 Si no ha cambiado la dirección, utilice la siguiente URL para visualizar el proyecto: `http://localhost`.
- 1 Una vez que se hayan completado estos pasos, la aplicación Laravel debería estar lista para su uso.



php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear


#NOTA
php artisan make:model -> Se crea el modelo indicando el nombre del mismo, se usó el de "Productos", pero si se le agrega -m al mismo comando, creará el modelo y a su vez la migración del mismo modelo.



