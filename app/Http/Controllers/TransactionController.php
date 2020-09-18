<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactUs;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use View;

class TransactionController extends Controller
{
    private $bredcrum = [
        'title' => 'Customer',
        'bredcrum' => []
    ];
    private $title = "Tukang Sticker.com";
    private $current = "";
    private $footer = [];
    private $status = [
        "code" => 500,
        "msg" => "Terjadi kesalahan pada system."
    ];

    private 
    $customerId = "", $errorcustomerId = "",
    $payment_type = "", $errorpayment_type = "",
    $status_reservation = "", $errorstatus_reservation = "",
    $delivery_address = "", $errordelivery_address = "",
    $cost_price = "", $errorcost_price = "",
    $selling_price = "", $errorselling_price = "",
    $delivery_price = "", $errordelivery_price = "",
    $list_product = "", $errorlist_product = "";

    public function __construct()
    {
        $this->middleware('auth');
        $this->footer = ContactUs::find(1);
        $this->current = Carbon::now();
    }

    public function transaction(Request $request) {
        $this->bredcrum['title'] = "Transaction";
        $data['bredcrum']   = $this->bredcrum;
        $data['footer']     = $this->footer;
        $data['trx']        = Transaction::with(['details.product', 'customer'])->get()->toArray();
        // dd($data['trx']);
        return view("admin.transaction.trx", $data);
    }

    public function create(Request $request) {
        $this->bredcrum['title'] = "Create ". ucfirst($request['type']) ." Transaction";
        $data['bredcrum']   = $this->bredcrum;
        $data['footer']     = $this->footer;
        $data['type_trx']   = $request['type'];
        $data['customer']   = Customer::where('type', '=', $request['type'])->get()->toArray();
        $data['products']   = Product::get()->toArray();

        $data['customerId'] = $this->customerId;
        $data['payment_type'] = $this->payment_type;
        $data['status_reservation'] = $this->status_reservation;
        $data['delivery_address'] = $this->delivery_address;
        $data['cost_price'] = $this->cost_price;
        $data['selling_price'] = $this->selling_price;
        $data['delivery_price'] = $this->delivery_price;
        $data['list_product'] = $this->list_product;
        $data['errorcustomerId'] = $this->errorcustomerId;
        $data['errorpayment_type'] = $this->errorpayment_type;
        $data['errorstatus_reservation'] = $this->errorstatus_reservation;
        $data['errordelivery_address'] = $this->errordelivery_address;
        $data['errorcost_price'] = $this->errorcost_price;
        $data['errorselling_price'] = $this->errorselling_price;
        $data['errordelivery_price'] = $this->errordelivery_price;
        $data['errorlist_product'] = $this->errorlist_product;
        // dd($data);
        return view("admin.transaction.create", $data);
    }

