<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtarefas extends Model
{
    use HasFactory;
    protected $fillable = ['tarefa_id', 'projeto_id', 'tarefa', 'status'];
}
