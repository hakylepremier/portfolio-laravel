<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Link;
use App\Models\LinkType;
use App\Models\Project;
use App\Models\Stack;
use App\Models\Stage;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DefaultProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projectTitles = ['Responsive News Homepage', 'Room Homepage'];

        $defaultProjects = [
            [
                'details' => [
                    'title' => $projectTitles[0],
                    'slug' => Str::slug($projectTitles[0]),
                    'summary' => 'This is a challenge posed by Frontend Mentor to build a simple news website homepage.',
                    'description' => null,
                    'stage_id' => Stage::firstOrCreate([
                        'name' => 'Released',
                        'color' => 'green'
                    ])['id'],
                    'category_id' => Category::firstOrCreate([
                        'title' => 'Communication',
                        'slug' => Str::slug('Communication'),
                    ])['id'],
                    'published' => true,
                    'content' => null,
                    'order' => 2,
                ],
                'types' => [
                    Type::firstOrCreate([
                        'title' => 'FrontEnd',
                        'slug' => Str::slug('FrontEnd'),
                    ])['id'],
                ],
                'stacks' => [
                    Stack::firstOrCreate([
                        'title' => 'HTML & CSS',
                        'slug' => Str::slug('HTML & CSS'),
                        'kind_id' => \App\Models\Kind::firstOrCreate([
                            'title' => 'FrontEnd',
                            'slug' =>
                            Str::slug('FrontEnd'),
                        ])['id']
                    ])['id'],
                    Stack::firstOrCreate([
                        'title' => 'Vanilla JavaScript',
                        'slug' => Str::slug('Vanilla JavaScript'),
                        'kind_id' => \App\Models\Kind::firstOrCreate([
                            'title' => 'FrontEnd',
                            'slug' =>
                            Str::slug('FrontEnd'),
                        ])['id']
                    ])['id'],
                ],
                'links' => [
                    [
                        'title' => 'Visit Site',
                        'url' => 'https://hakylepremier.github.io/responsive-news-homepage-frontend/',
                        'project_id' => 1,
                        'link_type_id' => LinkType::firstOrCreate([
                            'title' => 'Live Site',
                            'slug' => Str::slug('Live Site'),
                        ])['id'],
                    ],
                    [
                        'title' => 'See the code',
                        'url' => 'https://github.com/hakylepremier/responsive-news-homepage-frontend',
                        'project_id' => 2,
                        'link_type_id' => LinkType::firstOrCreate([
                            'title' => 'Github',
                            'slug' => Str::slug('Github'),
                        ])['id'],
                    ]
                ]
            ],
            [
                'details' => [
                    'title' => $projectTitles[1],
                    'slug' => Str::slug($projectTitles[1]),
                    'summary' => 'This is a challenge posed by Frontend Mentor to build furniture showcase homepage',
                    'description' => null,
                    'stage_id' => Stage::firstOrCreate([
                        'name' => 'Released',
                        'color' => 'green'
                    ])['id'],
                    'category_id' => Category::firstOrCreate([
                        'title' => 'Ecommerce',
                        'slug' => Str::slug('Ecommerce'),
                    ])['id'],
                    'published' => true,
                    'content' => null,
                    'order' => 2,
                ],
                'types' => [
                    Type::firstOrCreate([
                        'title' => 'FrontEnd',
                        'slug' => Str::slug('FrontEnd'),
                    ])['id'],
                ],
                'stacks' => [
                    Stack::firstOrCreate([
                        'title' => 'Pug',
                        'slug' => Str::slug('Pug'),
                        'kind_id' => \App\Models\Kind::firstOrCreate([
                            'title' => 'FrontEnd',
                            'slug' =>
                            Str::slug('FrontEnd'),
                        ])['id']
                    ])['id'],
                    Stack::firstOrCreate([
                        'title' => 'Sass',
                        'slug' => Str::slug('Sass'),
                        'kind_id' => \App\Models\Kind::firstOrCreate([
                            'title' => 'FrontEnd',
                            'slug' =>
                            Str::slug('FrontEnd'),
                        ])['id']
                    ])['id'],
                    Stack::firstOrCreate([
                        'title' => 'Vanilla JavaScript',
                        'slug' => Str::slug('Vanilla JavaScript'),
                        'kind_id' => \App\Models\Kind::firstOrCreate([
                            'title' => 'FrontEnd',
                            'slug' =>
                            Str::slug('FrontEnd'),
                        ])['id']
                    ])['id'],
                ],
                'links' => [
                    [
                        'title' => 'Visit Site',
                        'url' => 'https://room-homepage-haky.netlify.app/',
                        'project_id' => 1,
                        'link_type_id' => LinkType::firstOrCreate([
                            'title' => 'Live Site',
                            'slug' => Str::slug('Live Site'),
                        ])['id'],
                    ],
                    [
                        'title' => 'See the code',
                        'url' => 'https://github.com/hakylepremier/room-homepage-frontend',
                        'project_id' => 2,
                        'link_type_id' => LinkType::firstOrCreate([
                            'title' => 'Github',
                            'slug' => Str::slug('Github'),
                        ])['id'],
                    ]
                ]
            ],
        ];

        foreach ($defaultProjects as $project) {
            $myProject = Project::firstOrCreate($project['details']);

            $myProject->types()->sync($project['types']);
            $myProject->stacks()->sync($project['stacks']);
            foreach ($project['links'] as $link) {
                $link['project_id'] = $myProject->id;
                $mylink = Link::firstOrCreate($link);
            }
            // $myProject->links()->createMany([]);
        }
    }
}
