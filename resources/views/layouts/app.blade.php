<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevStagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body class="bg-gray-100">
    <header class="p-5 border-bottom bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">DevStagram</h1>
            <nav class="flex gap-2 items-center">
                <a href="#" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                <a href="/crear-cuenta" class="font-bold uppercase text-gray-600 text-sm">Crear Cuenta</a>
            </nav>
        </div>

    </header>
    <main class="container mx-auto mt-10 px-12">
        <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
        @yield('contenido')
    </main>
    <footer class="text-center p-5 text-gray-500 font-bold uppercase mt-10">
        {{-- DevStagram - Todos los derechos reservados @php echo date ('Y') @endphp --}}
        {{-- HELPERS LARAVEL --}}
        DevStagram - Todos los derechos reservados {{now()->year}}
    </footer>

</body>

</html>
