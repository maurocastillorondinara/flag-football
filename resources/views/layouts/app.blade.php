<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Fútbol Americano Mar del Plata - Trabajo en equipo, disciplina, máxima intensidad.')">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-liga.png') }}">
    <title>@yield('title', 'FAMDQ - Fútbol Americano Mar del Plata')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('components.header')

    <main>
        @yield('content')
    </main>

    @include('components.footer')
</body>
</html>
