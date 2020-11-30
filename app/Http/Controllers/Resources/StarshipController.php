<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Services\API\SwapiService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

final class StarshipController extends Controller
{
    use SwapiService;

    /**
     * Get user specific starship.
     *
     * @param \Illuminate\Http\Request $request
     * @param integer $id
     *
     * @return mixed
     */
    public function getUserSpecificStarship(Request $request, int $id) 
    {
        return $this->getHeroSpecificResource('starships', $request->user()->hero_id, $id);
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
}
