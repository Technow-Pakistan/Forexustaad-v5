<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagModel;

class TagController extends Controller
{
    public function Index(Request $request){
        $totalData = TagModel::all();
        return view('admin.add-tag',compact("totalData"));
    }
    public function Add(Request $request){
        $api = new TagModel;
        $api->fill($request->all());
        $api->save();
        return back();
    }
    public function delete(Request $request, $id){
        
        $data = TagModel::find($id);
        $data->delete();
        return back();
    }
}
