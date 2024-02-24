<?php

namespace Database\Seeders;

use App\Models\LinkType;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects =  Project::all();
        $alllinkType = LinkType::all();

        $projects->each(function (Project $project) use ($alllinkType) {
            $linkTypes = fake()->randomElements($alllinkType->pluck('id')->toArray(), fake()->numberBetween(1, $alllinkType->count()));
            // $links = [];
            foreach ($linkTypes as $linktype) {
                $links[] = [
                    'title' => fake()->boolean() ? fake()->realText(10) : null,
                    'url' => fake()->url(),
                    'project_id' => $project->id,
                    'link_type_id' => $linktype,
                ];
            }
            $project->links()->createMany($links);
        });
    }
}
