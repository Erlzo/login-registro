# Guía de Publicación en GitHub

Esta es una guía paso a paso para publicar el proyecto "Sistema de Autenticación y Registro de Usuarios" en GitHub.

## Pasos para Publicar en GitHub

### 1. Crear una Cuenta en GitHub
Si aún no tienes cuenta, ve a [https://github.com](https://github.com) y crea una cuenta nueva.

### 2. Crear un Nuevo Repositorio en GitHub

1. Inicia sesión en tu cuenta de GitHub
2. Haz clic en el icono "+" en la esquina superior derecha
3. Selecciona "New repository"
4. Dale un nombre al repositorio: `login-registro` (o el que prefieras)
5. Añade una descripción: "Sistema de autenticación y registro de usuarios con roles en Laravel"
6. Elige "Public" o "Private" (según prefieras)
7. NO inicialices el repositorio con README, .gitignore o licencia (ya tenemos estos archivos)
8. Haz clic en "Create repository"

### 3. Configurar Git Localmente

Abre PowerShell o cmd en la carpeta del proyecto y ejecuta:

```powershell
cd c:\xampp\htdocs\login-registro
```

Configura tu usuario de Git (si no lo has hecho):

```powershell
git config --global user.email "tu-email@gmail.com"
git config --global user.name "Tu Nombre"
```

### 4. Conectar el Repositorio Local con GitHub

Reemplaza `tu-usuario` con tu nombre de usuario en GitHub:

```powershell
git remote add origin https://github.com/tu-usuario/login-registro.git
git branch -M main
git push -u origin main
```

### 5. Verificar que Todo Funcionó

Ve a tu repositorio en GitHub (https://github.com/tu-usuario/login-registro) y verifica que los archivos aparezcan correctamente.

## Alternativa: Usando SSH (Más Seguro)

Si prefieres usar SSH en lugar de HTTPS:

### 1. Generar Clave SSH

```powershell
ssh-keygen -t ed25519 -C "tu-email@gmail.com"
```

Presiona Enter para aceptar la ubicación predeterminada y proporciona una contraseña (opcional).

### 2. Añadir la Clave SSH a GitHub

1. Copia tu clave pública:

```powershell
Get-Content "$env:USERPROFILE\.ssh\id_ed25519.pub" | Set-Clipboard
```

2. Ve a GitHub → Settings → SSH and GPG keys
3. Haz clic en "New SSH key"
4. Pega tu clave y dale un título
5. Haz clic en "Add SSH key"

### 3. Conectar el Repositorio con SSH

```powershell
git remote add origin git@github.com:tu-usuario/login-registro.git
git branch -M main
git push -u origin main
```

## Después de Publicar

### Actualizar el Repositorio

Cada vez que hagas cambios, puedes actualizar GitHub con:

```powershell
git add .
git commit -m "Descripción de los cambios"
git push
```

### Ejemplos de Commits

```powershell
# Añadir nueva funcionalidad
git commit -m "feat: Agregar funcionalidad de recuperación de contraseña"

# Corregir errores
git commit -m "fix: Corregir validación de email"

# Actualizar documentación
git commit -m "docs: Actualizar README con instrucciones de instalación"

# Mejorar código
git commit -m "refactor: Optimizar consultas de base de datos"
```

## Configuraciones Recomendadas en GitHub

### 1. Proteger la Rama Main

1. Ve a Settings → Branches
2. Haz clic en "Add rule"
3. Selecciona "main"
4. Habilita "Require pull request reviews before merging"

### 2. Añadir GitHub Actions para CI/CD

Crea un archivo `.github/workflows/tests.yml`:

```yaml
name: Tests

on: [push, pull_request]

jobs:
  test:
    runs-on: ubuntu-latest

    steps:
      - uses: actions/checkout@v3
      
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
          extensions: mbstring, ext-json
      
      - name: Install dependencies
        run: composer install
      
      - name: Create .env file
        run: cp .env.example .env
      
      - name: Generate app key
        run: php artisan key:generate
      
      - name: Run tests
        run: php artisan test
```

### 3. Añadir Información del Repositorio

Edita el archivo `README.md` y actualiza la sección de instalación con el nombre real del repositorio:

```markdown
## Instalación

### Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/login-registro.git
cd login-registro
```
```

## Solucionar Problemas Comunes

### Error: "fatal: remote origin already exists"

```powershell
git remote remove origin
git remote add origin https://github.com/tu-usuario/login-registro.git
```

### Error de Autenticación

Si usas HTTPS:

```powershell
git remote set-url origin https://github.com/tu-usuario/login-registro.git
```

Luego Git pedirá tu contraseña o token de acceso personal de GitHub.

### Credenciales de Git

Para guardar tus credenciales:

```powershell
git config --global credential.helper wincred
```

## Obtener el URL del Repositorio

Una vez publicado, tu URL será:

**HTTPS**: `https://github.com/tu-usuario/login-registro.git`
**SSH**: `git@github.com:tu-usuario/login-registro.git`

## Próximos Pasos

1. Comparte el URL con tu equipo o profesor
2. Mantén el repositorio actualizado con tus cambios
3. Considera añadir issues y pull requests para seguimiento de tareas
4. Documenta cualquier cambio importante en el README
5. Utiliza releases para marcar versiones importantes

---

¡Tu repositorio está listo para ser compartido!
