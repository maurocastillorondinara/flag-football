<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Service responsible for providing league feature/info data.
 */
final readonly class LeagueService
{
    /**
     * Get the 3 modalidades for the home page.
     *
     * @return array<int, array{icon: string, title: string, description: string}>
     */
    public function getHomeFeatures(): array
    {
        return [
            [
                'icon' => '🏈',
                'title' => 'Football Equipado',
                'description' => 'Modalidad 7vs7. Sumate a Atlantes, la Selección Marplatense de Football Equipado.',
            ],
            [
                'icon' => '🏁',
                'title' => 'Flag Masculino',
                'description' => 'Toda la intensidad del football americano, sin los golpes. Velocidad pura y agilidad.',
            ],
            [
                'icon' => '⚡',
                'title' => 'Flag Femenino',
                'description' => 'El futuro es Flag. El deporte más en auge a nivel mundial, en tu ciudad.',
            ],
        ];
    }

    /**
     * Get all modalidades for the dedicated page.
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
