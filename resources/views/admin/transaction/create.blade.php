@extends('layouts.ly_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<style>
    #delivery_address_form, #deliveryPriceForm {
        display: none;
    }
</style>
@endsection
@section('bredcrum')
    @include('layouts.ly_dashboard_bredcrum')
@endsection
@section('content')

<div class="row">
   <div class="col-md-12">
      <div class="card card-info">
          <div class="card-header">Information Transaction</div>
         <div class="card-body">
        <form method="post" action="{{ route('transaction_post', ['type' => $type_trx]) }}">
                @csrf
               <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="dataCustomer">Pilih Customer <button type="button" onclick="Customer('tambah', '{{ route('customer_post') }}', '')" class="btn btn-sm btn-primary"><i class="fas fa-plus"> </i> Customer </button></label>
                    <select class="form-control @if($errorcustomerId) is-invalid @endif select2" name="customerId" id="dataCustomer" require="required">
                        <option value="">----</option>
                        @foreach($customer as $key => $val)
                            <option value="{{ $val['id'] }}-{{ $val['type'] }}" @if(!empty($customerId) && $customerId == $val['id']) selected = "selected"@endif >{{ $val['picName'] }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="paymentType">Pilih Type Pembayaran</label>
                    <div class="form-control @if($errorpayment_type) is-invalid @endif" @if(empty($errorpayment_type))style="border: unset;" @endif>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="payment_type" name="payment_type" class="custom-control-input" value="cash" @if($payment_type == "cash") checked @endif>
                            <label class="custom-control-label" for="payment_type">Cash</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="payment_type" class="custom-control-input" value="transfer" @if($payment_type  == "transfer") checked @endif>
                            <label class="custom-control-label" for="customRadioInline2">Transfer</label>
                        </div>
                    </div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="statusDelivery">Status Pengiriman</label>
                    <div class="form-control @if($errorstatus_reservation) is-invalid @endif" @if(empty($errorstatus_reservation))style="border: unset;" @endif>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="status_reservation1" onclick="changeReservation(this);" name="status_reservation" class="custom-control-input" value="pickup" @if($status_reservation == "pickup") checked @endif>
                            <label class="custom-control-label" for="status_reservation1">Pickup</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="status_reservation2" onclick="changeReservation(this);" name="status_reservation" class="custom-control-input" value="delivery" @if($status_reservation == "delivery") checked @endif>
                            <label class="custom-control-label" for="status_reservation2">Delivery</label>
                        </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="form-group" id="delivery_address_form" @if($status_reservation == "delivery") style="display: block !important;" @endif>
                        <label for="delivery_address">Alamat Pengiriman</label>
                        <textarea class="form-control @if($errordelivery_address) is-invalid @endif" id="delivery_address" name="delivery_address" rows="3">{{ $delivery_address }}</textarea>
                    </div>
                  </div>
               </div>
               <hr>
               <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="costPrice">Cost Price</label>
                    <input type="text" class="form-control @if($errorcost_price) is-invalid @endif" id="costPrice" name="cost_price" value="{{ $cost_price }}" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="sellingPrice">Selling Price</label>
                    <input type="text" class="form-control @if($errorselling_price) is-invalid @endif" id="sellingPrice" name="selling_price" value="{{ $selling_price }}" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                  </div>
                  <div class="form-group col-md-4" id="deliveryPriceForm" @if($status_reservation == "delivery") style="display: block !important;" @endif>
                    <label for="deliveryPrice">Delivery Price</label>
                    <input type="text" class="form-control @if($errordelivery_price) is-invalid @endif" id="deliveryPrice" name="delivery_price" value="{{ $delivery_price }}" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                  </div>
               </div>
         </div>
      </div>
      <div class="card card-danger">
          <div class="card-header">Information Products</div>
         <div class="card-body">
            <div class="form-group @if($errorlist_product) form-control is-invalid @endif">
                <button class="btn btn-sm btn-success" type="button" onclick="addProduct('add', '')"> <i class="fas fa-plus"></i> Product </button>
                <input type="hidden" name="list_product" value="{{ $list_product }}">
            </div>
            
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
            <thead>
                <tr role="row">
                    <th>Nama Product</th>
                    <th>Dimensi</th>
                    <th>Quantity</th>
                    <th>Cost Price</th>
                    <th>Selling Price</th>
                    <th>##</th>
                </tr>
            </thead>
            <tbody id="product_list">
                @if(!empty($list_product))
                    @foreach(json_decode($list_product, true) as $key => $val)
                        <tr>
                            <td>{{ $val['productsName'] }}</td>
                            <td>{{ $val['dimensi'] }} {{ $val['satuan_dimensi'] }}</td>
                            <td>{{ $val['qty'] }} {{ $val['satuan_qty'] }}</td>
                            <td>{{ $val['cost_price'] }}</td>
                            <td>{{ $val['selling_price'] }}</td>
                            <td><button class="btn btn-sm btn-danger" data-id = "{{ $val['products'] }}" onclick="removeData(this)">remove</button></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            </table>
            <br>
            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit" > Create Transaction </button>
            </div>
        </form>
         </div>
      </div>
   </div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    function generateData() {
        let satuan_dimensi = $('[name="satuan_dimensi"]').val("cm");
        let dimensi = $('[name="dimensi"]').val("100x100");
        let satuan_qty = $('[name="satuan_qty"]').val("pcs");
        let qty = $('[name="qty"]').val("5");
        let cost_price = $('[name="cost_price_product"]').val("750");
        let selling_price = $('[name="selling_price_product"]').val("1500");
    }
    function changeReservation(data) {
        let formAddress = document.getElementById("delivery_address_form");
        let deliveryPriceForm = document.getElementById("deliveryPriceForm");
        if(data.value == "delivery") {
            formAddress.style.display = "block";
            deliveryPriceForm.style.display = "block";
        } else {
            formAddress.style.display = "none";
            deliveryPriceForm.style.display = "none";
            document.getElementById('delivery_address').value = '';
            document.getElementById('deliveryPrice').value = '';
        }
    }
    function removeData(obj) {
        var data = $(obj).data("id");
        let listProducts = document.querySelector('input[name=list_product]').value; 
            listProducts = JSON.parse(listProducts);
        
        for (let x = 0; x < listProducts.length; x++) {
            if(listProducts[x].products == data) {
                listProducts.splice(x, 1);
            }
        }
        generateTable(listProducts, 'remove');
    }

    function generateTable(obj, type) {
        var html = "";
        
        $('[name="list_product"]').val(JSON.stringify(obj));
        for (let index = 0; index < obj.length; index++) {
            let info = obj[index];
            html += "<tr>";
            html += "<td>"+info.productsName+"</td>";
            html += "<td>"+info.dimensi+" "+info.satuan_dimensi+"</td>";
            html += "<td>"+info.qty+" "+info.satuan_qty+"</td>";
            html += "<td>"+info.cost_price+"</td>";
            html += "<td>"+info.selling_price+"</td>";
            html += "<td><button class='btn btn-sm btn-danger' data-id = '"+info.products+"' onclick='removeData(this)'>remove</button></td>";
            html += "</tr>";
        }
        if(type == 'remove') {
            onlyAlert('Product berhasil dihapus!', true);
        } else {
            onlyAlert('Product '+obj[obj.length - 1].productsName+' berhasil ditambah!', true);
            document.getElementById('form-commentar').reset();
        }
        
        $('#product_list').html(html);
    }

    function Dialog(data) {
        var listProduct = $('[name="list_product"]').val() == "" ? [] : JSON.parse($('[name="list_product"]').val());
        console.log(listProduct);
        var dialog = bootbox.dialog({
            title: data.Title,
            size: 'medium',
            message: '<form class="form-commentar" id="form-commentar">' +
                    '<div class="form-group has-float-label">' +
                        '<select class="form-control select2" id="products" name="products" style="width: 100%;">' +
                            '<option value="">Pilih Product</option>' +
                            @foreach($products as $key => $val)
                            '<option value="{{ $val['id'] }}">{{ $val['name'] }}</option>' +
                            @endforeach
                        '</select>' +
                    '</div>' +
                    '<div class="form-group has-float-label">' +
                        '<label for="satuanDimensi">Satuan Dimensi</label>' +
                        '<input type="text" class="form-control" id="satuanDimensi" name="satuan_dimensi" placeholder="like cm, m...">' +
                    '</div>' +
                    '<div class="form-group has-float-label">' +
                        '<label for="dimensi">Dimensi</label>' +
                        '<input type="text" class="form-control" id="dimensi" name="dimensi" placeholder="like 10x10...">' +
                    '</div>' +
                    '<div class="form-group has-float-label">' +
                        '<label for="satuanQty">Satuan Quantity</label>' +
                        '<input type="text" class="form-control" id="satuanQty" name="satuan_qty" placeholder="like pcs, pack...">' +
                    '</div>' +
                    '<div class="form-group has-float-label">' +
                        '<label for="qty">Quantity</label>' +
                        '<input type="text" class="form-control" id="qty" name="qty" placeholder="" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">' +
                    '</div>' +
                    '<div class="form-row">' +
                        '<div class="form-group col-md-6">' +
                            '<label for="costPriceProduct">Cost Price</label>' +
                            '<input type="text" class="form-control" id="costPriceProduct" name="cost_price_product" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">' +
                        '</div>' +
                        '<div class="form-group col-md-6">' +
                            '<label for="sellingPriceProduct">Selling Price</label>' +
                            '<input type="text" class="form-control" id="sellingPriceProduct" name="selling_price_product" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">' +
                        '</div>' +
                    '</div>' +
                    
                    '<div class="form-group">' + '<button  class="btn btn-block btn-success simpanProduct">Tambah</button>' +'</div>' +
                '</form>',
            onEscape: function() {
                
            },
        });
                            
        dialog.init(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            $('#products').on('change', function() {
                if(this.value == "" || this.value == undefined) {
                    $('#products').addClass("is-invalid");
                } else {
                    $('#products').removeClass("is-invalid");
                }
            });
            
            $('.simpanProduct').on('click', function(e) {
                e.preventDefault();
                
                let products = $('[name="products"]').val();
                let productsName = $('[name="products"] option:selected').text();
                let satuan_dimensi = $('[name="satuan_dimensi"]').val();
                let dimensi = $('[name="dimensi"]').val();
                let satuan_qty = $('[name="satuan_qty"]').val();
                let qty = $('[name="qty"]').val();
                let cost_price = $('[name="cost_price_product"]').val();
                let selling_price = $('[name="selling_price_product"]').val();
                
                if(products == '') {
                    $('#products').addClass("is-invalid");
                } else if(satuan_dimensi == '') {
                    $('#satuanDimensi').addClass("is-invalid");
                } else if(dimensi == '') {
                    $('#dimensi').addClass("is-invalid");
                } else if(satuan_qty == '') {
                    $('#satuanQty').addClass("is-invalid");
                } else if(qty == '') {
                    $('#qty').addClass("is-invalid");
                } else {
                    let tmpData = {
                        'products' : products,
                        'productsName' : productsName,
                        'satuan_dimensi' : satuan_dimensi,
                        'dimensi' : dimensi,
                        'satuan_qty' : satuan_qty,
                        'qty' : qty,
                        'cost_price' : cost_price,
                        'selling_price' : selling_price
                    };
                    listProduct.push(tmpData);
                    
                    generateTable(listProduct, 'add');
                }
            });
        });
    }
    function addProduct(type, id) {
        let Title = "Tambah Product";
        // if(type == "add") {
            Dialog({
                Title :Title,
                type :type
            });
        // } else {

        // }
    }

    function validateEmail(emailField){
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            if (reg.test(emailField.value) == false) 
            {
                onlyAlert("Format email tidak sesuai.", false);
                return false;
            }

            return true;

    }
    function DialogCustomer(data) {
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
        DialogCustomer({
            Title :Title,
            url: url,
            type :type,
            lableId : lableId,
            lableName : lableName,
            isActive : isActive,
        });
        
    }
    

    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
        $('#example1').DataTable();
    });
</script>
@endsection