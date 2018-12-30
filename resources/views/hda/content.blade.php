@extends('hda.app')

@section('content')
    <div class="row">
        @foreach ($data as $item)
            @if ($item != NULL)
                <div class="col m3 s4 custom-col">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ $item->url_foto }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">{{ $item->nama }}<i class="material-icons right">more_vert</i></span>
                            <p><a href="#"><p>{{ $item->npm }}</p>
                            <p>@php echo (isset($item->jabatan) ? $item->jabatan : ''); @endphp</p>
                            <p>@php echo (isset($item->posisi) ? $item->posisi : ''); @endphp</p></a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection