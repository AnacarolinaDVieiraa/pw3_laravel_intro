<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function create()
    {
        return view('users.create');
    }
//  Salvar o novo usuario no banco de dados com validação
    public function store(Request $request)
    {
        $dadosValidos = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Persistência no banco usando o ORM Eloquent
        User::create($dadosValidos);
        // Redireciona para o painel administrativo com mensagem de sucesso
        return redirect('/admin')->with('sucesso', 'Usuário cadastrado com sucesso.');
    }
}
