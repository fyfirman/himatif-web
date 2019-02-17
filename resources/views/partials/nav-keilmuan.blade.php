@extends('partials.nav')

@section('brand-logo')
    <img src="{{ asset('svg/logo-keilmuan.svg') }}" alt="" style="vertical-align:middle">
    <span>Keilmuan</span>   
@endsection

@section('search-bar')
    <div class="search-wrapper left hide-on-med-and-down">
        <form class="hide-on-med-and-down" id="search-form" autocomplete="off">
            <div class="input-field">
                <input id="search-box" type="search" required onkeyup="" placeholder="Cari file">
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            </div>
        </form> 
    </div>
@endsection