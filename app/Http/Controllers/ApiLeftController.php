<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiLeftModel;

class ApiLeftController extends Controller
{
    public function Index(Request $request){
        $totalData = ApiLeftModel::orderBy('poistion','asc')->get();
        return view('admin.api-left-side-bar',compact("totalData"));
    }
    public function Add(Request $request){
        $api = new ApiLeftModel;
        $api->fill($request->all());
        $api->save();
        return back();
    }
    public function Order(Request $request){
        $count = count($request->poistion);
        $num = 1;
        for ($i=0; $i <$count ; $i++) { 
            $Api = ApiLeftModel::where('id',$request->poistion[$i])->first();
            $Api->poistion = $num;
            $Api->save();
            $num++;
        }
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
