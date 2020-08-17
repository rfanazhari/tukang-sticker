<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
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

    private $seo = [
        "description" => "Tukang Sticker adalah perusahaan yang bergerak di bidang Jasa Design, Visual, Cetak, dan Pemasangan berbagai jenis material promosi. Kami memberikan pelayanan yang terpercaya dengan hasil kualitas yang sangat baik dan di dukung dengan mesin - mesin kelas Premium.",
        "keywords" => "sticker, cutting sticker, branding mobil, banner, roll banner, jasa cutting sticker jakarta, jasa cutting sticker jakarta 24 jam, sablon kaos press, digital printing, design grafis, cetak wallpaper, pemasangan wallpaper,  ",
        "type" => "jasa",
        "title" => "Tukang Sticker Jasa Design Sticker Indonesia",
        "url" => "https://tukang-sticker.com/",
        "image" => "",
        "app_id" => "20200731001"
    ];

    private $cat_service = [
        [
            'name' => 'Outdoor & Event Banners (Flexy Jerman)',
            'permalink' => 'outdoor-and-event-banners-flexy-jerman'
        ],
        [
            'name' => 'Posters (ArtCarton Paper & Vinyl Sticker)',
            'permalink' => 'posters-artcarton-paper-and-vinyl-sticker'
        ],
        [
            'name' => 'Vehicle Graphics / Decals (Vinyls & Transparent sticker, Blackout sticker)',
            'permalink' => 'vehicle-graphics-or-decals-vinyls-and-transparent-sticker-blackout-sticker'
        ],
        [
            'name' => 'Neon Box & Billboard (Frontlit & Backlit)',
            'permalink' => 'neon-box-and-billboard-frontlit-and-backlit'
        ],
        [
            'name' => 'Textiles (Polyester & Canvas)',
            'permalink' => 'textiles-polyester-and-canvas'
        ],
        [
            'name' => 'Decoration (Custom Interior Wallpaper, Wall Cover)',
            'permalink' => 'decoration-custom-interior-wallpaper-wall-cover'
        ],
        [
            'name' => 'T-Shirt (Polyflex Cutting Press)',
            'permalink' => 't-shirt-polyflex-cutting-press'
        ],
        [
            'name' => 'Sablon Press',
            'permalink' => 'sablon-press'
        ],
    ];

    public function __construct() {
        $this->footer = ContactUs::find(1);
    }

    public function index() {
        
        // $data['service'] = OurService::where('isActive', 1)->get()->toArray();
        $data['slider'] = Slider::where('isActive', 1)->get()->toArray();
        $data['client'] = OurClient::where('isActive', 1)->get()->toArray();
        $data['labels'] = Label::where('isActive', 1)->get()->toArray();
        $data['gallery'] = Gallery::with('labels')->where('isActive', 1)->get()->toArray();
        $data['contact'] = $this->footer;
        $data['seo'] = $this->seo;
        $data['contacts'] = [
            "link_ig" => "https://www.instagram.com/_tukangsticker_/",
            "email" => "info@tukang-sticker.com",
            "tlp1" => "021-7919 7853",
            "tlp2" => "0812 8107 3848"
        ];
        $data['cat_service']= $this->cat_service;
        // dd($data);
        
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
        $this->seo['title'] = "Gallery dan Project Tukang Sticker Indonesia";
        $this->seo['description'] = "Tukang Sticker adalah perusahaan yang bergerak di bidang Jasa Design, Visual, Cetak, dan Pemasangan berbagai jenis material promosi. Kami memberikan pelayanan yang terpercaya dengan hasil kualitas yang sangat baik dan di dukung dengan mesin - mesin kelas Premium. Gallery dan project yang telah kita buat dan kerjakan. Dengan bahan yang sangat berkualitas.";
        $data['seo'] = $this->seo;
        $data['cat_service']= $this->cat_service;
        // dd($data);
        return view('front.gallery_front', $data);
    }

    public function contact() {
        $data['title'] = "Contact Us - ".$this->title;
        $data['contact'] = $this->footer;
        $this->seo['title'] = "Hubungi Kami, untuk lebih dekat bersama Tukang Sticker Indonesia";
        $this->seo['description'] = "Tukang Sticker adalah perusahaan yang bergerak di bidang Jasa Design, Visual, Cetak, dan Pemasangan berbagai jenis material promosi. Kami memberikan pelayanan yang terpercaya dengan hasil kualitas yang sangat baik dan di dukung dengan mesin - mesin kelas Premium. Hubungi kami untuk kebutuhan cetak, cutting, promosi dan design anda.";
        $data['seo'] = $this->seo;
        $data['cat_service']= $this->cat_service;
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

    public function sitemap(Request $request) {
        return '<?xml version="1.0" encoding="UTF-8"?>
            <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
        <!--  created with Free Online Sitemap Generator www.xml-sitemaps.com  -->
        <url>
        <loc>https://tukang-sticker.com/public/</loc>
        <lastmod>2020-08-16T10:24:06+00:00</lastmod>
        <priority>1.00</priority>
        </url>
        <url>
        <loc>https://tukang-sticker.com/public/product/outdoor-and-event-banners-flexy-jerman</loc>
        <lastmod>2020-08-16T10:24:06+00:00</lastmod>
        <priority>0.80</priority>
        </url>
        <url>
        <loc>https://tukang-sticker.com/public/product/posters-artcarton-paper-and-vinyl-sticker</loc>
        <lastmod>2020-08-16T10:24:06+00:00</lastmod>
        <priority>0.80</priority>
        </url>
        <url>
        <loc>https://tukang-sticker.com/public/product/vehicle-graphics-or-decals-vinyls-and-transparent-sticker-blackout-sticker</loc>
        <lastmod>2020-08-16T10:24:06+00:00</lastmod>
        <priority>0.80</priority>
        </url>
        <url>
        <loc>https://tukang-sticker.com/public/product/neon-box-and-billboard-frontlit-and-backlit</loc>
        <lastmod>2020-08-16T10:24:06+00:00</lastmod>
        <priority>0.80</priority>
        </url>
        <url>
        <loc>https://tukang-sticker.com/public/product/textiles-polyester-and-canvas</loc>
        <lastmod>2020-08-16T10:24:06+00:00</lastmod>
        <priority>0.80</priority>
        </url>
        <url>
        <loc>https://tukang-sticker.com/public/product/decoration-custom-interior-wallpaper-wall-cover</loc>
        <lastmod>2020-08-16T10:24:06+00:00</lastmod>
        <priority>0.80</priority>
        </url>
        <url>
        <loc>https://tukang-sticker.com/public/product/t-shirt-polyflex-cutting-press</loc>
        <lastmod>2020-08-16T10:24:06+00:00</lastmod>
        <priority>0.80</priority>
        </url>
        <url>
        <loc>https://tukang-sticker.com/public/product/sablon-press</loc>
        <lastmod>2020-08-16T10:24:06+00:00</lastmod>
        <priority>0.80</priority>
        </url>
        <url>
        <loc>https://tukang-sticker.com/public/front/gallery</loc>
        <lastmod>2020-08-16T10:24:06+00:00</lastmod>
        <priority>0.80</priority>
        </url>
        <url>
        <loc>https://tukang-sticker.com/public/front/contact</loc>
        <lastmod>2020-08-16T10:24:06+00:00</lastmod>
        <priority>0.80</priority>
        </url>
        </urlset>';
    }
}
