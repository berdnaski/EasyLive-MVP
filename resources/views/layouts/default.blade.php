<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Meu Título')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>

    <div class="bg-red-400 p-8 h-screen flex md:flex-col items-center justify-center">

    @yield('content')
</body>

</html>
