@extends('app')

@section('content')
<div class="container">
    <br>
    <br>
    <br>
    <br>
    @if ($pwd != NULL)
        <span>This is Your New Password : <span style="font-weight:bold">{{ $pwd }}</span></span>
    @else
        <span>No New Password Created</span>
    @endif
</div>
@endsection
