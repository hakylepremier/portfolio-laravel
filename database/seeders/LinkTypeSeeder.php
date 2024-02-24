<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $linkTypes = [
            'Github',
            'Live Site',
            'Youtube'
        ];

        foreach ($linkTypes as $linkType) {
            $myLinkType = \App\Models\LinkType::firstOrCreate([
                'title' => $linkType,
                'slug' => Str::slug($linkType),
            ]);
        }
    }
}
