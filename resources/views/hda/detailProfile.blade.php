<div id="overlay">
    <div id="detail-container" class="container">
        <div id="header-detail">
            <span class="row"><i class="material-icons right white-text">close</i></span>
            <img id="user-photo" class="user-thumb" src="" alt="">
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
        <div id="body-detail">
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