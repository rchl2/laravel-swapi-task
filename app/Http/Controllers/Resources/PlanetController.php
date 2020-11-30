<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Services\API\SwapiService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

final class PlanetController extends Controller
{
    use SwapiService;

    /**
     * Get user planets.
     *
     * @return mixed
     */
    public function getUserPlanets(Request $request)
    {
        return $this->getHeroSpecificResource('planets', $request->user()->hero_id);
    }
}
