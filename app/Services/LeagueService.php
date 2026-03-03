<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Service responsible for providing league feature/info data.
 *
 * Currently returns static data. In the future, this can
 * pull from a CMS or database to manage league content.
 */
final readonly class LeagueService
{
    /**
     * Get the main feature highlights for the home page.
     *
     * @return array<int, array{icon: string, title: string, description: string}>
     */
    public function getHomeFeatures(): array
    {
        return [
            [
                'icon' => '⚡',
                'title' => 'Sin Contacto',
                'description' => 'Toda la intensidad del football americano, sin los golpes. Velocidad pura y agilidad.',
            ],
            [
                'icon' => '🧠',
                'title' => 'Estrategia',
                'description' => 'Cada jugada cuenta. Diseñá, ejecutá y superá a la defensa rival con inteligencia.',
            ],
            [
                'icon' => '🌊',
                'title' => 'Comunidad MDP',
                'description' => 'Formá parte de la liga de mayor crecimiento en Mar del Plata. Hombres, mujeres y mixtos.',
            ],
        ];
    }

    /**
     * Get all feature details for the dedicated Liga page.
     *
     * @return array<int, array{icon: string, title: string, description: string}>
     */
    public function getAllFeatures(): array
    {
        return [
            ...$this->getHomeFeatures(),
            [
                'icon' => '🏆',
                'title' => 'Temporadas',
                'description' => 'Competí en temporadas organizadas con fixture, tabla de posiciones y playoffs.',
            ],
            [
                'icon' => '📊',
                'title' => 'Estadísticas',
                'description' => 'Seguí las estadísticas de cada jugador y equipo en tiempo real.',
            ],
            [
                'icon' => '🤝',
                'title' => 'Inclusión',
                'description' => 'Categorías para todas las edades y géneros. El flag football es para todos.',
            ],
        ];
    }
}
