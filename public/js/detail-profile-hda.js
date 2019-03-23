// Jgn dihapus
// const moreInfo = document.querySelector(".reveal-action a");
// console.log(moreInfo);
const detailProfile = document.querySelector("#overlay");
const close = document.querySelector("#header-data>span>i")

function showInfo(npm){
    $.ajax({
        type: "GET",
        url: "/data/anggota/"+npm,
        success: function (response) {
            $.each(response, function (index, value) { 
                $('#update-link').attr('href', '/updateProfile/'+value.npm);
                $('#photo-link').attr('href', value.url_foto);
                $('#user-photos').attr('src', value.url_foto);
                $('#nama').text(value.nama);
                $('#npm').text(value.npm);
                $('#bidang_minat').text(value.bidang_minat);
                $('#nohp').text(value.no_hp);
                $('#line').text(value.line);
                $('#email').text(value.email);
                $('#jk').text(value.jk);
                $('#hobi').text(value.hobi);
                $('#tempat_lahir').text(value.tempat_lahir);
                $('#tanggal_lahir').text(value.tanggal_lahir);
                $('#agama').text(value.agama);
                $('#alamat_rumah').text(value.alamat_rumah);
                $('#alamat_kos').text(value.alamat_kos);
                $('#nama_ayah').text(value.nama_ayah);
                $('#nama_ibu').text(value.nama_ibu);
                $('#no_telp_ortu').text(value.no_tlp_ortu);
                $('#facebook').text(value.fb);
                $('#twitter').text(value.twitter);
                $('#instagram').text(value.instagram);
            });
        }
    });
    detailProfile.style.display = 'block';
}

$(document).ajaxStart(function(){$('#loadDetail').removeClass('hide');});
$(document).ajaxComplete(function(){$('#loadDetail').addClass('hide');$('#header-data').removeClass('hide');$('#body-detail').removeClass('hide')});

close.addEventListener('click',function(){
    detailProfile.style.display = 'none';
});