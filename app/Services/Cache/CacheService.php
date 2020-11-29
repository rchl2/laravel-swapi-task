<?php

namespace App\Services\Cache;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

trait CacheService
{
    /**
     * Put data into cache for 24 hours.
     *
     * @param string $key
     * @param array $value
     *
     * @return array
     */
    protected function putDataIntoCache(string $key, array $value): array
    {
        // Hacky way, expires at 24 hours.
        $expiresAt = Carbon::now()->endOfDay()->addSecond();
        
        // Put into cache.
        Cache::put($key, $value, $expiresAt);

        // Return value.
        return $value;
    }
}