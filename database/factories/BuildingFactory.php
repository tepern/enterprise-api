<?php

namespace Database\Factories;

use App\Models\Building;
use App\Models\Coordinates;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Building>
 */
class BuildingFactory extends Factory
{
    protected $model = Building::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $coord = new Coordinates(fake()->latitude(), fake()->longitude());
        return [
            'address' => fake()->unique()->address(),
            'coordinates' => $coord
        ];
    }
}
