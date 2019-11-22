@extends('keilmuan.app')

@section('content')
    <div class="row">
        @foreach ($djournals as $djournal)
            <div class="col s12 m3 cards-container">
                <div class="card">
                    <div class="card-image">
                    <img src="{{asset('svg/djournal-thumbnail.svg')}}">
                    <a href="{{ url('keilmuan/addCounterDjournal/'.$djournal->filename) }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">file_download</i></a>
                    </div>
                    <div class="card-content">
                        <p class="defaultState" >{{ mb_strimwidth($djournal->judul, 0, 20, '...')  }}</p>
                        <p class="onHoverState hide">{{ $djournal->judul }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

<script>

</script>
