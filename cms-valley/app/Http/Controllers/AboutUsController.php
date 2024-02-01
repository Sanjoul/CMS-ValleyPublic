<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUsRequest;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Section;
use App\Models\Content;
use App\Models\Media;
use Illuminate\Http\JsonResponse;

class AboutUsController extends Controller
{
    public function index(): JsonResponse
    {
        DB::beginTransaction();
        try {
            $pageName = "About Us";
            $sections = Section::whereHas('page', function ($query) use ($pageName) {
                $query->where('pagenames', $pageName);
            })->with(['contents.medias'])->get();

            $data = $sections->map(function ($section) {
                return [
                    'section_id' => $section->id,
                    'section_name' => $section->name,
                    'contents' => $section->contents->map(function ($content) {
                        $contentData = [
                            'id' => $content->id,
                            'name' => $content->name,
                            'content_type' => $content->content_type,
                            'content_value' => $content->content_value,
                        ];

                        if ($content->content_type !== 'text') {
                            $contentData['medias'] = $content->medias->map(function ($media) {
                                return [
                                    'id' => $media->id,
                                    'media_name' => $media->name,
                                    'path' => $media->path,
                                    'type' => $media->type,
                                ];
                            })->all();
                        }

                        return $contentData;
                    })->all()
                ];
            })->all();

            DB::commit();
            return response()->json($data);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }




    public function edit($id)
    {
        $section = Section::with(['contents' => function ($query) {
            $query->with('medias');
        }])->find($id);

        if (!$section) {
            return response()->json(['error' => 'Section not found'], 404);
        }

        $sectionContents = $section->contents->mapWithKeys(function ($content) {
            $contentData = [
                $content->id => [
                    'name' => $content->name,
                    'content_type' => $content->content_type,
                    'content_value' => $content->content_value,
                ]
            ];

            if ($content->content_type !== 'text') {
                $contentData[$content->id]['medias'] = $content->medias->mapWithKeys(function ($media) {
                    return [
                        $media->id => [
                            'media_name' => $media->media_name,
                            'path' => $media->path,
                            'type' => $media->type,
                        ]
                    ];
                });
            }

            return $contentData;
        });

        return response()->json($sectionContents);
    }




    public function update(AboutUsRequest $request, $id)
    {
        $section = Section::with(['contents.medias'])->find($id);

        if (!$section) {
            return response()->json(['error' => 'Section not found'], 404);
        }
        DB::beginTransaction();
        try {
            // Update section name if it's provided
            if ($request->has('name')) {
                $section->name = $request->name;
                $section->save();
            }

            // Update contents
            if ($request->has('contents')) {
                foreach ($request->contents as $contentData) {
                    $content = Content::find($contentData['id']);
                    if ($content && $content->section_id === $section->id) { // Ensure the content belongs to the section
                        $content->name = $contentData['name'] ?? $content->name;
                        $content->content_value = $contentData['content_value'] ?? $content->content_value;
                        $content->save();

                        // Update related media if provided
                        if (isset($contentData['medias']) && is_array($contentData['medias'])) {
                            foreach ($contentData['medias'] as $mediaData) {
                                $media = Media::find($mediaData['id']);
                                if ($media) {
                                    // Assuming you want to update the media name and path
                                    $media->name = $mediaData['name'] ?? $media->media_name;
                                    $media->path = $mediaData['path'] ?? $media->path;
                                    $media->type = $mediaData['type'] ?? $media->type;
                                    $media->save();
                                }
                            }
                        }
                    }
                }
            }

            DB::commit();
            return response()->json(['message' => 'Section updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Update failed', ['id' => $id, 'error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
