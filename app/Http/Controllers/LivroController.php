<?php

namespace App\Http\Controllers;
use App\Models\Livro; //LEMBRAR DESSE CAMINHO 
use Illuminate\Http\Request;

class LivroController extends Controller
{
    //
    public function index()
    {      
    $livros = Livro::orderBy('autor')->get();
    return view('livros.index', compact('livros'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'autor' => 'required|min:3',
            'titulo' => 'required|min:2',
            'ano_publicacao' => 'required|date|min:8',
            
        ]);
        Livro::create($dados);

        return redirect('/livros');
    }
}

