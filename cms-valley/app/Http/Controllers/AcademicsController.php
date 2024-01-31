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
}