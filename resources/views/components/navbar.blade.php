<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">UMAN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="/">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('faenas.index') }}">Faenas</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('tecnicos.index') }}">Técnicos</a></li>

                <!-- ✅ Dropdown Componentes -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="componentesDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Componentes
          </a>
          <ul class="dropdown-menu" aria-labelledby="componentesDropdown">
            <li><a class="dropdown-item" href="{{ route('pcbuman.index') }}">PCB UMAN</a></li>
            <li><a class="dropdown-item" href="{{ route('versionuman.index') }}">Versión UMAN</a></li>
            <li><a class="dropdown-item" href="{{ route('versionsd.index') }}">Versión SD</a></li>
          </ul>
        </li>

                        <!-- ✅ Dropdown Laboratorio-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="laboratorioDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Laboratorio
          </a>
          <ul class="dropdown-menu" aria-labelledby="laboratorioDropdown">
            <li class="nav-item"><a class="nav-link" href="{{ route('ordenlaboratorio.index') }}">Órdenes Laboratorio</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('equiposUman.index') }}">Equipos UMAN</a></li>
          </ul>
        </li>

                                <!-- ✅ Dropdown Faena-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="faenaDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Faena
          </a>
          <ul class="dropdown-menu" aria-labelledby="faenaDropdown">
            <li class="nav-item"><a class="nav-link" href="{{ route('equiposmineros.index') }}">Equipos mineros</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ordenfaena.index') }}">Órdenes Faena</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('checkfaenas.index') }}">Check Faenas</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

