@extends('layouts.ly_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
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
            <h3 class="card-title">List </h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
               <div class="row">
                  <div class="col-sm-12">
                     <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                           <tr role="row">
                              <th >Nama</th>
                              <th >Email</th>
                              <th >Telp</th>
                              <th >Message</th>
                              <th>Created Date</th>
                           </tr>
                        </thead>
                        <tbody>
                        @if(count($list) > 0)
                            @foreach($list as $key => $val)
                                <tr role="row" class="odd">
                                    <td>{{ $val['name'] }} {{ $val['surname'] }}</td>
                                    <td>{{ $val['email'] }}</td>
                                    <td>{{ $val['phone'] }}</td>
                                    <td>{{ $val['message'] }}</td>
                                    <td>{{ $val['created_at'] }}</td>
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
$(function () {
    $('#example1').DataTable();
  });
</script>

@endsection