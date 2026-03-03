<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Service responsible for providing team data.
 *
 * Currently returns static data. In the future, this will be
 * refactored to use Eloquent models and query the database
 * for teams, statistics, and season data.
 */
final readonly class TeamService
{
    /**
     * Get all teams with their branding info.
     *
     * @return array<int, array{name: string, logo: string, color: string}>
     */
    public function getAllTeams(): array
    {
        return [
            [
                'name' => 'Nereidas',
                'logo' => 'logo-nereidas.png',
                'color' => 'linear-gradient(135deg, #FF1493 0%, #E91E8C 100%)',
            ],
            [
                'name' => 'Liebres',
                'logo' => 'logo-liebre.png',
                'color' => 'linear-gradient(135deg, #FFD700 0%, #FFC107 100%)',
            ],
            [
                'name' => 'Kraken',
                'logo' => 'logo-kraken.png',
                'color' => 'linear-gradient(135deg, #8B00FF 0%, #6A0DAD 100%)',
            ],
            [
                'name' => 'Acorazados',
                'logo' => 'logo-acorazados.png',
                'color' => 'linear-gradient(135deg, #4A5568 0%, #718096 100%)',
            ],
            [
                'name' => 'Atlantes',
                'logo' => 'logo-atlantes.png',
                'color' => 'linear-gradient(135deg, #00CED1 0%, #20B2AA 100%)',
            ],
            [
                'name' => 'Tridentes',
                'logo' => 'logo-tridentes.png',
                'color' => 'linear-gradient(135deg, #7c1406 0%, #961b1b 100%)',
            ],
        ];
    }
}
