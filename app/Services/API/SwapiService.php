<?php

namespace App\Services\API;

use Carbon\Carbon;
use App\Services\API\GuzzleClient;
use Illuminate\Support\Collection;
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
        return $this->getSpecificResource('people', rand(1, 82));
    }

    /**
     * Get specific resource.
     *
     * @param string $resourceName
     * @param integer $id
     *
     * @return array
     */
    protected function getSpecificResource(string $resourceName, int $id): array
    {
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
     * @return array
     */
    protected function getHeroSpecificResource(string $resourceName, int $heroId): array
    {
        // Get hero.
        $hero = $this->getSpecificResource('people', $heroId);

        // Put resource collection into collection.
        $collection = collect($hero[$resourceName]);

        // Collector for resource items.
        $collector = [];

        // Use basename to get IDs from URls of resource item.
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
}