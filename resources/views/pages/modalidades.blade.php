@extends('layouts.app')

@section('title', 'Modalidades - FAMDQ')
@section('meta_description', 'Conocé las modalidades de Fútbol Americano en Mar del Plata: Football Equipado, Flag Masculino y Flag Femenino.')

@section('content')
    <section class="features" style="padding-top: 10rem;">
        <div class="container">
            <h2 class="section-title">Modalidades</h2>
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
