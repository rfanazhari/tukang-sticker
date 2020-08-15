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
        $data['seo'] = [
            "description" => "Tukang Sticker adalah perusahaan yang bergerak di bidang Jasa Design, Visual, Cetak, dan Pemasangan berbagai jenis material promosi. Kami memberikan pelayanan yang terpercaya dengan hasil kualitas yang sangat baik dan di dukung dengan mesin - mesin kelas Premium.",
            "keywords" => "sticker, cutting sticker, branding mobil, banner, roll banner, jasa cutting sticker jakarta, jasa cutting sticker jakarta 24 jam, sablon kaos press, digital printing, design grafis, cetak wallpaper, pemasangan wallpaper,  ",
            "type" => "jasa",
            "title" => "Tukang Sticker Jasa Design Sticker Indonesia",
            "url" => "https://tukang-sticker.com/",
            "image" => "",
            "app_id" => "20200731001"
        ];
        $data['contacts'] = [
            "link_ig" => "https://www.instagram.com/_tukangsticker_/",
            "email" => "info@tukang-sticker.com",
            "tlp1" => "021-7919 7853",
            "tlp2" => "0812 8107 3848"
        ];
        $data['slider'] = [
            [
                "title" => "Design Landscape 1",
                "path" => "product/landscape/2.jpg"
            ],
            [
                "title" => "Design Landscape 2",
                "path" => "product/landscape/4.jpg"
            ],
            [
                "title" => "Design Landscape 3",
                "path" => "product/landscape/3.jpg"
            ],
            [
                "title" => "Design Landscape 4",
                "path" => "product/landscape/bank_btn1.jpg"
            ],
            [
                "title" => "Design Landscape 5",
                "path" => "product/landscape/bank_btn2.jpg"
            ],
            [
                "title" => "Design Landscape 5",
                "path" => "product/landscape/elf_branding1.jpg"
            ],
            [
                "title" => "Design Landscape 5",
                "path" => "product/landscape/elf_branding2.jpg"
            ],
        ];
        $data['label'] = ['Office', 'Mushola', 'Outdoor', 'Wrapping', 'Mesin'];
        $data['label_images'] = [
            [
                "label" => "Office",
                "path" => 'product/kantor/5.png',
                "title" => 'Office 1'
            ],
            [
                "label" => "Office",
                "path" => 'product/kantor/6.png',
                "title" => 'Office 2'
            ],
            [
                "label" => "Office",
                "path" => 'product/kantor/7.png',
                "title" => 'Office 3'
            ],            
            [
                "label" => "Mushola",
                "path" => 'product/mushola/3.png',
                "title" => 'Mushola'
            ],            
            [
                "label" => "Mushola",
                "path" => 'product/mushola/4.png',
                "title" => 'Mushola'
            ],            
            [
                "label" => "Mushola",
                "path" => 'product/mushola/5.png',
                "title" => 'Mushola'
            ],            
            [
                "label" => "Outdoor",
                "path" => 'product/PRODUCT/sensor2.png',
                "title" => 'Outdoor 3'
            ],            
            [
                "label" => "Outdoor",
                "path" => 'product/PRODUCT/sensor3.png',
                "title" => 'Outdoor 3'
            ],            
            [
                "label" => "Outdoor",
                "path" => 'product/PRODUCT/sensor4.png',
                "title" => 'Outdoor 3'
            ],            
            [
                "label" => "Wrapping",
                "path" => 'product/wrapping/1.jpg',
                "title" => 'Wrapping 1'
            ],            
            [
                "label" => "Wrapping",
                "path" => 'product/wrapping/2.jpg',
                "title" => 'Wrapping 2'
            ],            
            [
                "label" => "Wrapping",
                "path" => 'product/wrapping/3.jpg',
                "title" => 'Wrapping 3'
            ],            
            [
                "label" => "Wrapping",
                "path" => 'product/wrapping/4.jpg',
                "title" => 'Wrapping 4'
            ],            
            [
                "label" => "Wrapping",
                "path" => 'product/wrapping/5.jpg',
                "title" => 'Wrapping 5'
            ],            
            [
                "label" => "Wrapping",
                "path" => 'product/wrapping/6.jpg',
                "title" => 'Wrapping 6'
            ],            
            [
                "label" => "Mesin",
                "path" => 'product/mesin1.jpg',
                "title" => 'Mesin 1'
            ],            
            [
                "label" => "Mesin",
                "path" => 'product/mesin2.jpg',
                "title" => 'Mesin 2'
            ],            
        ];
        $data['client'] = [
            ['title' => 'Pertamina', 'path' => "product/client/pertamina.png"],
            ['title' => 'Unilever Indonesia', 'path' => "product/client/unilever.png"],
            ['title' => "Wall's Ice Cream", 'path' => "product/client/walls.png"],
            ['title' => 'Fabelio', 'path' => "product/client/fabelio.png"],
            ['title' => 'Bank BTN', 'path' => "product/client/bank-btn.png"],
        ];
        $data['testimoni'] = [
            [
                "quote" => "Sed posuere consectetur est at lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis, est non commodo luctus, nisi cras mattis consectetur purus posuere.",
                "name" => "John Doe",
                "title" => "Manager Unilever"
            ],
            [
                "quote" => "Sed posuere consectetur est at lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis, est non commodo luctus, nisi cras mattis consectetur purus posuere.",
                "name" => "John Doe",
                "title" => "Manager Unilever"
            ],
            [
                "quote" => "Sed posuere consectetur est at lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis, est non commodo luctus, nisi cras mattis consectetur purus posuere.",
                "name" => "John Doe",
                "title" => "Manager Unilever"
            ],
        ];
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
