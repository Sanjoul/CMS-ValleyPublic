<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mediaItems = [
            ['name' => 'Media 1', 'path' => '/path/to/media1.jpg', 'type' => 'image'],
            ['name' => 'Media 2', 'path' => '/path/to/media2.mp4', 'type' => 'video'],
            ['name' => 'Media 3', 'path' => '/path/to/media3.png', 'type' => 'image'],
        ];

        foreach ($mediaItems as $media) {
            DB::table('medias')->insert($media);
        }
    }
}
