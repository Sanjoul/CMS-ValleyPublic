<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectionIds = Section::pluck('section_id')->toArray();
        $contents = [
            ['name' => 'Content 1', 'type' => 'Type A', 'section_id' => $sectionIds[array_rand($sectionIds)]],
            ['name' => 'Content 2', 'type' => 'Type B', 'section_id' => $sectionIds[array_rand($sectionIds)]],
            ['name' => 'Content 3', 'type' => 'Type C', 'section_id' => $sectionIds[array_rand($sectionIds)]],
        ];
        foreach ($contents as $content) {
            Content::create($content);
        }
    }
}