    public function post(Request $request) {
        $this->bredcrum['title'] = "Create ". ucfirst($request['type']) ." Transaction";
        $data['bredcrum']   = $this->bredcrum;
        $data['footer']     = $this->footer;
        $data['type_trx']   = $request['type'];
        $data['customer']   = Customer::where('type', '=', $request['type'])->get()->toArray();
        $data['products']   = Product::get()->toArray();

        $this->customerId = $request['customerId'];
        $this->payment_type = $request['payment_type'];
        $this->status_reservation = $request['status_reservation'];
        $this->delivery_address = $request['delivery_address'];
        $this->cost_price = $request['cost_price'];
        $this->selling_price = $request['selling_price'];
        $this->delivery_price = $request['delivery_price'];
        $this->list_product = $request['list_product'];

        if(empty($this->customerId)) {
            $this->errorcustomerId = true;
        }

        if(empty($this->payment_type)) {
            $this->errorpayment_type = true;
        }

        if(empty($this->status_reservation)) {
            $this->errorstatus_reservation = true;
        }

        if(!empty($this->status_reservation) && $this->status_reservation == 'delivery' && empty($this->delivery_address)) {
            $this->errordelivery_address = true;
        }

        if(empty($this->cost_price)) {
            $this->errorcost_price = true;
        }

        if(empty($this->selling_price)) {
            $this->errorselling_price = true;
        }

        if(!empty($this->status_reservation) && $this->status_reservation == 'delivery' && empty($this->delivery_price)) {
            $this->errordelivery_price = true;
        }

        if(empty($this->list_product)) {
            $this->errorlist_product = true;
        }

        $costPrice = 0;
        $sellingPrice = 0;
        if(!empty($this->list_product)) {
            foreach (json_decode($this->list_product, true) as $key => $val) {
                $costPrice += $val['qty'] * $val['cost_price'];
                $sellingPrice += $val['qty'] * $val['selling_price'];
            }
        }

        $data['customerId'] = $this->customerId;
        $data['payment_type'] = $this->payment_type;
        $data['status_reservation'] = $this->status_reservation;
        $data['delivery_address'] = $this->delivery_address;
        $data['cost_price'] = empty($this->cost_price) ? $costPrice : $this->cost_price;
        $data['selling_price'] = empty($this->selling_price) ? $sellingPrice : $this->selling_price;
        $data['delivery_price'] = $this->delivery_price;
        $data['list_product'] = $this->list_product;
        $data['errorcustomerId'] = $this->errorcustomerId != true ? false : true;
        $data['errorpayment_type'] = $this->errorpayment_type != true ? false : true;
        $data['errorstatus_reservation'] = $this->errorstatus_reservation != true ? false : true;
        $data['errordelivery_address'] = $this->errordelivery_address != true ? false : true;
        $data['errorcost_price'] = $this->errorcost_price == true && empty($costPrice) ? true : false ;
        $data['errorselling_price'] = $this->errorselling_price == true && empty($sellingPrice) ? true : false;
        $data['errordelivery_price'] = $this->errordelivery_price != true ? false : true;
        $data['errorlist_product'] = $this->errorlist_product != true ? false : true;

        if(!$this->errorcustomerId && !$this->errorpayment_type && !$this->errorstatus_reservation && !$this->errordelivery_address && !$this->errorcost_price && !$this->errorselling_price && !$this->errordelivery_price && !$this->errorlist_product) {
            $this->customerId       = explode('-', $this->customerId);
            $data['customerId']     = $this->customerId[0];
            $data['list_product']   = json_decode($this->list_product, true);
            $data['trx']            = "TS".$this->current->format('ymdHms');
            $data['status']         = "inquery";
            $data['created_at']     = $this->current->format('Y-m-d H:m:s');
            
            try {
                $savecustomer = Transaction::create([
                    
                    'trx_id' => $data['trx'],
                    'customer_id' => $data['customerId'],
                    'created_by' => Auth::user()->id,
                    'payment_type' => $data['payment_type'],
                    'status' => $data['status'],
                    'status_reservation' => $data['status_reservation'],
                    'delivery_address' => $data['delivery_address'],
                    'total_cost_price' => $data['cost_price'],
                    'total_selling_price' => $data['selling_price'],
                    'delivery_order' => $data['delivery_price'],
                    'created_at' => $data['created_at'],
                ]);
                $data['lastID'] = $savecustomer->id;
                if($data['lastID']) {
                    $tmpProducts = [];
                    foreach ($data['list_product'] as $key => $val) {
                        $tmpProducts[] = [
                            'trx_id' => $data['lastID'],
                            'product_id' => $val['products'],
                            'satuan_dimensi' => $val['satuan_dimensi'],
                            'dimensi' => $val['dimensi'],
                            'satuan_qty' => $val['satuan_qty'],
                            'qty' => $val['qty'],
                            'cost_price' => $val['cost_price'],
                            'selling_price' => $val['selling_price'],
                        ];
                    }
                    $data['tmpProducts'] = $tmpProducts;

                    $trx_detail = TransactionDetail::insert($data['tmpProducts']);
                }
                return redirect()->route('transaction')->with('statusTrx', 'Transaction '.$data['trx'].' Created!');
            } catch (QueryException $exception) {
                return view("admin.transaction.create", $data);
            }
            
        } else {
            return view("admin.transaction.create", $data);
        }
    }

    public function details(Request $request) {
        $data['trx_id']     = $request['trx_id'];
        $data['trx']        = Transaction::with(['details.product', 'customer'])->where('trx_id', '=', $data['trx_id'])->get()->toArray();
        $data['trx']        = $data['trx'][0];
        $data['created_by'] = User::find($data['trx']['created_by']);
        $data['updated_by'] = empty($data['trx']['updated_by']) ? [] : User::find($data['trx']['updated_by']);

        

        try {
            $html = View::make("render.trx_details", $data);
            $html = $html->render();

            $this->status = [
                "code" => 200,
                "msg" => $html
            ];
        } catch (QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            $this->status = [
                "code" => 500,
                "msg" => $errorInfo
            ];
        }
        return json_encode($this->status);
    }
}
