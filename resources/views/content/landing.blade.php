@extends('app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ mix('/css/landing.css') }}">
@endsection

@section('content')
<div class="landing-container">
	<div class="row">
		{{-- HDA Card --}}
		<div class="col m6">
			<div id="hda" class="card">
				<div class="card-image">
					<img src="{{asset('img/hda-card.jpg')}}">
					<a href="{{ url('/hda') }}" class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
				</div>
				<div class="card-content">
					<span class="card-title">Himatif Database</span>
					<p>Mencari informasi seseorang? Himatif Database akan membantu kamu!</p>
				</div>
			</div>
		</div>
		{{-- Keilmuan Card --}}
		<div class="col m6">
			<div id="keilmuan" class="card">
				<div class="card-image">
					<img src="{{asset('img/journal-card.jpg')}}">
					<a href="{{ url('/keilmuan/pathways') }}" class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
				</div>
				<div class="card-content">
					<span class="card-title">Keilmuan</span>
					<p>Tuntutlah ilmu sampai ke Negeri Cina! Tapi ngapain kalo disini ada?</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="fixed-action-btn">
	<a href="{{ url('credit')}}" class="btn-floating btn-large red">
		<i class="large material-icons">info</i>
	</a>
</div>

<script>
	$(document).ready(function(){
		$('.fixed-action-btn').floatingActionButton();
	});
</script>
@endsection