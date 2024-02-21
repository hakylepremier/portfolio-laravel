<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Stage;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->realTextBetween(20, 50);
        $description = fake()->boolean();
        $content = fake()->boolean();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'summary' => fake()->realTextBetween(80, 150),
            'description' => $description ? fake()->realTextBetween() : null,
            'stage_id' =>
            $this->faker->randomElement(Stage::all())['id'],
            'category_id' => $this->faker->randomElement(Category::all())['id'],
            'type_id' => $this->faker->randomElement(Type::all())['id'],
            'published' => fake()->boolean(),
            'content' => $content ? fake()->realTextBetween(200, 300) : null,
        ];
    }
}
