@extends('layouts.ly_order')

@section('css')
  <style>
    .form-control {
      background-color: unset;
      border: unset;
    }
    .form-control.is-invalid {
      border: 1px solid !important;
      border-color: #dc3545 !important;
    }
    #next-product {
      display: none;
    }
  </style>
@endsection

@section('content')


<div class="wrapper light-wrapper image-wrapper bg-auto no-overlay bg-image" data-image-src="{{ asset('front/images/art/map.png') }}">
   <div class="container inner pt-0">
      <div class="space60"></div>
      <div class="row">
         <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            <h2 class="section-title text-center">Create your order here.</h2>
            <p class="lead text-center">We will give you the best solutions and services.</p>
            <div class="space40"></div>
            <div id="accordion-2" class="accordion-wrapper">
               <div class="card shadow">
                  <div class="card-header" id="accordion-heading-2-3">
                     <h5>
                        <button class="" id="btn-accordion-collapse-2-3" data-toggle="collapse" data-target="#accordion-collapse-2-3" aria-expanded="true" aria-controls="accordion-collapse-2-3">Information Products</button>
                     </h5>
                  </div>
                  <!-- /.card-header -->
                  <div id="accordion-collapse-2-3" class="collapse show" aria-labelledby="accordion-heading-2-3" data-target="#accordion-2">
                     <div class="card-body">
                        <button class="btn btn-s" type="button" onclick="addProduct('add', '')"><i class="jam jam-plus-rectangle"></i> Product</button>
                        <input type="hidden" name="product_list">                        
                      <div class="space30"></div>
                      <div id="list-product">
                          <p>Add your product..</p>
                      </div>
                      <button class="btn btn-s" id="next-product" type="button" onclick="nexts('product')">Next <i class="jam jam-chevrons-right"></i></button>
                      <div class="space30"></div>
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <!-- /.collapse -->
               </div>
               <!-- /.card -->
               <div class="card shadow">
                  <div class="card-header" id="accordion-heading-2-2">
                     <h5>
                        <button class="collapsed" id="btn-accordion-heading-2-2" data-toggle="collapse" data-target="#accordion-collapse-2-2" aria-expanded="false" aria-controls="accordion-collapse-2-2">Information Payment and Delivery</button>
                     </h5>
                  </div>
                  <!-- /.card-header -->
                  <div id="accordion-collapse-2-2" class="collapse" aria-labelledby="accordion-heading-2-2" data-target="#accordion-2">
                     <div class="card-body">
                        <div class="space10"></div>
                        <div class="form-control">
                           <h6>Pick your payment</h6>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="paymentCash" name="type_payment" class="custom-control-input" value="cash">
                              <label class="custom-control-label" for="paymentCash">Cash</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="paymentTransfer" name="type_payment" class="custom-control-input" value="transfer">
                              <label class="custom-control-label" for="paymentTransfer">Transfer</label>
                           </div>
                        </div>
                        <div class="space70"></div>
                        <div class="form-control">
                           <h6>Pick your Reservation</h6>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="reservationPickup" name="status_reservation" class="custom-control-input" value="pickup">
                              <label class="custom-control-label" for="reservationPickup">Pickup</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="reservationDelivery" name="status_reservation" class="custom-control-input" value="delivery">
                              <label class="custom-control-label" for="reservationDelivery">Delivery</label>
                           </div>
                        </div>
                        <div class="space60"></div>
                        <h6>Your address please</h6>
                        <textarea class="form-control" rows="3" placeholder="Address"></textarea>
                        <div class="space30"></div>
                        <button class="btn btn-s" type="button" onclick="addProduct()">Next <i class="jam jam-chevrons-right"></i></button>
                      <div class="space30"></div>
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <!-- /.collapse -->
               </div>
               <!-- /.card -->
               <div class="card shadow">
                  <div class="card-header" id="accordion-heading-2-1">
                     <h5>
                        <button class="collapsed" data-toggle="collapse" data-target="#accordion-collapse-2-1" aria-expanded="false" aria-controls="accordion-collapse-2-1">Information Contact</button>
                     </h5>
                  </div>
                  <!-- /.card-header -->
                  <div id="accordion-collapse-2-1" class="collapse" aria-labelledby="accordion-heading-2-1" data-target="#accordion-2">
                     <div class="card-body">
                        <div class="space30"></div>
                        <div class="form-control text-center">
                           <h6>Pick your order as</h6>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="orderPersonal" name="type_order" class="custom-control-input" value="personal">
                              <label class="custom-control-label" for="orderPersonal">Personal</label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="orderCorporate" name="type_order" class="custom-control-input" value="corporate">
                              <label class="custom-control-label" for="orderCorporate">Corporate</label>
                           </div>
                        </div>
                        <div class="space80"></div>
                        <h6>Your Company Name</h6>
                        <input type="text" class="form-control" name="company_name" placeholder="Company Name">
                        <div class="space30"></div>
                        <h6>Your Name</h6>
                        <input type="text" class="form-control" name="pic_name" placeholder="Your Name">
                        <div class="space30"></div>
                        <h6>Your Email please</h6>
                        <input type="text" class="form-control" name="email" placeholder="Your Email">
                        <div class="space30"></div>
                        <h6>and Your Phone Number</h6>
                        <input type="text" class="form-control" name="phone" placeholder="Your Phone">
                        <div class="space30"></div>
                        <button class="btn">Submit your Order</button>
                        <div class="space30"></div>
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <!-- /.collapse -->
               </div>
               <!-- /.card -->
            </div>
         </div>
         <!-- /column -->
      </div>
      <div class="space150"></div>
      <!--/.row -->
   </div>
   <!-- /.container -->
