# Guía Completa de Laravel — Para Pipo 🧑‍💻

Esta guía explica en detalle cómo funciona Laravel, la estructura del proyecto, cómo se conecta todo, y cómo hacer modificaciones. Está escrita pensando en **este proyecto específico** para que puedas encontrar exactamente lo que necesitás.

---

## 1. ¿Qué es Laravel?

Laravel es un **framework MVC para PHP**. MVC significa:

- **Model** (Modelo) → Representa los datos (ej: un equipo, un jugador). Habla con la base de datos.
- **View** (Vista) → Lo que ve el usuario. En nuestro caso, archivos `.blade.php`.
- **Controller** (Controlador) → La lógica entre el Model y la View. Recibe requests, busca datos, y devuelve vistas.

### El flujo de una petición HTTP

```
Usuario escribe "localhost:8000/equipos" en el browser
         ↓
    routes/web.php
    (busca qué controller manejar esta URL)
         ↓
    PageController::equipos()
    (el controller le pide los datos al TeamService)
         ↓
    TeamService::getAllTeams()
    (devuelve un array con los equipos)
         ↓
    PageController devuelve view('pages.equipos', ['teams' => $teams])
    (pasa los datos a la vista Blade)
         ↓
    resources/views/pages/equipos.blade.php
    (Blade renderiza el HTML con los datos)
         ↓
    El browser muestra la página al usuario
```

---

## 2. Estructura de Carpetas (Scaffolding)

### Carpetas que vas a tocar seguido

| Carpeta | Qué contiene | Cuándo la tocás |
|---------|-------------|-----------------|
| `routes/web.php` | Las URLs del sitio | Cuando agregás una página nueva |
| `app/Http/Controllers/` | Los controllers | Cuando agregás una página o lógica nueva |
| `app/Services/` | La lógica de negocio | Cuando cambiás datos o agregás funcionalidad |
| `resources/views/` | Las vistas (HTML) | Cuando cambiás cómo se ve algo |
| `resources/css/app.css` | Los estilos | Cuando cambiás el diseño |
| `resources/js/app.js` | JavaScript | Cuando agregás interactividad |
| `public/images/` | Fotos y logos | Cuando agregás imágenes |

### Carpetas que casi nunca tocás

| Carpeta | Qué contiene |
|---------|-------------|
| `vendor/` | Paquetes de Composer (no tocar, se auto-genera) |
| `node_modules/` | Paquetes de NPM (no tocar, se auto-genera) |
| `bootstrap/` | Arranque interno de Laravel |
| `config/` | Configuraciones (solo si necesitás cambiar algo avanzado) |
| `storage/` | Archivos temporales, logs, cache |
| `tests/` | Tests automatizados |
| `database/` | Migraciones y base de datos |

### Archivos de configuración importantes

| Archivo | Qué hace |
|---------|----------|
| `.env` | Variables de entorno (URLs, keys, datos de la BD). **Nunca va a Git.** |
| `composer.json` | Lista de dependencias PHP |
| `package.json` | Lista de dependencias frontend (JS/CSS) |
| `vite.config.js` | Configuración de Vite (qué archivos compilar) |

---

## 3. El Sistema de Rutas

El archivo `routes/web.php` define **todas las URLs** de tu sitio:

```php
// routes/web.php
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/equipos', [PageController::class, 'equipos'])->name('equipos');
Route::get('/la-liga', [PageController::class, 'laLiga'])->name('la-liga');
```

¿Qué dice esto?

- `Route::get('/')` → Cuando alguien visita la raíz (`/`), ejecutar `PageController::home()`
- `->name('home')` → Le pone un nombre a la ruta. En las vistas podés usar `route('home')` en vez de escribir `/` hardcodeado. Si después cambiás la URL de `/` a `/inicio`, solo lo cambiás en `web.php` y el `route('home')` sigue funcionando en todas tus vistas.

### ¿Cómo ver todas las rutas?

```bash
php artisan route:list
```

---

## 4. Los Controllers

```php
// app/Http/Controllers/PageController.php

final class PageController extends Controller
{
    public function __construct(
        private readonly TeamService $teamService,
        private readonly LeagueService $leagueService,
    ) {}

    public function home(): View
    {
        return view('pages.home', [
            'features' => $this->leagueService->getHomeFeatures(),
            'teams' => $this->teamService->getAllTeams(),
        ]);
    }
}
```

### Desglose línea por línea:

1. **`final class`** → Significa que nadie puede heredar de esta clase. Es una best practice: si no necesitás herencia, marcalo como `final`.

2. **`__construct(private readonly TeamService $teamService)`** → Esto es **Dependency Injection (DI)**. Le estás diciendo a Laravel: "cuando crees un `PageController`, inyectale automáticamente un `TeamService`". No necesitás hacer `new TeamService()` manualmente, Laravel lo resuelve solo.

3. **`public function home(): View`** → El tipo de retorno `: View` permite que PHP verifique que siempre devolvés una vista. Si te equivocás y devolvés otra cosa, PHP te avisa.

