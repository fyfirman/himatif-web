@extends('admin.app')
@section('nav')    
    {{-- Top Navigation --}}
    @include('partials.nav')
@endsection

@section('content')
<div class="container">
    <a class="waves-effect waves-light btn-large red">New</a>
    <table>
        <thead>
            <tr>`
                <th>Date Uploaded</th>
                <th>Mata Kuliah</th>
                <th>Thumbnail Link</th>
                <th>Download Link</th>
                <th>Jumlah Download</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 5; $i++)
            <tr>
                <td>17-Feb-19</td>
                <td>Firmansyah Yanuar</td>
                <td>drive.google.com/dsasadsadsadsa</td>
                <td>drive.google.com/dsasadsadsadsa</td>
                <td>100</td>
                <td class="input-field">
                    <a href="#">Edit</a> | <a href="#">Delete</a>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){
    $('select').formSelect();
});
</script>
@endsection