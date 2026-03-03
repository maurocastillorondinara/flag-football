<header class="header">
    <div class="container header-container">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo-liga.png') }}" alt="Liga de Flag Football MDP" class="logo-img">
            </a>
        </div>

        <button class="mobile-toggle" aria-label="Abrir menú">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>

        <nav class="nav">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a>
            <a href="{{ route('la-liga') }}" class="{{ request()->routeIs('la-liga') ? 'active' : '' }}">La Liga</a>
            <a href="{{ route('equipos') }}" class="{{ request()->routeIs('equipos') ? 'active' : '' }}">Equipos</a>
            <a href="{{ route('home') }}#contact" class="nav-cta">Sumate</a>
        </nav>
    </div>
</header>
