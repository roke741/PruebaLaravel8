<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/user/{id}', [PagesController::class, 'show']);

Route::get('/', [PagesController::class, 'fnIndex'])->name('xHome');

Route::post('/', [PagesController::class, 'fnRegistrar'])->name('Estudiante.xRegistrar');

/* Route::get('/saludo', function () {
    return "Hola mundo desde laravel";
});
 */
Route::get('/detalle/{id}', [PagesController::class, 'fnEstDetalle'])->name('Estudiante.xDetalle');

Route::get('/galeria/{numero?}',[PagesController::class, 'fnGaleria'])->where('numero', '[0-9]+')->name('xGaleria');

Route::get('/lista', [PagesController::class, 'fnLista'])->name('xLista');

/* Route::get('/lista', function () {
    return view('pagLista');
})->name('xLista'); */