4. **`return view('pages.home', [...])`** → Renderiza el archivo `resources/views/pages/home.blade.php` y le pasa variables. Los puntos (`.`) se convierten en barras (`/`) para encontrar el archivo.

5. **`'teams' => $this->teamService->getAllTeams()`** → La variable `$teams` va a estar disponible en la vista Blade.

---

## 5. Los Services (Lógica de Negocio)

Los services son clases que contienen la **lógica de negocio**, separada de los controllers. Esto tiene dos ventajas:
- El controller queda limpio (solo coordina)
- Podés reusar la misma lógica en múltiples controllers

```php
// app/Services/TeamService.php

final readonly class TeamService
{
    public function getAllTeams(): array
    {
        return [
            ['name' => 'Nereidas', 'logo' => 'logo-nereidas.png', ...],
            // ...
        ];
    }
}
```

### `final readonly` explicado

- **`final`** → No se puede heredar
- **`readonly`** → Todas las propiedades son inmutables (no se pueden cambiar después de crear el objeto). Esto previene bugs.

### Futuro: Cuando tengas base de datos

Cuando agregues modelos Eloquent, estos services van a cambiar de arrays estáticos a queries:

```php
// ANTES (ahora):
public function getAllTeams(): array
{
    return [ /* array hardcodeado */ ];
}

// DESPUÉS (con BD):
public function getAllTeams(): Collection
{
    return Team::all();
}
```

El controller **no cambia nada**. Solo cambia el service. Esa es la ventaja del patrón.

---

## 6. IoC Container (Inversión de Control)

El **Service Container** de Laravel es el corazón del framework. Funciona así:

1. Vos escribís en el constructor: `__construct(private readonly TeamService $teamService)`
2. Laravel lee el type hint (`TeamService`)
3. Laravel busca si ya tiene una instancia de `TeamService` o sabe cómo crear una
4. Como `TeamService` no necesita parámetros en su constructor, Laravel hace `new TeamService()` automáticamente
5. Te lo inyecta y listo

**No necesitás registrar nada manualmente** si tu servicio no tiene dependencias complejas. Laravel es lo suficientemente inteligente para resolver clases simples automáticamente. Esto se llama **auto-resolution**.

### ¿Cuándo SÍ necesitás registrar un servicio manualmente?

Solo cuando el servicio necesita configuración especial. En ese caso usás un **Service Provider**:

```php
// app/Providers/AppServiceProvider.php
public function register(): void
{
    $this->app->bind(TeamService::class, function () {
        return new TeamService(config('app.teams_api_url'));
    });
}
```

Por ahora **no necesitás** hacer esto, pero sabé que existe.

---

## 7. Las Vistas (Blade Templates)

### Layout principal

El layout (`resources/views/layouts/app.blade.php`) define la estructura base:

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <title>@yield('title', 'Liga de Flag Football MDP')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('components.header')
    <main>
        @yield('content')
    </main>
    @include('components.footer')
</body>
</html>
```

### Directivas clave de Blade

| Directiva | Qué hace | Ejemplo |
|-----------|----------|---------|
| `@extends('layouts.app')` | Dice que esta vista usa el layout base | Al principio de cada página |
| `@section('content')` / `@endsection` | Define el contenido que va dentro del `@yield('content')` del layout | El contenido de cada página |
| `@yield('title', 'default')` | En el layout, marca dónde va el contenido de un `@section`. Si no hay section, usa el default | En el `<title>` |
| `@include('components.header')` | Inserta otro archivo Blade | Para header, footer, etc. |
| `@foreach ($teams as $team)` / `@endforeach` | Loop. Igual que PHP pero más limpio | Iterar sobre datos |
| `{{ $variable }}` | Imprime una variable escapada (segura contra XSS) | Mostrar texto |
| `{!! $html !!}` | Imprime HTML sin escapar (**cuidado**, solo para HTML confiable) | Casi nunca se usa |
| `{{ asset('images/logo.png') }}` | Genera la URL correcta a un archivo en `public/` | Para imágenes y archivos |
| `{{ route('home') }}` | Genera la URL de una ruta nombrada | Para links de navegación |
| `{{ request()->routeIs('home') ? 'active' : '' }}` | Verifica si estamos en una ruta específica | Para marcar el link activo |

### @vite explicado

```html
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

En **desarrollo** (`npm run dev`): genera tags `<script>` que apuntan al servidor de Vite (localhost:5173) para hot reload.

En **producción** (`npm run build`): genera tags que apuntan a los archivos compilados en `public/build/`.

---

## 8. Los Assets (CSS y JS)

### CSS: `resources/css/app.css`

Todo el CSS está en un solo archivo organizado por secciones:

```
1. Variables CSS (colores, fuentes)
2. Reset global
3. Utilidades (container, botones)
4. Section title (compartido)
5. Header
6. Hero (inicio)
7. Features (la liga)
8. Gallery (equipos)
9. Footer
10. Responsive (media queries)
```

**¿Cómo cambiar un color?** Modificá las variables CSS al principio del archivo:

