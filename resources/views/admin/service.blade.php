@extends('layouts.ly_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<style>
    .preview-images {
        padding-bottom: 40%;
    }
</style>
@endsection
@section('bredcrum')
    @include('layouts.ly_dashboard_bredcrum')
@endsection
@section('content')

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Our Service </h3>
            <div class="card-tools">
                  <button type="button" onclick="OurService('tambah', '{{ route('service_post') }}', '')" class="btn btn-sm btn-primary"><i class="fas fa-plus"> </i> Our Service
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
               <div class="row">
                  <div class="col-sm-12">
                     <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                           <tr role="row">
                              <th >Images</th>
                              <th >Our Service Name</th>
                              <th >Description</th>
                              <th >Link URL</th>
                              <th >isActive</th>
                              <th>Created By</th>
                              <th>##</th>
                           </tr>
                        </thead>
                        <tbody>
                        @if(count($list) > 0)
                            @foreach($list as $key => $val)
                                <tr role="row" class="odd">
                                <td>
                                    <a href="javascript:;" onclick="previewImages('{{ $val['based_64'] }}')">Hit Me!</a>
                                </td>
                                <td>{{ $val['name'] }}</td>
                                <td>{!! nl2br(substr($val['description'], 0, 100)) !!} <div id="content-{{ $val['id'] }}" style="display:none;">{!! nl2br($val['description']) !!}</div> <a href="javascript:;" id="{{ $val['id'] }}" onclick="toolstips('{{ $val['id'] }}')">.....</a></td>
                                <td>{{ $val['url'] }}</td>
                                <td><div class="badge {{ $val['isActive'] == 1 ? 'badge-info' : 'badge-danger' }}">{{ $val['isActive'] == 1 ? 'Active' : 'Non Active' }}</div></td>
                                <td>{{ $val['user']['name'] }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" onclick="OurService('edit', '{{ route('service_post') }}', '{{ $val['id'] }}')" class="btn btn-sm btn-primary">
                                            Edit
                                        </button>
                                        <!-- <button type="button" class="btn btn-sm btn-danger">
                                            Delete
                                        </button> -->
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        @else
                            <tr role="row" class="odd">
                                <td colspan="6">Data not found.</td>
                            </tr>
                        @endif
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</div>


@endsection

@section('javascript')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
function previewImages(img) {
    var dialog = bootbox.dialog({
        size: 'large',
        message: '<img src="'+img+'" style="width: 100%;" class="rounded float-left" alt="...">',
        onEscape: function() {
            
        },
    });
}
function toolstips(id) {
    let content = document.getElementById('content-'+id);
    var dialog = bootbox.dialog({
        size: 'medium',
        message: '<p>'+content.innerHTML+'</p>',
        onEscape: function() {
            
        },
    });
}

function fileSizeValidate(fdata) {
    var maxSize = '5360';
    if (fdata.files && fdata.files[0]) {
        var fsize = fdata.files[0].size / 1024;
        if (fsize > maxSize) {
            onlyAlert( "Ukuran maksimum file 5 Mb, Silakan gunakan file lain.", false);
            return false;
        } else {
            return fdata.files[0];
        }
    }
}

function ChangeImages() {
    $('[name="tmpImages"]').click();

    var control = document.getElementById("tmpImages");
    var validExt = ['jpeg', 'jpg', 'png'];
    control.addEventListener("change", function(event) {
        var data = fileSizeValidate(control);
        var types = data.name.substring(data.name.lastIndexOf('.') + 1).toLowerCase();
        var valTypes = validExt.includes(types);
        var base64 = "";
        if(valTypes) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.previewImages').attr("src", e.target.result);
                $('[name="images"]').val(e.target.result);
            }
            reader.readAsDataURL(data);
        } else {
            onlyAlert( "Jenis gambar yang dipilih harus .jpeg atau .jpg", false);
        }
    }, false);
}
function Dialog(data) {
    let a, b;
    let isActive = "";
    let imagesAlt = "";
    let imagesId = "";
    var expired ="";
    var isEdit = "display: none";
    var restData = "";
    var images = '';
    var description = '';
    var linkUrl = 'http://corporate.sinergiadhikarya.co.id/';
    if(data.type == 'edit') {
        restData = data.res;
        linkUrl = restData.url != '' ? restData.url : 'http://corporate.sinergiadhikarya.co.id/';
        imagesAlt = restData.name;
        imagesId = restData.id;
        images = restData.based_64;
        isActive = restData.isActive;
        description = restData.description;
        isEdit = "";

        if(restData.isActive == 0) {
            a = 'checked="true"';
        } else {
            b = 'checked="true"';
        }
    }
    var dialog = bootbox.dialog({
        title: data.Title+' Our Service ',
        size: 'medium',
        message: '<form class="form-commentar">' +
                '<div class="form-group has-float-label">' +
                    '<input type="text" class="form-control" name="imagesAlt" placeholder="Nama Service." value="'+imagesAlt+'">' +
                    '<input type="hidden" class="form-control" name="imagesId" value="'+imagesId+'">' +
                '</div>' +
                '<div class="form-group has-float-label">' +
                    '<label for="exampleInputEmail1">Link URL</label>' +
                    '<input type="text" class="form-control" name="linkUrl" placeholder="Link URL." value="'+linkUrl+'">' +
                '</div>' +
                '<div class="row"><div class=" col-md-12"><div class="preview-images">' +
                    '<img src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22782%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20782%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_172f306647a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_172f306647a%22%3E%3Crect%20width%3D%22782%22%20height%3D%22250%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22291.25%22%20y%3D%22142.4%22%3E782x250%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" class="rounded float-left img-thumbnail previewImages" alt="...">' +
                '</div></div></div>' +
                '<div class="form-group has-float-label">' +
                  '<button type="button" class="btn btn-default changeImages">' +
                    '<i class="fas fa-images"></i> Select Images' +
                  '</button>' +
                  '<p class="help-block">Max. 5MB</p>' +
                '</div>' +
                '<input type="file" id="tmpImages" name="tmpImages" accept="image/*" style="display: none;">' +
                '<input type="hidden" name="images" value="'+images+'">' +
                '<div class="form-group has-float-label">' +
                    '<label for="exampleInputEmail1">Description</label>' +
                    '<textarea class="textarea" name="description" id="exampleInputEmail1" row="10" placeholder="Place some text here" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">'+ description +'</textarea>' +
                '</div>' +
                '<div class="form-group has-float-label" style="'+ isEdit +'">' +
                  '<div class="custom-control custom-radio icheck-primary d-inline">' +
                     '<input class="custom-control-input" type="radio" id="customRadio1" name="isActive" value="1" '+ b +' >' +
                     '<label for="customRadio1" class="custom-control-label">Active</label>' +
                  '</div>' +
                  '<div class="custom-control custom-radio icheck-danger d-inline" style="padding-left: 10%;">' +
                     '<input class="custom-control-input" type="radio" id="customRadio2" name="isActive" value="0" '+ a +'>' +
                     '<label for="customRadio2" class="custom-control-label">Non Active</label>' +
                  '</div>' +
                '</div>' +
                '<div class="form-group">' + '<button  class="btn btn-block btn-success simpanImages">Simpan</button>' +'</div>' +
            '</form>',
        onEscape: function() {
            
        },
    });
                        
    dialog.init(function() {
        $('.textarea').summernote();
        if(data.type == "edit") {
            $('.previewImages').attr("src", images);
        }
        $('.select2').select2({
            theme: 'bootstrap4'
        });
        $('.changeImages').on('click', function(e) {
            e.preventDefault();
            ChangeImages();
        });

        $('.simpanImages').on('click', function(e) {
            e.preventDefault();
            imagesAlt =  $('[name="imagesAlt"]').val();
            images =  $('[name="images"]').val();
            imagesId =  $('[name="imagesId"]').val();
            isActive =  $('[name="isActive"]').val();
            linkUrl =  $('[name="linkUrl"]').val();
            description =  $('[name="description"]').val();
            
            if(data.type == 'edit') {
                isActive = $('[name="isActive"]:checked').val();
            }
            if(description == '') {
                onlyAlert("Silahkan input Description.", false);
            } else if(images == '') {
                onlyAlert("Silahkan pilih Images.", false);
            } else {
                postAjax(data.url, {
                    "imagesAlt" : imagesAlt,
                    "images" : images,
                    "imagesId" : imagesId,
                    "linkUrl" : linkUrl,
                    "isActive" : isActive,
                    "description" : description,
                    "_token": "{{ csrf_token() }}"
                }, function(data) {
                    if(data.status == 200) {
                        var status = JSON.parse(data.response);
                        if(status['code'] == 200) {
                            onlyAlert(status['msg'], true);
                            setTimeout(function() { 
                                window.location.reload(true);
                            }, 2000);
                        }
                    } else if(data.status == 500) {
                        onlyAlert( "Terjadi kesalahan pada server.", false);
                    } else {
                        onlyAlert(status['msg'], false);
                    }
                });
            }
        });
    });
}
function OurService(type, url, id) {
    let Title = 'Tambah';
    if(type === 'edit') {
      Title = 'Edit';
      postAjax(url, { "imagesId": id, "_token": "{{ csrf_token() }}" }, function(data) {
            if(data.status == 200) {
                var status = JSON.parse(data.response);
                if(status.code == 200) {
                    var res = JSON.parse(status.msg);
                    // console.log(res);
                    Dialog({
                        Title :Title,
                        url: url,
                        type :type,
                        res : res
                    });
                } else onlyAlert( "Terjadi kesalahan pada server.", false);
            } else if(data.status == 500) {
                onlyAlert( "Terjadi kesalahan pada server.", false);
            } else {
                onlyAlert(status['msg'], false);
            }
        });
    } else {
        Dialog({
            Title :Title,
            url: url,
            type :type
        });
    }
    
}
$(function () {
    $('#example1').DataTable();
  });
</script>

@endsection