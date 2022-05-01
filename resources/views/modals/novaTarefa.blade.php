@csrf
<div style="display: flex">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Nome da tarefa">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao">
            </textarea>
        </div>
        <div class="input-group-append">
            <div class="input-group">
                <input id="sub-tarefa" type="text" class="form-control" placeholder="Nome da sub-tarefa">

                <div class="input-group-append">
                    <button id="add-sub-tarefa" type="button" class="btn btn-primary"
                        onclick="addSubTarefa()">Add</button>
                </div>
                <!-- /btn-group -->
            </div>
        </div>

    </div>

    <div class="col-sm-6">
        <div class="card card-row card-default">
            <div class="card-header">
                <h3 class="card-title">
                </h3>
            </div>

            {{-- Sub Tarefa --}}
            <div class="card-body card-sub-tarefas">
                
            </div>
        </div>
    </div>
</div>
<script>
    function addSubTarefa() {
        var subTarefa = $('#sub-tarefa').val();
        var subTarefasAtuais = $('.card-sub-tarefas').html();

        if (subTarefa != '') {
            $('.card-sub-tarefas').html(subTarefasAtuais +
                '<div class="card"><div class="card-header card-tarefa"><h3 class="card-title">' + subTarefa +
                '</h3></div></div>');
        }
    }

    function save_novaTarefa(){
        // transformar todas as subtarefas em um array de tarefas separadas
        var tarefas = $('.card-sub-tarefas').find('.card-tarefa');
        var tarefasArray = [];
        tarefas.each(function(index, element) {
            tarefasArray.push($(element).find('.card-title').html());
        });
        
        // salvar no banco de dados
        $.ajax({
            url: '{{ route('tarefas.store') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                titulo: $('#titulo').val(),
                descricao: $('#descricao').val(),
                projeto_id: $('#projeto_id').val(),
                subtarefas: tarefasArray
            },
            success: function(data) {
                console.log(data);
                location.reload();
            }
        });
    }
</script>
