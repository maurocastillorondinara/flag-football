@extends('layouts.app')

@section('title', 'Liga de Flag Football MDP - Inicio')
@section('meta_description', 'Liga de Football Flag de Mar del Plata. Sin contacto, máxima intensidad. Unite a la revolución del deporte en la costa.')

@section('content')
    {{-- Hero Section --}}
    <section id="inicio" class="hero" style="background-image: url('{{ asset('images/equipado.jpeg') }}')">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <h2 class="hero-subtitle">LIGA DE FOOTBALL FLAG DE MAR DEL PLATA</h2>
            <h1 class="hero-title">
                VELOCIDAD <br>
                <span class="outline-text">ESTRATEGIA</span> <br>
                PASIÓN
            </h1>
            <p class="hero-description">
                Unite a la revolución del deporte en la costa.
                Sin contacto, máxima intensidad.
            </p>
            <div class="hero-actions">
                <a href="#contact" class="btn btn-primary">Inscribí a tu equipo</a>
                <a href="{{ route('la-liga') }}" class="btn btn-outline">Conocé más</a>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="about" class="features">
        <div class="container">
            <h2 class="section-title">La Liga</h2>
            <div class="features-grid">
                @foreach ($features as $feature)
                    <div class="feature-card">
                        <div class="feature-icon">{{ $feature['icon'] }}</div>
                        <h3 class="feature-title">{{ $feature['title'] }}</h3>
                        <p class="feature-description">{{ $feature['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Teams Gallery Section --}}
    <section id="teams" class="gallery">
        <div class="container">
            <h2 class="section-title">Nuestros Equipos</h2>
            <div class="gallery-grid">
                @foreach ($teams as $team)
                    <div class="gallery-item" style="background: {{ $team['color'] }}">
                        <img src="{{ asset('images/' . $team['logo']) }}" alt="{{ $team['name'] }}" class="team-logo">
                        <div class="gallery-overlay">
                            <span>{{ $team['name'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
