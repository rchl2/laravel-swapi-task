<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Services\API\SwapiService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

final class SpeciesController extends Controller
{
    use SwapiService;

    /**
     * Get user specific species.
     *
     * @param \Illuminate\Http\Request $request
     * @param integer $id
     *
     * @return mixed
     */
    public function getUserSpecificSpecie(Request $request, int $id) 
    {
        return $this->getHeroSpecificResource('species', $request->user()->hero_id, $id);
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
}
