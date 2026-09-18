<?php

namespace App\Http\Controllers;
use App\Models\Evento;//lembrar

use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->input('busca');

        if ($busca){
            //lembrar de mudar o nome de onde esta Evento, para o nome do arquivo
            //que esta na pasta models
            $eventos = Evento::where('titulo', 'like', "%{$busca}%", 'and')
            ->orderBy('titulo', 'ASC')
            ->get();
        } else{
            $eventos = Evento::orderBy('titulo', 'ASC') -> get();
        }

        return view ('eventos.index', compact('eventos', 'busca'));
    }

    public function create()
    {
        return view ('eventos.create');
    }


     public function store (Request $request)
    {
        $dadosValidos = $request -> validate([
            'titulo' => 'required|min:3|max:255',
            'local' => 'required|min:2|max:200',
            'vagas' => 'required|integer|min:1',
            'preco_inscricao' => 'required|numeric|min:0',
        ]);

        Evento::create($dadosValidos);
        return redirect('/eventos') ->with('sucesso', 'Evento cadastrado com sucesso');
    }

}
