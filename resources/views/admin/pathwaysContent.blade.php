@extends('admin.app')
@section('nav')
    {{-- Top Navigation --}}
    @include('partials.nav')
@endsection

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<div class="container">
<button data-target="modalUpload" class="btn modal-trigger waves-effect waves-light btn-large red">Upload File</button>
    <table>
        <thead>
            <tr>
                <th>Date Uploaded</th>
                <th>Mata Kuliah</th>
                <th>Thumbnail Link</th>
                <th>Download Link</th>
                <th>Jumlah Download</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataFile as $item)
            @php
                $date = explode(' ', $item->updated_at);
            @endphp
                <tr>
                    <td>{{ $date[0] }}</td>
                    <td>{{ $item->matkul }}</td>
                    <td>{{ $item->filename }}</td>
                    <td>{{ $item->location }}</td>
                    <td>{{ $item->count }}</td>
                    <td class="input-field">
                    <a href="#">Edit</a> | <a href="{{ url('/admin/del_pathways/'.$item->filename) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="modalUpload" class="modal">
    <div class="modal-content">
      <h4>Upload New File</h4>
      <br>
      <div class="progress" style="display:none">
        <div class="determinate" style="width: 70%"></div>
      </div>
      <form id="formUpload" action="{{ url('upload_pathways') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="input-field col m12 inline">
                <input type="text" name="matkul" id="matkul" required>
                <label for="nama">Mata Kuliah</label>
            </div>
        </div>
        <div class="file-field input-field">
            <div class="btn">
              <span>BROWSE</span>
              <input type="file" name="filename" id="filename" required>
            </div>
            <div class="file-path-wrapper">
            <input type="hidden" name="baseUrl" value="{{ url('/') }}">
              <input class="file-path validate" type="text">
            </div>
          </div>
    </div>
    <div class="modal-footer">
      <button class="btn-small blue" type="submit">Upload</button>
    </form>
    </div>
</div>

<script>
$(document).ready(function(){
    $('select').formSelect();
    $('.modal').modal();

    $(document).on('ajaxComplete ajaxReady', function(){
        $(".progress").hide();
        $.ajaxSetup({
            headers:{
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });

        $('#formUpload').on('submit', function(e){
            $(".progress").show();
            var formData = new FormData(this);
            var formUrl = $('#formUpload').attr('action');
            var baseUrl = $('input[name="baseUrl"]').val();
            $.ajax({
                url: formUrl,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data){
                    if(data == 'failed'){
                        swal.fire('File tidak berhasil diupload!', 'Silahkan cek kembali nama filenya', 'info');
                    }else{
                        var elem = document.getElementById('modalUpload');
                        var modalUpload = M.Modal.getInstance(elem);
                        swal.fire({
                            title: 'File berhasil diupload',
                            type: 'success'
                        }).then(function(){
                            modalUpload.close();
                            location.replace(baseUrl + '/admin/pathways');
                        })
                    }
                },
                xhr: function(){
                    var xhr = $.ajaxSettings.xhr();
                    xhr.upload.onprogress = function(e){
                        $(".determinate").attr("style", "width:" + Math.floor(e.loaded / e.total * 100) + "%");
                        $(".determinate").html(Math.floor(e.loaded / e.total * 100) + "%");
                    };
                    return xhr;
                },
            });
            e.preventDefault();
        });
    });
});
</script>
@endsection
