<form class="form-horizontal" action="{{ route('home.update') }}" method="POST">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name"
                value="{{ isset($perfil->name) ? $perfil->name : $user->name }}" {{ isset($perfil->name) ? "disabled='disabled'" : '' }}
                placeholder="Digite seu nome">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email"
                value="{{ isset($perfil->name) ? $perfil->email : $user->email }}" {{ isset($perfil->name) ? "disabled='disabled'" : '' }}
                placeholder="email@dominio.com">
        </div>
    </div>
    <div class="form-group row">
        <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="telefone" name="telefone"
                value="{{ isset($perfil->name) ? $perfil->telefone : $user->telefone }}" {{ isset($perfil->name) ? "disabled='disabled'" : '' }}
                placeholder="(62) 9 9999-9999">
        </div>
    </div>
    <div class="form-group row">
        <label for="departamento" class="col-sm-2 col-form-label">Departamento</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="departamento"
                name="departamento"
                value="{{ isset($perfil->name) ? $perfil->departamento : $user->departamento }}" {{ isset($perfil->name) ? "disabled='disabled'" : '' }}
                placeholder="Digite seu departamento">
        </div>
    </div>
    {{-- <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> I agree to the <a href="#">terms and
                        conditions</a>
                </label>
            </div>
        </div>
    </div> --}}
    @isset($perfil->name)
    @else
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Salvar</button>
            </div>
        </div>
    @endif
</form>