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
        <section class="wrapper">
            <div id="stars"></div>
            <div id="stars2"></div>
            <div id="stars3"></div>
        </section>
        <div class="credit-container">
            <h1>decoder team;</h1>
            <p>Tim berasal dari Delphi ini membawa konsep aplikasi HDA berkembang lebih luas. </p>
            <div class="row">
                <div class="members col s12 m4 bg-dk">
                    <img class="post-image" src="{{ asset('img/mansyah.jpg') }}" alt="">
                    <span class="name">Firmansyah Yanuar</span>
                    <span>Front-End Developer, UI/UX Designer</span>
                </div>
                <div class="members col s12 m4 bg-dk-sm">
                    <img class="post-image" src="{{ asset('img/achun.jpg') }}" alt="">
                    <span class="name">Mohamad Achun Armando</span>
                    <span>Front-End Developer, Back-End Developer</span>
                </div>
                <div class="members col s12 m4 bg-dk">
                    <img class="post-image" src="{{ asset('img/argil.png') }}" alt=""><br>
                    <span class="name">Arif Rhizky Gilang Purnama</span>
                    <span>Back-End Developer</span>
                </div>
            </div>
        </div>
    </main>
</body>

</html>