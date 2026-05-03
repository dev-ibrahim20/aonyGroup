<?php

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

// Public API routes for search and filtering
Route::prefix('v1')->group(function () {
    // Search endpoints
    Route::get('/search/projects', [App\Http\Controllers\SearchController::class, 'searchProjects']);
    Route::get('/search/units', [App\Http\Controllers\SearchController::class, 'searchUnits']);
    Route::get('/search/global', [App\Http\Controllers\SearchController::class, 'globalSearch']);
    Route::get('/search/suggestions', [App\Http\Controllers\SearchController::class, 'getSearchSuggestions']);
    Route::get('/search/filters', [App\Http\Controllers\SearchController::class, 'getFilterOptions']);
    
    // Resource endpoints
    Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index']);
    Route::get('/projects/{slug}', [App\Http\Controllers\ProjectController::class, 'show']);
    Route::get('/projects/{project}/units', [App\Http\Controllers\Admin\UnitsController::class, 'getProjectUnits']);
    Route::get('/units', [App\Http\Controllers\Admin\UnitsController::class, 'index']);
    Route::get('/units/{slug}', [App\Http\Controllers\Admin\UnitsController::class, 'show']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
