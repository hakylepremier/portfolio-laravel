<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Productivity",
            "Ecommerce",
            "Finance",
            "Education",
            "Health and Fitness",
            "Entertainment",
            "Communication",
            "Data Analysis",
            "Social Media",
            "Travel and Transportation",
        ];

        foreach ($categories as $category) {
            $myCategory = \App\Models\Category::firstOrCreate([
                'title' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
