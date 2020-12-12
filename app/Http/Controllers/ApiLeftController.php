<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiLeftModel;

class ApiLeftController extends Controller
{
    public function Index(Request $request){
        $totalData = ApiLeftModel::all();
        return view('admin.api-left-side-bar',compact("totalData"));
    }
    public function Add(Request $request){
        $api = new ApiLeftModel;
        $api->fill($request->all());
        $api->save();
        return back();
    }
    public function delete(Request $request, $id){
        
        $data = ApiLeftModel::find($id);
        $data->delete();
        return back();
    }
    public function EditProcess(Request $request, $id){
        
        $data = ApiLeftModel::find($id);
        $data->fill($request->all());
        $data->save();
        return back();
    }
}
