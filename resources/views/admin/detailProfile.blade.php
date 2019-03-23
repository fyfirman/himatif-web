<div id="overlay">
    <div id="detail-container" class="container">
        <div id="header-detail">
            <div id="loadDetail" class="preloader-wrapper active hide">
                <div class="spinner-layer spinner-yellow-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <div id="header-data" class="hide">
                <span class="row">
                    <i class="material-icons right white-text">close</i>
                    <a id='update-link'><i class="material-icons right white-text">settings</i></a>
                </span>
                <a id="photo-link" href="#" target="_blank"><img id="user-photos" class="user-thumb" src="" alt=""></a>
                <h5 id="nama"></h5>
                <p id="npm"></p>
                <p id="bidang_minat"></p>
                <div class="contact row">
                    <div class="col m4 s12">
                        <i class="material-icons">call</i> <span id="nohp"></span>
                    </div>
                    <div class="col m4 s12">
                        <i class="fab fa-line"></i> <span id="line"></span>
                    </div>
                    <div class="col m4 s12">
                        <i class="material-icons">email</i> <span id="email"></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="body-detail" class="hide">
            <h4>Biodata</h4>
            <div id="biodata" class="data">
                <div class="row">
                    <div class="col m6">
                        <label for="jk">Jenis Kelamin</label>
                        <p id="jk"></p>
                    </div>
                    <div class="col m6">
                        <label for="hobi">Hobi</label>
                        <p id="hobi"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col m6">
                        <label for="tmp_lahir">Tempat Lahir</label>
                        <p id="tempat_lahir"></p>
                    </div>
                    <div class="col m6">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <p id="tanggal_lahir"></p>
                    </div>
                </div>
                <div class="row">
                        <div class="col m12">
                            <label for="agama">Agama</label>
                            <p id="agama"></p>
                        </div>
                    </div>
                <div class="row">
                    <div class="col m12">
                        <label for="alamat_rumah">Alamat Rumah</label>
                        <p id="alamat_rumah"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col m12">
                        <label for="alamat_kos">Alamat Kos</label>
                        <p id="alamat_kos"></p>
                    </div>
                </div>
            </div>
            <h4>Informasi Keluarga</h4>
            <div id="keluarga" class="data">
                <div class="row">
                    <div class="col m6 s12">
                        <label for="nama_ayah">Nama Ayah</label>
                        <p id="nama_ayah">Dummy text</p>
                    </div>
                    <div class="col m6 s12">
                        <label for="nama_ibu">Nama Ibu</label>
                        <p id="nama_ibu">Dummy text</p>
                    </div>
                    <div class="col m12">
                        <label for="no_telp_ortu">Nomor Telepon Orang Tua</label>
                        <p id="no_telp_ortu">Dummy text</p>
                    </div>
                </div>
            </div>
            <h4>Media Sosial</h4>
            <div id="media_sosial" class="data">
                <div class="row">
                    <div class="col m4 s12">
                        <label for="facebook">Facebook</label>
                        <p id="facebook">Dummy text</p>
                    </div>
                    <div class="col m4 s12">
                        <label for="twitter">Twitter</label>
                        <p id="twitter">Dummy text</p>
                    </div>
                    <div class="col m4 s12">
                        <label for="instagram">Instagram</label>
                        <p id="instagram">Dummy text</p>
                    </div>
                </div>
            </div>
            <h4>Keorganisasian</h4>
            <div id="keorganisasian" class="data">
                <div class="row">
                    <div class="col m12">
                        <label for="riwayat_organisasi">Riwayat Organisasi</label>
                        <ul>
                            <li>Dummy text 1</li>
                            <li>Dummy text 2</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col m12">
                        <label for="riwayat_kepanitiaan">Riwayat Kepanitiaan</label>
                        <ul>
                            <li>Dummy text 1</li>
                            <li>Dummy text 2</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="{{asset('js/detail-profile-hda.js')}}"></script>