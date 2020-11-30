<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Services\API\SwapiService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

final class FilmController extends Controller
{
    use SwapiService;

    /**
     * Get user specific film.
     *
     * @param \Illuminate\Http\Request $request
     * @param integer $filmid
     *
     * @return mixed
     */
    public function getUserSpecificFilm(Request $request, int $filmid) 
    {

    }

    /**
     * Get user films.
     *
     * @return mixed
     */
    public function getUserFilms(Request $request)
    {
        return $this->getHeroSpecificResource('films', $request->user()->hero_id);
    }
}
