@extends('layouts.app')

@section('pagina', 'Home')

@section('content')
<div class="content-wrapper" style="min-height: 1345.31px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cadastrar projetos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Cadastrar projetos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <form action="{{ route('projetos.create'); }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Projeto</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" id="nome" name="nome" value="{{ old('nome') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <textarea id="descricao" name="descricao" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Cliente</label>
                                <select class="form-control select2 select-cliente" style="width: 100%;">
                                    <option value="" selected="selected"></option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label>Membro</label>
                            <div class="selectButton">
                                <div class="form-group" style="width: 80%;float: left;">
                                    <select class="form-control select2 select-membro" style="">
                                        <option value="" selected="selected"></option>
                                        @if (count($usuarios) > 0)
                                            @foreach ($usuarios as $usuario)
                                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
    
                                <div class="input-group-append" style="width: 20%;">
                                    <label class=""></label>
                                    <button id="add-membro" type="button" class="btn btn-primary"
                                        onclick="Membros.addMembros()">Add</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-sm-6">
                    <div class="card card-row card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                            </h3>
                        </div>

                        {{-- Membro --}}
                        <div class="card-body card-membros">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancelar</a>
                    <input type="button" onclick="Membros.membrosProjetos('{{ route('projetos.create') }}','{{ csrf_token() }}')" value="Criar Projeto" class="btn btn-success float-right">
                </div>
            </div>
        </form>

    </section>
</div>
@endsection
