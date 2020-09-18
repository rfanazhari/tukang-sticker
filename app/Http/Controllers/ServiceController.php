<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OurService;
use App\Models\ContactUs;

class ServiceController extends Controller
{
    private $bredcrum = [
        'title' => 'Our Client',
        'bredcrum' => []
    ];
    private $status = [
        "code" => 500,
        "msg" => "Terjadi kesalahan pada system.."
    ];

    private $title = "Tukang Sticker.com";
    private $footer = [];
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

    public function __construct()
    {
        $this->middleware('auth');
        $this->footer = ContactUs::find(1);
    }

    public function index()
    {
        $data['bredcrum']   = $this->bredcrum;
        $data['list']       = OurService::with(['user'])->get()->toArray();
        $data['footer']     = $this->footer;
        $data['cat_service']= $this->cat_service;
        
        // dd($data);
        return view('admin.service', $data);
    }
    
    public function post(Request $request)
    {
        $data['imagesAlt'] = $request['imagesAlt'];
        $data['images'] = $request['images'];
        $data['imagesId'] = $request['imagesId'];
        $data['description'] = $request['description'];
        $data['isActive'] = $request['isActive'];
        $data['linkUrl'] = $request['linkUrl'];
        $data['permalink'] = str_replace(' ', '-', strtolower($data['imagesAlt']));
        $data['label'] = $request['label'];
        
        if(!empty($data['label'])) {
            for ($i=0; $i < count($this->cat_service); $i++) { 
                if(isset($this->cat_service[$i]['permalink'])  && $this->cat_service[$i]['permalink'] == $data['label']) {
                    $data['label'] = $this->cat_service[$i];
                }
            }

            $data['imagesAlt'] = $data['label']['name'];
            $data['permalink'] = $data['label']['permalink'];
            $data['linkUrl'] = $data['label']['permalink'];
        }
        
        if(!empty($data['imagesId']) && empty($data['images'])) {
            $img = OurService::find($data['imagesId']);
            if($img) {
                $this->status = [
                    "code" => 200,
                    "msg" => json_encode($img)
                ];
            }
        } else if(!empty($data['imagesId'])) { // edit options
            $client = OurService::find($data['imagesId']);
            if($client) {
                try {
                    $client->update([
                        'name' => $data['imagesAlt'],
                        'based_64' => $data['images'],
                        'description' => $data['description'],
                        'permalink' => $data['permalink'],
                        'isActive' => $data['isActive'],
                        'url' => $data['linkUrl'],
                        'user_id' => Auth::user()->id,
                    ]);
                    $this->status = [
                        "code" => 200,
                        "msg" => "Sukses Edit Service."
                    ];
                } catch (QueryException $exception) {
                    $errorInfo = $exception->errorInfo;
                    $this->status = [
                        "code" => 500,
                        "msg" => $errorInfo
                    ];
                }
            }
        } else { // insert
            try {
                $insert = OurService::create([
                    'name' => $data['imagesAlt'],
                    'based_64' => $data['images'],
                    'description' => $data['description'],
                    'permalink' => $data['permalink'],
                    'isActive' => $data['isActive'],
                    'url' => $data['linkUrl'],
                    'user_id' => Auth::user()->id,
                ]);

                $this->status = [
                    "code" => 200,
                    "msg" => "Sukses tambah Our Service."
                ];
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
