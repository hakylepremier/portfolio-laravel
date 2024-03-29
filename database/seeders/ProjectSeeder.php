<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stages = [
            'In production',
            'Released',
            'Archived'
        ];

        foreach ($stages as $stage) {
            \App\Models\Project::factory(
                5
            )->create([
                'stage_id' => Stage::firstOrCreate(['name' => $stage])['id']
            ]);
        }
    }
}
