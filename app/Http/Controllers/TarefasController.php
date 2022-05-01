<?php

namespace App\Http\Controllers;
use App\Models\Tarefa;
use App\Models\Projeto;
use App\Models\Subtarefa;

use Illuminate\Http\Request;

class TarefasController extends Controller
{
    public function index(Request $request)
    {
        $tarefas = Tarefa::where('projeto_id', $request->projeto)->get();
        $subtarefas = Subtarefa::where('projeto_id', $request->projeto)->get();
        $projeto = Projeto::find($request->projeto);

        // dividir subtarefas por tarefa_id
        $subtarefas_por_tarefa = [];
        foreach ($subtarefas as $subtarefa) {
            $subtarefas_por_tarefa[$subtarefa->tarefa_id][] = $subtarefa;
        }
        return view('tarefas.index', compact('tarefas', 'subtarefas_por_tarefa', 'projeto'));
    }

    public function store(Request $request){
        // $salvar tarefa e suas subtarefas
        $tarefa = new Tarefa();
        $tarefa->projeto_id = $request->projeto_id;
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->save();

        // salvar subtarefas
        $subtarefas = $request->subtarefas;
        foreach($subtarefas as $subtarefa){
            $subtarefaObj = new Subtarefa();
            $subtarefaObj->tarefa_id = $tarefa->id;
            $subtarefaObj->projeto_id = $request->projeto_id;
            $subtarefaObj->tarefa = $subtarefa;
            $subtarefaObj->status = 0;
            $subtarefaObj->save();
        }

        return redirect()->route('tarefas', ['projeto' => $request->projeto_id]);
    }
}
