@extends('layouts.ly_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection
@section('bredcrum')
    @include('layouts.ly_dashboard_bredcrum')
@endsection
@section('content')

<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">List Career </h3>
            <div class="card-tools">
                  <button type="button" onclick="Career('tambah', '{{ route('career_post') }}', '')" class="btn btn-sm btn-primary"><i class="fas fa-plus"> </i> Career
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
               <div class="row">
                  <div class="col-sm-12">
                     <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                           <tr role="row">
                              <th >Position</th>
                              <th >Placement</th>
                              <th >Description</th>
                              <th >Link URL</th>
                              <th>Is Active</th>
                              <th>Created By</th>
                              <th>##</th>
                           </tr>
                        </thead>
                        <tbody>
                        @if(count($career) > 0)
                            @foreach($career as $key => $val)
                                <tr role="row" class="odd">
                                <td>{{ $val['catcarrer']['name'] }}</td>
                                <td>{{ $val['location'] }}</td>
                                <td>{!! nl2br(substr($val['description'], 0, 100)) !!} <div id="content-{{ $val['id'] }}" style="display:none;">{!! nl2br($val['description']) !!}</div> <a href="javascript:;" id="{{ $val['id'] }}" onclick="toolstips('{{ $val['id'] }}')">.....</a></td>
                                <td>{{ $val['url'] }}</td>
                                <td><div class="badge {{ $val['isActive'] == 1 ? 'badge-info' : 'badge-danger' }}">{{ $val['isActive'] == 1 ? 'Active' : 'Non Active' }}</div></td>
                                <td>{{ $val['user']['name'] }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" onclick="Career('edit', '{{ route('career_post') }}', '{{ $val['id'] }}')" class="btn btn-sm btn-primary">
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
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script>
function toolstips(id) {
    let content = document.getElementById('content-'+id);
    var dialog = bootbox.dialog({
        size: 'medium',
        message: '<p>'+content.innerHTML+'</p>',
        onEscape: function() {
            
        },
    });
}

function Dialog(data) {
    let isActive, a, b;
    var expired ="";
    var description ="";
    var location ="";
    var cat_carrer_id ="";
    var id = "";
    var linkUrl = 'http://pendaftaran.sinergiadhikarya.co.id/';
    var isEdit = "display: none";
    if(data.type == 'edit') {
        var Response = data.res[0];
        linkUrl = Response.url != '' ? Response.url : linkUrl;
        id = Response.id;
        cat_carrer_id = Response.cat_carrer_id;
        location = Response.location;
        isActive = Response.isActive;
        description = Response.description;
        expired = Response.expired.split('-');
        expired = expired[1]+"/"+expired[2]+"/"+expired[0];
        isEdit = "";

        if(isActive == 0) {
            a = "checked";
        } else {
            b = "checked";
        }
    }
    var dialog = bootbox.dialog({
        title: data.Title+' Category Career ',
        size: 'medium',
        message: '<form class="form-commentar">' +
                '<div class="form-group has-float-label">' +
                    '<select class="form-control select2" id="cat_career" name="cat_career" style="width: 100%;">' +
                        '<option value="">Pilih Category</option>' +
                        @foreach($cat_career as $key => $val)
                            '<option value="{{ $val['id'] }}">{{ $val['name'] }}</option>' +
                        @endforeach
                    '</select>' +
                '</div>' +
                '<div class="form-group has-float-label">' +
                    '<input type="text" class="form-control" name="location" placeholder="Penempatan kerja" value="'+location+'">' +
                    '<input type="hidden" class="form-control" name="id" value="'+id+'">' +
                '</div>' +
                '<div class="form-group has-float-label">' +
                    '<label for="exampleInputEmail1">Link URL</label>' +
                    '<input type="text" class="form-control" name="linkUrl" placeholder="Link URL." value="'+linkUrl+'">' +
                '</div>' +
                '<div class="form-group has-float-label">' +
                    '<label for="exampleInputEmail1">Description</label>' +
                    '<textarea class="textarea" name="description" id="exampleInputEmail1" row="10" placeholder="Place some text here" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">'+ description +'</textarea>' +
                '</div>' +
                '<div class="form-group">' +
                  '<label>Date Expired: '+expired+'</label>' +
                    '<div class="input-group date" id="reservationdate" data-target-input="nearest">' +
                        '<input type="text" class="form-control datetimepicker-input" name="expired" data-target="#reservationdate"/>' +
                        '<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">' +
                            '<div class="input-group-text"><i class="fa fa-calendar"></i></div>' +
                        '</div>' +
                    '</div>' +
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
                '<div class="form-group">' + '<button  class="btn btn-block btn-success simpanCategory">Simpan</button>' +'</div>' +
            '</form>',
        onEscape: function() {
            
        },
    });
                        
    dialog.init(function() {
        if(data.type == "edit") {
            document.getElementById('cat_career').value = cat_carrer_id;
        }
        $('.select2').select2({
            theme: 'bootstrap4'
        });
        $('#reservationdate').datetimepicker({
            format: 'L',
        });
        $('.textarea').summernote();
        $('.simpanCategory').on('click', function(e) {
            e.preventDefault();
            var cat_career = $('select[name="cat_career"]').val();
            let isActives = null;
            var expireds =  $('[name="expired"]').val();
            var career_id =  $('[name="id"]').val();
            var linkUrl =  $('[name="linkUrl"]').val();
            
            if(expireds == null || expireds == undefined || expireds == "") {
                expireds = expired;
            }
            
            if(data.type == 'edit') {
               isActives = $('[name="isActive"]:checked').val();
            }
            if(cat_career == '') {
                onlyAlert("Nama Category tidak boleh kosong.", false);
            } else {
                postAjax(data.url, {
                    "cat_career" : cat_career,
                    "isActives" : isActives,
                    "location" : $('[name="location"]').val(),
                    "description" : $('[name="description"]').val(),
                    "expired" : expireds,
                    "linkUrl" : linkUrl,
                    "career_id" : career_id,
                    "_token": "{{ csrf_token() }}"
                }, function(data) {
                    console.log(data);
                    if(data.status == 200) {
                        var status = JSON.parse(data.response);
                        if(status['code'] == 200) {
                            onlyAlert(status['msg'], true);
                            setTimeout(function() { 
                                window.location.reload(true);
                            }, 2000);
                        } else {
                            onlyAlert( "Terjadi kesalahan pada server.", false);
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
function Career(type, url, id) {
    let Title = 'Tambah';
    if(type === 'edit') {
      Title = 'Edit';
      postAjax(url, { "career_id": id, "_token": "{{ csrf_token() }}" }, function(data) {
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