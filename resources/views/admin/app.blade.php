<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! MaterializeCSS::include_full() !!}
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/admin.css') }}">
    
    <title>{{ config('app.name') }}</title>
</head>

<body>
    {{-- Modals Detail Profile --}}
    @include('admin.detailProfile')
    
    {{-- Side Navigation --}}
    @include('admin.sidenav')

    @yield('nav')

    <main class="section">
        
        
        <script>
            // Installation tab
            $(document).ready(function(){
                $('.tabs').tabs();
            });
        </script>
        <div  class="row">
            @yield('content')
            {{-- Ajax Request --}}
        </div>
        @yield('loading-animation')
    </main>

    <footer class="row">
        @include('partials.footer')
    </footer>
</body>

</html>