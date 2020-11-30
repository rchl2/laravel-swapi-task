<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Services\API\SwapiService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

final class ResourceController extends Controller
{
    use SwapiService;

    /**
     * Get user films.
     *
     * @return mixed
     */
    public function getUserFilms(Request $request)
    {
        return $this->getHeroSpecificResource('films', $request->user()->hero_id);
    }

    /**
     * Get user species.
     *
     * @return mixed
     */
    public function getUserSpecies(Request $request)
    {
        return $this->getHeroSpecificResource('species', $request->user()->hero_id);
    }

    /**
     * Get user vehicles.
     *
     * @return mixed
     */
    public function getUserVehicles(Request $request)
    {
        return $this->getHeroSpecificResource('vehicles', $request->user()->hero_id);
    }

    /**
     * Get user starships.
     *
     * @return mixed
     */
    public function getUserStarships(Request $request)
    {
        return $this->getHeroSpecificResource('starships', $request->user()->hero_id);
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
