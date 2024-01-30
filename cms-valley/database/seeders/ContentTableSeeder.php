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
        $contents = [
            ['name' => "Introduction ", 'content_value' => " It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 'section_id' => 1, 'content_type' => "text"],
            ['name' => "Quote", 'content_value' => " It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 'section_id' => 1, 'content_type' => "text"],
            ['name' => "Image Upload", 'content_value' => "Image_name", 'section_id' => 1, 'content_type' => "Image"],

            ['name' => "Message", 'content_value' => " It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 'section_id' => 2, 'content_type' => "text"],
            ['name' => "Founder's Name", 'content_value' => " Krishna Prasad Adhikari", 'section_id' => 2, 'content_type' => "text"],
            ['name' => "Designation", 'content_value' => "Founder-Principal", 'section_id' => 2, 'content_type' => "text"],
            ['name' => "Image Upload", 'content_value' => "Image_name", 'section_id' => 2, 'content_type' => "Image"],

            ['name' => "Message", 'content_value' => " It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 'section_id' => 3, 'content_type' => "text"],
            ['name' => "Founder's Name", 'content_value' => " Major (Retd) Lilbahadur Gurung MBE", 'section_id' => 3, 'content_type' => "text"],
            ['name' => "Designation", 'content_value' => "Chairman", 'section_id' => 3, 'content_type' => "text"],
            ['name' => "Image Upload", 'content_value' => "Image_name", 'section_id' => 3, 'content_type' => "Image"],


            ['name' => "Mission", 'content_value' => " It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 'section_id' => 4, 'content_type' => "text"],
            ['name' => "Core Values", 'content_value' => " Major (Retd) Lilbahadur Gurung MBE", 'section_id' => 4, 'content_type' => "text"],
            ['name' => "Image Upload", 'content_value' => "Image_name", 'section_id' => 4, 'content_type' => "Image"],

        ];
        foreach ($contents as $content) {
            Content::create($content);
        }
    }
}
