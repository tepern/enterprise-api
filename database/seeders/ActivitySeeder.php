<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {       
        $activities = [];

        for ($i = 1; $i <= 10; $i++) {
            $parentId = ($i > 4) ? rand(1, 4) : 0;
            $activity = Activity::factory()->create([
                'parent_id' => $parentId
            ]);
            $activities[] = [
                'name' => $activity->name,
                'parent_id' => $activity->parent_id
            ];
        }

        DB::table('activities')->insert($activities);
    }
}
