@if(Auth::check())
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('img/logo.png'); }}" alt="Lobe Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Lobe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          {{-- rota para deslogar usuario --}}
          <a href="{{ route('logout') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Formulario de Busca -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- Menu unico --}}
          <li class="nav-item">
            <a href="{{ route('home'); }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Perfil
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('clientes'); }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Clientes
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          
          {{-- Multi menu --}}
          <li class="nav-item">

            {{-- Nome --}}
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Projetos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            {{-- Submenus --}}
            <ul class="nav nav-treeview">
              @php
                $projetos = DB::table('projetos')
                ->join('membros_projeto', 'projetos.id', '=', 'membros_projeto.projeto_id')
                ->where('membros_projeto.user_id', auth()->user()->id)->get();
                                
                foreach ($projetos as $projeto) {
                  echo '<li class="nav-item">
                    <a href="'.route('tarefas').'?projeto='. $projeto->projeto_id .'" class="nav-link">
                      <i class="fas fa-tasks nav-icon"></i>
                      <p>'. $projeto->nome .'</p>
                    </a>
                  </li>';
                }
              @endphp
              <li class="nav-item">
                <a href="{{ route('projetos.list'); }}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Novo / Todos</p>
                </a>
              </li>
            </ul>

          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@else

@endif