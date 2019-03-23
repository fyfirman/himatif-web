$(document).ready(function(){
    var baseUrl = $('#baseUrl').val();

    function addInput(key){
        $('#field_input'+key).append('<input type="text" name="namaRiwayat" placeholder="Masukan Nama '+key+'mu" required>');
        $('#field_input'+key).append('<input type="text" name="jabatan" placeholder="Masukan Jabatan" required>')
        $('#field_input'+key).append('<input type="text" name="tahun" placeholder="Masukan Tahun" required>')
    }

    $('#btn_addKpn').on('click', function(){
        if($(this).text() == 'Add New'){
            addInput('kepanitiaan');
            $(this).text('Save');
        }else{
            var nama = $('input[name=namaRiwayat]').val();
            var jabatan = $('input[name=jabatan]').val();
            var tahun = $('input[name=tahun]').val();
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
                        })    
                   }
               }
            });
        }
    });   
});