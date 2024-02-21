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
            "Api",
            "FullStack",
            "FullStack Api",
            "FullStack Api Mobile",
            "FullStack Api Mobile Desktop",
            "Mobile",
            "Mobile Backend",
            "Mobile Backend(Api)",
            "Data Science",
            "Cli Tool",
            "Desktop Windows",
            "Desktop Linux",
            "Desktop Cross platform"
        ];

        foreach ($types as $type) {
            $mytype = \App\Models\Type::firstOrCreate([
                'title' => $type,
                'slug' => Str::slug($type),
            ]);
        }
    }
}
