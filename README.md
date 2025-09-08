# 🚀 Proyecto Laravel 12 con Docker (Desarrollo Local)

Este proyecto está configurado para ejecutarse en **contenedores Docker** con:

- PHP 8.2 + Apache
- Composer 2
- Node.js 20 + npm + yarn
- MySQL 8
- Adminer (cliente web para base de datos)

---

## 📦 Requisitos previos

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) (Windows/Mac/Linux)
- [Docker Compose](https://docs.docker.com/compose/)

---

## ⚙️ Configuración inicial

1. **Clonar el repositorio**

    ```bash
        git clone https://github.com/claudito/app-fe
        cd tu-repo
    ```

2. **Configurar variables de entorno**

    ```bash
        cp .env.example .env
    ```

    - Verifica que en .env tengas los valores correctos para la base de datos (el host debe ser db):
    ```bash
        DB_CONNECTION=mysql
        DB_HOST=db
        DB_PORT=3306
        DB_DATABASE=app_fe
        DB_USERNAME=user_fe
        DB_PASSWORD=12345678
    ```

3. **Construir y levantar los contenedores**

    ```bash
        docker compose up
    ```

    Esto creará los servicios:
     - app → Contenedor Laravel + Apache : http://localhost:8080
     - db → Contenedor MySQL 8
     - adminer → Cliente web para la base de datos : http://localhost:8081

4. **Acceder a la base de datos**
    - URL: http://localhost:8081
    - Servidor: db
    - Usuario: user_fe
    - Password: 12345678
    - Base de datos: app_fe
  
5.  **Ejecutar Migraciones**
   Acceder Contenedor:
    ```bash
        docker exec -it laravel12_app bash
    ```

    Instalar Composer:
    ```bash
        composer install
    ```

    Ejecutar Migraciones:
    ```bash
        php artisan migrate
    ```

    Instalar Node y Npm:
    ```bash
        npm install
    ```

    Prod:
    ```bash
        npm run build
    ```

    Dev:
    ```bash
        npm run build
    ```

6.  **Detener Contenedor**
    ```bash
       docker compose down
    ```