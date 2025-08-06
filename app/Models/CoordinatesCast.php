<?php
namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class AsCoordinates implements CastsAttributes
{
    public function get($model,  string $key, $value, array $attributes): Coordinates
    {
        return new Coordinates(
            (float) $attributes['latitude'], 
            (float) $attributes['longitude'],
        );
    }

    public function set($model, string $key, $value, array $attributes): array
    {
        return $value instanceof Coordinates ? [
            'latitude'  => $value->latitude,
            'longitude' => $value->longitude,
        ] : throw new InvalidArgumentException('Invalid coordinates.');
    }
}