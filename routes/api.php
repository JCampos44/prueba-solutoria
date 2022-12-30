<?php

use App\Http\Controllers\IndicadorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/create-indicador', [IndicadorController::class, 'store']);
Route::post('/update-indicador', [IndicadorController::class, 'update']);
Route::post('/delete-indicador', [IndicadorController::class, 'destroy']);

Route::get('/grafico-data/{nombre}/{fecha_inicial}/{fecha_final}', [IndicadorController::class, 'grafico'])->where('nombre', '.*');
