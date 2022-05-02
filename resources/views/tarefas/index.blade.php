@extends('layouts.app')

@section('pagina', 'Projetos')

@section('content')
    <div class="content-wrapper kanban">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>{{ $projeto->nome }}</h1>
                    </div>
                    <div class="col-sm-6 d-none d-sm-block">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('projetos.list') }}">Projetos</a></li>
                            <li class="breadcrumb-item active">{{ $projeto->nome }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content pb-3">
            <div class="container-fluid h-100">

                {{-- A fazer --}}
                <div class="card card-row card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            A fazer
                        </h3>
                    </div>

                    <div class="card-body">
                        <div class="card novaTarefa" onclick="Form.build_form('Nova tarefa')" data-toggle="modal"
                            data-target="#modal-lg">
                            <div class="card-header">
                                <h5 class="card-title">Nova tarefa</h5>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-tool">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>


                        @foreach ($tarefas as $tarefaPai)
                            @if ($tarefaPai->status == '0')
                                <div class="card card-tarefa-move card-info card-outline" id="{{ $tarefaPai->id }}"
                                    draggable="true">
                                    <div class="card-header">
                                        <h5 class="card-title">{{ $tarefaPai->titulo }}</h5>
                                        <div class="card-tools">
                                            <a href="#" class="btn btn-tool">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </div>
                                    </div>
                                    {{-- listar subtarefas desta tarefa --}}
                                    <div class="card-body">
                                        @foreach ($subtarefas_por_tarefa[$tarefaPai->id] as $subtarefa)
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" disabled type="checkbox"
                                                    id="subtarefa{{ $subtarefa->id }}">
                                                <label for="subtarefa{{ $subtarefa->id }}"
                                                    class="custom-control-label">{{ $subtarefa->tarefa }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $tarefaPai->descricao }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>

                {{-- Em andamento --}}
                <div class="card card-row card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Em andamento
                        </h3>
                    </div>

                    <div class="card-body dropzone" id="1">
                        @foreach ($tarefas as $tarefaPai)
                            @if ($tarefaPai->status == '1')
                                <div class="card card-tarefa-move card-info card-outline" id="{{ $tarefaPai->id }}"
                                    draggable="true">
                                    <div class="card-header">
                                        <h5 class="card-title">{{ $tarefaPai->titulo }}</h5>
                                        <div class="card-tools">
                                            <a href="#" class="btn btn-tool">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </div>
                                    </div>
                                    {{-- listar subtarefas desta tarefa --}}
                                    <div class="card-body">
                                        @foreach ($subtarefas_por_tarefa[$tarefaPai->id] as $subtarefa)
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" {{ $subtarefa->status == 1 ? 'checked' : '' }}
                                                    id="subtarefa{{ $subtarefa->id }}">
                                                <label for="subtarefa{{ $subtarefa->id }}"
                                                    class="custom-control-label">{{ $subtarefa->tarefa }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $tarefaPai->descricao }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- Aguardando --}}
                <div class="card card-row card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Aguardando
                        </h3>
                    </div>

                    <div class="card-body dropzone" id="2">
                        @foreach ($tarefas as $tarefaPai)
                            @if ($tarefaPai->status == '2')
                                <div class="card card-tarefa-move card-info card-outline" id="{{ $tarefaPai->id }}"
                                    draggable="true">
                                    <div class="card-header">
                                        <h5 class="card-title">{{ $tarefaPai->titulo }}</h5>
                                        <div class="card-tools">
                                            <a href="#" class="btn btn-tool">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </div>
                                    </div>
                                    {{-- listar subtarefas desta tarefa --}}
                                    <div class="card-body">
                                        @foreach ($subtarefas_por_tarefa[$tarefaPai->id] as $subtarefa)
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" {{ $subtarefa->status == 1 ? 'checked' : '' }}
                                                    id="subtarefa{{ $subtarefa->id }}">
                                                <label for="subtarefa{{ $subtarefa->id }}"
                                                    class="custom-control-label">{{ $subtarefa->tarefa }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $tarefaPai->descricao }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>

                {{-- Finalizadas --}}
                <div class="card card-row card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Finalizadas
                        </h3>
                    </div>

                    <div class="card-body dropzone" id="3">
                        @foreach ($tarefas as $tarefaPai)
                            @if ($tarefaPai->status == '3')
                                <div class="card card-tarefa-move card-info card-outline" id="{{ $tarefaPai->id }}"
                                    draggable="true">
                                    <div class="card-header">
                                        <h5 class="card-title">{{ $tarefaPai->titulo }}</h5>
                                        <div class="card-tools">
                                            <a href="#" class="btn btn-tool">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </div>
                                    </div>
                                    {{-- listar subtarefas desta tarefa --}}
                                    <div class="card-body">
                                        @foreach ($subtarefas_por_tarefa[$tarefaPai->id] as $subtarefa)
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" {{ $subtarefa->status == 1 ? 'checked' : '' }}
                                                    id="subtarefa{{ $subtarefa->id }}">
                                                <label for="subtarefa{{ $subtarefa->id }}"
                                                    class="custom-control-label">{{ $subtarefa->tarefa }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $tarefaPai->descricao }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    </div>

    <input type="hidden" id="projeto_id" value="{{ $projeto->id }}">
    <button type="button" class="btn btn-success swalDefaultSuccess">
        Launch Success Toast
    </button>
