
<div class="row">
   <div class="col-md-12">
      <div class="card card-info">
        <div class="card-header">Information Transaction <strong style="text-danger">{{ $trx['customer']['companyName'] }}</strong>
            <div class="card-tools">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" onclick="printInvoice('{{ $trx['trx_id'] }}')" class="btn btn-secondary btn-sm"><i class="fas fa-print"> </i> Invoice</button>
                    <button type="button" onclick="sendEmail('{{ $trx['trx_id'] }}')" class="btn btn-warning btn-sm"><i class="fas fa-envelope"> </i> Send Email</button>
                    <button type="button" onclick="cancelOrder('{{ $trx['trx_id'] }}')" class="btn btn-danger btn-sm">Cancel Order</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="dataCustomer">Customer</label>
                <input type="text" class="form-control" name="companyName" placeholder="Company Name" value="{{ $trx['customer']['picName'] }}" readonly>
                </div>
                <div class="form-group col-md-4">
                <label for="dataCustomer">Status Transaction</label>
                <input type="text" class="form-control" name="companyName" placeholder="Company Name" value="{{ $trx['status'] }}" readonly>
                </div>
                <div class="form-group col-md-4">
                <label for="dataCustomer">Type Payment</label>
                <input type="text" class="form-control" name="companyName" placeholder="Company Name" value="{{ $trx['payment_type'] }}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="dataCustomer">Status Payment @if(empty($trx['date_payment']))<a href="javascript:;" id="changPaid" data-id="{{ $trx['trx_id'] }}">Change Paid</a>@endif</label>
                <input type="text" class="form-control" name="companyName" placeholder="Company Name" value="{{ $trx['status_payment'] }} - {{ empty($trx['date_payment']) ? '' : date('d F Y', strtotime($trx['date_payment'])) }}" readonly>
                </div>
                <div class="form-group col-md-4">
                <label for="dataCustomer">Status Delivery</label>
                <input type="text" class="form-control" name="companyName" placeholder="Company Name" value="{{ $trx['status_reservation'] }}" readonly>
                </div>
                <div class="form-group col-md-4">
                <label for="dataCustomer">Type Payment</label>
                <textarea class="form-control" id="address" name="address" rows="1" placeholder="Address" readonly>{{ $trx['delivery_address'] }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="dataCustomer">Cost Price</label>
                <input type="text" class="form-control" name="companyName" placeholder="Company Name" value="{{ format_money($trx['total_cost_price']) }}" readonly>
                </div>
                <div class="form-group col-md-4">
                <label for="dataCustomer">Selling Price</label>
                <input type="text" class="form-control" name="companyName" placeholder="Company Name" value="{{ format_money($trx['total_selling_price']) }}" readonly>
                </div>
                <div class="form-group col-md-4">
                <label for="dataCustomer">Delivery Charge</label>
                <input type="text" class="form-control" name="companyName" placeholder="Company Name" value="{{ format_money($trx['delivery_order']) }}" readonly>
                </div>
            </div>
            <hr>
            <h5>List Product</h5>
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
            <thead>
                <tr role="row">
                    <th>Nama Product</th>
                    <th>Dimensi</th>
                    <th>Quantity</th>
                    <th>Cost Price</th>
                    <th>Selling Price</th>
                </tr>
            </thead>
            <tbody id="product_list">
                @foreach($trx['details'] as $key => $val)
                    <tr>
                        <td>{{ $val['product']['name'] }}</td>
                        <td>{{ $val['dimensi'] }} {{ $val['satuan_dimensi'] }}</td>
                        <td>{{ $val['qty'] }} {{ $val['satuan_qty'] }}</td>
                        <td style="text-align: right;">{{ format_money($val['cost_price']) }}</td>
                        <td style="text-align: right;">{{ format_money($val['selling_price']) }}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
      </div>
   </div>
</div>
