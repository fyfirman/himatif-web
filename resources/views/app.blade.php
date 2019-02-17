<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! MaterializeCSS::include_full() !!}
    
    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    @yield('css')
    
    
    <title>{{ config('app.name') }}</title>
</head>

<body>
    @include('partials.nav-standard')
    @include('landing.sidenav')
    <main class="section">
        @yield('content')
    </main>

    <footer class="row">
        @include('partials.footer')
    </footer>
</body>

</html>