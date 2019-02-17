@extends('partials.nav')


@section('search-bar')
    <div class="search-wrapper left hide-on-med-and-down">
        <form class="hide-on-med-and-down" id="search-form" autocomplete="off">
            <div class="input-field">
                <input id="search-box" type="search" required onkeyup="" placeholder="Cari dengan nama atau NPM">
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            </div>
        </form> 
    </div>
@endsection

@section('admin-tab')
<div class="row">
    <ul class="tabs">
        <li class="tab col custom-col-7"><a id="btn2012" href="#">2012</a></li>
        <li class="tab col custom-col-7"><a id="btn2013" href="#">2013</a></li>
        <li class="tab col custom-col-7"><a id="btn2014" href="#">2014</a></li>
        <li class="tab col custom-col-7"><a id="btn2015" href="#">2015</a></li>
        <li class="tab col custom-col-7"><a id="btn2016" href="#">2016</a></li>
        <li class="tab col custom-col-7"><a id="btn2017" href="#">2017</a></li>
        <li class="tab col custom-col-7"><a id="btn2018" class="active" href="#">2018</a></li>
    </ul>    
</div>   
@endsection