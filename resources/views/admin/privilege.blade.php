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
                <th>Update Status</th>
                <th>User Level</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 5; $i++)
            <tr>
                <td>140810170051</td>
                <td>Firmansyah Yanuar</td>
                <td class="input-field">
                    <select>
                        <option value="updated" selected>Updated</option>
                        <option value="notupdated">Not Updated</option>
                    </select>
                </td>
                <td class="input-field">
                    <select>
                        <option value="admin" selected>Admin</option>
                        <option value="superuser">Super User</option>
                        <option value="normalUser">Normal User</option>
                    </select>
                </td>
                {{-- <td>Admin</td> --}}
            </tr>
            <tr>
                <td>140810170026</td>
                <td>Aci hitam</td>
                <td class="input-field">
                    <select>
                        <option value="updated" selected>Updated</option>
                        <option value="notupdated">Not Updated</option>
                    </select>
                </td>
                <td class="input-field">
                    <select>
                        <option value="admin">Admin</option>
                        <option value="superuser" selected>Super User</option>
                        <option value="normalUser">Normal User</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>140810170061</td>
                <td>Dani coge</td>
                <td class="input-field">
                    <select>
                        <option value="updated">Updated</option>
                        <option value="notupdated" selected>Not Updated</option>
                    </select>
                </td>
                <td class="input-field">
                    <select>
                        <option value="admin">Admin</option>
                        <option value="superuser">Super User</option>
                        <option value="normalUser" selected>Normal User</option>
                    </select>
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