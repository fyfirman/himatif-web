@extends('hda.app')

@section('content')
    <div class="row">
        @foreach ($data as $item)
            @if ($item != NULL)
                <div class="col l2 m3 s4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{ $item->url_foto }}">
                            <span class="card-title">{{ $item->nama }}</span>
                            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">edit</i></a>
                        </div>
                        <div class="card-content center">
                            <p>{{ $item->npm }}</p>
                            <p>@php echo (isset($item->jabatan) ? $item->jabatan : ''); @endphp</p>
                            <p>@php echo (isset($item->posisi) ? $item->posisi : ''); @endphp</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection