<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use App\Models\Section;
use App\Models\Content;
use App\Models\Media;

use Illuminate\Http\Request;

class AcademicsController extends Controller
{
    public function index(): JsonResponse
    {
        DB::beginTransaction();
        try {
            $pageName = "Academics";
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
}
