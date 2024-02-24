<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kinds = [
            "FullStack",
            "FrontEnd",
            "BackEnd",
            "Mobile",
            "Database",
            "Desktop",
            "Language"
        ];

        foreach ($kinds as $kind) {
            $myKind = \App\Models\Kind::firstOrCreate([
                'title' => $kind,
                'slug' => Str::slug($kind),
            ]);
        }
    }
}
