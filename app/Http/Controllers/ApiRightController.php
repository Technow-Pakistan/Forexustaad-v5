<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiRightModel;
use App\Models\TrashModel;

class ApiRightController extends Controller
{
    public function Index(Request $request){
        $totalData = ApiRightModel::orderBy('id','desc')->where('trash',0)->get();
        return view('admin.api-right-side-bar',compact("totalData"));
    }
    public function Add(Request $request){
        $api = new ApiRightModel;
        $api->fill($request->all());
        $api->save();
        return back();
    }
    public function delete(Request $request, $id){
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Api Right")->first();
        $Trash->delete();
        
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
    public function Trash(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = ApiRightModel::find($id);
        $data->trash = 1;
        $data->save();
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "api/api-right";
        $Trash->category = "Api Right";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->title;
        $Trash->save();
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $data = ApiRightModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Api Right")->first();
        $Trash->delete();
        return back();
    }
}
