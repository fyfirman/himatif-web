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
                <div class="col s12 m4">
                    Firmansyah Yanuar
                </div>
                <div class="col s12 m4">
                    Mohamad Achun Armando
                </div>
                <div class="col s12 m4">
                    Arif Rhizky Gilang Purnama
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