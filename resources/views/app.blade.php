<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! MaterializeCSS::include_full() !!}
    
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    
    
    <title>{{ config('app.name') }}</title>
</head>

<body>
    @include('partials.nav')
    <main class="section">
        @yield('content')
    </main>

    <footer class="row">
        @include('partials.footer')
    </footer>
</body>

</html>