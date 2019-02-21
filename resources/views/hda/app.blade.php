<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! MaterializeCSS::include_full() !!}
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/hda.css') }}">
    
    <title>{{ config('app.name') }}</title>
</head>

<body>
    @include('hda.detailProfile')
    @include('partials.nav-hda')
    @include('hda.sidenav')
    <main class="section">
        {{-- @yield('content') --}}
        <div id="contentHda" class="row">
            {{-- Ajax Request --}}
        </div>
        {{-- Loading anim --}}
        @include('partials.preloader')
    </main>

    <footer class="row">
        @include('partials.footer')
    </footer>
</body>

</html>