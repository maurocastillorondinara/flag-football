# 🏈 Liga de Flag Football MDP

Sitio web oficial de la **Liga de Football Flag de Mar del Plata**. Aplicación multi-page construida con Laravel 12, Blade templates y Vite.

---

## 📋 Descripción del Proyecto

Este proyecto es el sitio web de la liga de flag football de Mar del Plata, Argentina. Actualmente funciona como un sitio informativo con páginas para mostrar información de la liga, los equipos participantes y medios de contacto. Está diseñado para escalar hacia una plataforma con base de datos para gestionar estadísticas, temporadas, fixtures y jugadores.

### Páginas Actuales

| Ruta | Descripción |
|------|-------------|
| `/` | **Home** — Hero con CTA, resumen de la liga y galería de equipos |
| `/la-liga` | **La Liga** — Información detallada sobre la liga y sus características |
| `/equipos` | **Equipos** — Galería visual de todos los equipos con sus logos y colores |

---

## 🛠️ Stack Tecnológico

| Tecnología | Versión | Uso |
|---|---|---|
| **PHP** | 8.3+ | Lenguaje del backend |
| **Laravel** | 12.x | Framework MVC |
| **Blade** | (incluido en Laravel) | Motor de templates |
| **Vite** | 7.x | Bundler de assets (CSS/JS) |
| **SQLite** | (incluido) | Base de datos (desarrollo) |
| **Composer** | 2.x | Gestor de dependencias PHP |
| **NPM** | 10.x | Gestor de dependencias frontend |

### Patrones de Diseño

- **MVC** — Routes → Controllers → Views
- **IoC / Dependency Injection** — Los servicios (`TeamService`, `LeagueService`) se inyectan automáticamente en los controllers via el Service Container de Laravel
- **Service Layer** — La lógica de negocio vive en `app/Services/`, separada de los controllers
- **PHP moderno** — `declare(strict_types)`, `final readonly` classes, typed returns, PHPDoc array shapes

---

## 📁 Estructura del Proyecto

```
flag-football/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Controller.php          # Controller base abstracto
│   │       └── PageController.php      # Controller de las páginas públicas
│   └── Services/
│       ├── TeamService.php             # Datos de equipos (futuro: Eloquent)
│       └── LeagueService.php           # Datos de la liga
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php           # Layout principal (header + footer + Vite)
│   │   ├── components/
│   │   │   ├── header.blade.php        # Navegación con active state
│   │   │   └── footer.blade.php        # Footer con links y redes sociales
│   │   └── pages/
│   │       ├── home.blade.php          # Página de inicio
│   │       ├── equipos.blade.php       # Página de equipos
│   │       └── la-liga.blade.php       # Página sobre la liga
│   ├── css/
│   │   └── app.css                     # Todo el CSS (variables, componentes, responsive)
│   └── js/
│       └── app.js                      # Vanilla JS (scroll header, hamburger menu)
├── public/
│   └── images/                         # Logos de equipos y fotos
├── routes/
│   └── web.php                         # Definición de rutas
├── database/
│   └── database.sqlite                 # Base de datos SQLite
├── vite.config.js                      # Configuración de Vite para Laravel
├── composer.json                       # Dependencias PHP
└── package.json                        # Dependencias frontend
```

---

## 🚀 Instalación y Setup Local

### Requisitos Previos

- **PHP 8.3+** con las extensiones: `xml`, `curl`, `mbstring`, `zip`, `sqlite3`
- **Composer** 2.x
- **Node.js** 18+ y **NPM** 10+

### Paso a Paso

```bash
# 1. Clonar el repositorio
git clone https://github.com/tu-usuario/flag-football.git
cd flag-football

# 2. Instalar dependencias PHP
composer install

# 3. Copiar el archivo de entorno y generar la key de la app
cp .env.example .env
php artisan key:generate

# 4. Crear la base de datos SQLite
touch database/database.sqlite
php artisan migrate

# 5. Instalar dependencias frontend
npm install
```

### Ejecutar en Desarrollo

Necesitás **dos terminales** corriendo simultáneamente:

```bash
# Terminal 1 — Servidor PHP
php artisan serve

# Terminal 2 — Vite (hot reload de CSS/JS)
npm run dev
```

Abrir **http://localhost:8000** en el navegador.

### Build de Producción

```bash
# Compilar assets para producción
npm run build

# Los archivos compilados se generan en public/build/
```

---

## 🌐 Deploy (Producción)

### Opción 1: Shared Hosting (cPanel, Hostinger, etc.)

1. Subir todos los archivos al servidor
2. Apuntar el dominio al directorio `public/`
3. Configurar `.env` con los datos de producción:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://tu-dominio.com
   ```
4. Ejecutar `npm run build` antes de subir
5. Ejecutar `php artisan migrate` en el servidor

### Opción 2: Railway / Render (PaaS)

1. Conectar el repositorio de GitHub
2. Configurar el build command: `composer install --no-dev && npm install && npm run build && php artisan migrate --force`
3. Configurar variables de entorno en el dashboard
4. El deploy es automático con cada push a `main`

### Opción 3: VPS (DigitalOcean, Linode, etc.)

1. Instalar PHP 8.3+, Composer, Nginx/Apache, Node.js
2. Clonar el repo y seguir los pasos de instalación
3. Configurar Nginx para apuntar al directorio `public/`
4. Usar un process manager como Supervisor si se necesita
5. Configurar SSL con Let's Encrypt

---

## 📝 Cómo Agregar una Nueva Página

1. **Agregar método** en `app/Http/Controllers/PageController.php`
2. **Agregar ruta** en `routes/web.php`
3. **Crear vista** en `resources/views/pages/nueva-pagina.blade.php`
4. **Agregar link** en `resources/views/components/header.blade.php`

Ejemplo para agregar una página de "Reglamento":

```php
// routes/web.php
Route::get('/reglamento', [PageController::class, 'reglamento'])->name('reglamento');

// app/Http/Controllers/PageController.php
public function reglamento(): View
{
    return view('pages.reglamento');
}
```

```html
<!-- resources/views/pages/reglamento.blade.php -->
@extends('layouts.app')
@section('title', 'Reglamento - Liga de Flag Football MDP')
@section('content')
    <section class="features" style="padding-top: 10rem;">
        <div class="container">
            <h2 class="section-title">Reglamento</h2>
            <!-- Tu contenido aquí -->
        </div>
    </section>
@endsection
```

---

## 🔮 Roadmap

- [ ] Base de datos con modelos: `Team`, `Season`, `Player`, `Statistic`
- [ ] Panel de administración para gestionar datos
- [ ] Página individual por equipo con estadísticas
- [ ] Fixture y tabla de posiciones por temporada
- [ ] Sistema de autenticación para administradores

---

## 📄 Licencia

Este proyecto es privado y pertenece a la Liga de Football Flag de Mar del Plata.
