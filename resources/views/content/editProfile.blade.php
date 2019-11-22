@extends('app')

@section('content')
<div class="container">
    <form action="{{ route('update') }}" method="post">
        @csrf
        @php
            // $oranglain = true;
            // if($oranglain){
            //     $anggota = App\Http\Controllers\loginController::getDataAnggota('140810170052');
            // }else{
            //     $anggota = Cookie::get('anggota');
            // }
            // $anggota = json_decode($anggota);
            // dd($anggota);
        @endphp
        @foreach ($dataUser['anggota'] as $data)
        <input disabled value="{{ Session::get('username') }}" type="hidden" class="validate" name="npm">
        <div id="personal-info" style="margin-top:64px;">
            <h5>1. Informasi Pribadi</h5>
            <div class="row">
                <div class="input-field col m12 s12 inline">
                    <input type="hidden" name="npm" value="{{ $data->npm }}">
                    <input type="text" name="nama" id="nama" value="{{ $data->nama }}" required>
                    <label for="nama">Nama Lengkap</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m4 s12 inline">
                    <select name="jk" id="jk" required>
                        <option value="Laki - laki" @if ($data->jk == 'Laki - laki') selected="selected" @endif >Laki - laki</option>
                        <option value="Perempuan" @if ($data->jk == 'Perempuan') selected="selected" @endif>Perempuan</option>
                    </select>
                    <label for="jk">Jenis Kelamin</label>
                </div>
                <div class="input-field col m4 s12 inline">
                    <select name="agama" id="agama" required>
                        <option value="Islam" @if ($data->agama == 'Islam' || $data->agama == 'islam') selected="selected" @endif>Islam</option>
                        <option value="Protestan" @if ($data->agama == 'Protestan') selected="selected" @endif >Protestan</option>
                        <option value="Katolik" @if ($data->agama == 'Katolik') selected="selected" @endif >Katholik</option>
                        <option value="Buddha" @if ($data->agama == 'Buddha') selected="selected" @endif >Buddha</option>
                        <option value="Hindu" @if ($data->agama == 'Hindu') selected="selected" @endif >Hindu</option>
                    </select>
                    <label for="agama">Agama</label>
                </div>
                <div class="input-field col m4 s12 inline">
                    <select name="goldar" id="goldar" required>
                        <option value="A" @if ($data->goldar == 'A') selected="selected" @endif>A</option>
                        <option value="B" @if ($data->goldar == 'B') selected="selected" @endif >B</option>
                        <option value="AB" @if ($data->goldar == 'AB') selected="selected" @endif >AB</option>
                        <option value="O" @if ($data->goldar == 'O') selected="selected" @endif >O</option>
                        <option value="-" @if ($data->goldar == '-') selected="selected" @endif >-</option>
                    </select>
                    <label for="goldar">Golongan Darah</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m12 s12 inline">
                    <input type="text" name="hobi" id="hobi" value="{{ $data->hobi }}" required>
                    <label for="hobi">Hobi</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m6 s6 inline">
                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
                    <label for="tempat_lahir">Tempat Lahir</label>
                </div>
                <div class="input-field col m6 s6 inline">
                    <input type="text" class="datepicker" name="tanggal_lahir" id="tanggal_lahir" value="{{ $data->tanggal_lahir }}" required>
                    <label for="tanggal_lahir">Tanggal Lahir (YYYY-MM-DD)</label>
                </div>
            </div>
            <div class="row">
                    <div class="input-field col m12 s12">
                        <textarea name="alamat_rumah" id="alamat_rumah" class="materialize-textarea">{{ $data->alamat_rumah }}</textarea>
                        <label for="alamat_rumah">Alamat Rumah</label>
                    </div>
            </div>
            <div class="row">
                    <div class="input-field col m12 s12">
                        <textarea name="alamat_kos" id="alamat_kos" class="materialize-textarea">{{ $data->alamat_kos }}</textarea>
                        <label for="alamat_kos">Alamat Kos</label>
                    </div>
            </div>
            <div id="organisasi" class="row">
                <div class="input-field col m4 s12 inline">
                    <select name="status" id="status" required>
                        <option value="Anggota Muda" @if ($data->status == 'Anggota Muda') selected @endif>Anggota Muda</option>
                        <option value="Anggota Penuh" @if ($data->status == 'Anggota Penuh') selected @endif>Anggota Penuh</option>
                        <option value="Anggota Kehormatan" @if ($data->status == 'Anggota Kehormatan') selected @endif>Anggota Kehormatan</option>
                    </select>
                    <label for="status">Status Anggota</label>
                </div>
                <div class="input-field col m4 s12 inline">
                    <select name="bidang_minat" id="bidang_minat" required>
                        <option value="-" @if ($data->bidang_minat == '-') selected @endif>-</option>
                        <option value="Sistem Informasi" @if ($data->bidang_minat == 'Sistem Informasi') selected @endif>Sistem Informasi</option>
                        <option value="Jaringan Komputer" @if ($data->bidang_minat == 'Jaringan Komputer') selected @endif>Jaringan Komputer</option>
                        <option value="Artificial Intelligence" @if ($data->bidang_minat == 'Artificial Intelligence') selected @endif>Artificial Intelligence</option>
                    </select>
                    <label for="bidang_minat">Bidang Minat</label>
                </div>
                <div class="input-field col m4 s12 inline">
                    <select name="angkatan" id="angkatan" required>
                        <option value="-" @if ($data->angkatan == '-') selected @endif>-</option>
                        <option value="2018" @if ($data->angkatan == '2018') selected @endif>2018</option>
                        <option value="2017" @if ($data->angkatan == '2017') selected @endif>2017</option>
                        <option value="2016" @if ($data->angkatan == '2016') selected @endif>2016</option>
                        <option value="2015" @if ($data->angkatan == '2015') selected @endif>2015</option>
                        <option value="2014" @if ($data->angkatan == '2014') selected @endif>2014</option>
                        <option value="2013" @if ($data->angkatan == '2013') selected @endif>2013</option>
                        <option value="2012" @if ($data->angkatan == '2012') selected @endif>2012</option>
                    </select>
                    <label for="angkatan">Angkatan</label>
                </div>
            </div>
        </div>
        <div id="contact-info">
            <h5>2. Informasi Kontak</h5>
            <div class="row">
                <div class="input-field col m6 s12 inline">
                    <input type="email" name="email" id="email" value="{{ $data->email }}" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-field col m6 s12 inline">
                    <input type="number" name="no_hp" id="no_hp" value="{{ $data->no_hp }}" required>
                    <label for="no_hp">Nomor Handphone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m6 s12 inline">
                    <input type="text" name="line" id="line" value="{{ $data->line }}" required>
                    <label for="line">ID Line</label>
                </div>
                <div class="input-field col m6 s12 inline">
                    <input type="text" name="fb" id="fb" value="{{ $data->fb }}" required>
                    <label for="fb">Facebook</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m6 s12 inline">
                    <input type="text" name="instagram" id="instagram" value="{{ $data->instagram }}" required>
                    <label for="instagram">Instagram</label>
                </div>
                <div class="input-field col m6 s12 inline">
                    <input type="text" name="twitter" id="twitter" value="{{ $data->twitter }}" required>
                    <label for="twitter">Twitter</label>
                </div>
            </div>
        </div>
        <div>
            <h5>3. Data Orang Tua</h5>
            <div class="row">
                <div class="input-field col m12 s12 inline">
                    <input type="text" name="nama_ayah" id="nama_ayah" value="{{ $data->nama_ayah }}" required>
                    <label for="nama_ayah">Nama Ayah</label>
                </div>
                <div class="input-field col m12 s12 inline">
                    <input type="text" name="nama_ibu" id="nama_ibu" value="{{ $data->nama_ibu }}" required>
                    <label for="nama_ibu">Nama Ibu</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m12 s12 inline">
                    <input type="number" name="no_tlp_ortu" id="no_tlp_ortu" value="{{ $data->no_tlp_ortu }}" required>
                    <label for="no_tlp_ortu">Nomor Telepon Orang Tua</label>
                </div>
            </div>
        </div>
        <div class="row center">
            <button class="btn deep-btn" type="submit">Update Data Profile</button>
        </div>
    </form>

    <div class="row center">
            <input id="baseUrl" type="hidden" value="{{ url('/') }}">
            <h5 class="left-align" id="data_org">4. Data Organisasi dan Kepanitiaan</h5>
            <div class="col m6 s12 collection responsive-table">
                <ul><li class="collection-header"><h5>Kepanitiaan</h5></li></ul>
                <table class="responsive-table highlight">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th style="text-align: right">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($dataUser['kep'] as $item)
                                <tr>
                                    <td>{{ $item->tahun }}</td>
                                    <td>{{ $item->nama_kep }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                <td><a onclick="deleteRiwayat('{{url('/kepanitiaan/delete/'.$item->id)}}')" style="cursor:pointer" class="secondary-content"><i class="material-icons red-text">delete</i></a></td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                <div id="field_inputkepanitiaan"></div>
                <div style="padding: 10px">
                    <a id="btn_addKpn" class="btn">Add New</a>
                </div>
            </div>
            <div class="col m6 s12 collection responsive-table">
                <ul><li class="collection-header"><h5>Organisasi</h5></li></ul>
                <table class="responsive-table highlight">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th style="text-align: right">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($dataUser['org'] as $item)
                                <tr>
                                    <td>{{ $item->tahun }}</td>
                                    <td>{{ $item->nama_org }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td><a onclick="deleteRiwayat('{{url('/organisasi/delete/'.$item->id)}}')" style="cursor:pointer" class="secondary-content"><i class="material-icons red-text">delete</i></a></td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                <div id="field_inputorganisasi"></div>
                <div style="padding: 10px">
                    <a id="btn_addOrg" class="btn">Add New</a>
                </div>
            </div>
        </div>
    <div class="row center">
            <h5 class="left-align" id="data_pres">5. Data Prestasi dan Seminar</h5>
            <div class="col m6 s12 collection responsive-table">
                <ul><li class="collection-header"><h5>Prestasi</h5></li></ul>
                <table class="responsive-table highlight">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Nama</th>
                            <th style="text-align: right">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($dataUser['prestasi'] as $item)
                                <tr>
                                    <td>{{ $item->tahun }}</td>
                                    <td>{{ $item->nama_prestasi }}</td>
                                <td><a onclick="deleteRiwayat('{{url('/prestasi/delete/'.$item->id)}}')" style="cursor:pointer" class="secondary-content"><i class="material-icons red-text">delete</i></a></td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                <div id="field_inputprestasi"></div>
                <div style="padding: 10px">
                    <a id="btn_addPres" class="btn">Add New</a>
                </div>
            </div>
            <div class="col m6 s12 collection responsive-table">
                <ul><li class="collection-header"><h5>Seminar</h5></li></ul>
                <table class="responsive-table highlight">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Nama</th>
                            <th>Tingkat</th>
                            <th style="text-align: right">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($dataUser['seminar'] as $item)
                                <tr>
                                    <td>{{ $item->tahun }}</td>
                                    <td>{{ $item->nama_seminar }}</td>
                                    <td>{{ $item->tingkat }}</td>
                                    <td><a onclick="deleteRiwayat('{{url('/seminar/delete/'.$item->id)}}')" style="cursor:pointer" class="secondary-content"><i class="material-icons red-text">delete</i></a></td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                <div id="field_inputseminar"></div>
                <div style="padding: 10px">
                    <a id="btn_addSem" class="btn">Add New</a>
                </div>
            </div>
        </div>
    <form action="{{ route('updatePwd') }}" method="POST">
        @csrf
        {{-- UPDATE PASSWORD --}}
        <div id="account-info">
            <h5>6. Update Password</h5>
            <div class="row">
                <div class="input-field col m12 s12 inline">
                    <input type="hidden" name="username" value="{{ $data->npm }}">
                    <input type="password" name="oldpw" id="oldpw" required>
                    <label for="oldpw">Old Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m6 s6 inline">
                    <input type="password" name="newpw" id="newpw" required>
                    <label for="newpw">New Password</label>
                </div>
                <div class="input-field col m6 s6 inline">
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
<script src="{{asset('js/editProfile.js')}}"></script>
<script>
$(document).ready(function(){
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('select').formSelect();
});
</script>
@endsection
