<?php

use App\Http\Controllers\MapController; //supaya laravel bisa dibuka harus menambahkan class MapController
use App\Http\Controllers\PointController; //supaya laravel bisa dibuka harus menambahkan class MapController
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolygonController;
use App\Http\Controllers\PolylineController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MapController::class, 'index'])->name('index');
Route::get('/table', [MapController::class, 'table'])->name('table');
Route::get('/info', [MapController::class, 'info'])->name('info');

//Create point
Route::post('/store-point', [PointController::class, 'store'])->name('store-point');

//Create polyline
Route::post('/store-polyline', [PolylineController::class, 'store'])->name('store-polyline');

//Create Polygon
Route::post('/store-polygon', [PolygonController::class, 'store'])->name('store-polygon');


//index pertama sebagai method yang dipanggil
//map controller sebagai controller
//name index sbg nama untuk memanggil route

Route::get('about', function () {
    return view('about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