</div>

@endsection

@section('js')
<script src="{{ asset('assets/plugins/bootbox/bootbox.min.js') }}"></script>
<script>
  var globalObj = [];
  function nexts(type) {
    switch (type) {
      case 'product':
        //validate
        var product_list = JSON.parse($('[name="product_list"]').val());
        
        if(product_list.length == 0) {
          onlyAlert("Please add your Product.", true);
        } else {
          
          document.getElementById("btn-accordion-collapse-2-3").classList.add("collapsed");
          document.getElementById("accordion-collapse-2-3").classList.remove("show");
          document.getElementById("btn-accordion-heading-2-2").classList.remove("collapsed");
          document.getElementById("accordion-collapse-2-2").classList.add("show");
        }
      break;
    
      default:
        break;
    }
  }
  function onlyAlert(msg, closes) {
    bootbox.alert(msg);
    if(closes) {
        bootbox.hideAll();
    }
  }
  function removeData(obj) {
    var data = $(obj).data("id");
    let listProducts = document.querySelector('input[name=product_list]').value; 
        listProducts = JSON.parse(listProducts);
    
    for (let x = 0; x < listProducts.length; x++) {
        if(listProducts[x].products == data) {
            listProducts.splice(x, 1);
        }
    }
    generateTable(listProducts, 'remove');
  }
  function searchs(nameKey, myArray) {
    
  }
  function filterData(id, obj) {
    let value = 0;
    for (var i=0; i < obj.length; i++) {
      if (obj[i].products === id) {
        value++;
      }
    }
    
    if(value > 1) {
      for (let x = 0; x < (value-1) ; x++) {
        if(obj[x].products == id) {
          obj.splice(x, 1);
        }
      }
    }

    globalObj = obj;
  }
  function generateTable(obj, type) {
    var html = "";
    $('[name="product_list"]').val(JSON.stringify(obj));
    html += '<table class="table table-bordered table-hover">';
      html += '<thead>';
          html += '<tr>';
            html += '<th scope="col">#</th>';
            html += '<th scope="col">Product Name</th>';
            html += '<th scope="col">Dimensi</th>';
            html += '<th scope="col">Quantity</th>';
            html += '<th scope="col">Act</th>';
          html += '</tr>';
      html += '</thead>';
      html += '<tbody>';
    for (let index = 0; index < obj.length; index++) {
        let info = obj[index];
        html += "<tr>";
        html += "<td>"+(index+1)+"</td>";
        html += "<td>"+info.productsName+"</td>";
        html += "<td>"+info.dimensi+" "+info.satuan_dimensi+"</td>";
        html += "<td>"+info.qty+" "+info.satuan_qty+"</td>";
        html += "<td><button class='btn btn-s btn-danger' data-id = '"+info.products+"' onclick='removeData(this)'>remove</button></td>";
        html += "</tr>";
    }
    html += '</tbody>';
    html += '</table>';
    
    if(type == 'remove') {
        onlyAlert('Product berhasil dihapus!', true);
    } else {
        onlyAlert('Product '+obj[obj.length - 1].productsName+' berhasil ditambah!', true);
        document.getElementById('form-commentar').reset();
    }
    
    $('#list-product').html(html);
    document.getElementById('next-product').style.display = 'block';
  }
  function Dialog(data) {
    var listProduct = $('[name="product_list"]').val() == "" ? [] : JSON.parse($('[name="product_list"]').val());
    var dialog = bootbox.dialog({
        closeButton: false,
        size: 'medium',
        message: '<form class="form-commentar" id="form-commentar">' +
                '<div class="form-group has-float-label">' +
                    '<select class="custom-select" id="products" name="products">' +
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
                
                '<div class="form-group">' + '<button  class="btn btn-block btn-success simpanProduct">Add Product</button>' +'</div>' +
            '</form>',
        onEscape: function() {
            
        },
    });
                        
    dialog.init(function() {

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
                filterData(products, listProduct);
                generateTable(globalObj, 'add');
                // generateTable(listProduct, 'add');
            }
        });
    });
  }
  function addProduct(type, id) {
    Dialog({
        type :type
    });
  }
</script>
@endsection