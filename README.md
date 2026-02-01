<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Sistema de Autenticación y Registro de Usuarios

Aplicación web para registro e inicio de sesión de usuarios con roles (administrador y usuario) construida con Laravel 12.

## Requisitos

- PHP 8.2 o superior
- Composer
- Node.js y npm
- MySQL o cualquier base de datos compatible con Laravel

## Características

✅ **Registro de Usuarios**: Formulario completo con campos usuario, nombre, apellidos y email
✅ **Contraseñas Encriptadas**: Las contraseñas se almacenan de forma segura con Hash
✅ **Sistema de Roles**: Dos tipos de usuarios (Administrador y Usuario)
✅ **Panel de Administrador**: Vista de lista completa de todos los usuarios registrados
✅ **Panel de Usuario**: Vista de información personal del usuario
✅ **Autenticación Segura**: Sesiones seguras con Laravel

## Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/login-registro.git
cd login-registro
```

### 2. Instalar dependencias

```bash
composer install
npm install
```

### 3. Configurar variables de entorno

```bash
cp .env.example .env
php artisan key:generate
```

Editar el archivo `.env` y configurar la base de datos:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=login_registro
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Crear la base de datos

```bash
mysql -u root -p
CREATE DATABASE login_registro;
EXIT;
```

### 5. Ejecutar migraciones y seeds

```bash
php artisan migrate
php artisan db:seed
```

### 6. Compilar assets

```bash
npm run build
```

### 7. Iniciar el servidor

```bash
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`

## Usuarios de Prueba

Después de ejecutar los seeds, puede usar los siguientes usuarios de prueba:

### Administrador
- **Usuario**: admin
- **Email**: admin@ejemplo.com
- **Contraseña**: admin123

### Usuario Estándar
- **Usuario**: usuario
- **Email**: usuario@ejemplo.com
- **Contraseña**: usuario123

## Estructura de Base de Datos

### Tabla Users (tabla estándar de Laravel con extensiones)

```sql
CREATE TABLE users (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE NOT NULL,
    name VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    remember_token VARCHAR(100),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

## Funcionalidades

### Para Administradores

1. **Iniciar Sesión**: Acceder con credenciales de administrador
2. **Ver Lista de Usuarios**: Panel que muestra:
   - Usuario
   - Nombre
   - Apellidos
   - Email
   - Rol (Admin o Usuario)

### Para Usuarios Estándar

1. **Registrarse**: Crear nueva cuenta completando el formulario
2. **Iniciar Sesión**: Acceder con sus credenciales
3. **Ver Perfil**: Información personal (Usuario, Nombre, Apellidos, Email)

## Estructura del Proyecto

```
.
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   └── DashboardController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       └── User.php
├── database/
│   ├── migrations/
│   │   └── 0001_01_01_000000_create_users_table.php
│   └── seeders/
│       ├── AdminUserSeeder.php
│       └── DatabaseSeeder.php
├── resources/
│   ├── views/
│   │   ├── auth/
│   │   │   ├── login.blade.php
│   │   │   └── register.blade.php
│   │   ├── dashboard/
│   │   │   ├── admin.blade.php
│   │   │   └── user.blade.php
│   │   ├── layouts/
│   │   │   └── app.blade.php
│   │   └── welcome.blade.php
│   └── css/
│       └── app.css
├── routes/
│   └── web.php
└── composer.json
```

## Rutas Disponibles

- `GET /` - Página de inicio
- `GET /register` - Formulario de registro
- `POST /register` - Procesar registro
- `GET /login` - Formulario de inicio de sesión
- `POST /login` - Procesar inicio de sesión
- `GET /dashboard` - Panel de control (requiere autenticación)
- `POST /logout` - Cerrar sesión

## Seguridad

- Las contraseñas se encriptan usando el algoritmo Bcrypt de Laravel
- Las sesiones se gestionan de forma segura
- Los formularios están protegidos contra CSRF
- Las contraseñas se validan (mínimo 8 caracteres)

## Tecnologías Utilizadas

- **Framework**: Laravel 12
- **Base de Datos**: MySQL
- **Autenticación**: Laravel Auth
- **Frontend**: Blade Template Engine
- **Estilos**: CSS personalizado

## Contribuciones

Las contribuciones son bienvenidas. Por favor:

1. Fork el proyecto
2. Crear una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## Licencia

Este proyecto está bajo la licencia MIT.

## Autor

Sistema de Autenticación - 2026

## Soporte

Para reportar problemas o sugerencias, por favor crea un Issue en el repositorio de GitHub. Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
