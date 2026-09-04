<?php

use Illuminate\Support\Facades\Route;
//LEMBRAR
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});
//LEMBRAR
Route::view('/landing' , 'landing');
Route::view('/admin', 'admin.dashboard');
// Rota para carregar o formulario (GET)
Route::get('/usuarios/novo', [UserController::class, 'create']);
// Rota para salvar os dados enviados (POST)
Route::post('usuarios', [UserController::class, 'store']);
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::get('/livros', [LivroController::class, 'index']);
Route::post('/livros', [LivroController::class, 'store']);
Route::get('/oficinas', [OficinaController::class, 'index']);
Route::post('/oficinas', [OficinaController::class, 'store']);