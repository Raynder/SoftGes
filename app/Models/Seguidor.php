<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguidor extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'seguidor_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function search(){
        $pessoa = User::where('name', 'like', '%'.$_GET['search'].'%')->get()[0];
        return $pessoa;
    }
    
}
