@extends('layouts.app')

@section('title', 'Historia - FAMDQ')
@section('meta_description', 'Conocé la historia del Fútbol Americano en Mar del Plata. Desde los inicios hasta convertirse en la comunidad deportiva de mayor crecimiento en la costa.')

@section('content')
    <section class="features" style="padding-top: 10rem;">
        <div class="container">
            <h2 class="section-title">Nuestra Historia</h2>

            <div class="historia-content">
                <div class="feature-card" style="max-width: 100%; text-align: left;">
                    <div class="feature-icon">📖</div>
                    <h3 class="feature-title">Los Inicios</h3>
                    <p class="feature-description">
                        El fútbol americano en Mar del Plata nació de la pasión de un grupo de deportistas
                        que buscaban llevar la intensidad y estrategia de este deporte a la costa argentina.
                        Lo que empezó como entrenamientos informales, rápidamente se convirtió en una
                        comunidad organizada con equipos, temporadas y competencias oficiales.
                    </p>
                </div>

                <div class="feature-card" style="max-width: 100%; text-align: left;">
                    <div class="feature-icon">🏟️</div>
                    <h3 class="feature-title">La Liga Hoy</h3>
                    <p class="feature-description">
                        Hoy, Fútbol Americano Mar del Plata (FAMDQ) reúne a múltiples equipos en
                        distintas modalidades: Football Equipado 7vs7, Flag Masculino y Flag Femenino.
                        Cada temporada crece la cantidad de jugadores, equipos y fanáticos que se suman
                        a esta comunidad deportiva.
                    </p>
                </div>

                <div class="feature-card" style="max-width: 100%; text-align: left;">
                    <div class="feature-icon">🤝</div>
                    <h3 class="feature-title">Instituciones que nos Acompañan</h3>
                    <p class="feature-description">
                        Agradecemos a las instituciones y sponsors que hacen posible el crecimiento
                        del fútbol americano en la ciudad. Su apoyo es fundamental para el desarrollo
                        de nuestras temporadas, eventos y la formación de nuevos jugadores.
                    </p>
                </div>

                <div class="feature-card" style="max-width: 100%; text-align: left;">
                    <div class="feature-icon">📍</div>
                    <h3 class="feature-title">Ubicación</h3>
                    <p class="feature-description">
                        Entrenamos y competimos en Mar del Plata, Buenos Aires, Argentina.
                        Si querés sumarte, contactanos por WhatsApp y te damos toda la información
                        sobre horarios, lugares de entrenamiento y cómo inscribirte.
                    </p>
                    <div style="margin-top: 1.5rem;">
                        <a href="https://wa.me/542236661385" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Contactanos por WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
