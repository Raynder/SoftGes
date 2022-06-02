@extends('layouts.app')

@section('pagina', 'Home')

@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Clientes cadastrados</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Clientes</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Clientes</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Empresa</th>
                                <th>Telefone</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->empresa }}</td>
                                    <td>{{ $cliente->telefone }}</td>
                                    <td>
                                        <a href="{{ route('clientes.update', $cliente->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('clientes.destroy', $cliente->id) }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        
                                    </td>
                              @endforeach

                        </tbody>
                        
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

            <div class="row">
              <div class="col-12">
                  <a href="{{ route('clientes.create') }}" class="btn btn-success float-right">Novo cliente</a>
              </div>
          </div>
        </section>
    </div>
@endsection
