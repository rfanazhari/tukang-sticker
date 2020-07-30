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
            <h3 class="card-title">List Lable </h3>
            <div class="card-tools">
                  <button type="button" onclick="Lable('tambah', '{{ route('lable_post') }}', '')" class="btn btn-sm btn-primary"><i class="fas fa-plus"> </i> Lable
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
               <div class="row">
                  <div class="col-sm-12">
                     <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                           <tr role="row">
                              <th >Name</th>
                              <th >Permalink</th>
                              <th >isActive</th>
                              <th>Created By</th>
                              <th>##</th>
                           </tr>
                        </thead>
                        <tbody>
                        @if(count($list) > 0)
                            @foreach($list as $key => $val)
                                <tr role="row" class="odd">
                                <td>{{ $val['name'] }}</td>
                                <td>{{ $val['permalink'] }}</td>
                                <td><div class="badge {{ $val['isActive'] == 1 ? 'badge-info' : 'badge-danger' }}">{{ $val['isActive'] == 1 ? 'Active' : 'Non Active' }}</div></td>
                                <td>{{ isset($val['user']['name']) ? $val['user']['name'] : '' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" onclick="Lable('edit', '{{ route('lable_post') }}', '{{ $val['id'] }}-{{ $val['name'] }}-{{ $val['isActive'] }}')" class="btn btn-sm btn-primary">
                                            Edit
                                        </button>
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        @else
                            <tr role="row" class="odd">
                                <td colspan="5">Data not found.</td>
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
function Dialog(data) {
    let a, b;
    let isActive = "";
    let lableId = "";
    var expired ="";
    var lableName ="";
    var isEdit = "display: none";
    if(data.type == 'edit') {
        lableName = data.lableName;
        lableId = data.lableId;
        isEdit = "";
        if(data.isActive == 0) {
            a = 'checked="true"';
        } else {
            b = 'checked="true"';
        }
    }
    var dialog = bootbox.dialog({
        title: data.Title+' Lable ',
        size: 'medium',
        message: '<form class="form-commentar">' +
                '<div class="form-group has-float-label">' +
                    '<input type="text" class="form-control" name="lableName" placeholder="Lable Name" value="'+lableName+'">' +
                    '<input type="hidden" class="form-control" name="lableId" value="'+lableId+'">' +
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
                '<div class="form-group">' + '<button  class="btn btn-block btn-success simpanLable">Simpan</button>' +'</div>' +
            '</form>',
        onEscape: function() {
            
        },
    });
                        
    dialog.init(function() {
        
        $('.simpanLable').on('click', function(e) {
            e.preventDefault();
            lableName =  $('[name="lableName"]').val();
            lableId =  $('[name="lableId"]').val();
            isActive =  $('[name="isActive"]').val();
            
            if(data.type == 'edit') {
                isActive = $('[name="isActive"]:checked').val();
            }
            if(lableName == '') {
                onlyAlert("Nama Lable tidak boleh kosong.", false);
            } else {
                postAjax(data.url, {
                    "isActive" : isActive,
                    "lableName" : lableName,
                    "lableId" : lableId,
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
function Lable(type, url, id) {
    let Title = 'Tambah';
    var tmpId = id.split('-');
    let lableId = tmpId[0];
    let lableName = tmpId[1];
    let isActive = tmpId[2];
    if(type === 'edit') {
      Title = 'Edit';
      Dialog({
            Title :Title,
            url: url,
            type :type,
            lableId : lableId,
            lableName : lableName,
            isActive : isActive,
        });
    } else {
        Dialog({
            Title :Title,
            url: url,
            type :type,
            lableId : lableId,
            lableName : lableName,
            isActive : isActive,
        });
    }
    
}
$(function () {
    $('#example1').DataTable();
  });
</script>

@endsection