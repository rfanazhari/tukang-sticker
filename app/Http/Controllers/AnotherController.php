<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnotherController extends Controller
{
    public function printInvoice(Request $request) {

        return view('render.invoice');
    }
    public function generateEmail(Request $request) {

        return view('render.email');
    }
}
