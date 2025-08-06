<?php
namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class CoordinatesCast implements CastsAttributes
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
            'coordinates'  => $value->__toString(),
        ] : throw new InvalidArgumentException('Invalid coordinates.');
    }
}