<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OurClient;
use App\Models\ContactUs;

class ClientController extends Controller
{
    private $bredcrum = [
        'title' => 'Our Client',
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

    public function index()
    {
        $data['bredcrum']   = $this->bredcrum;
        $data['list']       = OurClient::with(['user'])->get()->toArray();
        $data['footer']     = $this->footer;
        // dd($data);
        return view('admin.client', $data);
    }
    
    public function post(Request $request)
    {
        $data['imagesAlt'] = $request['imagesAlt'];
        $data['images'] = $request['images'];
        $data['imagesId'] = $request['imagesId'];
        $data['isActive'] = $request['isActive'];

        if(!empty($data['imagesId']) && empty($data['images'])) {
            $img = OurClient::find($data['imagesId']);
            if($img) {
                $this->status = [
                    "code" => 200,
                    "msg" => json_encode($img)
                ];
            }
        } else if(!empty($data['imagesId'])) { // edit options
            $client = OurClient::find($data['imagesId']);
            if($client) {
                try {
                    $client->update([
                        'alt' => $data['imagesAlt'],
                    'based_64' => $data['images'],
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
                $insert = OurClient::create([
                    'alt' => $data['imagesAlt'],
                    'based_64' => $data['images'],
                    'isActive' => 1,
                    'user_id' => Auth::user()->id,
                ]);

                $this->status = [
                    "code" => 200,
                    "msg" => "Sukses tambah Our Client."
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
