<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11</title>

    {{-- fontawesome --}}
    {{-- tipografia --}}

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> --}}
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    
    <header></header>

    {{$slot}}

    <footer></footer>

    <!-- jQuery (requerido por Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Activación de Select2 -->
    <script>
        $(document).ready(function() {
            $('#serialUb').select2({
                placeholder: "Busca o selecciona un equipo UB",
                allowClear: true,
                width: 'style'
            });
        });
</script>
</body>
</html>