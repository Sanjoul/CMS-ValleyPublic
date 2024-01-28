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
            ['pagenames' => 'Home Page', 'title' => 'This is Home Page'],
            ['pagenames' => 'About Page', 'title' => 'This is About Page'],
            ['pagenames' => 'Contact Page', 'title' => 'This is Contact Page'],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
