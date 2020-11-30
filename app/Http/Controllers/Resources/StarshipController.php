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
     * Get user starships.
     *
     * @return mixed
     */
    public function getUserStarships(Request $request)
    {
        return $this->getHeroSpecificResource('starships', $request->user()->hero_id);
    }
}
