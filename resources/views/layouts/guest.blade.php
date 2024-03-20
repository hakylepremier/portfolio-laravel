<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="overflow-x-auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::asset('resources/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ Vite::asset('resources/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ Vite::asset('resources/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ Vite::asset('resources/images/favicon/site.webmanifest') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    {{-- <link href="/styles/base16/solarized-dark.css" media="(prefers-color-scheme: dark)" rel="stylesheet">
    <link href="/styles/base16/solarized-light.css"
        media="(prefers-color-scheme: light), (prefers-color-scheme: no-preference)" rel="stylesheet"> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

    <!-- SVG -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- Styles -->
    @livewireStyles
</head>

<body class="md:overflow-x-auto overflow-x-hidden">
    <div class="font-sans antialiased text-gray-600 dark:text-gray-100">
        {{ $slot }}
    </div>

    <!-- and it's easy to individually load additional languages -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/go.min.js"></script> --}}

    <script>
        hljs.highlightAll();
    </script>
    @livewireScripts
</body>

</html>
