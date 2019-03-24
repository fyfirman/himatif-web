$(document).ready(function(){
    var baseUrl = $('#baseUrl').val();

    function addInput(key){
        if(key == 'prestasi'){
            $('#field_input'+key).append('<input type="text" name="namaPrestasi" placeholder="Masukan Nama '+key+'mu" required>');
            $('#field_input'+key).append('<input type="text" name="tahunPrestasi" placeholder="Masukan Tahun" required>');
        }else if(key == 'seminar'){
            $('#field_input'+key).append('<input type="text" name="namaSeminar" placeholder="Masukan Nama '+key+'mu" required>');
            $('#field_input'+key).append('<input type="text" name="tingkat" placeholder="Masukan Tingkat" required>')
            $('#field_input'+key).append('<input type="text" name="tahunSeminar" placeholder="Masukan Tahun" required>');
        }else{
            $('#field_input'+key).append('<input type="text" name="namaRiwayat" placeholder="Masukan Nama '+key+'mu" required>');
            $('#field_input'+key).append('<input type="text" name="jabatan" placeholder="Masukan Jabatan" required>')
            $('#field_input'+key).append('<input type="text" name="tahun" placeholder="Masukan Tahun" required>')
        }
    }

    $('#btn_addKpn').on('click', function(){
        if($(this).text() == 'Add New'){
            addInput('kepanitiaan');
            $(this).text('Save');
        }else{
            var nama = $('input[name=namaRiwayat]').val();
            var jabatan = $('input[name=jabatan]').val();
            var tahun = $('input[name=tahun]').val();
            if(nama == '' && jabatan == '' && tahun == ''){
                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               type: 'POST',
               url: baseUrl + '/kepanitiaan/add',
               data: {'nama_kep':nama, 'jabatan':jabatan, 'tahun':tahun},
               success: function(data){
                   if(data == 'success'){
                        swal.fire({
                            title: 'Riwayat berhasil ditambahkan',
                            type: 'success'
                        }).then(function(){
                            location.replace(baseUrl + '/updateProfile#data_org');
                            location.reload();
                        })    
                   }
               }
            });
        }
    });

    $('#btn_addOrg').on('click', function(){
        if($(this).text() == 'Add New'){
            addInput('organisasi');
            $(this).text('Save');
        }else{
            var nama = $('input[name=namaRiwayat]').val();
            var jabatan = $('input[name=jabatan]').val();
            var tahun = $('input[name=tahun]').val();
            if(nama == '' && jabatan == '' && tahun == ''){
                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               type: 'POST',
               url: '/organisasi/add',
               data: {'nama_org':nama, 'jabatan':jabatan, 'tahun':tahun},
               success: function(data){
                    if(data == 'success'){
                        swal.fire({
                            title: 'Riwayat berhasil ditambahkan',
                            type: 'success'
                        }).then(function(){
                            location.replace(baseUrl + '/updateProfile#data_org');
                            location.reload();
                        });    
                   }
               }
            });
        }
    });

    $('#btn_addPres').on('click', function(){
        if($(this).text() == 'Add New'){
            addInput('prestasi');
            $(this).text('Save');
        }else{
            var nama = $('input[name=namaPrestasi]').val();
            var tahun = $('input[name=tahunPrestasi]').val();
            if(nama == '' && tahun == ''){
                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               type: 'POST',
               url: '/prestasi/add',
               data: {'nama_prestasi':nama, 'tahun':tahun},
               success: function(data){
                    if(data == 'success'){
                        swal.fire({
                            title: 'Prestasi berhasil ditambahkan',
                            type: 'success'
                        }).then(function(){
                            location.replace(baseUrl + '/updateProfile#data_pres');
                            location.reload();
                        });    
                   }
               }
            });
        }
    });

    $('#btn_addSem').on('click', function(){
        if($(this).text() == 'Add New'){
            addInput('seminar');
            $(this).text('Save');
        }else{
            var nama = $('input[name=namaSeminar]').val();
            var tingkat = $('input[name=tingkat]').val();
            var tahun = $('input[name=tahunSeminar]').val();
            if(nama == '' && tingkat == '' && tahun == ''){
                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               type: 'POST',
               url: '/seminar/add',
               data: {'nama_seminar':nama, 'tingkat':tingkat, 'tahun':tahun},
               success: function(data){
                    if(data == 'success'){
                        swal.fire({
                            title: 'Seminar berhasil ditambahkan',
                            type: 'success'
                        }).then(function(){
                            location.replace(baseUrl + '/updateProfile#data_pres');
                            location.reload();
                        });    
                   }
               }
            });
        }
    });
});

function deleteRiwayat(url){
    swal.fire({
        title: 'Delete riwayat?',
        type:'warning',
        showConfirmButton:true,
        showCancelButton:true
    }).then(function(){
        $.ajax({
            type: 'GET',
            url: url,
            success: function(data){
                if(data == 'success'){
                    swal.fire('Riwayat berhasil dihapus', '', 'success');
                    location.replace(baseUrl + '/updateProfile#data_pres');
                    location.reload();
                }
            }
        });
    });
}