<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactUs;
use App\Models\Customer;

class CustomerController extends Controller
{
    private $bredcrum = [
        'title' => 'Customer',
        'bredcrum' => []
    ];
    private $title = "Tukang Sticker.com";
    private $footer = [];
    private $status = [
        "code" => 500,
        "msg" => "Terjadi kesalahan pada system."
    ];

    public function __construct()
    {
        $this->middleware('auth');
        $this->footer = ContactUs::find(1);
    }

    public function customer(Request $request) {
        $data['bredcrum']   = $this->bredcrum;
        $data['footer']     = $this->footer;
        $data['customer']   = Customer::with('user')->get()->toArray();

        // dd($data);

        return view("admin.transaction.customer", $data);
    }

    public function customer_post(Request $request) {
        $data['customerId'] = $request['customerId'];
        $data['companyName'] = $request['companyName'];
        $data['picName'] = $request['customerName'];
        $data['email'] = $request['email'];
        $data['phone'] = $request['phone'];
        $data['address'] = $request['address'];
        $data['type'] = $request['typeCustomer'];

        if(empty($data['customerId'])) { // create new
            try {
                $insert = Customer::create([
                    'type' => $data['type'],
                    'companyName' => $data['companyName'],
                    'picName' => $data['picName'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'user_id' => Auth::user()->id,
                ]);

                $this->status = [
                    "code" => 200,
                    "msg" => "Sukses tambah Customer."
                ];
            } catch (QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                $this->status = [
                    "code" => 500,
                    "msg" => $errorInfo
                ];
            }
        } elseif(!empty($data['customerId']) && !empty($data['type'])) { // edit
            $customer = Customer::find($data['customerId']);
            if($customer) {
                try {
                    $customer->update([
                        'type' => $data['type'],
                        'companyName' => $data['companyName'],
                        'picName' => $data['picName'],
                        'email' => $data['email'],
                        'phone' => $data['phone'],
                        'address' => $data['address'],
                        'user_id' => Auth::user()->id,
                    ]);
                    $this->status = [
                        "code" => 200,
                        "msg" => "Sukses Edit Customer ".$customer->picName."."
                    ];
                } catch (QueryException $exception) {
                    $errorInfo = $exception->errorInfo;
                    $this->status = [
                        "code" => 500,
                        "msg" => $errorInfo
                    ];
                }
            }
        } elseif(!empty($data['customerId'])) { // get value
            try {
                $customer = Customer::find($data['customerId']);
                if($customer) {
                    $this->status = [
                        "code" => 200,
                        "msg" => json_encode($customer)
                    ];
                }
            } catch (QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                $this->status = [
                    "code" => 500,
                    "msg" => $errorInfo
                ];
            }
        }

        return json_encode($this->status);
    }
}
