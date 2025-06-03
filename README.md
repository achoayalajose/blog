# Proyecto del curso DEL CODIGO AL SISTEMA

Este es un proyecto Laravel. Sigue los siguientes pasos para instalar y ejecutar la aplicación en tu entorno local.

## 🚀 Requisitos

- PHP >= 8.1
- Composer
- Git

## 📦 Instalación

1. Clona el repositorio:

```bash
git clone git@github.com:achoayalajose/blog.git
cd blog
```

2. Ejecutar:

```bash
composer install
```

3. Copia el archivo de variables de entorno y genera la clave de la app:
```bash
cp .env.example .env
php artisan key:generate
```

4. Remplazar con los valores de tu base de datos las siguientes variables del .env
```bash
DB_DATABASE=DATABASE_NAME
DB_USERNAME=DATABASE_USER
DB_PASSWORD=DATABASE_PASSWORD
```

5. Ejecuta Servidor Local
```bash
php artisan serve
```