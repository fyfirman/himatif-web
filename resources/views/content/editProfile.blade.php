@extends('app')

@section('content')
<div class="container">
    <form action="{{ route('editProfile') }}" method="post">
        @csrf
        @php $anggota=Cookie::get('anggota');$anggota=json_decode($anggota); @endphp
        @foreach ($anggota as $data)
        <input disabled value="{{ Session::get('username') }}" type="hidden" class="validate" name="npm">
        <div id="personal-info" style="margin-top:64px;">
            <h5>1. Informasi Pribadi</h5>
            <div class="row">
                <div class="input-field col m12 inline">
                    <input type="hidden" name="npm" value="{{ $data->npm }}">
                    <input type="text" name="nama" id="nama" value="{{ $data->nama }}" required>
                    <label for="nama">Nama Lengkap</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m12 inline">
                    <input type="text" name="jk" id="jk" value="{{ $data->jk }}" required>
                    <label for="jk">Jenis Kelamin</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m12 inline">
                    <input type="text" name="agama" id="agama" value="{{ $data->agama }}" required>
                    <label for="agama">Agama</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m12 inline">
                    <input type="text" name="goldar" id="goldar" value="{{ $data->goldar }}" required>
                    <label for="goldar">Golongan Darah</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m6 inline">
                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
                    <label for="tempat_lahir">Tempat Lahir</label>
                </div>
                <div class="input-field col m6 inline">
                    <input type="text" class="datepicker" name="tanggal_lahir" id="tanggal_lahir" value="{{ $data->tanggal_lahir }}" required>
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                </div>
            </div>
            <div class="row">
                    <div class="input-field col m12">
                        <textarea name="alamat_rumah" id="alamat_rumah" class="materialize-textarea">{{ $data->alamat_rumah }}</textarea>
                        <label for="alamat_rumah">Alamat Rumah</label>
                    </div>
            </div>
            <div class="row">
                    <div class="input-field col m12">
                        <textarea name="alamat_kos" id="alamat_kos" class="materialize-textarea">{{ $data->alamat_kos }}</textarea>
                        <label for="alamat_kos">Alamat Kos</label>
                    </div>
            </div>
        </div>
        <div id="contact-info">
            <h5>2. Informasi Kontak</h5>
            <div class="row">
                <div class="input-field m12 inline">
                    <input type="number" name="no_hp" id="no_hp" value="{{ $data->no_hp }}" required>
                    <label for="no_hp">Nomor Handphone</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="line" id="line" value="{{ $data->line }}" required>
                    <label for="line">ID Line</label>
                </div>
            </div>
            <div id="organisasi">
                <div class="input-field m12 inline">
                    <input type="text" name="status" id="status" value="{{ $data->status }}" required>
                    <label for="status">Status Anggota</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="bidang_minat" id="bidang_minat" value="{{ $data->bidang_minat }}" required>
                    <label for="bidang_minat">Bidang Minat</label>
                </div>
            </div>
        </div>
        {{-- SOON UPDATE PASSWORD --}}
        {{-- <div id="account-info">
            <h5>3. Update Password</h5>
            <div class="row">
                <div class="input-field m12 inline">
                    <input type="password" name="old_pwd" id="old_pwd" required>
                    <label for="old_pwd">Old Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field m12 inline">
                    <input type="password" name="new_pwd" id="new_pwd" required>
                    <label for="new_pwd">New Password</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="password" name="confirm_newPwd" id="confirm_newPwd" required>
                    <label for="Confirm_newPwd">Confirm New Password</label>
                </div>
            </div>
        </div> --}}
        <div class="row center">
            <button class="btn deep-btn" type="submit">Update</button>
        </div>
        @endforeach
    </form>
</div>
<script>
$(document).ready(function(){
    $('.datepicker').datepicker();
});
</script>
@endsection
