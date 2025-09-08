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

    #Verifica que en .env tengas los valores correctos para la base de datos (el host debe ser db):
    ```bash
        DB_CONNECTION=mysql
        DB_HOST=db
        DB_PORT=3306
        DB_DATABASE=app_fe
        DB_USERNAME=user_fe
        DB_PASSWORD=12345678
    ```