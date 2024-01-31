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

            // About us page seeder starts here
            ['name' => 'Introduction', 'status' => 'active',  'page_id' => 1],
            ['name' => "Founder's Message", 'status' => 'inactive', 'page_id' => 1],
            ['name' => "Chairman's Message", 'status' => 'active', 'page_id' => 1],
            ['name' => "Mission", 'status' => 'active', 'page_id' => 1],

            // About us page seeder Ends here
            //Academics Page's Section Seeder Starts Here
            ['name' => 'Elementary School', 'status' => 'active',  'page_id' => 3],
            ['name' => "Middle School", 'status' => 'active', 'page_id' => 3],
            ['name' => "High School", 'status' => 'active', 'page_id' => 3],
            ['name' => "Arts & Athletics", 'status' => 'active', 'page_id' => 3],
            ['name' => "Extracurricular Activities", 'status' => 'active', 'page_id' => 3],
        ];

        foreach ($sections as $sections) {
            Section::create($sections);
        }
    }
}
