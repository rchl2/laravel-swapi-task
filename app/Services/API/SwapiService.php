<?php

namespace App\Services\API;

use Carbon\Carbon;
use App\Services\API\GuzzleClient;
use App\Services\API\SwapiService;
use Illuminate\Support\Collection;
use App\Services\Cache\CacheService;
use Illuminate\Support\Facades\Cache;
use App\Http\Responses\Generic\SwapiResponse;
use App\Tools\Support\FormatDataFromResponse;

trait SwapiService
{
    use GuzzleClient, CacheService, SwapiResponse, FormatDataFromResponse;

    /**
     * Get random hero.
     *
     * @return array
     */
    protected function getRandomHero(): array
    {
        return $this->getSpecificResource('people', rand(1, 82));
    }

    /**
     * Get specific resource.
     *
     * @param string $resourceName
     * @param integer $id
     *
     * @return mixed
     */
    protected function getSpecificResource(string $resourceName, int $id)
    {
        // Check if resource is in array of allowed.
        if (! in_array($resourceName, $this->allowedResources())) {
            return $this->sendResourceNotAllowedResponse();
        }

        // Check for data in storage.
        if (Cache::has($resourceName .  '_' . $id)) {
            return Cache::get($resourceName . '_' . $id);
        }

        // Push request.
        $response = $this->get($resourceName . '/' . $id);

        // Format response to get parsed data.
        $formattedResponse = $this->formatJsonDataResponse($response->getBody());

        // Put formatted data into cache.
        return $this->putDataIntoCache($resourceName . '_' . $id, $formattedResponse);
    }

    /**
     * Get hero specific resource.
     *
     * @param string $resourceName
     * @param integer $heroId
     *
     * @return mixed
     */
    protected function getHeroSpecificResource(string $resourceName, int $heroId)
    {
        // Check if resource is in array of allowed.
        if (! in_array($resourceName, $this->allowedResources())) {
            return $this->sendResourceNotAllowedResponse();
        }
        
        // Get hero.
        $hero = $this->getSpecificResource('people', $heroId);

        // Put resource collection into collection.
        $collection = collect($hero[$resourceName] ?? null);

        // Collector for resource items.
        $collector = [];

        // Use basename to get IDs from URls of resource item.
        if($collection->count()) {
            foreach ($collection as $item) {
                $itemId = basename($item);
    
                // Get specific resource based on gathered ID.
                $resource = $this->getSpecificResource($resourceName, $itemId);
    
                // Push resources from request into collector.
                $collector[] = $resource;
            }
    
            // Return collector.
            return $collector;
        }

        // Return response.
        return $this->sendResourceNotFoundResponse();
    }

    /**
     * Get array of allowed resources.
     *
     * @return array
     */
    private function allowedResources(): array
    {
        return ['people', 'films', 'species', 'vehicles', 'starships', 'planets'];
    }
}