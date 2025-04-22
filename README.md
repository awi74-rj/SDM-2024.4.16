# SDM-2024.4.16
Prueba Técnica

My CRUD

My CRUD es una aplicación web desarrollada con Laravel para gestionar empleados. Permite realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) sobre una base de datos de empleados, con autenticación de usuarios y una interfaz sencilla.
Características

Autenticación de usuarios con Laravel UI y Bootstrap.
Gestión de empleados (crear, editar, eliminar, listar).
Mensajes de éxito después de cada operación.
Paginación de registros.
Interfaz responsive con Bootstrap.

Requisitos

PHP >= 8.2
Laravel >= 12.8
Composer
Node.js y npm (para compilar assets)
MySQL o cualquier base de datos compatible con Laravel

Instalación

Clonar el repositorio:
git clone 
cd my-crud


Instalar dependencias de PHP:
composer install


Instalar dependencias de JavaScript/CSS:
npm install
npm run dev


Configurar el archivo .env:

Copia el archivo .env.example a .env:cp .env.example .env


Configura las credenciales de tu base de datos en .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistemaEmpleados
DB_USERNAME=root
DB_PASSWORD=


Genera una clave de aplicación:php artisan key:generate




Ejecutar migraciones:
php artisan migrate


Iniciar el servidor:
php artisan serve

Accede a la aplicación en http://localhost:8000.


Uso

Regístrate o inicia sesión en la aplicación.
Usa el botón "Registrar nuevo empleado" para agregar empleados.
Visualiza la lista de empleados, edita o elimina registros según necesites.
Los mensajes de éxito aparecerán después de cada operación.

Estructura del Proyecto

app/Models/Empleado.php: Modelo para la tabla de empleados.
app/Http/Controllers/EmpleadoController.php: Controlador para manejar las operaciones CRUD.
resources/views/empleados/: Vistas para la gestión de empleados.
resources/views/layouts/app.blade.php: Layout principal de la aplicación.
public/manifest.json: Archivo de manifiesto para PWA.

Contribución

Haz un fork del repositorio.
Crea una rama para tu funcionalidad (git checkout -b feature/nueva-funcionalidad).
Realiza tus cambios y haz commit (git commit -m "Agrega nueva funcionalidad").
Sube tus cambios (git push origin feature/nueva-funcionalidad).
Crea un Pull Request.


Login: awitarj9@gmail.com
psw: awita2021