```css
:root {
    --color-primary: #FF6B35;    /* Cambiar este naranja */
    --color-secondary: #0A192F;  /* Cambiar este azul oscuro */
}
```

### JavaScript: `resources/js/app.js`

Solo 2 funcionalidades:
1. **Scroll detection** — Cambia el estilo del header cuando scrolleás
2. **Hamburger menu** — Abre/cierra el menú en mobile

---

## 9. ¿Cómo hago para...?

### Agregar una nueva página

1. **Ruta** en `routes/web.php`:
   ```php
   Route::get('/fixture', [PageController::class, 'fixture'])->name('fixture');
   ```

2. **Método** en `PageController.php`:
   ```php
   public function fixture(): View
   {
       return view('pages.fixture');
   }
   ```

3. **Vista** en `resources/views/pages/fixture.blade.php`:
   ```html
   @extends('layouts.app')
   @section('title', 'Fixture - LFFMDP')
   @section('content')
       <section class="features" style="padding-top: 10rem;">
           <div class="container">
               <h2 class="section-title">Fixture</h2>
               <!-- Tu contenido -->
           </div>
       </section>
   @endsection
   ```

4. **Link** en `resources/views/components/header.blade.php`:
   ```html
   <a href="{{ route('fixture') }}" class="{{ request()->routeIs('fixture') ? 'active' : '' }}">Fixture</a>
   ```

---

### Cambiar datos de un equipo

Editá `app/Services/TeamService.php`:

```php
// Cambiar el nombre, logo, o color de un equipo:
[
    'name' => 'Nuevo Nombre',
    'logo' => 'nuevo-logo.png',         // poner el archivo en public/images/
    'color' => 'linear-gradient(135deg, #nuevo1, #nuevo2)',
],
```

---

### Agregar un nuevo equipo

Dos pasos:
1. Poné el logo en `public/images/`
2. Agregá el equipo en `TeamService.php`:

```php
[
    'name' => 'Tiburones',
    'logo' => 'logo-tiburones.png',
    'color' => 'linear-gradient(135deg, #0077B6 0%, #023E8A 100%)',
],
```

---

### Cambiar el estilo de algo

Todo el CSS está en `resources/css/app.css`. Buscá por el nombre de la clase:
- Header → `.header`, `.nav`, `.logo-img`
- Hero → `.hero`, `.hero-title`
- Cards de features → `.feature-card`, `.feature-title`
- Galería de equipos → `.gallery-item`, `.team-logo`
- Footer → `.footer`, `.social-icons`

---

### Agregar una nueva sección CSS

Agregá la sección al final de `resources/css/app.css` (antes del `@media`):

```css
/* ============================================
   Mi Nueva Sección
   ============================================ */
.mi-seccion {
    padding: 6.25rem 0;
    background-color: var(--color-bg);
}
```

---

### Agregar un nuevo service

1. Creá el archivo en `app/Services/`:
   ```php
   <?php

   declare(strict_types=1);

   namespace App\Services;

   final readonly class FixtureService
   {
       public function getMatches(): array
       {
           return [...];
       }
   }
   ```

2. Inyectalo en el controller:
   ```php
   public function __construct(
       private readonly TeamService $teamService,
       private readonly LeagueService $leagueService,
       private readonly FixtureService $fixtureService,  // añadir acá
   ) {}
   ```

Laravel lo resuelve automáticamente. No hay que registrar nada.

---

## 10. Comandos Útiles de Artisan

```bash
php artisan serve              # Levanta el servidor de desarrollo
php artisan route:list         # Ver todas las rutas
php artisan view:clear         # Limpiar cache de vistas
php artisan cache:clear        # Limpiar cache general
php artisan config:clear       # Limpiar cache de configuración
php artisan make:controller    # Crear un controller nuevo
php artisan make:model         # Crear un model nuevo (futuro)
php artisan make:migration     # Crear una migración nueva (futuro)
php artisan migrate            # Ejecutar migraciones pendientes
php artisan tinker             # REPL interactivo de PHP con Laravel
```

---

## 11. Flujo de Desarrollo Resumido

```
1. Hacer cambio en un archivo
        ↓
2. Si es CSS/JS → Vite lo recarga automáticamente (hot reload)
   Si es Blade  → Refrescar el browser (F5)
   Si es PHP    → Refrescar el browser (F5)
        ↓
3. Ver el resultado en localhost:8000
        ↓
4. Cuando estés satisfecho → git add, commit, push
```

---

## 12. Próximos Pasos: Base de Datos

Cuando estés listo para agregar la base de datos, el proceso es:

1. **Crear migraciones** (definen la estructura de las tablas):
   ```bash
   php artisan make:migration create_teams_table
   ```

2. **Crear modelos** Eloquent (representan las tablas en PHP):
   ```bash
   php artisan make:model Team
   ```

3. **Modificar los services** para usar Eloquent en vez de arrays:
   ```php
   // TeamService.php
   public function getAllTeams(): Collection
   {
       return Team::all();
   }
   ```

4. Los **controllers y vistas no cambian**. Esa es la magia del patrón MVC + Services.
