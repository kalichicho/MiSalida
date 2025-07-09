# MiSalida

Este repositorio es una prueba para experimentar con Git. El objetivo es tener un README basico en espanol.

## Contenido

- `README.md`: Este archivo.

## Uso

Clona el repositorio y revisa el contenido para hacer pruebas.


## Estructura de la web

El proyecto ahora incluye una aplicación basada en Laravel dentro de la carpeta `laravel_app`. Allí encontrarás un ejemplo sencillo de MVC con autenticación básica y un CRUD de anuncios.

Para preparar el entorno:

```bash
cd laravel_app
composer install
cp .env.example .env
php artisan key:generate
```

Configura en `.env` los datos de conexión a MySQL (puedes usar phpMyAdmin de XAMPP). Luego ejecuta las migraciones:

```bash
php artisan migrate
```

Finalmente levanta el servidor de desarrollo:

```bash
php -S localhost:8000 -t public
```

La carpeta `web` conserva un ejemplo previo con Next.js por si se quiere consultar.


