<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //Exige a listagem de usuarios com suporte a filtro de busca
    public function index(Request $request)
    {
        // Captura o termo de busca enviado pelo GET
    $busca = $request->input('busca');

       if ($busca){
         $usuarios = User::where('name', 'like', "%{$busca}%", 'and')
         ->orderBy('name','ASC')
         ->get();
     } else {
    $usuarios = User::orderBy('name', 'ASC') ->get();
     }

// Retorna a view do painel
     return view('admin.dashboard' , compact('usuarios', 'busca'));

    }


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
