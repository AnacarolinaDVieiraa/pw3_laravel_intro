<?php

namespace App\Http\Controllers;
use App\Models\Oficina; //LEMBRAR
use Illuminate\Http\Request;

class OficinaController extends Controller
{
    public function index()
    {
    //LEMBRAR
    $oficinas = Oficina::orderBy('nome_oficina')->get();
    return view ('oficinas.index', compact('oficinas'));
    }
    
    public function store(Request $request)
    {
        //LEMBRAR
        $dados = $request->validate([
        'nome_oficina' => 'required|integer|min:4',
        'professor_responsavel' => 'required|integer|min:4',
        'carga_horaria' => 'required|integer|min:20|max:120',
        'turno' => 'required',

        ]);
       //LEMBRAR
        Oficina::create($dados);
        return redirect('/oficinas');
    }

}
