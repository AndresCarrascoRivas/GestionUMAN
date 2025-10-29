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
        <li class="nav-item"><a class="nav-link" href="{{ route('ordenlaboratorio.index') }}">Órdenes Laboratorio</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('ordenfaena.index') }}">Órdenes Faena</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('equiposUman.index') }}">Equipos UMAN</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('tecnicos.index') }}">Tecnicos</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('faenas.index') }}">Faenas</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('equiposmineros.index') }}">Equipos mineros</a></li>
      </ul>
    </div>
  </div>
</nav>

