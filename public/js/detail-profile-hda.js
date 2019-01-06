// Jgn dihapus
// const moreInfo = document.querySelector(".reveal-action a");
// console.log(moreInfo);
const detailProfile = document.querySelector("#overlay");
const close = document.querySelector("#header-detail>span>i")

function showInfo(npm){
    $.ajax({
        type: "GET",
        url: "/data/anggota/"+npm,
        success: function (response) {
            $.each(response, function (index, value) { 
                $('#user-photos').attr('src', value.url_foto);
                $('#nama').text(value.nama);
                $('#npm').text(value.npm);
                $('#bidang_minat').text(value.bidang_minat);
                $('#nohp').text(value.no_hp);
                $('#line').text(value.line);
                $('#email').text(value.email);
                $('#jk').text(value.jk);
                $('#tempat_lahir').text(value.tempat_lahir);
                $('#tanggal_lahir').text(value.tanggal_lahir);
                $('#agama').text(value.agama);
                $('#alamat_rumah').text(value.alamat_rumah);
                $('#alamat_kos').text(value.alamat_kos);
            });
        }
    });
    detailProfile.style.display = 'block';
}

$(document).ajaxStart(function(){$('#loadDetail').removeClass('hide');});
$(document).ajaxComplete(function(){$('#loadDetail').addClass('hide');});

close.addEventListener('click',function(){
    detailProfile.style.display = 'none';
});