@extends('app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ mix('/css/landing.css') }}">
@endsection

@section('content')
<div class="landing-container">
	<div class="row">
		{{-- HDA Card --}}
		<div class="col m4">
			<div id="hda" class="card">
				<div class="card-image">
					<img src="{{asset('img/hda-card.jpg')}}">
					<a href="{{ url('/hda') }}" class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
				</div>
				<div class="card-content">
					<span class="card-title">Himatif Database</span>
					<p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
				</div>
			</div>
		</div>
		{{-- Pathways Card --}}
		<div class="col m4">
			<div id="pathways" class="card">
				<div class="card-image">
					<img src="{{asset('img/hda-card.jpg')}}">
					<a href="{{ url('/hda') }}" class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
				</div>
				<div class="card-content">
					<span class="card-title">Pathways</span>
					<p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
				</div>
			</div>
		</div>
		{{-- Read D'Journal Card --}}
		<div class="col m4">
			<div id="journal" class="card">
				<div class="card-image">
					<img src="{{asset('img/hda-card.jpg')}}">
					<a href="{{ url('/hda') }}" class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
				</div>
				<div class="card-content">
					<span class="card-title">Read D'Journal</span>
					<p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection