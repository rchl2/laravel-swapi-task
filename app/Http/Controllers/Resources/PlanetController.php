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
     * Get user specific planet.
     *
     * @param \Illuminate\Http\Request $request
     * @param integer $id
     *
     * @return mixed
     */
    public function getUserSpecificPlanet(Request $request, int $id) 
    {
        return $this->getHeroSpecificResource('planets', $request->user()->hero_id, $id);
    }

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
