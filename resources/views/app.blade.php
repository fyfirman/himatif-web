<!DOCTYPE html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! MaterializeCSS::include_full() !!}
    
    <title>{{ config('app.name') }}</title>
</head>

<body>
    @include('partials.nav')

    <footer class="row">
        @include('partials.footer')
    </footer>
</body>

</html>