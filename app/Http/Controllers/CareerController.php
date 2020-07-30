<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatCarrer;
use App\Models\Carrer;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{
    private $bredcrum = [
        'title' => 'Career',
        'bredcrum' => []
    ];
    private $status = [
        "code" => 500,
        "msg" => "Terjadi kesalahan pada system."
    ];

    public function category() {
        $data['bredcrum'] = $this->bredcrum;
        $data['list'] = CatCarrer::with(['user'])->get()->toArray();
        // dd($data);
        return view('admin.catcareer', $data);
    }

    public function category_post(Request $request) {
        $data['cat_name']   = $request['cat_name'];  
        $data['cat_id']     = $request['cat_id'];
        $data['isActive']     = $request['isActive'];
        $data['permalink'] = str_replace(' ', '-', strtolower($data['cat_name']));

        if(!empty($data['cat_id'])) { // edit options
            $career = CatCarrer::find($data['cat_id']);
            if($career) {
                try {
                    $career->update([
                        'name' => $data['cat_name'],
                        'permalink' => $data['permalink'],
                        'isActive' => $data['isActive'],
                        'user_id' => Auth::user()->id,
                    ]);
                    $this->status = [
                        "code" => 200,
                        "msg" => "Sukses Edit Category."
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
                $insert = CatCarrer::create([
                    'name' => $data['cat_name'],
                    'permalink' => $data['permalink'],
                    'isActive' => 1,
                    'user_id' => Auth::user()->id,
                ]);

                $this->status = [
                    "code" => 200,
                    "msg" => "Sukses tambah Category."
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

    public function career() {
        $data['bredcrum'] = $this->bredcrum;
        $data['cat_career'] = CatCarrer::where('isActive', 1)->get()->toArray();
        $data['career'] = Carrer::with(['catcarrer', 'user'])->get()->toArray();
        // dd($data);
        return view('admin.career', $data);
    }

    public function career_post(Request $request) {
        $data['cat_career'] = $request['cat_career'];
        $data['location'] = $request['location'];
        $data['description'] = $request['description'];
        $data['expired'] = $request['expired'];
        $data['career_id'] = $request['career_id'];
        $data['linkUrl'] = $request['linkUrl'];
        $data['isActives'] = $request['isActives'];
        
        if(!empty($data['expired'])) {
            $data['expired'] = explode('/', $data['expired']);
            $data['expired'] = $data['expired'][2]."-".$data['expired'][0]."-".$data['expired'][1];
        }
        
        if(!empty($data['career_id']) && empty($data['cat_career'])) { // -get data
           $career = Carrer::with(['catcarrer', 'user'])->where('id', $data['career_id'])->get()->toArray();
           $this->status = [
                "code" => 200,
                "msg" => json_encode($career)
            ];
        } elseif(!empty($data['career_id'])) { // edit data
            $career = Carrer::find($data['career_id']);
            // dd($data);
            if($career) {
                try {
                    $career->update([
                        'cat_carrer_id' => $data['cat_career'],
                        'location' => $data['location'],
                        'description' => $data['description'],
                        'url' => $data['linkUrl'],
                        'isActive' => $data['isActives'],
                        'expired' => $data['expired'],
                        'user_id' => Auth::user()->id,
                    ]);
                    $this->status = [
                        "code" => 200,
                        "msg" => "Sukses Edit Career."
                    ];
                } catch (QueryException $exception) {
                    $errorInfo = $exception->errorInfo;
                    $this->status = [
                        "code" => 500,
                        "msg" => $errorInfo
                    ];
                }
            }
        } else {
            try {
                
                $insert = Carrer::create([
                    'cat_carrer_id' => $data['cat_career'],
                    'location' => $data['location'],
                    'description' => $data['description'],
                    'url' => $data['linkUrl'],
                    'isActive' => 1,
                    'expired' => $data['expired'],
                    'user_id' => Auth::user()->id,
                ]);
    
                $this->status = [
                    "code" => 200,
                    "msg" => "Sukses tambah Career."
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
}
