@extends('keilmuan.app')

@section('content')
    <div class="row">
        @foreach ($dataFile as $item)
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                    <img src="{{asset('svg/pathways-thumbnail.svg')}}">
                    <a href="{{ url('keilmuan/addCounter/'.$item->filename) }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">file_download</i></a>
                    </div>
                    <div class="card-content">
                        <!-- <p>{{ $item->matkul }}</p> -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

<script>

</script>