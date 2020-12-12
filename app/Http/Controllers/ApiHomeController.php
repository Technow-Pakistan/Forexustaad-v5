<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiHomeModel;

class ApiHomeController extends Controller
{
    public function Index(Request $request){
        $totalData = ApiHomeModel::all();
        return view('admin.api-home-page',compact("totalData"));
    }
    public function Add(Request $request){
        $api = new ApiHomeModel;
        $api->fill($request->all());
        $api->save();
        return back();
    }
    public function delete(Request $request, $id){
        
        $data = ApiHomeModel::find($id);
        $data->delete();
        return back();
    }
    public function EditProcess(Request $request, $id){
        
        $data = ApiHomeModel::find($id);
        $data->fill($request->all());
        $data->save();
        return back();
    }
    
}
