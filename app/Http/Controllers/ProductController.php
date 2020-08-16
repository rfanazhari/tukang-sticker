<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurService;


class ProductController extends Controller
{
    //

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

    public function index(Request $request) {
        $data['content'] = OurService::where('permalink', '=', $request->product)->get()->toArray();
        $data['post'] = OurService::where('permalink', '!=', $request->product)->get()->toArray();
        dd($data);
    }
}
