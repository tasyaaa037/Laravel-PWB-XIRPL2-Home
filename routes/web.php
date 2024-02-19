<?php

use App\Http\Controllers\SPPController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::controller(SPPController::class)->group(function () {
    Route::get('/spp', 'index')->name('spp.index');
    Route::get('/spp/create', 'create')->name('spp.create');
    Route::post('/sppp', 'store')->name('spp.store');
    Route::get('/spp/{spp}', 'show')->name('spp.show');
    Route::get('/spp/{spp}/edit', 'edit')->name('spp.edit');
    Route::put('/spp/{spp}', 'update')->name('spp.update');
    Route::delete('/spp/{id}', 'destroy')->name('spp.destroy');
});
Route::view('/template','template.master');

Route::resource('/spp', sppController::class);