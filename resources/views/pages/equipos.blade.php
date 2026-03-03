@extends('layouts.app')

@section('title', 'Equipos - Liga de Flag Football MDP')
@section('meta_description', 'Conocé los equipos de la Liga de Football Flag de Mar del Plata: Nereidas, Liebres, Kraken, Acorazados, Atlantes y Tridentes.')

@section('content')
    <section class="gallery" style="padding-top: 10rem;">
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
