<x-app-layout>

    <h1>Aqui se mostraran los equipos UB</h1>
  
    <a href="/">HOME</a>
    <br>
    <a href="{{route('equiposUb.create')}}">
        Ingresar Equipo
    </a>

    <ul>
        @foreach ($equiposUb as $equipoUb)
            <li>
                <a href="{{route('equiposUb.show', $equipoUb)}}">
                    {{ $equipoUb->serialUb }}
                </a>
            </li>
        @endforeach
    </ul>

    {{ $equiposUb->links() }}

</x-app-layout>