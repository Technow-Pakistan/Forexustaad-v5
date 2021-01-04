<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserContactModel;


class ContactController extends Controller
{
    public function contact(Request $request){
        return view('home.contact');

    }
    public function Index(Request $request){
        $totalData = UserContactModel::orderBy("id","desc")->get();
        return view('admin.userContects',compact("totalData"));
    }
    public function Add(Request $request){
        $data = new UserContactModel;
        $data->fill($request->all());
        $data->save();
        return back();
    }

}
