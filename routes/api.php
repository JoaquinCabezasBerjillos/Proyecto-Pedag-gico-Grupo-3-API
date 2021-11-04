<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
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


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);



Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/getAuthUser', [AuthController::class, 'getAuthUser']);

    Route::group(['middleware' => 'admin'], function () {

        Route::get('/productos', [ProductoController::class, 'index']);
        Route::get('/productos/{id}', [ProductoController::class, 'show']);
        Route::post('/productos', [ProductoController::class, 'store']);
        Route::patch('/productos/{id}', [ProductoController::class, 'update']);
        Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);
        Route::post('/productos/foto', [ProductoController::class, 'savePhoto']);

        Route::get('/clientes', [ClienteController::class, 'index']);
        Route::get('/clientes/{id}', [ClienteController::class, 'show']);      
        Route::put('/clientes/{id}', [ClienteController::class, 'update']);
        Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

        Route::get('/mascotas', [MascotaController::class, 'index']);
        Route::get('/mascotas/{id}', [MascotaController::class, 'show']);
        Route::post('/mascotas', [MascotaController::class, 'store']);
        Route::put('/mascotas/{id}', [MascotaController::class, 'update']);
        Route::delete('/mascotas/{id}', [MascotaController::class, 'destroy']);
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});
