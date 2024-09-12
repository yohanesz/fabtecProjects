<link rel="stylesheet" href="{{ asset('css/nav.css')}}">

<aside>
    <div class="topContent">
        <h1 class="nomeLogado">Yohanês</h1>
        <h2><a href="/login/logout.php">Logout</a></h2>
    </div>
    <br>
    <ul class="quadrosAside">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('usuario*') ? 'active' : '' }}" href="{{route('usuario.index')}}">usuários</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('setor*') ? 'active' : '' }}" href="{{route('setor.index')}}">setor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('perfil*') ? 'active' : '' }}" href="{{route('perfil.index')}}">perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('funcao*') ? 'active' : '' }}" href="{{route('funcao.index')}}">função</a>
        </li>
    </ul>
</aside>
