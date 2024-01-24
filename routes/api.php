<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\LeadController;
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
Route::controller(ProjectController::class)->group(function () {
    Route::get('projects', 'index');
    Route::get('projects/{slug}', 'show');
});
Route::controller(TypeController::class)->group(function () {
    Route::get('types', 'index');
    //Route::get('projects/{slug}', 'show');
});
Route::post('contacts', [LeadController::class, 'store']);
//Route::get('projects', [ProjectController::class, 'index']);
//Route::get('projects/')