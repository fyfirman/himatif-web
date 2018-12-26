@extends('app')

@section('content')
<div class="landing-container">
	<div class="row">
		@for ($i = 0; $i < 3; $i++)
			<div class="col m4">
				<div class="card">
					<div class="card-image">
						<img src="{{asset('img/hda-card.jpg')}}">
						<a href="hda" class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
					</div>
					<div class="card-content">
						<span class="card-title">Himatif Database</span>
						<p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
					</div>
				</div>
			</div>
		@endfor
	</div>
</div>
@endsection