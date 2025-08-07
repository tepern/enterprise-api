<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Organization::factory()->count(10)
            ->for(Building::factory())->has(Activity::factory()->count(3))->create();
    }
}
