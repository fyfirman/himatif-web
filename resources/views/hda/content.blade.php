@extends('hda.app')

@section('content')
    <div class="row">
        @foreach ($data as $item)
            @if ($item != NULL)
                <div class="col m3 s6 custom-col">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ $item->url_foto }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">{{ $item->nama }}<i class="material-icons right">more_vert</i></span>
                            <p><a><p>{{ $item->npm }}</p>
                            <p>@php echo (isset($item->jabatan) ? $item->jabatan : ''); @endphp</p>
                            <p>@php echo (isset($item->posisi) ? $item->posisi : ''); @endphp</p></a></p>
                        </div>
                        <div class="card-reveal">
                            <div class="reveal-header">
                                <span id="reveal-thumb" class="card-title grey-text text-darken-4"><i class="material-icons right white-text">close</i></span>
                                <br>
                                <p><img class="user-thumb" src="{{ $item->url_foto }}"/></p>
                                <p id="name">{{ $item->nama }}</p>
                                <p>{{ $item->npm }}</p>
                                <p>Sistem Informasi</p>
                            </div>
                            <div class="reveal-info">
                                <p id="first-child"><i class="material-icons">cake</i> 23 Januari 1999</p>
                                <p><i class="material-icons">call</i> 089821341222</p>
                                <p><i class="fab fa-line"></i> fyfirman</p>
                            </div>
                            <div class="reveal-action">
                                <a href="#">More Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection