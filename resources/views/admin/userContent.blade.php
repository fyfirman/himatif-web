@extends('admin.app')

@section('nav')    
    {{-- Top Navigation --}}
    @include('partials.nav-admin')
@endsection

@section('content')
    <div id="contentHda">
    </div>
@endsection

@section('loading-animation')
    @include('partials.preloader')
@endsection