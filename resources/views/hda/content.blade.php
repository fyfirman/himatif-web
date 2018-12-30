@extends('hda.app')


@section('content')
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
@endsection