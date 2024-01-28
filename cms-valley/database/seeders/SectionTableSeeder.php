<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;
use App\Models\Page;
use App\Models\Section;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $pageIds = Page::pluck('page_id')->toArray();

        $sections = [
            ['name' => 'Section 1', 'status' => 'active',  'page_id' => $pageIds[array_rand($pageIds)]],
            ['name' => 'Section 2', 'status' => 'inactive', 'page_id' => $pageIds[array_rand($pageIds)]],
            ['name' => 'Section 3', 'status' => 'active', 'page_id' => $pageIds[array_rand($pageIds)]],
        ];

        foreach ($sections as $sections) {
            Section::create($sections);
        }
    }
}
