<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Label;
use App\Models\Gallery;
use App\Models\ContactUs;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $bredcrum = [
        'title' => 'Gallery',
        'bredcrum' => []
    ];
    private $status = [
        "code" => 500,
        "msg" => "Terjadi kesalahan pada system."
    ];

    private $title = "Tukang-Sticker";
    private $footer = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->footer = ContactUs::find(1);
    }

    public function lable()
    {
        $data['bredcrum']   = $this->bredcrum;
        $data['list']       = Label::with(['user'])->get()->toArray();
        $data['footer']     = $this->footer;
        return view('admin.lable', $data);
    }

    public function post_label(Request $request) {
        $data['lableName']   = $request['lableName'];  
        $data['lableId']     = $request['lableId'];
        $data['isActive']    = $request['isActive'];
        $data['permalink']   = str_replace(' ', '-', strtolower($data['lableName']));

        if(!empty($data['lableId'])) { // edit options
            $label = Label::find($data['lableId']);
            if($label) {
                try {
                    $label->update([
                        'name' => $data['lableName'],
                        'permalink' => $data['permalink'],
                        'isActive' => $data['isActive'],
                        'user_id' => Auth::user()->id,
                    ]);
                    $this->status = [
                        "code" => 200,
                        "msg" => "Sukses Edit Label."
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
                $insert = Label::create([
                    'name' => $data['lableName'],
                    'permalink' => $data['permalink'],
                    'isActive' => 1,
                    'user_id' => Auth::user()->id,
                ]);

                $this->status = [
                    "code" => 200,
                    "msg" => "Sukses tambah Lable."
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function images()
    {
        $data['bredcrum'] = $this->bredcrum;
        $data['label']    = Label::where('isActive', '=', 1)->get()->toArray();
        $data['gallery']    = Gallery::with(['labels', 'user'])->get()->toArray();
        $data['footer']     = $this->footer;
        
        return view('admin.images', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post_images(Request $request)
    {
        $data['imagesAlt']   = $request['imagesAlt'];  
        $data['images']     = $request['images'];
        $data['imagesId']    = $request['imagesId'];
        $data['lableId']    = $request['lableId'];
        $data['isActive']    = $request['isActive'];

        if(!empty($data['imagesId']) && empty($data['images'])) { // get data
            $img = Gallery::find($data['imagesId']);
            if($img) {
                $this->status = [
                    "code" => 200,
                    "msg" => json_encode($img)
                ];
            }
        } elseif(!empty($data['imagesId'])) { // edit options
            $img = Gallery::find($data['imagesId']);
            if($img) {
                try {
                    $img->update([
                        'label_id' => $data['lableId'],
                        'alt' => $data['imagesAlt'],
                        'based_64' => $data['images'],
                        'isActive' => $data['isActive'],
                        'user_id' => Auth::user()->id,
                    ]);
                    $this->status = [
                        "code" => 200,
                        "msg" => "Sukses Edit Gallery."
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
                $insert = Gallery::create([
                    'label_id' => $data['lableId'],
                    'alt' => $data['imagesAlt'],
                    'based_64' => $data['images'],
                    'isActive' => 1,
                    'user_id' => Auth::user()->id,
                ]);

                $this->status = [
                    "code" => 200,
                    "msg" => "Sukses tambah Gallery."
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
