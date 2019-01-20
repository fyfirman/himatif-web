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
    @include('hda.detailProfile')
    
    {{-- Side Navigation --}}
    @include('admin.sidenav')

    {{-- Top Navigation --}}
    @include('partials.nav-hda')


    <main class="section">
        
        <ul class="tabs">
            <li class="tab col s3"><a id="btn2012" href="#">2012</a></li>
            <li class="tab col s3"><a id="btn2013" href="#">2013</a></li>
            <li class="tab col s3"><a id="btn2014" href="#">2014</a></li>
            <li class="tab col s3"><a id="btn2015" href="#">2015</a></li>
            <li class="tab col s3"><a id="btn2016" href="#">2016</a></li>
            <li class="tab col s3"><a id="btn2017" href="#">2017</a></li>
            <li class="tab col s3"><a id="btn2018" class="active" href="#">2018</a></li>
        </ul>
        <script>
            // Installation tab
            $(document).ready(function(){
                $('.tabs').tabs();
            });
        </script>
        <div id="contentHda" class="row">
            @yield('content')
            {{-- Ajax Request --}}
        </div>
        {{-- Loading anim --}}
        <div id="loading" class="center hide">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                    <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                    <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                    <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                    <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="row">
        @include('partials.footer')
    </footer>
</body>

</html>