<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-16 flex flex-col items-center justify-center min-h-[70vh]">

        <h1 class="text-4xl font-extrabold mb-10 text-center text-gray-800">
             Sistema de Gestion UMAN
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 w-full max-w-md text-center">
            {{-- Órdenes --}}
            <a href="{{ route('ordenlaboratorio.index') }}"
                class="flex flex-col items-center justify-center bg-blue-600 hover:bg-blue-700 text-blue font-semibold py-6 px-6 rounded-lg shadow-md transition transform hover:scale-105">
                <div class="text-5xl mb-2">📋</div>
                <div class="text-lg">Órdenes Laboratorio</div>
            </a>

            {{-- Equipos UMAN --}}
            <a href="{{ route('equiposUman.index') }}"
                class="flex flex-col items-center justify-center bg-green-600 hover:bg-green-700 text-blue font-semibold py-6 px-6 rounded-lg shadow-md transition transform hover:scale-105">
                <div class="text-5xl mb-2">🛠️</div>
                <div class="text-lg">Equipos UMAN</div>
            </a>

            {{-- Tecnicos --}}
            <a href="{{ route('tecnicos.index') }}"
                class="flex flex-col items-center justify-center bg-green-600 hover:bg-green-700 text-blue font-semibold py-6 px-6 rounded-lg shadow-md transition transform hover:scale-105">
                <div class="text-5xl mb-2">🛠️</div>
                <div class="text-lg">tecnicos</div>
            </a>

            {{-- Faenas --}}
            <a href="{{ route('faenas.index') }}"
                class="flex flex-col items-center justify-center bg-green-600 hover:bg-green-700 text-blue font-semibold py-6 px-6 rounded-lg shadow-md transition transform hover:scale-105">
                <div class="text-5xl mb-2">🛠️</div>
                <div class="text-lg">Faenas</div>
            </a>

            {{-- Equipos mineros --}}
            <a href="{{ route('equiposmineros.index') }}"
                class="flex flex-col items-center justify-center bg-green-600 hover:bg-green-700 text-blue font-semibold py-6 px-6 rounded-lg shadow-md transition transform hover:scale-105">
                <div class="text-5xl mb-2">🛠️</div>
                <div class="text-lg">Equipos Mineros</div>
            </a>
        </div>

        <div class="mt-12 text-sm text-gray-500 text-center">
            Sistema optimizado para seguimiento de órdenes y equipos técnicos.
        </div>
    </div>
</x-app-layout>
