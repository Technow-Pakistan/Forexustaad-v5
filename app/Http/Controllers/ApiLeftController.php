<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiLeftModel;
use App\Models\TrashModel;

class ApiLeftController extends Controller
{
    public function Index(Request $request){
        $totalData = ApiLeftModel::where('trash',0)->get();
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
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Api Left")->first();
        $Trash->delete();
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
    public function Trash(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = ApiLeftModel::find($id);
        $data->trash = 1;
        $data->save();
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "api/api-left";
        $Trash->category = "Api Left";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->title;
        $Trash->save();
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $data = ApiLeftModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Api Left")->first();
        $Trash->delete();
        return back();
    }
}
