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
            $aboutUsSections = Section::whereHas('page', function ($query) use ($pageName) {
                $query->where('pagenames', $pageName);
            })->with(['page', 'contents.medias'])->get();
            $data = $aboutUsSections->map(function ($section) {
                $contentsData = $section->contents->map(function ($content) {
                    $mediaNames = $content->medias->map(function ($media) {
                        return $media->name;
                    })->all();

                    return [
                        'content_name' => $content->name,
                        'content_value' => $content->content_value,
                        'media_names' => $mediaNames,
                    ];
                });
                return [
                    'section_id' => $section->id,
                    'section_name' => $section->name,
                    'pagename' => $section->page->pagenames,
                    'contents' => $contentsData
                ];
            });
            DB::commit();
            return response()->json([$data]);
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

        $sectionData = [
            'id' => $section->id,
            'name' => $section->name,
            'contents' => $section->contents->map(function ($content) {
                $contentData = [
                    'id' => $content->id,
                    'name' => $content->name,
                    'content_type' => $content->content_type,
                    'content_value' => $content->content_value,
                ];

                if (!($content->content_type === 'text')) {
                    $contentData['medias'] = $content->medias->map(function ($media) {
                        return [
                            'id' => $media->id,
                            'media_name' => $media->media_name,
                            'path' => $media->path,
                            'type' => $media->type,
                        ];
                    });
                }

                return $contentData;
            }),
        ];

        return response()->json($sectionData);
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

    public function delete($id)
    {
        $section = Section::with('contents.medias')->find($id);

        if (!$section) {
            return response()->json(['error' => 'Section not found'], 404);
        }

        // Begin transaction to ensure data integrity
        DB::beginTransaction();

        try {
            // Delete all media associated with each content
            foreach ($section->contents as $content) {
                foreach ($content->medias as $media) {
                    $media->delete(); // Deletes the media
                }
                $content->delete(); // Deletes the content after deleting its media
            }

            $section->delete(); // Deletes the section

            DB::commit();
            return response()->json(['success' => 'Section deleted successfully']);
        } catch (\Exception $e) {
            // In case of an error, rollback the transaction
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while deleting the section'], 500);
        }
    }
}
