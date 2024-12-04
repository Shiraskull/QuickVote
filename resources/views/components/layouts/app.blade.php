<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gradient-to-b flex flex-col  from-blue-50 to-white min-h-screen">
        @if (request()->route()->getName() !== 'login')
            @livewire('header')
        @endif
        <main class=" flex-grow">
            {{ $slot }}
        </main>

        @if (request()->route()->getName() !== 'login')
            @livewire('footer')
        @endif

        @vite('resources/js/app.js')
    </body>
</html>
