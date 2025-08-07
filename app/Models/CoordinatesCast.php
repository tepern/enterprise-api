<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class CoordinatesCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): Coordinates
    {
        $coord = explode(',', explode(')', substr($attributes['coordinates'], 1))[0]);
        return new Coordinates(
            (float) $coord[0],
            (float) $coord[1]
        );
    }

    public function set($model, string $key, $value, array $attributes): array
    {
        return $value instanceof Coordinates ? [
            'coordinates'  => $value->__toString(),
        ] : throw new InvalidArgumentException('Invalid coordinates.');
    }
}
