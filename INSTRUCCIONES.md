# Instrucciones de Ejecución del Proyecto

## Requisitos Previos

- **XAMPP** (con Apache y MySQL)
- **PHP 8.2+** 
- **Composer** instalado globalmente
- **Node.js y npm** instalados

## Pasos para Ejecutar el Proyecto

### 1. Iniciar XAMPP

1. Abre XAMPP Control Panel
2. Inicia **Apache**
3. Inicia **MySQL**

Verifica que ambos servicios muestren estado "Running"

### 2. Navegar al Directorio del Proyecto

Abre PowerShell o CMD y ejecuta:

```powershell
cd c:\xampp\htdocs\login-registro
```

### 3. Instalar Dependencias de PHP

```powershell
composer install
```

### 4. Instalar Dependencias de JavaScript

```powershell
npm install
```

### 5. Configurar el Archivo .env

Copia el archivo de ejemplo:

```powershell
copy .env.example .env
```

O si usas cmd:

```cmd
copy .env.example .env
```

Edita el archivo `.env` con un editor de texto y asegúrate de que:

```
APP_NAME="Login Registro"
APP_ENV=local
APP_KEY=base64:... (será generado)
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=login_registro
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Generar la Clave de Aplicación

```powershell
php artisan key:generate
```

Esto autorellenará `APP_KEY` en tu `.env`

### 7. Crear la Base de Datos

**Opción A: Usando MySQL en XAMPP**

1. Abre phpMyAdmin: http://localhost/phpmyadmin
2. Haz clic en "Bases de datos"
3. Crea una base de datos llamada `login_registro`
4. Codificación: `utf8mb4_unicode_ci`
5. Haz clic en "Crear"

**Opción B: Usando línea de comandos**

```powershell
mysql -u root -p
CREATE DATABASE login_registro CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

(Si no tienes contraseña para MySQL, solo presiona Enter cuando te pida)

### 8. Ejecutar Migraciones

```powershell
php artisan migrate
```

Verás mensajes como:
```
Migration table created successfully.
Migrating: 0001_01_01_000000_create_users_table
Migrated: 0001_01_01_000000_create_users_table
...
```

### 9. Ejecutar Seeds (Crear Usuarios de Prueba)

```powershell
php artisan db:seed
```

Esto creará dos usuarios:
- **Admin**: admin / admin@ejemplo.com / contraseña: admin123
- **Usuario**: usuario / usuario@ejemplo.com / contraseña: usuario123

### 10. Compilar Assets (CSS y JavaScript)

```powershell
npm run build
```

O para desarrollo con hot reload:

```powershell
npm run dev
```

### 11. Iniciar el Servidor de Laravel

En una nueva ventana de PowerShell/CMD, ejecuta:

```powershell
php artisan serve
```

Deberías ver algo como:

```
   INFO  Server running on [http://127.0.0.1:8000].

  Press Ctrl+C to stop the server
```

### 12. Acceder a la Aplicación

Abre tu navegador y ve a:

```
http://localhost:8000
```

¡La aplicación debería estar funcionando!

## Usuarios de Prueba Disponibles

Después de ejecutar los seeds, puedes iniciar sesión con:

### Administrador
- **URL**: http://localhost:8000/login
- **Email**: admin@ejemplo.com
- **Contraseña**: admin123

Al iniciar sesión verás la lista completa de usuarios en el panel de admin.

### Usuario Estándar
- **URL**: http://localhost:8000/login
- **Email**: usuario@ejemplo.com
- **Contraseña**: usuario123

Al iniciar sesión verás solo tu información personal.

### Registrar un Nuevo Usuario
- **URL**: http://localhost:8000/register
- Completa el formulario con tus datos
- La nueva cuenta será de tipo "Usuario" (no Admin)

## Estructura de Carpetas

```
login-registro/
├── app/                    # Código de la aplicación
│   ├── Http/Controllers/   # Controladores
│   └── Models/             # Modelos Eloquent
├── database/
│   ├── migrations/         # Migraciones de BD
│   └── seeders/            # Seeds de datos
├── resources/
│   ├── views/              # Templates Blade
│   └── css/                # Estilos CSS
├── routes/
│   └── web.php             # Rutas de la aplicación
├── public/                 # Archivos públicos
├── storage/                # Almacenamiento temporal
├── .env                    # Variables de entorno
├── composer.json           # Dependencias PHP
└── package.json            # Dependencias Node
```

## Comandos Útiles

### Limpiar la Base de Datos

Si necesitas empezar desde cero:

```powershell
php artisan migrate:fresh --seed
```

Esto eliminará todas las tablas y volverá a ejecutar las migraciones y seeds.

### Ver Todas las Rutas

```powershell
php artisan route:list
```

### Acceder a la Consola de Artisan

```powershell
php artisan tinker
```

Esto abre una consola PHP interactiva donde puedes ejecutar comandos Laravel.

### Ver Logs de la Aplicación

```powershell
tail -f storage/logs/laravel.log
```

O en PowerShell:

```powershell
Get-Content storage/logs/laravel.log -Tail 10 -Wait
```

## Solucionar Problemas Comunes

### Error: "SQLSTATE[HY000] [1045] Access denied"

**Causa**: Contraseña de MySQL incorrecta en `.env`

**Solución**: Verifica que DB_PASSWORD esté vacío (o correcta si estableciste contraseña)

### Error: "Class 'PDO' not found"

**Causa**: Extensión PDO no habilitada

**Solución**: 
1. Edita `C:\xampp\php\php.ini`
2. Busca `;extension=pdo_mysql`
3. Quita el `;` del inicio
4. Reinicia Apache y MySQL en XAMPP

### Error: "The requested URL /login was not found"

**Causa**: URL rewrite no habilitada

**Solución**: El archivo `.htaccess` debe estar en la carpeta `public/`
- Verifica que Apache tiene el módulo `mod_rewrite` habilitado
- Reinicia Apache desde XAMPP

### Error: "No application encryption key has been defined"

**Solución**: Ejecuta:

```powershell
php artisan key:generate
```

### La base de datos no se crea automáticamente

**Solución**: Debes crear la base de datos manualmente en phpMyAdmin o MySQL antes de ejecutar:

```powershell
php artisan migrate
```

### Assets CSS/JavaScript no se cargan

**Solución**: 
1. Asegúrate de haber ejecutado:
```powershell
npm install
npm run build
```

2. Limpia la caché:
```powershell
php artisan cache:clear
```

## Desarrollo Continuo

Para un mejor flujo de trabajo durante el desarrollo:

**Terminal 1 - Servidor Laravel:**
```powershell
php artisan serve
```

**Terminal 2 - Compilación de Assets:**
```powershell
npm run dev
```

Esto hará que los cambios en CSS/JavaScript se compilen automáticamente.

## Detener la Aplicación

Para detener el servidor de Laravel:

Presiona `Ctrl + C` en la ventana donde ejecutaste `php artisan serve`

Para detener XAMPP:

1. Abre XAMPP Control Panel
2. Haz clic en "Stop" para Apache y MySQL

---

¡Tu aplicación debería estar completamente funcional ahora!

Si encuentras problemas, verifica:
1. ✅ XAMPP está ejecutándose (Apache y MySQL)
2. ✅ PHP versión correcta (8.2+)
3. ✅ Base de datos creada
4. ✅ Migraciones ejecutadas
5. ✅ Seeds ejecutados
6. ✅ Assets compilados
7. ✅ El servidor Laravel está ejecutándose en http://localhost:8000
