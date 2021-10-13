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





Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function() {
  
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::patch('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);
    
Route::get('/clientes/{id}', [ClienteController::class, 'index']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::get('/clientes/mostrar/{id}', [ClienteController::class, 'show']);
Route::put('/clientes/actualizar/{id}', [ClienteController::class, 'update']);
Route::delete('/clientes/borrar/{id}', [ClienteController::class, 'destroy']);

Route::get('/mascotas', [MascotaController::class, 'index']);
Route::get('/mascotas/mostrar/{id}', [MascotaController::class, 'show']);
Route::post('/mascotas', [MascotaController::class, 'store']);
Route::put('/mascotas/actualizar/{id}', [MascotaController::class, 'update']);
Route::delete('/mascotas/borrar/{id}', [MascotaController::class, 'destroy']);


Route::get('/logout', [AuthController::class, 'logout']);
});

