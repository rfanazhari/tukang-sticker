<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscribe;
use App\Models\ContactUs;

class SubscribeController extends Controller
{
    //

    private $bredcrum = [
        'title' => 'Subscribe',
        'bredcrum' => []
    ];
    private $title = "Tukang Sticker.com";
    private $footer = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->footer = ContactUs::find(1);
    }

    public function index() {
        $data['bredcrum'] = $this->bredcrum;
        $data['list']   = Subscribe::get()->toArray();
        $data['footer'] = $this->footer;

        return view('admin.subscribe', $data);
    }
}
