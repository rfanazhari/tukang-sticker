<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OurService;

class ServiceController extends Controller
{
    private $bredcrum = [
        'title' => 'Our Client',
        'bredcrum' => []
    ];
    private $status = [
        "code" => 500,
        "msg" => "Terjadi kesalahan pada system."
    ];

    public function index()
    {
        $data['bredcrum']   = $this->bredcrum;
        $data['list']       = OurService::with(['user'])->get()->toArray();
        
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
