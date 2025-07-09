# MiSalida Nuevo

Este repositorio ahora parte desde cero con un ejemplo muy básico en PHP usando Tailwind CSS.

## Estructura

- `public/index.php`: Página de inicio con Tailwind desde CDN.

## Requisitos

- PHP 8 o superior.
- (Opcional) Node.js si se desea compilar Tailwind localmente.
- Una base de datos MySQL.

## Preparación

1. Crea una base de datos llamada `mi_salida_db` en tu servidor MySQL.
2. Clona el repositorio y coloca los archivos dentro de tu servidor local.
3. Ejecuta el servidor incorporado de PHP:

```bash
php -S localhost:8000 -t public
```

Esto levantará la aplicación en [http://localhost:8000](http://localhost:8000).

## Compilación opcional de Tailwind

Si deseas personalizar Tailwind, instala las dependencias y compila el CSS:

```bash
npm install tailwindcss
npx tailwindcss -i ./src/input.css -o ./public/css/styles.css --watch
```

Luego enlaza `public/css/styles.css` en `index.php` en lugar del CDN.
