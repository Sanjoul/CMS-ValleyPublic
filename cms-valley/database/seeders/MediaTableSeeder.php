<?php

namespace Database\Seeders;

// use Faker\Core\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = File::allFiles(storage_path('app/public/images'));

        foreach ($images as $image) {
            DB::table('medias')->insert([
                'name' => $image->getFilename(),
                'path' => 'storage/images/' . $image->getFilename(),
                'type' => $image->getExtension(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
