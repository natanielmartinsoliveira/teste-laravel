<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProdutosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// List produtos
Route::middleware('auth:sanctum')->get('produtos', [ProdutosController::class, 'index']);

// List single produto
Route::middleware('auth:sanctum')->get('produto/{id}', [ProdutosController::class, 'show']);

// Create new produto
Route::middleware('auth:sanctum')->post('produto', [ProdutosController::class, 'store']);

// Update produto
Route::middleware('auth:sanctum')->put('produto/{id}', [ProdutosController::class, 'update']);

// Delete produto
Route::middleware('auth:sanctum')->delete('produto/{id}', [ProdutosController::class,'destroy']);

// Delete produto
Route::middleware('auth:sanctum')->post('upload', [ProdutosController::class,'upload']);

// List Categorias
Route::middleware('auth:sanctum')->get('categorias', [CategoriasController::class,'list']);