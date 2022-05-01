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
                                <select class="form-control select2" style="width: 100%;">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Responsavel</label>
                                <select class="form-control select2" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                {{-- <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Cliente</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEstimatedBudget">Estimated budget</label>
                            <input type="number" id="inputEstimatedBudget" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputSpentBudget">Total amount spent</label>
                            <input type="number" id="inputSpentBudget" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputEstimatedDuration">Estimated project duration</label>
                            <input type="number" id="inputEstimatedDuration" class="form-control">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div> --}}
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancelar</a>
                    <input type="submit" value="Criar Projeto" class="btn btn-success float-right">
                </div>
            </div>
        </form>

    </section>
</div>
@endsection
