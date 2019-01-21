@extends('app')

@section('content')
<div class="container">
    <form action="{{ route('update') }}" method="post">
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
            <div class="row">
                <div class="input-field m12 inline">
                    <input type="text" name="angkatan" id="angkatan" value="{{ $data->angkatan }}" required>
                    <label for="angkatan">Angkatan</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="hobi" id="hobi" value="{{ $data->hobi }}" required>
                    <label for="hobi">Hobi</label>
                </div>
            </div>
            <div id="organisasi" class="row">
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
        <div id="contact-info">
            <h5>2. Informasi Kontak</h5>
            <div class="row">
                <div class="input-field m12 inline">
                    <input type="email" name="email" id="email" value="{{ $data->email }}" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="number" name="no_hp" id="no_hp" value="{{ $data->no_hp }}" required>
                    <label for="no_hp">Nomor Handphone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field m12 inline">
                    <input type="text" name="line" id="line" value="{{ $data->line }}" required>
                    <label for="line">ID Line</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="fb" id="fb" value="{{ $data->fb }}" required>
                    <label for="fb">Facebook</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field m12 inline">
                    <input type="text" name="instagram" id="instagram" value="{{ $data->instagram }}" required>
                    <label for="instagram">Instagram</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="twitter" id="twitter" value="{{ $data->twitter }}" required>
                    <label for="twitter">Twitter</label>
                </div>
            </div>
        </div>
        <div>
            <h5>3. Data Orang Tua</h5>
            <div class="row">
                <div class="input-field m12 inline">
                    <input type="text" name="nama_ayah" id="nama_ayah" value="{{ $data->nama_ayah }}" required>
                    <label for="nama_ayah">Nama Ayah</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="nama_ibu" id="nama_ibu" value="{{ $data->nama_ibu }}" required>
                    <label for="nama_ibu">Nama Ibu</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field m12 inline">
                    <input type="number" name="no_tlp_ortu" id="no_tlp_ortu" value="{{ $data->no_tlp_ortu }}" required>
                    <label for="no_tlp_ortu">Nomor Telepon Orang Tua</label>
                </div>
            </div>
        </div>
        <div class="row center">
            <button class="btn deep-btn" type="submit">Update Data Profile</button>
        </div>
    </form>
    <form action="{{ route('updatePwd') }}" method="POST">
        @csrf
        {{-- UPDATE PASSWORD --}}
        <div id="account-info">
            <h5>4. Update Password</h5>
            <div class="row">
                <div class="input-field m12 inline">
                    <input type="hidden" name="username" value="{{ $data->npm }}">
                    <input type="password" name="oldpw" id="oldpw" required>
                    <label for="oldpw">Old Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field m12 inline">
                    <input type="password" name="newpw" id="newpw" required>
                    <label for="newpw">New Password</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="password" name="confirm_newPwd" id="confirm_newPwd" required>
                    <label for="Confirm_newPwd">Confirm New Password</label>
                </div>
            </div>
        </div>
        <div class="row center">
            <button class="btn deep-btn">Update Password</button>
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
