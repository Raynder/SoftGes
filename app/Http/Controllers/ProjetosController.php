<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projeto;

class ProjetosController extends Controller
{
    public function index()
    {
        return view('projetos.create');
    }

    public function create(Request $request){
        $regras = [
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255'
        ];

        $mensagens = [
            'required' => 'O campo :attribute é obrigatório',
            'string' => 'O campo :attribute deve ser uma string',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres'
        ];

        $request->validate($regras, $mensagens);

        $projeto = new Projeto();
        $projeto->nome = $request->nome;
        $projeto->descricao = $request->descricao;
        $projeto->user_id = auth()->user()->id;
        $projeto->save();

        return view('projetos.list');
    }

    public function list(){
        $projetos = Projeto::where('user_id', auth()->user()->id)->get();
        return view('projetos.list', compact('projetos'));
    }

    public function show($id){
        $projeto = Projeto::find($id);
        return view('projetos.show', compact('projeto'));
    }

    public function edit($id){
        $projeto = Projeto::find($id);
        return view('projetos.edit', compact('projeto'));
    }

    public function destroy($id){
        $projeto = Projeto::find($id);
        $projeto->delete();
        return redirect()->route('projetos.list');
    }
}
