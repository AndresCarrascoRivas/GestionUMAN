<x-app-layout>

    <h1 class=>Aqui se mostraran las ordenes</h1>
  
    <a href="/">HOME</a>
    <br>
    <a href="{{route('ordenes.create')}}">
        Nueva orden
    </a>

    <ul>
        @foreach ($orders as $order)
            <li>
                <a href="{{route('ordenes.show', $order)}}">
                    {{ $order->id }} - {{ $order->serialUb }}
                </a>
            </li>
        @endforeach
    </ul>

    {{ $orders->links() }}

</x-app-layout>