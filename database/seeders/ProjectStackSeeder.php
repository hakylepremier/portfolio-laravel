<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Stack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectStackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $projects =  Project::all();
        $stacks = Stack::all();

        $projects->each(function (Project $project) use ($stacks) {
            $project->stacks()->sync(fake()->randomElements($stacks->pluck('id')->toArray(), fake()->numberBetween(1, $stacks->count())));
        });
    }
}
