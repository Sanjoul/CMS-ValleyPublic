<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ContentMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Select specific Content and Media records you want to link
        $selectedContentIds = [3]; // Replace with the actual Content IDs you want to link
        $selectedMediaIds = [4];    // Replace with the actual Media IDs you want to link

        foreach ($selectedContentIds as $contentId) {
            foreach ($selectedMediaIds as $mediaId) {
                DB::table('content_media')->insert([
                    'content_id' => $contentId,
                    'media_id' => $mediaId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
