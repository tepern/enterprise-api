<?php
namespace App\Models;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class Coordinates implements JsonSerializable, Arrayable
{
    public ?string $latitude = null;
    public ?string $longitude = null;
    
    public function __construct(
        float $latitude,
        float $longitude
    ) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function jsonSerialize(): array
    {
        return [$this->latitude, $this->longitude];
    }

    public function __toString(): string
    {
        return "({$this->latitude},{$this->longitude})";
    }

     /**
     *
     * @return array<string>
     */
    public function toArray(): array
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];
    }
}