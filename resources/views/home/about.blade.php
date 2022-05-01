<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/avatar.png') }}"
                alt="User profile picture">
        </div>

        <h3 class="profile-username text-center"></h3>

        <p class="text-muted text-center">
            {{ isset($perfil->name) ? $perfil->departamento : $user->departamento }}</p>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Seguidores</b> <a class="float-right">1,322</a>
            </li>
            <li class="list-group-item">
                <b>Seguindo</b> <a class="float-right">543</a>
            </li>
        </ul>

        @php
            if (isset($perfil->name)) {
                echo '<a href="#" class="btn btn-primary btn-block"><b>Seguir</b></a>';
            }
        @endphp

    </div>
</div>