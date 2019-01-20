$(document).ready(function () {
    window.onload = getData('2018','angkatan');

    $('#btn2012').on('click', function(){var key = "2012"; var jenisData = "angkatan";getData(key, jenisData);toggleButton($(this).attr('id'))});
    $('#btn2013').on('click', function(){var key = "2013"; var jenisData = "angkatan";getData(key, jenisData);toggleButton($(this).attr('id'))});
    $('#btn2014').on('click', function(){var key = "2014"; var jenisData = "angkatan";getData(key, jenisData);toggleButton($(this).attr('id'))});
    $('#btn2015').on('click', function(){var key = "2015"; var jenisData = "angkatan";getData(key, jenisData);toggleButton($(this).attr('id'))});
    $('#btn2016').on('click', function(){var key = "2016"; var jenisData = "angkatan";getData(key, jenisData);toggleButton($(this).attr('id'))});
    $('#btn2017').on('click', function(){var key = "2017"; var jenisData = "angkatan";getData(key, jenisData);toggleButton($(this).attr('id'))});
    $('#btn2018').on('click', function(){var key = "2018"; var jenisData = "angkatan";getData(key, jenisData);toggleButton($(this).attr('id'))});
    $('#btnBE').on('click', function(){var key = "be"; var jenisData = "anggota";getData(key, jenisData);toggleButton($(this).attr('id'))});
    $('#btnDPA').on('click', function(){var key = "dpa"; var jenisData = "anggota";getData(key, jenisData);toggleButton($(this).attr('id'))});
    $('#btnMubes').on('click', function(){var key = "mubes"; var jenisData = "anggota";getData(key, jenisData);toggleButton($(this).attr('id'))});

    function toggleButton(id)
    {
        console.log(id);
        clearActiveBtn();
        
        let a = document.getElementById(id);
        a.parentElement.classList.add("active");
    }
    
    function clearActiveBtn(){
        //on colapsible button
        $(".collapsible-body li").each(function(){
            $(this).removeClass("active");
        })
        
        //on menu (tentang) button
        $(".sidenav > li").each(function(){
            $(this).removeClass("active");
        })
    }
    function getData(key, jenisData){
        $('#contentHda').empty();
        $.ajax({
            type: "GET",
            url: "/hda/" + jenisData + "/" + key,
            success: function (response) {
                $.each(response, function(index, value){
                    if(typeof value.jabatan == 'undefined'){value.jabatan = '';value.posisi = '';}
                    else if(typeof value.posisi == 'undefined'){value.posisi = '';}
                    $('#contentHda').append(
                        '<div class="col m3 s6 l2">'+
'                            <div class="card">'+
'                                <div class="card-image waves-effect waves-block waves-light">'+
'                                    <img class="activator" src="' + value.url_foto + '">'+
'                                </div>'+
'                                <div class="card-content">'+
'                                    <span class="card-title activator grey-text text-darken-4">' + value.nama + '</span>'+
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
'                                        <a onclick="showInfo(' + value.npm + ')">More Info</a>'+
'                                    </div>'+
'                                </div>'+
'                            </div>'+
'                        </div>'
                    );
                });
            }
        });
    }

    $('#search-box').on('keypress', function(e){
        if(e.which == 13){
            let key = $(this).val();
            $('#contentHda').empty();
            $.ajax({
                type: "GET",
                url: "/data/search/" + key,
                success: function (response) {
                    if(response == ''){
                        $('#contentHda').html('<span id="center-align">Tidak ada data yang cocok</span>');
                    }else{
                        $.each(response, function (index, value) { 
                            if(typeof value.jabatan == 'undefined'){value.jabatan = '';value.posisi = '';}
                            else if(typeof value.posisi == 'undefined'){value.posisi = '';}
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
        '                                        <a onclick="showInfo(' + value.npm + ')">More Info</a>'+
        '                                    </div>'+
        '                                </div>'+
        '                            </div>'+
        '                        </div>'
                            );
                        });
                    }
                }
            });
            return false;
        }
    });
});
$(document).ajaxStart(function(){$('#loading').removeClass('hide');});
$(document).ajaxComplete(function(){$('#loading').addClass('hide');});