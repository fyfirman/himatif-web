$(document).ready(function () {
    getData('2018','angkatan');

    var requesting = false;

    $('#btn2012').on('click', function(e){if(requesting){return false;}var key = "2012"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btn2013').on('click', function(){if(requesting){return false;}var key = "2013"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btn2014').on('click', function(){if(requesting){return false;}var key = "2014"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btn2015').on('click', function(){if(requesting){return false;}var key = "2015"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btn2016').on('click', function(){if(requesting){return false;}var key = "2016"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btn2017').on('click', function(){if(requesting){return false;}var key = "2017"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btn2018').on('click', function(){if(requesting){return false;}var key = "2018"; var jenisData = "angkatan";getData(key, jenisData);});
    $('#btnBE').on('click', function(){if(requesting){return false;}var key = "be"; var jenisData = "anggota";getData(key, jenisData);});
    $('#btnDPA').on('click', function(){if(requesting){return false;}var key = "dpa"; var jenisData = "anggota";getData(key, jenisData);});
    $('#btnMubes').on('click', function(){if(requesting){return false;}var key = "mubes"; var jenisData = "anggota";getData(key, jenisData);});

    function getData(key, jenisData){
        $('#contentHda').empty();
        requesting = true;
        $.ajax({
            type: "GET",
            url: "/hda/" + jenisData + "/" + key,
            beforeSend: function(){requesting=true},
            success: function (response) {
                $.each(response, function(index, value){
                    if(typeof value.jabatan == 'undefined'){value.jabatan = '';value.posisi = '';}
                    else if(typeof value.posisi == 'undefined'){value.posisi = '';}
                    $('#contentHda').append(
                        '<div class="col m3 s6 l2">'+
'                            <div class="card">'+
'                                <div class="card-image waves-effect waves-block waves-light">'+
'                                    <img onclick="showInfo(' + value.npm + ')" class="" src="' + value.url_foto + '">'+
'                                </div>'+
'                                <div class="card-content">'+
'                                    <span onclick="showInfo(' + value.npm + ')" class="card-title grey-text text-darken-4">' + value.nama + '</span>'+
'                                    <p><a><p>' + value.npm + '</p>'+
'                                    <p>'+ value.jabatan +'</p>'+
'                                    <p>'+ value.posisi +'</a></p>'+
'                                </div>'+
'                            </div>'+
'                        </div>'
                    );
                });
            },
            complete: function(){
                requesting = false;
            }
        });
    }

    $('#search-box').on('keypress', function(e){
        if(e.which == 13){
            let key = $(this).val();
            $('#contentHda').empty();
            if(requesting){
                return false;
            }
            $.ajax({
                type: "GET",
                url: "/data/search/" + key,
                beforeSend: function(){requesting = true},
                success: function (response) {
                    if(response == ''){
                        $('#contentHda').html('<span id="center-align">Tidak ada data yang cocok</span>');
                    }else{
                        $.each(response, function (index, value) { 
                            if(typeof value.jabatan == 'undefined'){value.jabatan = '';value.posisi = '';}
                            else if(typeof value.posisi == 'undefined'){value.posisi = '';}
                            $('#contentHda').append(
                                '<div class="col m3 s6 l2">'+
        '                            <div class="card">'+
        '                                <div class="card-image waves-effect waves-block waves-light">'+
        '                                    <img onclick="showInfo(' + value.npm + ')" class="" src="' + value.url_foto + '">'+
        '                                </div>'+
        '                                <div class="card-content">'+
        '                                    <span onclick="showInfo(' + value.npm + ')" class="card-title grey-text text-darken-4">' + value.nama + '</span>'+
        '                                    <p><a><p>' + value.npm + '</p>'+
        '                                    <p>'+ value.jabatan +'</p>'+
        '                                    <p>'+ value.posisi +'</a></p>'+
        '                                </div>'+
        '                            </div>'+
        '                        </div>'
                            );
                        });
                    }
                },
                complete: function(){
                    requesting = false;
                }
            });
            return false;
        }
    });
});
$(document).ajaxStart(function(){$('#loading').removeClass('hide');});
$(document).ajaxComplete(function(){$('#loading').addClass('hide');});