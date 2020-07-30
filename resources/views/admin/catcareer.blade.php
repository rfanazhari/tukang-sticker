@extends('layouts.ly_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('bredcrum')
    @include('layouts.ly_dashboard_bredcrum')
@endsection
@section('content')



<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">List Category Career </h3>
            <div class="card-tools">
                  <button type="button" onclick="CategoryCareer('tambah', '{{ route('cat_career_post') }}', '')" class="btn btn-sm btn-primary"><i class="fas fa-plus"> </i> Category Career
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
               <div class="row">
                  <div class="col-sm-12">
                     <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                           <tr role="row">
                              <th >Category Name</th>
                              <th >Permalink</th>
                              <th>Is Active</th>
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
                                    <td>{{ $val['user']['name'] }}</td>
                                    <td>
                                       <div class="btn-group">
                                          <button type="button" onclick="CategoryCareer('edit', '{{ route('cat_career_post') }}', '{{ $val['id'] }}-{{ $val['name'] }}-{{ $val['isActive'] }}')" class="btn btn-sm btn-primary">
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

<script>

function CategoryCareer(type, url, id) {
    let Title = 'Tambah';
    let CatName = '';
    var tmpId;
    var isEdit = "display: none;";
    var isActiveVal;
    var a, b;
    if(type === 'edit') {
      Title = 'Edit';
      tmpId = id.split('-');
      id = tmpId[0];
      CatName = tmpId[1];
      isActiveVal = tmpId[2];
      if(isActiveVal == 0) {
         a = 'checked="true"';
      } else {
         b = 'checked="true"';
      }
      isEdit = "";
    } 
    var dialog = bootbox.dialog({
        title: Title+' Category Career ',
        message: '<form class="form-commentar">' +
                '<div class="form-group has-float-label">' +
                    '<input type="text" class="form-control" name="cat_name" value="'+CatName+'">' +
                    '<input type="hidden" class="form-control" name="id" value="'+ id +'">' +
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
        $('.simpanCategory').on('click', function(e) {
            e.preventDefault();
            let cat_name = $('[name="cat_name"]').val();
            let cat_id = $('[name="id"]').val();
            let isActives = null;
            if(type == 'edit') {
               isActives = $('[name="isActive"]:checked').val();
            }
            if(cat_name == '') {
                onlyAlert("Nama Category tidak boleh kosong.", false);
            } else {
                postAjax(url, { "cat_name": cat_name, "cat_id": cat_id, "isActive": isActives, "_token": "{{ csrf_token() }}" }, function(data) {
                    if(data.status == 200) {
                        var status = JSON.parse(data.response);
                        if(status['code'] == 200) {
                            onlyAlert(status['msg'], true);
                            setTimeout(function() { 
                                location.reload();
                            }, 3000);
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
$(function () {
    $('#example1').DataTable();
  });
</script>

@endsection