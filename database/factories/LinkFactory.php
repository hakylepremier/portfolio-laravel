<?php

namespace Database\Factories;

use App\Models\LinkType;
use App\Models\Project;
use App\Models\Variety;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'link_type_id' => $this->faker->randomElement(LinkType::all())['id'],
            'project_id' => $this->faker->randomElement(Project::all())['id'],
            'title' => $this->faker->realText(10),
            'url' => $this->faker->url(),
        ];
    }
}