@endsection

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script>
    $(function() {
        Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

    });

    function alerta(icon, title) {
        Toast.fire({
            icon: icon,
            title: title
        })
    }
</script>

<script>
    function build_form(rota) {
        route = rota.toLowerCase();
        route = route.split(' ')
        route[1] = route[1].charAt(0).toUpperCase() + route[1].slice(1);
        route = route.join('');

        $.ajax({
            url: 'modals/' + route,
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                $('#modal-body').html(data);
                $('.modal-title').html(rota);
                $('#modal-save').attr('onclick', 'save_' + route + '()');
            }
        })
    }

    dropzoneEnd = '';
    dropzoneStart = '';

    setTimeout(function() {
        cards = document.querySelectorAll('.card-tarefa-move');
        dropzones = document.querySelectorAll('.dropzone');

        // Cards 
        cards.forEach((card) => {
            card.addEventListener('dragstart', dragstart);
            card.addEventListener('dragend', dragEnd);
            card.addEventListener('drag', drag);
        });


        function dragstart() {
            //this = card
            dropzones.forEach((dropzone) => {
                dropzone.classList.add('highlight');
            });

            this.classList.add('is-dragging');
            dropzoneStart = this.parentElement.id;
        }

        function dragEnd() {
            //this = card
            dropzones.forEach((dropzone) => {
                dropzone.classList.remove('highlight');
            });

            this.classList.remove('is-dragging');

            // Atualizar status da tarefa
            if (dropzoneStart != dropzoneEnd.id) {
                attStatus(this.id, dropzoneEnd.id);

                // remover disabled dos checkboxes
                this.querySelectorAll('.custom-control-input').forEach((checkbox) => {
                    checkbox.disabled = false;
                });
            }

        }

        function drag() {
            // console.log('card drag');
        }

        // dropzones
        dropzones.forEach((dropzone) => {
            dropzone.addEventListener('dragover', dragover);
            dropzone.addEventListener('dragenter', dragenter);
            dropzone.addEventListener('dragleave', dragleave);
            dropzone.addEventListener('drop', drop);
        });

        function dragover() {
            //this = dropzone
            this.classList.add('over');

            const cardBeingDragged = document.querySelector('.is-dragging');
            dropzoneEnd = this;

            this.appendChild(cardBeingDragged);

        }

        function dragenter() {
            //this = dropzone
        }

        function dragleave() {
            //this = dropzone
            this.classList.remove('over');
        }

        function drop() {
            console.log('dropzone drop');
        }

        function attStatus(id_tarefa, id_dropzone) {
            $.ajax({
                url: 'tarefas/' + id_tarefa,
                type: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: id_dropzone
                },
                success: function(data) {
                    data = JSON.parse(data);
                    alerta(data.icon, data.title);
                }
            });
        }

        // verificar se o checkbox de alguma subtarefa foi marcado
        $('.custom-control-input').on('change', function() {
            if (this.checked) {
                // atualizar status da subtarefa no banco
                $.ajax({
                    url: 'subtarefas/' + this.id.replace('subtarefa', ''),
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: 1
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        alerta(data.icon, data.title);
                    }
                });
            } else {
                // atualizar status da subtarefa no banco
                $.ajax({
                    url: 'subtarefas/' + this.id.replace('subtarefa', ''),
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: 0
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        alerta(data.icon, data.title);
                    }
                });
            }
        });
    }, 2000);
</script>
