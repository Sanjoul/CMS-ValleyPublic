<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AcademicsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('about-us', [AboutUsController::class, 'index']);
Route::get('admin/about-us/edit/{id}', [AboutUsController::class, 'edit']);
Route::put('admin/about-us/update/{id}', [AboutUsController::class, 'update']);

Route::get('academics', [AcademicsController::class, 'index']);
