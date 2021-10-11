<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MascotaController;

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

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function() {

Route::get('/mascotas', [MascotaController::class, 'index']);
Route::get('/mascotas/mostrar/{id}', [MascotaController::class, 'show']);
Route::post('/mascotas', [MascotaController::class, 'store']);
Route::put('/mascotas/actualizar/{id}', [MascotaController::class, 'update']);
Route::delete('/mascotas/borrar/{id}', [MascotaController::class, 'destroy']);

Route::get('/logout', [AuthController::class, 'logout']);

});