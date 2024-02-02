<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthController;
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
Route::get('academics', [AcademicsController::class, 'index']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Admin Routes
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('admin/about-us/edit/{id}', [AboutUsController::class, 'edit']);
        Route::put('admin/about-us/update/{id}', [AboutUsController::class, 'update']);
        Route::get('admin/academics/edit/{id}', [AcademicsController::class, 'edit']);
        Route::get('logout', [AuthController::class, 'logout']);
    });
});
