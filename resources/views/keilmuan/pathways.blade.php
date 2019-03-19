@extends('keilmuan.app')

@section('content')
    @foreach ($dataFile as $item)
        <div class="row">
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="https://materializecss.com/images/sample-1.jpg">
                        <a href="{{ $item->location }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">file_download</i></a>
                    </div>
                    <div class="card-content">
                        <p>{{ $item->matkul }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection