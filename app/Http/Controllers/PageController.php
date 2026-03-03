<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\LeagueService;
use App\Services\TeamService;
use Illuminate\View\View;

/**
 * Controller for the public-facing pages.
 *
 * Uses constructor injection (IoC) to receive services
 * from Laravel's Service Container automatically.
 */
final class PageController extends Controller
{
    public function __construct(
        private readonly TeamService $teamService,
        private readonly LeagueService $leagueService,
    ) {}

    public function home(): View
    {
        return view('pages.home', [
            'features' => $this->leagueService->getHomeFeatures(),
            'teams' => $this->teamService->getAllTeams(),
        ]);
    }

    public function modalidades(): View
    {
        return view('pages.modalidades', [
            'features' => $this->leagueService->getAllFeatures(),
        ]);
    }

    public function equipos(): View
    {
        return view('pages.equipos', [
            'teams' => $this->teamService->getAllTeams(),
        ]);
    }

    public function historia(): View
    {
        return view('pages.historia');
    }
}
