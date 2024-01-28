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
        $contentIds = Content::pluck('content_id')->toArray();
        $mediaIds = Media::pluck('media_id')->toArray();

        $contentIds = Content::pluck('content_id')->toArray();
        $mediaIds = Media::pluck('media_id')->toArray();

        // Ensure there are contents and medias to link
        if (!empty($contentIds) && !empty($mediaIds)) {
            // Let's create 10 random links for example
            foreach ($contentIds as $contentId) {
                foreach ($mediaIds as $mediaId) {
                    // Insert the relation into content_media table
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
}
