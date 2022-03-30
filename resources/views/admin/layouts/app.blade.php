<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Curso Laravel =)</title>

    @stack('styles')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>