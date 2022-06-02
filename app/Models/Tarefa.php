<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descricao', 'projeto_id'];

    public function removerTarefas($id){
        $subtarefas = Subtarefa::where('projeto_id', $id)->get();

        foreach($subtarefas as $subtarefa){
            $subtarefa->delete();
        }
        
        $tarefas = Tarefa::where('projeto_id', $id)->get();

        foreach($tarefas as $tarefa){
            $tarefa->delete();
        }
        return true;
    }
}
