@extends('layouts.ly_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}"> -->
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
            <div class="card-tools">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" onclick="location.href='{{ route('transaction_create', ['type' => 'personal']) }}'" class="btn btn-primary"><i class="fas fa-plus"> </i> Personal</button>
                    <button type="button" onclick="location.href='{{ route('transaction_create', ['type' => 'corporate']) }}'" class="btn btn-warning"><i class="fas fa-plus"> </i> Corporate</button>
                </div>
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            @if (session('statusTrx'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('statusTrx') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            @endif
               <div class="row">
                  <div class="col-sm-12">
                     <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                           <tr role="row">
                              <th>Customer Name</th>
                              <th>Product</th>
                              <th>Status</th>
                              <th>Payment</th>
                              <th>Created At</th>
                              <th>##</th>
                           </tr>
                        </thead>
                        <tbody>
                        @if(count($trx) > 0) 
                           @foreach($trx as $key => $val)
                              @php
                                 $colorStatus = 'primary';
                                 if($val['status'] == 'invoice') {
                                    $colorStatus = 'info';
                                 } elseif($val['status'] == 'completed' || $val['status'] == 'sending') {
                                    $colorStatus = 'success';
                                 }
                              @endphp
                              <tr>
                                 <td><span class="badge badge-primary">{{ $val['customer']['type'] }}</span> {{ $val['customer']['picName'] }}</td>
                                 <td>{{ count($val['details']) }} products</td>
                                 <td>
                                    <h5><span class="badge badge-{{$colorStatus}}">{{ $val['status'] }}</span></h5>
                                 </td>
                                 <td><h5><span class="badge badge-{{$val['status_payment'] == 'unpaid' ? 'secondary' : 'success'}}">{{ $val['status_payment'] }}</span></h5></td>
                                 <td>{{ date('d F Y', strtotime($val['created_at'])) }}</td>
                                 <td>
                                    <button class="btn btn-sm btn-primary" onclick="showDetails('{{ $val['trx_id'] }}')">details</button>
                                 </td>
                              </tr>
                           @endforeach
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
   let htmls;
   function printInvoice(id) {
      alert(id);
   }
   function sendEmail(id) {
      alert(id);
   }
   function cancelOrder(id) {
      bootbox.confirm({//Konfirmasi dulu apa benar akan di hapus dari MCJ
         message: "Are you sure want cancel this Transaction ?",
         className: 'bb-error-token-modal',
         buttons: {
            confirm: {
                  label: 'Yes',
                  className: 'btn btn-sm btn-success'
            },
            cancel: {
                  label: 'No',
                  className: 'btn btn-sm btn-danger'
            }
         },
         callback: function (result) {
            if (result === true) {
               // result has a value
               console.log('Jalankan Fungsi hapus ... dari List di browser & DB');
               var table = $('#workshop_table').DataTable();
                  table
                        .row( $(this).parents('tr') )
                        .remove()
                        .draw();
            } else {
               onlyAlert('Thank you for this action.', true);
               setTimeout(function(){ renderHtml(htmls); }, 4000);
            }
         }
      });
   }
   function renderHtml(html) {
      htmls = html;
      var dialog = bootbox.dialog({
         size: 'large',
         message: html,
         onEscape: function() {
               
         },
      });
                           
      dialog.init(function() {
         document.getElementById("changPaid").onclick = function(e){
            var id = e.srcElement.dataset.id
            console.log(id);
         }
      });
   }
   function showDetails(id) {
      postAjax("{{ route('transaction_details') }}", { "trx_id": id,  "_token": "{{ csrf_token() }}" }, function(data) {
            if(data.status == 200) {
               var rest = JSON.parse(data.response);
               if(rest.code == 200) {
                  var html = rest.msg;
                  renderHtml(html);
               } else onlyAlert( "Terjadi kesalahan pada server.", false);                    
            } else if(data.status == 500) {
               onlyAlert( "Terjadi kesalahan pada server.", false);
            } else {
               onlyAlert(status['msg'], false);
            }
      });
   }
    $(function () {
        $('#example1').DataTable();
    });
</script>
@endsection