<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactUs;

class AboutController extends Controller
{
    private $bredcrum = [
        'title' => 'About Us',
        'bredcrum' => []
    ];
    private $status = [
        "msg_error" => "Terjadi kesalahan pada system."
    ];


    public function index()
    {
        $data['bredcrum']   = $this->bredcrum;
        $data['about']       = ContactUs::find(1);
        // dd($data);
        return view('admin.about', $data);
    }

    
    public function post(Request $request)
    {
        $data['whatsapp_url'] = $request['whatsapp_url'];
        $data['tlp'] = $request['tlp'];
        $data['email1'] = $request['email1'];
        $data['email2'] = $request['email2'];
        $data['alamat1'] = $request['alamat1'];
        $data['alamat2'] = $request['alamat2'];
        $data['facebook'] = $request['facebook'];
        $data['twitter'] = $request['twitter'];
        $data['instagram'] = $request['instagram'];
        $data['linkedin'] = $request['linkedin'];
        $data['based_64_contact_us'] = $request['based_64_contact_us'];
        $data['based_64_about_us1'] = $request['based_64_about_us1'];
        $data['based_64_about_us2'] = $request['based_64_about_us2'];
        $data['based_64_about_us3'] = $request['based_64_about_us3'];
        $data['based_64_about_us4'] = $request['based_64_about_us4'];
        $data['based_64_service'] = $request['based_64_service'];
        $data['based_64_client'] = $request['based_64_client'];
        $data['based_64_career'] = $request['based_64_career'];
        $data['tag_about'] = $request['tag_about'];
        $data['tag_service'] = $request['tag_service'];
        $data['tag_client'] = $request['tag_client'];
        $data['tag_career'] = $request['tag_career'];
        // dd($data);
        $client = ContactUs::find(1);
        if($client) {
            try {
                $client->update([
                    'whatsapp_url' => $data['whatsapp_url'],
                    'tlp' => $data['tlp'],
                    'email1' => $data['email1'],
                    'email2' => $data['email2'],
                    'alamat1' => $data['alamat1'],
                    'alamat2' => $data['alamat2'],
                    'facebook' => $data['facebook'],
                    'twitter' => $data['twitter'],
                    'instagram' => $data['instagram'],
                    'linkedin' => $data['linkedin'],
                    'based_64_contact_us' => $data['based_64_contact_us'],
                    'based_64_about_us1' => $data['based_64_about_us1'],
                    'based_64_about_us2' => $data['based_64_about_us2'],
                    'based_64_about_us3' => $data['based_64_about_us3'],
                    'based_64_about_us4' => $data['based_64_about_us4'],
                    'based_64_service' => $data['based_64_service'],
                    'based_64_client' => $data['based_64_client'],
                    'based_64_career' => $data['based_64_career'],
                    'tag_about' => $data['tag_about'],
                    'tag_service' => $data['tag_service'],
                    'tag_client' => $data['tag_client'],
                    'tag_career' => $data['tag_career'],
                    'user_id' => Auth::user()->id,
                ]);
                $this->status = [
                    "msg_success" => "Sukses Edit About Us."
                ];
            } catch (QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                $this->status = [
                    "msg_error" => $errorInfo
                ];
            }
        } 

        return redirect()->back()->with($this->status);
        
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
