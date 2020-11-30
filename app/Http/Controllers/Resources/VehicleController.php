<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use App\Services\API\SwapiService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

final class VehicleController extends Controller
{
    use SwapiService;

    /**
     * Get user vehicles.
     *
     * @return mixed
     */
    public function getUserVehicles(Request $request)
    {
        return $this->getHeroSpecificResource('vehicles', $request->user()->hero_id);
    }
}
