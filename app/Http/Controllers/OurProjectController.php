<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class OurProjectController extends Controller
{
    private $title = "Tukang Sticker.com";
    private $footer = [];
    private $status = [
        "code" => 500,
        "type" => "danger",
        "msg" => "Terjadi kesalahan pada system."
    ];

    private $seo = [
        "description" => "Tukang Sticker.com adalah perusahaan yang bergerak di bidang Jasa Design, Visual, Cetak, dan Pemasangan berbagai jenis material promosi. Kami memberikan pelayanan yang terpercaya dengan hasil kualitas yang sangat baik dan di dukung dengan mesin - mesin kelas Premium.",
        "keywords" => "tukang sticker.com, sticker, cutting sticker, branding mobil, banner, roll banner, jasa cutting sticker jakarta, jasa cutting sticker jakarta 24 jam, sablon kaos press, digital printing, design grafis, cetak wallpaper, pemasangan wallpaper, tukang sticker terdekat, tukang sticker.com  ",
        "type" => "jasa",
        "title" => "Tukang Sticker.com Indonesia",
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
    //
    public function wallpaper(Request $request) {
        $data['title'] = "Wallpaper - ".$this->title;
        $data['contact'] = $this->footer;
        $data['seo'] = $this->seo;
        $data['cat_service']= $this->cat_service;

        return view('front.project.wallpaper', $data);
    }
    public function design(Request $request) {
        $data['title'] = "Design - ".$this->title;
        $data['contact'] = $this->footer;
        $data['seo'] = $this->seo;
        $data['cat_service']= $this->cat_service;

        return view('front.project.design', $data);
    }
    public function details(Request $request) {
        $data['title'] = "Detail - ".$this->title;
        $data['contact'] = $this->footer;
        $data['seo'] = $this->seo;
        $data['cat_service']= $this->cat_service;

        return view('front.project.detail', $data);
    }
}
