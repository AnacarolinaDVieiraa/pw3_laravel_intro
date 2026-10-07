<?php

use Illuminate\Support\Facades\Route;
//LEMBRAR
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventoController;

Route::get('/', function () {
    return view('home');
});
//LEMBRAR
Route::view('/landing' , 'landing');
// Rota de listagem e painel administrativo GET
Route::get('/admin', [UserController::class, 'index']);
// Rota para carregar o formulario (GET)
// Rotas de criação
Route::get('/usuarios/novo', [UserController::class, 'create']);
// Rota para salvar os dados enviados (POST)
Route::post('/usuarios', [UserController::class, 'store']);

// Rotas de edição e atualização
Route::get('/usuarios/{id}/editar', [UserController::class, 'edit']);
Route::put('/usuarios/{id}', [UserController::class, 'update']);

Route::get('/eventos', [EventoController::class, 'index']);

Route::get('/eventos/novo', [EventoController::class, 'create']);

Route::post('/eventos', [EventoController::class, 'store']);

Route::post('usuarios', [UserController::class, 'store']);
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::get('/livros', [LivroController::class, 'index']);
Route::post('/livros', [LivroController::class, 'store']);
Route::get('/oficinas', [OficinaController::class, 'index']);
Route::post('/oficinas', [OficinaController::class, 'store']);

// Rotas de criação
Route::get('/usuarios/novo', [UserController::class, 'create']);
Route::post('/usuarios', [UserController::class, 'store']);

// Rotas de edição e atualização
Route::get('/usuarios/{id}/editar', [UserController::class, 'edit']);
Route::put('/usuarios/{id}', [UserController::class, 'update']);