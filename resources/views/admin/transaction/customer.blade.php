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
            <h3 class="card-title">List Customer </h3>
            <div class="card-tools">
                  <button type="button" onclick="Customer('tambah', '{{ route('customer_post') }}', '')" class="btn btn-sm btn-primary"><i class="fas fa-plus"> </i> Customer
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
               <div class="row">
                  <div class="col-sm-12">
                     <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                           <tr role="row">
                              <th >Type</th>
                              <th >Corporate Name</th>
                              <th >Customer Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Created By</th>
                              <th>##</th>
                           </tr>
                        </thead>
                        <tbody>
                        @if(count($customer) > 0)
                            @foreach($customer as $key => $val)
                                <tr role="row" class="odd">
                                <td>{{ $val['type'] }}</td>
                                <td>{{ empty($val['companyName']) ? "--" : $val['companyName'] }}</td>
                                <td>{{ $val['picName'] }}</td>
                                <td>{{ $val['email'] }}</td>
                                <td>{{ $val['phone'] }}</td>
                                <td>{{ $val['address'] }}</td>
                                <td>{{ $val['user']['name'] }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" onclick="Customer('edit', '{{ route('customer_post') }}', '{{ $val['id'] }}')" class="btn btn-sm btn-primary">
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
<script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    function validateEmail(emailField){
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            if (reg.test(emailField.value) == false) 
            {
                onlyAlert("Format email tidak sesuai.", false);
                return false;
            }

            return true;

    }
    function Dialog(data) {
        let a, b;
        let isActive = "";
        let lableId = "";
        var expired ="";
        var lableName ="";
        var isEdit = "display: none";
        
        var companyName = "";
        var customerName = "";
        let email = "", phone = "", customerId = "", address = "", typeCustomer = "";
        
        if(data.type == 'edit') {
            var DataRest = data.res;
            var companyName = document.getElementById('companyName');

            customerId      = DataRest.id;
            companyName     = DataRest.companyName == "" || DataRest.companyName == null ? "" : DataRest.companyName;

            customerName    = DataRest.picName;
            email           = DataRest.email;
            phone           = DataRest.phone;
            address         = DataRest.address;

            typeCustomer    = DataRest.type;
            if(typeCustomer == 'corporate') {
                companyName.style.display = "block";
            }
        }
        var dialog = bootbox.dialog({
            title: data.Title+' Customer ',
            size: 'medium',
            message: '<form class="form-commentar">' +
                    '<div class="form-group has-float-label">' +
                        '<input type="hidden" class="form-control" name="customerId" value="'+customerId+'">' +
                        '<select class="form-control" id="typeCustomer" name="typeCustomer" style="width: 100%;">' +
                            '<option value="">Pilih Type Customer</option>' +
                            '<option value="personal">Personal</option>' +
                            '<option value="corporate">Corporate</option>' +
                        '</select>' +
                    '</div>' +
                    '<div class="form-group has-float-label" style="display: none" id="companyName">' +
                        '<input type="text" class="form-control" name="companyName" placeholder="Company Name" value="'+companyName+'">' +
                    '</div>' +
                    '<div class="form-group has-float-label">' +
                        '<input type="text" class="form-control" name="customerName" placeholder="Customer Name" value="'+customerName+'">' +
                    '</div>' +
                    '<div class="form-group has-float-label">' +
                        '<input type="text" class="form-control" onblur="validateEmail(this);" name="email" placeholder="Email" value="'+email+'">' +
                    '</div>' +
                    '<div class="form-group has-float-label">' +
                        '<input type="text" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" class="form-control" name="phone" placeholder="Phone"  value="'+phone+'">' +
                    '</div>' +
                    '<div class="form-group has-float-label">' +
                        '<textarea class="form-control" id="address" name="address" rows="3" placeholder="Address">'+address+'</textarea>' +
                    '</div>' +
                    '<div class="form-group">' + '<button  class="btn btn-block btn-success simpanLable">Simpan</button>' +'</div>' +
                '</form>',
            onEscape: function() {
                
            },
        });
                            
        dialog.init(function() {
            if(data.type == "edit") {
                document.getElementById('typeCustomer').value = typeCustomer;
            }
            $('#typeCustomer').on('change', function() {
                var companyName = document.getElementById('companyName');
                if(this.value == "" || this.value == undefined) {
                    $('#typeCustomer').addClass("is-invalid");
                } else {
                    $('#typeCustomer').removeClass("is-invalid");
                }
                if(this.value == "corporate") {
                    
                    companyName.style.display = "block";
                } else {
                    
                    companyName.style.display = "none";
                    // companyName.setAttribute('display:none;');
                }
            });
            $('.simpanLable').on('click', function(e) {
                e.preventDefault();
                customerId =  $('[name="customerId"]');
                companyName =  $('[name="companyName"]');
                customerName =  $('[name="customerName"]');
                email =  $('[name="email"]');
                phone =  $('[name="phone"]');
                address =  $('[name="address"]');
                typeCustomer =  $('[name="typeCustomer"]');
                
                // validation
                if(typeCustomer.val() == "" || typeCustomer.val() == undefined) {
                    typeCustomer.addClass("is-invalid");
                    return;
                }
                if(customerName.val() == "" || customerName.val() == undefined) {
                    customerName.addClass("is-invalid");
                    return;
                }
                if(phone.val() == "" || phone.val() == undefined) {
                    phone.addClass("is-invalid");
                    return;
                }

                postAjax(data.url, {
                    "customerId" : customerId.val(),
                    "companyName" : companyName.val(),
                    "customerName" : customerName.val(),
                    "email" : email.val(),
                    "phone" : phone.val(),
                    "address" : address.val(),
                    "typeCustomer" : typeCustomer.val(),
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
            });
        });
    }
    function Customer(type, url, id) {
        let Title = 'Tambah';
        
        let lableId = "";
        let lableName = "";
        let isActive = "";
        if(type === 'edit') {
            Title = 'Edit';
            postAjax(url, { "customerId": id, "_token": "{{ csrf_token() }}" }, function(data) {
                if(data.status == 200) {
                    var rest = JSON.parse(data.response);
                    if(rest.code == 200) {
                        var daTa = JSON.parse(rest.msg);
                        Dialog({
                            Title :Title,
                            url: url,
                            type :type,
                            res : daTa
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