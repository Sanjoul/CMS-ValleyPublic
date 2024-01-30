<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Section;
use Illuminate\Http\JsonResponse;

class AboutUsController extends Controller
{
    public function index(): JsonResponse
    {
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

            return response()->json([$data]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {

        return response()->json(['data' => "Hello"]);
    }
}
