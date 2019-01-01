$(document).ready(function () {
    $('#btn2012').on('click', function(){var key = "2012"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btn2013').on('click', function(){var key = "2013"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btn2014').on('click', function(){var key = "2014"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btn2015').on('click', function(){var key = "2015"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btn2016').on('click', function(){var key = "2016"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btn2017').on('click', function(){var key = "2017"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btn2018').on('click', function(){var key = "2018"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btnBE').on('click', function(){var key = "be"; var jenisData = "anggota";getData(key, jenisData);});
    $('#btnDPA').on('click', function(){var key = "dpa"; var jenisData = "anggota";getData(key, jenisData);});
    $('#btnMubes').on('click', function(){var key = "mubes"; var jenisData = "anggota";getData(key, jenisData);});

    function getData(key, jenisData){
        $('#contentHda').empty();
        $.ajax({
            type: "GET",
            url: "/hda/" + jenisData + "/" + key,
            success: function (response) {
                $.each(response, function(index, value){
                    if(typeof value.jabatan == 'undefined'){
                        value.jabatan = '';
                        value.posisi = '';
                    }else if(typeof value.no_hp == 'undefined'){
                        value.tanggal_lahir = '';
                        value.no_hp = '';
                        value.line = '';
                        value.bidang_minat = '';
                    }
                    $('#contentHda').append(
                        '<div class="col m3 s6 custom-col">'+
'                            <div class="card">'+
'                                <div class="card-image waves-effect waves-block waves-light">'+
'                                    <img class="activator" src="' + value.url_foto + '">'+
'                                </div>'+
'                                <div class="card-content">'+
'                                    <span class="card-title activator grey-text text-darken-4">' + value.nama + '<i class="material-icons right">more_vert</i></span>'+
'                                    <p><a><p>' + value.npm + '</p>'+
'                                    <p>'+ value.jabatan +'</p>'+
'                                    <p>'+ value.posisi +'</a></p>'+
'                                </div>'+
'                                <div class="card-reveal">'+
'                                    <div class="reveal-header">'+
'                                        <span id="reveal-thumb" class="card-title grey-text text-darken-4"><i class="material-icons right white-text">close</i></span>'+
'                                        <br>'+
'                                        <p><img class="user-thumb" src="' + value.url_foto + '"/></p>'+
'                                        <p id="name">' + value.nama + '</p>'+
'                                        <p>' + value.npm + '</p>'+
'                                        <p>' + value.bidang_minat + '</p>'+
'                                    </div>'+
'                                    <div class="reveal-info">'+
'                                        <p id="first-child"><i class="material-icons">cake</i> '+ value.tanggal_lahir +'</p>'+
'                                        <p><i class="material-icons">call</i> '+ value.no_hp +'</p>'+
'                                        <p><i class="fab fa-line"></i> '+ value.line +'</p>'+
'                                    </div>'+
'                                    <div class="reveal-action">'+
'                                        <a href="#">More Info</a>'+
'                                    </div>'+
'                                </div>'+
'                            </div>'+
'                        </div>'
                    );
                });
            }
        });
    }
});
$(document).ajaxStart(function(){$('#loading').removeClass('hide');});
$(document).ajaxComplete(function(){$('#loading').addClass('hide');})