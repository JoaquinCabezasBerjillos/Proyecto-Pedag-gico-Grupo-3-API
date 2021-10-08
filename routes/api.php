<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;

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


// Route::middleware(['first', 'second'])->group(function () {

// Route::prefix('usuarios')->group(function() {
//     Route::post('/register', [AuthController::class, 'register']);


//   });

//  Route::prefix('admin')->group(function() {
//     Route::post('/register', [AuthController::class, 'register']);


// });

// });


Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/productos', [ProductoController::class, 'index']);
    Route::get('/productos/{id}', [ProductoController::class, 'show']);
    Route::post('/productos', [ProductoController::class, 'store']);
    Route::patch('/productos/{id}', [ProductoController::class, 'update']);
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);


    Route::get('/logout', [AuthController::class, 'logout']);
});
