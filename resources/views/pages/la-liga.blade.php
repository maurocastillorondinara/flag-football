@extends('layouts.app')

@section('title', 'La Liga - Liga de Flag Football MDP')
@section('meta_description', 'Conocé la Liga de Football Flag de Mar del Plata. Sin contacto, estrategia pura y comunidad. Hombres, mujeres y mixtos.')

@section('content')
    <section class="features" style="padding-top: 10rem;">
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
@endsection
