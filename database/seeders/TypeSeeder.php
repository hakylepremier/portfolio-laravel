<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            "FrontEnd",
            "BackEnd",
            "FullStack",
            "Api",
            "Mobile",
            "Data Science",
            "Cli Tool",
            "Desktop",
            "Cross platform",
        ];

        foreach ($types as $type) {
            $mytype = \App\Models\Type::firstOrCreate([
                'title' => $type,
                'slug' => Str::slug($type),
            ]);
        }
    }
}
