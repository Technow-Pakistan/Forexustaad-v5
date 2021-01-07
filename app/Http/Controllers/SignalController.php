<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignalController extends Controller
{
    public function signal(Request $request){
        return view('home.signal');

    }
}
