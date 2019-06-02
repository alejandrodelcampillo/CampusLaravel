

@yield("casa")
<html>
<header>

</header>
<body>
<nav class="navbar navbar-expand-lg nav justify-content-center">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/home')}}"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu Materias
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('materia.index') }}">Crear materias</a>
                    <a class="dropdown-item" href="/mostrar">Ver materias</a>
                    <a class="dropdown-item" href="{{ route('user') }}">Ver usuarios</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
</body>
</html>

