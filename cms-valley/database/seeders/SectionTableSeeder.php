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

        $sections = [
            ['name' => 'Introduction', 'status' => 'active',  'page_id' => 1],
            ['name' => "Founder's Message", 'status' => 'inactive', 'page_id' => 1],
            ['name' => "Chairman's Message", 'status' => 'active', 'page_id' => 1],
            ['name' => "Mission", 'status' => 'active', 'page_id' => 1],
        ];

        foreach ($sections as $sections) {
            Section::create($sections);
        }
    }
}
