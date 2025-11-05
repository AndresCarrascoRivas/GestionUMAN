<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11</title>

    {{-- fontawesome --}}
    {{-- tipografia --}}

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    
    <header class="border-bottom">
        @include('components.navbar')
    </header>

    <main class="container my-4">
        {{ $slot }}
    </main>

    <footer class="text-center py-3 mt-auto border-top bg-light">
        <small class="text-muted">&copy; {{ date('Y') }} - Tu aplicación Laravel</small>
    </footer>


    <!-- Scripts -->
    <!-- jQuery (requerido por Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 JS y CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#uman_serial').select2({
                placeholder: "Buscar Serial UMAN...",
                allowClear: true,
                width: 'resolve'
            });
        });
    </script>
    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs" defer></script>

</body>
</html>