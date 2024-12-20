<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MapDataController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/map', [MapController::class, 'index']);

Route::get('/tugashandson1', [MapController::class, 'tugashandson1']);
Route::get('/tugashandson2', [MapController::class, 'tugashandson2']);

Route::delete('/api/polygons/{id}', [MapDataController::class, 'deletePolygon']);
Route::delete('/api/markers/{id}', [MapDataController::class, 'deleteMarker']);
Route::get('/api/markers', [MapDataController::class, 'getMarkers']);
Route::get('/api/polygons', [MapDataController::class, 'getPolygons']);
Route::post('/api/markers', [MapDataController::class, 'storeMarker']);
Route::post('/api/polygons', [MapDataController::class, 'storePolygon']);

Route::get('/interactive', [MapDataController::class, 'index'])->name('map.index');
Route::post('/markers', [MapDataController::class, 'storeMarker'])->name('map.storeMarker');
Route::post('/polygons', [MapDataController::class, 'storePolygon'])->name('map.storePolygon');
Route::get('/data', [MapDataController::class, 'getData'])->name('map.getData');