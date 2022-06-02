<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index(){

        $clientes = Cliente::all();
        return view('clientes.list', compact('clientes'));
    }

    public function create(){
        return view('clientes.create');
    }

    public function update(){
        return view('clientes.update');
    }

    public function store(){
        $cliente = new Cliente();
        $cliente->nome = request('nome');
        $cliente->empresa = request('empresa');
        $cliente->telefone = request('telefone');
        $cliente->save();

        return redirect('/clientes');
    }
}
