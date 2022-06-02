<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projeto;
use App\Models\Tarefa;
use App\Models\Cliente;
use App\Models\User;
use DB;

class ProjetosController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        $usuarios = User::all();
        
        return view('projetos.create', compact('clientes', 'usuarios'));
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
        $projeto->cliente_id = $request->cliente_id;
        $projeto->user_id = auth()->user()->id;
        $projeto->save();
        
        $id_projeto = $projeto->id;
        $membros = $request->membros;

        foreach($membros as $membro){
            DB::table('membros_projeto')->insert([
                'user_id' => $membro,
                'projeto_id' => $id_projeto,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        
        // pegar todos os projetos com o user_id do usuario e pegar todos os projetos relacionados na tabela membros_projeto
        $projetos = DB::table('projetos')
            ->join('membros_projeto', 'projetos.id', '=', 'membros_projeto.projeto_id')
            ->where('membros_projeto.user_id', auth()->user()->id)
            ->get();
        $projetos = Projeto::where('user_id', auth()->user()->id)->get();

        return view('projetos.list', compact('projetos'));
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
        // buscar tarefas do projeto
        $tarefa = new Tarefa();
        $tarefa->removerTarefas($id);

        $projeto = Projeto::find($id);
        $projeto->delete();
        return redirect()->route('projetos.list');
    }
}
