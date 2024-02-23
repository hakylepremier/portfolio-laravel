<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $projects =  Project::all();
        $types = Type::all();

        $projects->each(function (Project $project) use ($types) {
            $project->types()->sync(fake()->randomElements($types->pluck('id')->toArray(), fake()->numberBetween(1, 4)));
        });
    }
}
