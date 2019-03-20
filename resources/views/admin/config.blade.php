@extends('admin.app')
@section('nav')    
    {{-- Top Navigation --}}
    @include('partials.nav')
@endsection

@section('content')
<div class="container">
    <table>
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Last Updated</th>
                <th>Update Status</th>
                <th>User Level</th>
            </tr>
        </thead>
        <tbody>
            <!--
                1 = member
                2 = keilmuan
                3 = superuser
                4 = admin
                */
            -->
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->username}}</td>
                <td>Dummy Name</td>
                <td>17-Feb-19</td>
                <td class="input-field">
                    <select>
                        <option value="1" @if($item->active) selected @endif>Updated</option>
                        <option value="0" @if(!$item->active) selected @endif>Not Updated</option>
                    </select>
                </td>
                <td class="input-field">
                    <select>
                        <option value="4" @if($item->active == "3") selected @endif>Administrator</option>
                        <option value="3" @if($item->active == "2") selected @endif>Superuser</option>
                        <option value="2" @if($item->active == "1") selected @endif>Keilmuan Admin</option>
                        <option value="1" @if($item->active == "0") selected @endif>Normal User</option>
                    </select>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){
    $('select').formSelect();
});
</script>
@endsection