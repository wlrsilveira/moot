<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Moot')</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <nav class="bg-moot-white shadow-sm mb-8 border-b border-moot-orange">
        <div class="container mx-auto px-4 py-4 flex items-center">
            <img src="{{ asset('/images/moot.png') }}" alt="Moot Logo" class="h-10 mr-4">
            <h1 class="text-2xl font-bold text-moot-orange">Busca de Produtos</h1>
        </div>
    </nav>
    <main>
       @yield('content')
    </main>
    @livewireScripts
</body>
</html>
