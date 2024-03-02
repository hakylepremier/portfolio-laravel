<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stages = [
            'In development' => 'red',
            'Released' => 'green',
            'Archived' => 'blue'
        ];

        foreach ($stages as $stage => $color) {
            $myStage = Stage::firstOrCreate([
                'name' => $stage,
                'color' => $color
            ]);
        }
    }
}
