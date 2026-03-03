<header class="header">
    <div class="container header-container">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo-liga.png') }}" alt="Fútbol Americano Mar del Plata" class="logo-img">
            </a>
        </div>

        <button class="mobile-toggle" aria-label="Abrir menú">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>

        <nav class="nav">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a>
            <a href="{{ route('modalidades') }}" class="{{ request()->routeIs('modalidades') ? 'active' : '' }}">Modalidades</a>
            <a href="{{ route('equipos') }}" class="{{ request()->routeIs('equipos') ? 'active' : '' }}">Equipos</a>
            <a href="https://wa.me/542236661385" target="_blank" rel="noopener noreferrer" class="nav-cta">Contactanos</a>
        </nav>
    </div>
</header>
