<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Liga de Football Flag de Mar del Plata - Sin contacto, máxima intensidad. Unite a la revolución del deporte en la costa.')">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-liga.png') }}">
    <title>@yield('title', 'Liga de Flag Football MDP')</title>
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
