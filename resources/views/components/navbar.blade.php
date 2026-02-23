<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">UMAN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="/">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('tecnicos.index') }}">Técnicos</a></li>

        <!-- ✅ Dropdown Datos faenas -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="faenasDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Datos faenas
          </a>
          <ul class="dropdown-menu" aria-labelledby="faenasDropdown">
            <li><a class="dropdown-item" href="{{ route('faenas.index') }}">Faenas</a></li>
            <li><a class="dropdown-item" href="{{ route('conexiones.index') }}">Conexiones</a></li>
          </ul>
        </li>

        <!-- ✅ Dropdown Componentes -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="componentesDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Componentes
          </a>
          <ul class="dropdown-menu" aria-labelledby="componentesDropdown">
            <li><a class="dropdown-item" href="{{ route('pcbuman.index') }}">PCB UMAN</a></li>
            <li><a class="dropdown-item" href="{{ route('versionuman.index') }}">Versión UMAN</a></li>
            <li><a class="dropdown-item" href="{{ route('versionsd.index') }}">Imagen SD</a></li>
          </ul>
        </li>

        <!-- ✅ Dropdown Laboratorio -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="laboratorioDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Laboratorio
          </a>
          <ul class="dropdown-menu" aria-labelledby="laboratorioDropdown">
            <li><a class="dropdown-item" href="{{ route('fallas.index') }}">Fallas</a></li>
            <li><a class="dropdown-item" href="{{ route('ordenlaboratorio.index') }}">Órdenes Laboratorio</a></li>
            <li><a class="dropdown-item" href="{{ route('equiposUman.index') }}">Equipos UMAN</a></li>
          </ul>
        </li>

        <!-- ✅ Dropdown Faena -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="faenaDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Faenas UMAN
          </a>
          <ul class="dropdown-menu" aria-labelledby="faenaDropdown">
            <li><a class="dropdown-item" href="{{ route('equiposmineros.index') }}">Equipos mineros</a></li>
            <li><a class="dropdown-item" href="{{ route('ordenfaena.index') }}">Órdenes Faena</a></li>
            <li><a class="dropdown-item" href="{{ route('checkfaenas.index') }}">Check Faenas</a></li>
          </ul>
        </li>

        <!-- ✅ Dropdown Usuarios -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="usuariosDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu" aria-labelledby="usuariosDropdown">
            <li><a class="dropdown-item" href="{{ route('users.index') }}">Listado de usuarios</a></li>
            <li><a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a></li>
          </ul>
        </li>
      </ul>

      <!-- ✅ Perfil y Logout -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profile.edit') }}">Perfil</a>
        </li>
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm ms-2">
              Cerrar sesión
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>