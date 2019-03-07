@extends('admin.app')
@section('nav')    
    {{-- Top Navigation --}}
    @include('partials.nav')
@endsection

@section('content')
<div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="input-field col m12 inline">
                <input type="hidden" name="npm" value="">
                <input type="text" name="nama" id="nama" value="" required>
                <label for="nama">Mata Kuliah</label>
            </div>
        </div>
        
        <div class="file-field input-field row">
            <div class="btn deep-btn">
                <span>Browse</span>
                <input type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Image Thumbnails">
            </div>
        </div>

        <div class="file-field input-field row">
            <div class="btn deep-btn">
                <span>Browse</span>
                <input type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Browse File">
            </div>
        </div>
        <div class="row center">
            <button class="btn deep-btn" type="submit">Update Data Profile</button>
        </div>
    </form>
</div>
@endsection