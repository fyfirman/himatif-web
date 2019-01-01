@extends('app')

@section('content')
<div class="container">
    <form action="{{ route('editProfile') }}" method="post">
        @method('PUT')
        @csrf
        @php $anggota=Cookie::get('anggota');$anggota=json_decode($anggota); @endphp
        @foreach ($anggota as $data)
            <div class="row">
                <input type="hidden" name="npm" value="{{ Session::get('username') }}">
                <div class="input-field col m12 inline">
                    <input type="text" name="nama" id="nama" value="{{ $data->nama }}" required>
                    <label for="nama">Nama Lengkap</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="jk" id="jk" value="{{ $data->jk }}" required>
                    <label for="jk">Jenis Kelamin</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="agama" id="agama" value="{{ $data->agama }}" required>
                    <label for="agama">Agama</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="goldar" id="goldar" value="{{ $data->goldar }}" required>
                    <label for="goldar">Golongan Darah</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
                    <label for="tempat_lahir">Tempat Lahir</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $data->tanggal_lahir }}" required>
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                </div>
                <div class="input-field col m12 inline">
                    <input type="text" name="alamat_rumah" id="alamat_rumah" value="{{ $data->alamat_rumah }}" required>
                    <label for="alamat_rumah">Alamat Rumah</label>
                </div>
                <div class="input-field col m12 inline">
                    <input type="text" name="alamat_kos" id="alamat_kos" value="{{ $data->alamat_kos }}" required>
                    <label for="alamat_kos">Alamat Kos</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="number" name="no_hp" id="no_hp" value="{{ $data->no_hp }}" required>
                    <label for="no_hp">Nomor Handphone</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="line" id="line" value="{{ $data->line }}" required>
                    <label for="line">ID Line</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="bidang_minat" id="bidang_minat" value="{{ $data->bidang_minat }}" required>
                    <label for="bidang_minat">Bidang Minat</label>
                </div>
                <div class="input-field m12 inline">
                    <input type="text" name="status" id="status" value="{{ $data->status }}" required>
                    <label for="status">Status Anggota</label>
                </div>
            </div>
            <div class="row center">
                <button class="btn" type="submit">Update</button>
            </div>
        @endforeach
    </form>
</div>
@endsection