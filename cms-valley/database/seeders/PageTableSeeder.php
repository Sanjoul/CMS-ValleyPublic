<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $pages = [
            ['pagenames' => 'Homepage', 'title' => 'This is Home Page', 'id' => 2],
            ['pagenames' => 'About Us', 'title' => 'This is About Page', 'id' => 1],
            ['pagenames' => 'Contact Us', 'title' => 'This is Contact Page', 'id' => 3],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
