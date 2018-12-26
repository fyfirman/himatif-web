<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! MaterializeCSS::include_full() !!}
    <title>HDA</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper orange">
            <a href="{{ url('hda') }}" class="brand-logo">&nbspHimatif Database</a>
            <ul class="right">
                <li><a href="{{ url('/logout') }}">Goto Home</a></li>
            </ul>
        </div>
    </nav>
    <nav>
        <div class="nav-wrapper orange darken-2">
            <div>
                <ul>
                    <li><a href="{{ url('hda/anggota/be') }}">BE</a></li>
                    <li><a href="{{ url('hda/anggota/dpa') }}">DPA</a></li>
                    <li><a href="{{ url('hda/anggota/mubes') }}">MUBES</a></li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li><a href="{{ url('hda/angkatan/2012') }}">2012</a></li>
                    <li><a href="{{ url('hda/angkatan/2013') }}">2013</a></li>
                    <li><a href="{{ url('hda/angkatan/2014') }}">2014</a></li>
                    <li><a href="{{ url('hda/angkatan/2015') }}">2015</a></li>
                    <li><a href="{{ url('hda/angkatan/2016') }}">2016</a></li>
                    <li><a href="{{ url('hda/angkatan/2017') }}">2017</a></li>
                    <li><a href="{{ url('hda/angkatan/2018') }}">2018</a></li>
                </ul>
            </div>
        </div> 
    </nav>
    <div class="row">
        @foreach ($data as $item)
            @if ($item != NULL)
                @if (isset($item->posisi) && isset($item->jabatan))
                    <div class="col s2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ $item->url_foto }}">
                                <span class="card-title">{{ $item->nama }}</span>
                                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">edit</i></a>
                            </div>
                            <div class="card-content center">
                                <p>{{ $item->npm }}</p>
                                <p>{{ $item->jabatan }}</p>
                                <p>{{ $item->posisi }}</p>
                            </div>
                        </div>
                    </div>
                @elseif(isset($item->jabatan))
                    <div class="col s2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ $item->url_foto }}">
                                <span class="card-title">{{ $item->nama }}</span>
                                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">edit</i></a>
                            </div>
                            <div class="card-content center">
                                <p>{{ $item->npm }}</p>
                                <p>{{ $item->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                @else    
                    <div class="col s2">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ $item->url_foto }}">
                                <span class="card-title">{{ $item->nama }}</span>
                                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">edit</i></a>
                            </div>
                            <div class="card-content center">
                                <p>{{ $item->npm }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
</body>
</html>