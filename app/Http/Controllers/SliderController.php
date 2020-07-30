<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;

class SliderController extends Controller
{
    private $bredcrum = [
        'title' => 'Slider',
        'bredcrum' => []
    ];
    private $status = [
        "code" => 500,
        "msg" => "Terjadi kesalahan pada system."
    ];

    public function index()
    {
        $data['bredcrum']   = $this->bredcrum;
        $data['list']       = Slider::with(['user'])->get()->toArray();
        
        return view('admin.slider', $data);
    }

    public function post(Request $request)
    {
        $data['imagesAlt']   = $request['imagesAlt'];  
        $data['captions']   = $request['captions'];  
        $data['images']     = $request['images'] ?? '';
        $data['imagesId']    = $request['imagesId'];
        $data['url']    = $request['url'];
        $data['isActive']    = $request['isActive'];
        
        if(!empty($data['imagesId']) && empty($data['images'])) {
            $img = Slider::find($data['imagesId']);
            if($img) {
                $this->status = [
                    "code" => 200,
                    "msg" => json_encode($img)
                ];
            }
        } else if(!empty($data['imagesId'])) { // edit options
            $img = Slider::find($data['imagesId']);
            if($img) {
                try {
                    $img->update([
                        'alt' => $data['imagesAlt'],
                        'caption' => $data['captions'],
                        'based_64' => $data['images'],
                        'url' => $data['url'],
                        'isActive' => $data['isActive'],
                        'user_id' => Auth::user()->id,
                    ]);
                    $this->status = [
                        "code" => 200,
                        "msg" => "Sukses Edit Slider."
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
                $insert = Slider::create([
                    'alt' => $data['imagesAlt'],
                    'caption' => $data['captions'],
                    'based_64' => $data['images'],
                    'url' => $data['url'],
                    'isActive' => 1,
                    'user_id' => Auth::user()->id,
                ]);

                $this->status = [
                    "code" => 200,
                    "msg" => "Sukses tambah Slider."
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
