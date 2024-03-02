<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stacks = [
            "Laravel" => "Fullstack",
            "Next.js" => "Fullstack",
            "React" => "Frontend",
            "Material UI" => "Frontend",
            "Tailwind Css" => "Frontend",
            "Sass" => "Frontend",
            "Pug" => "Frontend",
            "MongoDB" => "Database",
            "PostgresSql" =>
            "Database",
            "MySql" => "Database",
            "Express" => "Backend",
            "Firebase" => "Backend",
            "Supabase" => "Backend",
            "React Native(Expo)" => "Mobile",
            "React Native(Cli)" => "Mobile",
            "Tamagui" => "Frontend",
            "Expo Router" => "Mobile",
            "React Native Navigation" => "Mobile",
            "HTML & CSS" => "FrontEnd",
            "Vanilla JavaScript" => "FrontEnd",
            "Typescript" => "Language",
        ];

        foreach ($stacks as $stack => $kind) {
            $myStack = \App\Models\Stack::firstOrCreate([
                'title' => $stack,
                'slug' => Str::slug($stack),
                'kind_id' => \App\Models\Kind::firstOrCreate([
                    'title' => $kind,
                    'slug' =>
                    Str::slug($kind),
                ])['id']
            ]);
        }
    }
}
