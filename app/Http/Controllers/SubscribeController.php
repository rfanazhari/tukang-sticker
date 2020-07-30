<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscribe;

class SubscribeController extends Controller
{
    //

    private $bredcrum = [
        'title' => 'Subscribe',
        'bredcrum' => []
    ];

    public function index() {
        $data['bredcrum'] = $this->bredcrum;
        $data['list']   = Subscribe::get()->toArray();


        return view('admin.subscribe', $data);
    }
}
