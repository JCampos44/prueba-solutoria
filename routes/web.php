<?php

use App\Models\Indicador;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-indicador', function () {
    return view('create-indicador');
});

Route::get('/edit-indicador/{id}', function($id) {
    return view('edit-indicador', [
        'indicador' => Indicador::where('id', $id)->first()
    ]);
});

Route::get('/grafico', function() {
    return view('grafico');
});
