<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\OurService;
use App\Models\OurClient;
use App\Models\Carrer;
use App\Models\Gallery;
use App\Models\Label;
use App\Models\ContactUs;
use App\Models\Subscribe;
use Carbon\Carbon;
use Session;

class FrontController extends Controller
{
    private $title = "Tukang-Sticker";
    private $footer = [];
    private $status = [
        "code" => 500,
        "type" => "danger",
        "msg" => "Terjadi kesalahan pada system."
    ];

    public function __construct() {
        $this->footer = ContactUs::find(1);
    }

    public function index() {
        
        $data['service'] = OurService::where('isActive', 1)->get()->toArray();
        $data['slider'] = Slider::where('isActive', 1)->get()->toArray();
        $data['client'] = OurClient::where('isActive', 1)->get()->toArray();
        $data['contact'] = $this->footer;
        if(env('APP_MAINTENANCE')) {
            if(Session::has('mode_development')) {
                $data['title'] = $this->title;
                return view('front.home', $data);
            } else {
                return view('maintenance', ['title' => $this->title]);
            }
        } else {
            $data['title'] = $this->title;
            return view('front.home', $data);
        }
    }

    public function about() {
        $data['title'] = "About Us - ".$this->title;
        $data['contact'] = $this->footer;
        
        return view('front.about_front', $data);
    }

    public function career() {
        $data['career'] = Carrer::with(['catcarrer'])->where('isActive', 1)->get()->toArray();
        $data['title'] = "Career - ".$this->title;
        $data['contact'] = $this->footer;
        
        // dd($data);
        return view('front.career_front', $data);
    }

    public function service() {
        $data['service'] = OurService::where('isActive', 1)->get()->toArray();
        $data['client'] = OurClient::where('isActive', 1)->get()->toArray();
        $data['title'] = "Our Service - ".$this->title;
        $data['contact'] = $this->footer;
        
        // dd($data);
        return view('front.service', $data);
    }

    public function client() {
        $data['client'] = OurClient::where('isActive', 1)->get()->toArray();
        $data['title'] = "Our Client - ".$this->title;
        $data['contact'] = $this->footer;
        
        // dd($data);
        return view('front.client', $data);
    }

    public function gallery() {
        $data['label'] = Label::where('isActive', 1)->get()->toArray();
        $data['gallery'] = Gallery::with(['labels'])->where('isActive', 1)->get()->toArray();
        $data['title'] = "Gallery - ".$this->title;
        $data['contact'] = $this->footer;
        
        // dd($data);
        return view('front.gallery_front', $data);
    }

    public function contact() {
        $data['title'] = "Contact Us - ".$this->title;
        $data['contact'] = $this->footer;
        
        // dd($data);
        return view('front.contact_us', $data);
    }

    public function maintenance() {
        Session::put('mode_development', 1);
        Session::save();
        return redirect()->route('front');
    }

    public function contact_post(Request $request) {
        $data['name'] = $request['name'];
        $data['surname'] = $request['surname'];
        $data['email'] = $request['email'];
        $data['phone'] = $request['phone'];
        $data['message'] = $request['message'];
        
        try {
            $insert = Subscribe::create([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'message' => $data['message'],
                'created_at' => Carbon::now()->format('Y-m-d H:m:s')
            ]);

            $this->status = [
                "code" => 200,
                "type" => "success",
                "msg" => "Thank you, your message already sent."
            ];
        } catch (QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            $this->status = [
                "code" => 500,
                "type" => "danger",
                "msg" => $errorInfo
            ];
        }

        return json_encode($this->status);
    }
}
