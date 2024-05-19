<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PolylineController;
use App\Http\Controllers\PolygonController;

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

// create point
Route::get('/points', [PointController::class, 'index'])->name('api.points'); //untuk mendapatkan data
Route::get('/point/{id}', [PointController::class, 'show'])->name('api.point');

// create polylines
Route::get('/polylines', [PolylineController::class, 'index'])->name('api.polylines'); //untuk mendapatkan data
Route::get('/polyline/{id}', [PolylineController::class, 'show'])->name('api.polyline');

// create polylgons
Route::get('/polygons', [PolygonController::class, 'index'])->name('api.polygons'); //untuk mendapatkan data
Route::get('/polygon/{id}', [PolygonController::class, 'show'])->name('api.polygon');

