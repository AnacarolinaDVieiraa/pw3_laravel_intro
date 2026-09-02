<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
//LEMBRAR
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\OficinaController;


Route::get('/', function () {
    return view('home');
});
//LEMBRAR
Route::view('/landing' , 'landing');
Route::view('/admin', 'admin.dashboard');

Route::get('/teste-orm', function () {
        User::insert([
            'name' => 'Ana Clara Santos',
            'email' => 'ana.santos@escola.sp.gov.br',
            'password' => '12345678'
        ]);
    

    return User::all();
});



Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::get('/livros', [LivroController::class, 'index']);
Route::post('/livros', [LivroController::class, 'store']);
Route::get('/oficinas', [OficinaController::class, 'index']);
Route::post('/oficinas', [OficinaController::class, 'store']);