<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/credit.css') }}">
    
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <nav>
        <a href="{{url('')}}"> < Back to Himatif Apps </a>
    </nav>
    <main class="section">
        <div class="credit-container">
            <h4>2019 - Delphi Team</h4>
            <div class="row">
                <div class="members col s12 m4 bg-dk">
                    <img class="post-image" src="{{ asset('img/mansyah.jpg') }}" alt="">
                    <span>Firmansyah Yanuar</span>
                </div>
                <div class="members col s12 m4 bg-dk-sm">
                    <img class="post-image" src="http://api.himatif.org/data/assets/foto/2017/20.jpg" alt="">
                    <span>Mohamad Achun Armando</span>
                </div>
                <div class="members col s12 m4 bg-dk">
                    <img class="post-image" src="http://api.himatif.org/data/assets/foto/2017/30.jpg" alt=""><br>
                    <span>Arif Rhizky Gilang Purnama</span>
                </div>
            </div>
        </div>
    </main>

    <section class="wrapper">
        <div id="stars"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>
    </section>
</body>

</html>