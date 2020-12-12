<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiRightModel;

class ApiRightController extends Controller
{
    public function Index(Request $request){
        $totalData = ApiRightModel::all();
        return view('admin.api-right-side-bar',compact("totalData"));
    }
    public function Add(Request $request){
        $api = new ApiRightModel;
        $api->fill($request->all());
        $api->save();
        return back();
    }
    public function delete(Request $request, $id){
        
        $data = ApiRightModel::find($id);
        $data->delete();
        return back();
    }
    public function EditProcess(Request $request, $id){
        
        $data = ApiRightModel::find($id);
        $data->fill($request->all());
        $data->save();
        return back();
    }
}
