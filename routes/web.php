<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MapDataController;
use App\Http\Controllers\PetaCRUDController;

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
Route::get('/tugashandson234', [MapController::class, 'tugashandson234']);

Route::get('/api/markers/{id}', [MapDataController::class,'getMarkerById']);
Route::put('/api/markers/{id}', [MapDataController::class,'editMarker']);

Route::get('/api/polygons/{id}', [MapDataController::class,'getPolygonById']);
Route::put('/api/polygons/{id}', [MapDataController::class,'editPolygon']);

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

Route::get('/handson3', [PetaCRUDController::class, 'index'])->name('handson3.index');
Route::get('/handson3', [PetaCRUDController::class, 'index'])->name('handson3.index');
Route::get('/listDataMarker', [PetaCRUDController::class, 'getListMarker'])->name('handson3.getListMarker');
Route::get('/listDataPolygon', [PetaCRUDController::class, 'getListPolygon'])->name('handson3.getListPolygon');
Route::post('/storeMarker', [PetaCRUDController::class, 'index'])->name('handson3.storeMarker');
Route::post('/storePolygon', [PetaCRUDController::class, 'index'])->name('handson3.storePolygon');

Route::get('/handson4/viewmaps/{id}', [PetaCRUDController::class, 'viewmaps'])->name('handson4.viewmaps');
Route::get('/handson4/viewleaflet/{id}', [PetaCRUDController::class, 'viewleaflet'])->name('handson4.viewleaflet');
Route::get('/handson4/{id}/edit', [PetaCRUDController::class, 'edit'])->name('handson4.edit');
// Route::put('/updateMarker', [PetaCRUDController::class, 'updateMarker'])->name('handson4.updateMarker');