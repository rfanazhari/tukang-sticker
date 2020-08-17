<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurService;
use App\Models\ContactUs;

class ProductController extends Controller
{
    //
    private $title = "Tukang-Sticker";
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

    private $seo = [
        "description" => "Tukang Sticker adalah perusahaan yang bergerak di bidang Jasa Design, Visual, Cetak, dan Pemasangan berbagai jenis material promosi. Kami memberikan pelayanan yang terpercaya dengan hasil kualitas yang sangat baik dan di dukung dengan mesin - mesin kelas Premium.",
        "keywords" => "sticker, cutting sticker, branding mobil, banner, roll banner, jasa cutting sticker jakarta, jasa cutting sticker jakarta 24 jam, sablon kaos press, digital printing, design grafis, cetak wallpaper, pemasangan wallpaper,  ",
        "type" => "jasa",
        "title" => "Tukang Sticker Jasa Design Sticker Indonesia",
        "url" => "https://tukang-sticker.com/",
        "image" => "",
        "app_id" => "20200731001"
    ];

    public function index(Request $request) {
        $data['content'] = OurService::where('permalink', '=', $request->product)->get()->toArray();
        $data['post'] = OurService::where('permalink', '!=', $request->product)->get()->toArray();
        
        for ($i=0; $i < count($this->cat_service); $i++) { 
            if(isset($this->cat_service[$i]['permalink']) && $this->cat_service[$i]['permalink'] == $request->product) {
                $data['label'] = $this->cat_service[$i];
            }
        }

        $this->seo['title'] = "Deskripsi Product ". $data['label']['name'];
        
        if(count($data['content'])) {
            $data['content'] = $data['content'][0];
            $data['title'] = $data['content']['name'] . "-" . $this->title;

            $this->seo['description'] = strip_tags($data['content']['description']);
            $this->seo['description'] = preg_replace( "/\r|\n/", "", $data['content']['description'] );
            $data['content']['description'] = preg_replace( "/\r|\n/", "", $data['content']['description'] );
        }
        
        $data['seo']    = $this->seo;
        $data['title'] = $this->title;
        $data['cat_service'] = $this->cat_service;
        $data['contact'] = ContactUs::find(1);

        // dd($data);

        return view('front.product', $data);
    }
}
