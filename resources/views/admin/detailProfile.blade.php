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
                    <a href="#edit"><i class="material-icons right white-text">settings</i></a>
                </span>
                <a id="photo-link" href="#" target="_blank"><img id="user-photos" class="user-thumb" src="" alt=""></a>
                <h5 id="nama"></h5>
                <p id="npm"></p>
                <p id="bidang_minat"></p>
                <div class="contact row">
                    <div class="col m4">
                        <i class="material-icons">call</i> <span id="nohp"></span>
                    </div>
                    <div class="col m4">
                        <i class="fab fa-line"></i> <span id="line"></span>
                    </div>
                    <div class="col m4">
                        <i class="material-icons">email</i> <span id="email"></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="body-detail" class="hide">
            <h4>Biodata</h4>
            <div id="biodata">
                <div class="row">
                    <div class="col m12">
                        <label for="jk">Jenis Kelamin</label>
                        <p id="jk"></p>
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
        </div>

    </div>
</div>

<script src="{{asset('js/detail-profile-hda.js')}}"></script>