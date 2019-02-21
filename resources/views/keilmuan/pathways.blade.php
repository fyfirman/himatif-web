@extends('keilmuan.app')

@section('content')
    @for ($i = 0; $i < 4; $i++)
    <div class="row">
        @for ($j = 0; $j < 4; $j++)
        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <img src="https://materializecss.com/images/sample-1.jpg">
                    {{-- <span class="card-title">Card Title</span> --}}
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">file_download</i></a>
                </div>
                <div class="card-content">
                    <p>Pathways Semester 2</p>
                </div>
            </div>
        </div>
        @endfor
    </div>
    @endfor
@endsection