<?php

namespace App\Services\API;

use Carbon\Carbon;
use App\Services\API\GuzzleClient;
use App\Services\Cache\CacheService;
use Illuminate\Support\Facades\Cache;
use App\Tools\Support\FormatDataFromResponse;

trait SwapiService
{
    use GuzzleClient, CacheService, FormatDataFromResponse;

    /**
     * Get random hero.
     *
     * @return array
     */
    protected function getRandomHero(): array
    {
        return $this->getHero(rand(1, 82));
    }

    /**
     * Get specific hero by ID.
     *
     * @param integer $id
     *
     * @return array
     */
    protected function getHero(int $id): array
    {
        // Check for data in storage.
        if (Cache::has('hero_' . $id)) {
            return Cache::get('hero_' . $id); 
        } 
        
        // Push request.
        $response = $this->get('people/' . $id);

        // Format response to get parsed data.
        $formattedResponse = $this->formatJsonDataResponse($response->getBody());

        // Put formatted data into cache.
        return $this->putDataIntoCache('hero_' . $id, $formattedResponse);
    }
}